<?php 
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
class UsersController extends AppController
{
    public $layout = 'kennel';
    public $uses = array('User','Departamento','Sucursale','Propietario');
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('guarda_nuevo_propietario');
    }
    public function index()
    {
        $usuarios = $this->User->find('all',array('order' => 'User.id DESC','conditions' => array('User.role' => array('administrador','regional'))));
        $this->set(compact('usuarios'));
    }
    public function usuario($idUsuario = null)
    {
        $this->layout = 'ajax';
        $this->User->id = $idUsuario;
        $this->request->data = $this->User->read();
        $sucursales = $this->Sucursale->find('list',array('fields' => 'Sucursale.nombre'));
        $this->set(compact('sucursales','idUsuario'));
    } 
    public function guardausuario()
    {
        if(!empty($this->request->data))
        {
            $valida = $this->validar('User');
            if(empty($valida))
            {
                $this->User->create();
                $this->User->save($this->request->data);
                $this->Session->setFlash('Se guardo correctamente','msgbueno');
            }
            else{
                $this->Session->setFlash($valida,'msgerror');
            }
            $this->redirect($this->referer());
        }
        else{
            $this->Session->setFlash('No se guardo','msgerror');
            $this->redirect($this->referer());
        }
    }
    public function elimina($idusuario = null)
    {
        if($this->User->delete($idusuario))
        {
            $this->Session->setFlash('Se elimino correctamente','msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('No se pudo eliminar','msgerror');
            $this->redirect(array('action' => 'index'));
        }
    }
    
    public function login()
    {
        $this->layout = 'login';
        //debug($this->request->data);exit;
        if ($this->request->is('post')) {


            if ($this->Auth->login()) {
                $role = $this->Session->read('Auth.User.role');
                switch($role)
                {
                    case 'administrador':
                        $this->redirect(array('controller' => 'Reportes','action' => 'panel'));
                        break;
                    case 'regional':
                        $this->redirect(array('controller' => 'Reportes','action' => 'panel'));
                        break;
                    case 'propietario':
                        $this->redirect(array('controller' => 'Usuarios','action' => 'index'));
                        break;
                    default:
                        $this->redirect($this->referer());
                }
            } else {
                $this->Session->setFlash('Usuario o Password incorrectos.','msgerror');
            }
        }
    }
    
    public function salir()
    {
        $this->redirect($this->Auth->logout());
        $this->redirect(array('action'=>'login'));
    }
    
    public function guarda_nuevo_propietario()
    {
        $notificar = 0;
        //debug($this->request->data);exit;
        if(!empty($this->request->data['Propietario']['nombre']) && !empty($this->request->data['Propietario']['email1']) && !empty($this->request->data['Propietario']['ci']))
        {
            $existe_usuario = $this->User->findByusername($this->request->data['Propietario']['email1'],null,null,null,null,-1);
            if(!empty($existe_usuario))
            {
                $this->Session->setFlash('El email que ingreso ya fue registrado!!!','msgerror');
                $this->redirect($this->referer());
            }
            $this->Propietario->create();
            $this->request->data['Propietario']['solicitud'] = 1;
            $valida = $this->validar('Propietario');
            if(!empty($valida))
            {
                $this->Session->setFlash($valida,'msgerror');
                $this->redirect($this->referer());
            }
            if($this->Propietario->save($this->request->data))
            {
                $idPropietario = $this->Propietario->getLastInsertID();
                $this->User->create();
                $this->request->data['User']['nombre'] = $this->request->data['Propietario']['nombre'];
                $this->request->data['User']['username'] = $this->request->data['Propietario']['email1'];
                $this->request->data['User']['password'] = $this->request->data['Propietario']['ci'];
                $this->request->data['User']['role'] = 'propietario';
                $this->request->data['User']['propietario_id'] = $idPropietario;
                if($this->User->save($this->request->data['User']))
                {
                    $idUsuario = $this->User->getLastInsertID();
                    if ($this->Auth->login())
                    {
                        $notificar = 1;
                        $this->Session->setFlash('Se registro correctamente y se envio un correo sobre la informacion de su usuario!!!','msgbueno');
                        $this->enviaEmailBienvenida();
                        $this->redirect(array('controller' => 'Usuarios','action' => 'index',1));
                    }
                    else{
                        $this->Session->setFlash('Se registro correctamente su Usuario es: '.$this->request->data['User']['username'],'msgbueno');
                        $this->redirect($this->referer());
                    }
                }
                else{
                    $this->Propietario->delete($idPropietario);
                    $this->Session->setFlash('No se registro intente nuevamente','msgerror');
                    $this->redirect($this->referer());
                }
                
            }
            else{
                $this->Session->setFlash('No se registro intente nuevamente','msgerror');
                $this->redirect($this->referer());
            }
        }
        else{
            $this->Session->setFlash('No se registro intentelo nuevamente','msgerror');
            $this->redirect($this->referer());
        }
        
    }
    public function propietarios()
    {
        
    }
    public function get_usuarios_admin()
    {
        return $this->User->find('count',array('conditions' => array('role' => 'administrador')));
    }
    public function enviaEmailBienvenida()
    {
        //envio de mail
        $Email = new CakeEmail('smtp');
        $emailPropietario = $this->request->data['Propietario']['email1'];
        $Email->emailFormat('html')
        ->template('bienvenida')
        ->viewVars(array(
            'email_propietario' => $emailPropietario,
            'nombre_propietario' => $this->request->data['Propietario']['nombre'],
            'password_propietario' => $this->request->data['Propietario']['ci']
        ))
        ->to("$emailPropietario")
        ->subject('Usuario Kennel Club Boliviano')
        ->from('sistema@kcb.org.bo', 'KCB')
        ->send();
        //if($Email->send())
        //$this->set(compact('detallePedido', 'itemsPedido', 'parametros'));
        //fin envio mail
        //$this->redirect(array('controller'=>'Pedidos', 'action'=>'listado'));  
    }
    public function enviaEmailBienvenidaprueba()
    {
        //debug('ssss');exit;
        //envio de mail
        $Email = new CakeEmail('smtp');
        $emailPropietario = 'eynarfrio@gmail.com';
        $Email->emailFormat('html')
        ->template('bienvenida')
        ->viewVars(array(
            'email_propietario' => 'eynarfrio@gmail.com',
            'nombre_propietario' => 'EYNAR TORREZ',
            'password_propietario' => '6847560'
        ))
        ->to("$emailPropietario")
        ->subject('Usuario Kennel Club Boliviano')
        ->from('sistema@kcb.org.bo', 'KCB');
        //->send();
        if($Email->send())
        {
            debug('envio');exit;
        }
        else{
            debug('nada');exit;
        }
        //$this->set(compact('detallePedido', 'itemsPedido', 'parametros'));
        //fin envio mail
        //$this->redirect(array('controller'=>'Pedidos', 'action'=>'listado'));  
    }
}
?>