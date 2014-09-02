<?php 

class WebsController extends AppController{
    public $layout = 'webkennel';
    public $uses = array('User','Propietario','Mascota','Raza','Criadero',
    'Departamento','Mascotaspropietario','Ingreso','Cuentasbancaria','Tramite','Examenesmascota','Mascotastitulo');
    
    public function beforeFilter() {
        
        parent::beforeFilter();
        $this->Auth->allow();
    }
    public function index()
    {
        if($this->Session->read('Auth.User.id'))
        {
            $this->redirect(array('action' => 'menupropietario'));
        }
    }
    public function prueba()
    {
        $this->layout=false;
    }
    public function guardapropietario()
    {
        $notificar = 0;
        //debug($this->request->data);exit;
        if(!empty($this->request->data['Propietario']['nombre']) && !empty($this->request->data['Propietario']['email1']) && !empty($this->request->data['Propietario']['ci']))
        {
            $this->Propietario->create();
            $this->request->data['Propietario']['estado'] = 0;
            if($this->Propietario->save($this->request->data))
            {
                $idPropietario = $this->Propietario->getLastInsertID();
                $this->User->create();
                $this->request->data['User']['nombre'] = $this->request->data['Propietario']['nombre'];
                $this->request->data['User']['username'] = $this->request->data['Propietario']['email1'];
                $this->request->data['User']['password'] = $this->request->data['Propietario']['ci'];
                $this->request->data['User']['propietario_id'] = $idPropietario;
                if($this->User->save($this->request->data['User']))
                {
                    $idUsuario = $this->User->getLastInsertID();
                    if ($this->Auth->login())
                    {
                        $notificar = 1;
                        $this->Session->setFlash('Se registro correctamente','msgbueno');
                        $this->redirect(array('action' => 'menupropietario',1));
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
    public function menupropietario($nuevo = null,$nuevamascota = null)
    {
        $idUsuario = $this->Session->read('Auth.User.id');
        $usuario = $this->User->findByid($idUsuario,null,null,null,null,-1);
        $mascotas = $this->Mascota->findAllBypropietario_id($usuario['User']['propietario_id'],null,null,null,null,-1);
        //debug($mascotas);exit;
        $this->set(compact('mascotas','usuario','nuevo','nuevamascota'));
    }
    public function mascota($idMascota = null)
    {
        $razas = $this->Raza->find('list',array('fields' => 'Raza.nombre','order' => 'Raza.nombre ASC'));
        $dcp = $this->Propietario->find('list', array('recursive' => -1, 'fields' => array('nombre'),'order' => 'Propietario.nombre ASC'));
        $criaderos = $this->Criadero->find('list', array('fields'=>array('Criadero.id', 'Criadero.nombre'),'order' => 'Criadero.nombre ASC'));
        $departamentos = $this->Departamento->find('list', array('fields'=>array('Departamento.id', 'Departamento.nombre'),'order' => 'Departamento.nombre ASC'));
        $this->Mascota->id = $idMascota;
            $this->request->data = $this->Mascota->read();
        $this->set(compact('razas','dcm','dcp','criaderos','departamentos','idMascota'));
    }
    public function guardamascota()
    {
        //debug($this->request->data);exit;
        if(!empty($this->request->data))
        {
            $cadena_nombre = null;
             $this->Mascota->create();
            if($this->request->data['Mascota']['orden'] == 0){
                
                $cadena_nombre = $this->request->data['Mascota']['nombre'];
                
                if($this->request->data['Mascota']['prefijo'] != null){
                   $cadena_nombre .= " ";
                    $cadena_nombre .= $this->request->data['Mascota']['prefijo'];
                }
                if($this->request->data['Mascota']['criadero_id'] != ''){
                   $criadero = $this->Criadero->find('first', array(
                   'conditions'=>array('Criadero.id'=>$this->request->data['Mascota']['criadero_id']), 
                   'recursive'=>-1
                   ));
                //debug($criadero);
                   if(!empty($criadero)){
                     $nombre_criadero = $criadero['Criadero']['nombre'];
                     $cadena_nombre .= " ".$nombre_criadero;    
                   }
            
                }
            }elseif($this->request->data['Mascota']['orden'] == 1){
                
                if($this->request->data['Mascota']['criadero_id'] != ''){
                   $criadero = $this->Criadero->find('first', array(
                   'conditions'=>array('Criadero.id'=>$this->request->data['Mascota']['criadero_id']), 
                   'recursive'=>-1
                   ));
                //debug($criadero);
                   if(!empty($criadero)){
                     $nombre_criadero = $criadero['Criadero']['nombre'];
                     $cadena_nombre .= $nombre_criadero;    
                   }
            
                }
                if($this->request->data['Mascota']['prefijo'] != null){
                   $cadena_nombre .= " ";
                    $cadena_nombre .= $this->request->data['Mascota']['prefijo'];
                }
                
                $cadena_nombre .= " ".$this->request->data['Mascota']['nombre'];
                
            }
            $cadena_nombre = strtoupper($cadena_nombre);
            $this->request->data['Mascota']['nombre_completo'] = $cadena_nombre;
            if(empty($this->request->data['Mascota']['kcb']))
            {
                $this->request->data['Mascota']['kcb'] = 'nulo';
            }
            $idPropietario = $this->Session->read('Auth.User.propietario_id');
            $this->request->data['Mascota']['propietario_id'] = $idPropietario;
            $this->request->data['Mascota']['estado'] = 0;
            if ($this->Mascota->save($this->request->data)){
                $idMascota = $this->Mascota->getLastInsertID();
                //debug($idMascota);
                $aux = $this->request->data;
                if(empty($idMascota))
                {
                    $idMascota = $this->request->data['Mascota']['id'];
                    
                    $propietario = $idPropietario;
                    $this->request->data = '';
                    
                    $this->request->data['Mascotaspropietario']['propietario_id']= $propietario;
                    $this->request->data['Mascotaspropietario']['mascota_id']= $this->Mascota->id;
                    $this->request->data['Mascotaspropietario']['fecha_transfer']= date('Y-m-d');
                    $this->request->data['Mascotaspropietario']['estado']= 0;
                    $this->Mascotaspropietario->save($this->request->data);
                }
                //debug($idMascota);
                
                $this->request->data = $aux;
                
                if(!empty($this->request->data['Mascota']['padre']))
                {
                    $padre = $this->request->data['Mascota']['padre'];
                    $this->request->data = '';
                    $this->Mascota->create();
                    $this->request->data['Mascota']['nombre_completo'] = $padre;
                    $this->request->data['Mascota']['kcb'] = 'nulo';
                    $this->Mascota->save($this->request->data);
                    $idreproductor = $this->Mascota->getLastInsertID();
                    $this->request->data = $aux;
                    $this->request->data['Mascota']['reproductor_id'] = $idreproductor;
                    $aux = $this->request->data;
                }
                
                if(!empty($this->request->data['Mascota']['madre']))
                {
                    $madre = $this->request->data['Mascota']['madre'];
                    $this->request->data = '';
                    $this->Mascota->create();
                    $this->request->data['Mascota']['nombre_completo'] = $madre;
                    $this->request->data['Mascota']['kcb'] = 'nulo';
                    $this->Mascota->save($this->request->data);
                    $idreproductora = $this->Mascota->getLastInsertID();
                    $this->request->data = $aux;
                    $this->request->data['Mascota']['reproductora_id'] = $idreproductora;
                    $aux = $this->request->data;
                }
                //debug($idMascota);exit;
                $this->request->data['Mascota']['id'] = $idMascota;
                $this->Mascota->save($this->request->data);
                
                $this->Session->setFlash('Se guardo correctamente!!!','msgbueno');
                $this->redirect(array('action' => 'menupropietario',null,1));
                
            }
        }else{
            
        }
             
    }
    public function cerrar()
    {
        $this->Auth->logout();
        $this->redirect(array('action' => 'index'));
    }
    public function login()
    {
        if ($this->Auth->login())
        {
            $this->Session->setFlash('Ingreso Correctamente','msgbueno');
            $this->redirect(array('action' => 'menupropietario'));
        }
        else{
            $this->Session->setFlash('Usuario o password incorrectos!!!!','msgerror');
            $this->redirect(array('action' => 'index'));
        }
    }
    public function propietario()
    {
        $this->User->id = $this->Session->read('Auth.User.id');
        $this->request->data = $this->User->read();
    }
    public function pass()
    {
        $this->layout = 'ajax';
    }
    public function editapropietario()
    {
        if(!empty($this->request->data))
        {
            $this->User->create();
            
            $this->User->saveAll($this->request->data);
            $this->Session->setFlash('Se guardo correctamente','msgbueno');
            $this->redirect(array('action' => 'menupropietario'));
        }
        else{
            $this->Session->setFlash('No se guardo!!!','msgerror');
            $this->redirect(array('action' => 'menupropietario'));
        }
    }
    public function pagos()
    {
        $pagos = $this->Ingreso->findAllByuser_id($this->Session->read('Auth.User.id'),null,null,null,null,-1);
        $this->set(compact('pagos'));
    }
    public function pago()
    {
        $cuentas =$this->Cuentasbancaria->find('list',array('fields' => 'Cuentasbancaria.cuenta'));
        $tramites = $this->Tramite->find('list',array('fields' => 'Tramite.nombre'));
        $this->set(compact('cuentas','tramites'));
    }
    public function guardapago()
    {
        if(!empty($this->request->data))
        {
            $this->Ingreso->create();
            $sucursal = $this->Session->read('Auth.User.sucursale_id');
            $tramite = $this->request->data['Ingreso']['tramite_id'];
            $idPropietario = $this->request->data['Ingreso']['propietario_id'];
            $propietario = $this->Propietario->findByid($idPropietario,null,null,null,null,-1);
            $this->request->data['Ingreso']['sucursale_id'] = $sucursal;
            $tarifa = $this->Tarifa->find('first',array('recursive' => -1,'Tarifa.tipo_id' => $propietario['Propietario']['tipo_id'],'Tarifa.sucursale_id' => $sucursal,'Tarifa.tramite_id' => $tramite));
            if(!empty($tarifa))
            {
                $this->request->data['Ingreso']['monto'] = $tarifa['Tarifa']['regional'];
                $this->request->data['Ingreso']['monto_total'] = $tarifa['Tarifa']['monto_total'];
                $this->request->data['Ingreso']['nacional'] = $tarifa['Tarifa']['nacional'];
            }
            else{
                $this->Session->setFlash('No se encontro una tarifa para su registro!!!!','msginfo');
                $this->redirect(array('action' => 'index'));
            }
            if($this->Ingreso->save($this->request->data))
            {
                $this->Session->setFlash('Se Registro Correctamente!!!!','msgbueno');
                $this->redirect(array('action' => 'index'));
            }
            else{
                $this->Session->setFlash('No se pudo registrar!!!!','msgerror');
                $this->redirect(array('action' => 'index'));
            }
            
        }
    }
    public function listamascotas()
    {
        $mascotas = $this->Mascota->find('all',array('limit' => 50, 'order' => 'Mascota.id DESC'));
        $razas = $this->Raza->find('list',array('fields' => 'Raza.nombre','order' => 'Raza.nombre ASC'));
        $this->set(compact('mascotas','razas'));
    }
    public function ajaxlistado()
    {
        $this->layout = 'ajax';
        //debug($this->request->data);exit;
        $condiones = null;
        if(!empty($this->request->data['Mascota']['nombre']))
        {
            $condiones['Mascota.nombre LIKE'] = '%'.$this->request->data['Mascota']['nombre'].'%';
        }
        if(!empty($this->request->data['Mascota']['kcb']))
        {
            $condiones['Mascota.kcb LIKE'] = '%'.$this->request->data['Mascota']['kcb'].'%';
        }
        if(!empty($this->request->data['Mascota']['num_tatuaje']))
        {
            $condiones['Mascota.num_tatuaje LIKE'] = '%'.$this->request->data['Mascota']['num_tatuaje'].'%';
        }
        if(!empty($this->request->data['Mascota']['chip']))
        {
            $condiones['Mascota.chip LIKE'] = '%'.$this->request->data['Mascota']['chip'].'%';
        }
        if(!empty($this->request->data['Mascota']['raza_id']))
        {
            $condiones['Mascota.raza_id'] = $this->request->data['Mascota']['raza_id'];
        }
        if(!empty($this->request->data['Mascota']['fecha_nacimiento']))
        {
            $condiones['Mascota.fecha_nacimiento'] = $this->request->data['Mascota']['fecha_nacimiento'];
        }
        if($condiones != null)
        {
            $mascotas = $this->Mascota->find('all',array('conditions' => $condiones));
        }
        else{
            $mascotas = null;
        }
        
        //debug($mascotas);exit;
        $this->set(compact('mascotas'));
    }
    public function ver($idMascota = null)
    {
        $mascota = $this->Mascota->findByid($idMascota);
        $examenes = $this->Examenesmascota->findAllBymascota_id($idMascota);
        $transferencias = $this->Mascotaspropietario->findAllBymascota_id($idMascota,null,null,null,null,0);
        $titulos = $this->Mascotastitulo->findAllBymascota_id($idMascota);
        //debug($transferencias);exit;
        $this->set(compact('mascota','examenes','transferencias','titulos'));
    }
}
?>