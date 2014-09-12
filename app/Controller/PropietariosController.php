<?php
App::uses('AppController', 'Controller');
/**
 * Propietarios Controller
 *
 * @property Propietario $Propietario
 * @property PaginatorComponent $Paginator
 */
class PropietariosController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $layout = 'kennel';
    var $components = array('RequestHandler','DataTable','Paginator');
    public $uses = array('Propietario','Criadero','Tipo','User','Ingreso');

/**
 * index method
 *
 * @return void
 */
    public function beforeFilter(){
        parent::beforeFilter();
        if($this->RequestHandler->responseType() == 'json'){
            $this->RequestHandler->setContent('json', 'application/json' );
        }
        $this->Auth->allow(array('combo1','combo2','combo3'));
    }
	public function index() {
            $linkpago = '<a href="#myModal" data-toggle="modal" class="btn-action glyphicons usd btn-primary" onclick="paga('."', ".''."Propietario.id".''." ,'".')" title="Crear Pago"><i></i></a>';
            $linklistapago = '<a href="javascript:" class="btn-action glyphicons coins btn-inverse" onclick="listapaga('."', ".''."Propietario.id".''." ,'".')" title="Lista de Pagos"><i></i></a>';
            $linkusuario = '<a  href="#myModal" data-toggle="modal"  href="javascript:" class="btn-action glyphicons user btn-primary" onclick="usuario('."', ".''."Propietario.id".''." ,'".')" title="Usuario"><i></i></a>';
            if($this->RequestHandler->responseType() == 'json') {
                 $this->Propietario->virtualFields = array(
                     'together' => "CONCAT('".'<a href="#myModal" data-toggle="modal" class="btn-action glyphicons pencil btn-success" id="'."',Propietario.id,'".'"'.' onclick="cargadatos('."', ".''."Propietario.id".''." ,'".')" title="Editar"><i class="icon-pencil"></i></a> <a class="btn btn-danger btn-xs" href="javascript:"'.' onclick="elimina('."', ".''."Propietario.id".''." ,'".')" title="Eliminar"><i class="icon-trash"></i></a> '.$linkpago.' '.$linklistapago.' '.$linkusuario."')"
                     ,'estadoes' => "SELECT if (estado='1','HABILITADO','DESHABILITADO') FROM propietarios WHERE id=Propietario.id"
                 );
                 $this->paginate = array(
                     'fields' => array('Propietario.id', 'Propietario.nombre', 'Propietario.direccion','Propietario.telefono1','Propietario.estadoes','Propietario.together','Tipo.nombre'),
                        'conditions' => array('Propietario.solicitud !=' => 1),'recursive' => 0,
                     'order' => 'Propietario.id ASC'
                 );
                 $this->DataTable->fields = array('Propietario.id', 'Propietario.nombre', 'Propietario.direccion','Propietario.telefono1','Tipo.nombre','Propietario.estadoes','Propietario.together');
                 $this->DataTable->emptyElements = 1;
                 $this->set('propietaios', $this->DataTable->getResponse());
                 $this->set('_serialize','propietaios');
             }
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Propietario->exists($id)) {
			throw new NotFoundException(__('Invalid propietario'));
		}
		$options = array('conditions' => array('Propietario.' . $this->Propietario->primaryKey => $id));
		$this->set('propietario', $this->Propietario->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add()
    {
        if (!empty($this->request->data))
        {
            $this->Propietario->create();
            //debug($this->request->data);die;
            if ($this->Propietario->save($this->data))
            {
                $this->Session->setFlash('Propietario registrado con exito', 'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('No se pudo registrar al Propietario');
            }
        }
    $opt = array('1' => 'Alta', '0' => 'Baja');
    $criaderos = $this->Criadero->find('list', array('fields' => array('Criadero.nombre')));
    $tipos = $this->Tipo->find('list', array('fields' =>'Tipo.nombre'));
    $this->set(compact('opt','criaderos','tipos'));
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null)
    {
        $this->Propietario->id = $id;
        if (!$id)
        {
            $this->Session->setFlash('No existe el Propietario');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->request->data))
        {
            $this->request->data = $this->Propietario->read();
        } else
        {
            if ($this->Propietario->save($this->request->data))
            {
                $this->Session->setFlash('Los datos fueron modificados', 'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('no se pudo modificar!!');
            }
        }
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null)
    {
        $this->Propietario->id = $id;
        $this->request->data = $this->Propietario->read();
        if (!$id)
        {
            $this->Session->setFlash('No existe el Propietario a eliminar','msginfo');
            $this->redirect($this->referer());
        } else
        {
            if ($this->Propietario->delete($id))
            {
                $usuario = $this->User->findBypropietario_id($id,null,null,null,null,-1);
                if(!empty($usuario))
                {
                    $this->User->delete($usuario['User']['id']);
                }
                $this->Session->setFlash('Se elimino al Propietario ' . $this->data['Propietario']['nombre'], 'msgbueno');
                $this->redirect($this->referer());
            } else
            {
                $this->Session->setFlash('Error al eliminar','msgerror');
            }
        }
    }
    public function alta($id=null)
    {
        $this->Propietario->id = $id;
        if (!$id) {
            $this->Session->setFlash('No se pudo dar de baja','msgerror');
            $this->redirect($this->referer());
        }
        $estado = 1;
        $this->request->data['Propietario']['estado'] = $estado;

        if ($this->Propietario->save($this->data)) {
            $this->Session->setFlash('Los datos fueron modificados','msgbueno');
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash('no se pudo modificar!!');
        }
    }
    public function baja($id=null)
    {
        $this->Propietario->id = $id;
        if (!$id) {
            $this->Session->setFlash('No se pudo dar de baja','msgerror');
            $this->redirect($this->referer());
        }
        $estado = 0;
        $this->request->data['Propietario']['estado'] = $estado;

        if ($this->Propietario->save($this->data)) {
            $this->Session->setFlash('Los datos fueron modificados','msgbueno');
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash('no se pudo modificar!!');
        }
    }
    public function propietario($idPropietario = null)
    {
        $this->Propietario->id = $idPropietario;
        $this->request->data = $this->Propietario->read();
        $this->layout = 'ajax';
        $opt = array('1' => 'Alta', '0' => 'Baja');
        $criaderos = $this->Criadero->find('list', array('fields' => array('Criadero.nombre')));
        $tipos = $this->Tipo->find('list', array('fields' =>'Tipo.nombre'));
        $this->set(compact('opt','criaderos','tipos'));
    }
    public function guardapropietario()
    {
        //debug();exit;
        if(!empty($this->request->data))
        {
            $valida = $this->validar('Propietario');
            //debug($valida);exit;
            if(empty($valida))
            {
                $this->Propietario->create();
                //debug($this->request->data['Propietario']);exit;
                if($this->Propietario->save($this->request->data['Propietario']))
                {
                    $this->Session->setFlash('Se guardo correctamente!!','msgbueno');
                    $this->redirect($this->referer());
                }
                else{
                    $this->Session->setFlash('No se guardo!!!','msgerror');
                    $this->redirect($this->referer());
                }
            }
            else{
                $this->Session->setFlash($valida,'msgerror');
                    $this->redirect($this->referer());
            }
        }
        else{
            $this->Session->setFlash('No puede estar vacio!!!','msgerror');
            $this->redirect($this->referer());
        }
    }
    public function pendientes()
    {
        $this->layout = 'ajax';
        $numerop =  $this->Propietario->find('count',array('conditions' => array('Propietario.solicitud' => 1)));
        //debug($numero);exit;
        $this->set(compact('numerop'));
    }
    public function get_propietarios_pendientes()
    {
        return $this->Propietario->find('count',array('conditions' => array('Propietario.solicitud' => 1)));
    }
    public function listadopendientes()
    {
        
        $propietarios = $this->Propietario->find('all',array('recursive' => -1,'order' => 'Propietario.id DESC','conditions' => array('Propietario.solicitud' => 1)));
        $this->set(compact('propietarios'));
    }
    public function ajaxlistado()
    {
        $this->layout = 'ajax';
        //debug($this->request->data);exit;
        if (!empty($this->request->data['Propietario']['nombre']) and empty($this->request->data['Propietario']['ci']))
        {
            $propietarios = $this->Propietario->find('all', array('conditions' => array('Propietario.nombre LIKE' => '%'.$this->request->data['Propietario']['nombre'].'%')));
        }
        if (!empty($this->request->data['Propietario']['ci']) and empty($this->request->data['Propietario']['nombre']))
        {
            $propietarios = $this->Propietario->find('all', array('conditions' => array('Propietario.ci LIKE' => '%'.$this->request->data['Propietario']['ci'].'%')));
        }
        if (!empty($this->request->data['Propietario']['ci']) and !empty($this->request->data['Propietario']['nombre']))
        {
            $propietarios = $this->Propietario->find('all', array('conditions' => array('Propietario.ci LIKE' => '%'.$this->request->data['Propietario']['ci'].'%', 'Propietario.nombre LIKE' => '%'.$this->request->data['Propietario']['nombre'].'%')));
        }
        $this->set(compact('propietarios'));
    }
    public function combo1($campoform = null,$div = null)
    {
        $this->layout = 'ajax';
        //debug($campoform);exit;
        $this->set(compact('campoform','div'));
    }
    public function combo2($campoform = null,$div = null)
    {
        $this->layout = 'ajax';
        //debug($this->request->data);exit;
        if(!empty($this->request->data['Propietario']['nombre']))
        {
            $listapropietarios = $this->Propietario->find('all',array('recursive' => -1,
            'conditions' => 
            array('Propietario.nombre LIKE' => '%'.$this->request->data['Propietario']['nombre']."%"),
            'limit' => 8,
            'order' => 'Propietario.nombre ASC'
            ));
        }
        //debug($listamascotas);exit;
        $this->set(compact('listapropietarios','div','campoform'));
    }
    public function combo3($campoform = null,$div = null,$idMascota = null)
    {
        $this->layout = 'ajax';
        $propietario = $this->Propietario->findByid($idMascota,null,null,-1);
        $this->set(compact('campoform','propietario','div'));
    }
    public function aceptar($idPropietario = null)
    {
        $this->Propietario->id = $idPropietario;
        $this->request->data['Propietario']['solicitud'] = 2;
        $this->Propietario->save($this->request->data['Propietario']);
        $this->Session->setFlash('Acepto la solicitud de id '.$idPropietario,'msgbueno');
        $this->redirect($this->referer());
    }
    public function listapagos($idPropietario = null)
    {
        $propietario = $this->Propietario->find('first' ,array('recursive' => -1,'conditions' => array('Propietario.id' => $idPropietario)));
        $ingresos = $this->Ingreso->find('all',array('recursive' => 0,'order' => 'Ingreso.id DESC','conditions' => array('Ingreso.propietario_id' => $idPropietario)));
        $this->set(compact('ingresos','propietario'));
    }
    public function ajaxpropietario()
    {
        $this->layout = 'ajax';
        $opt = array('1' => 'Alta', '0' => 'Baja');
        $criaderos = $this->Criadero->find('list', array('fields' => array('Criadero.nombre')));
        $tipos = $this->Tipo->find('list', array('fields' =>'Tipo.nombre'));
        $this->set(compact('criaderos','tipos','opt'));
    }
    public function guarda_propietario_ajax()
    {
        if(!empty($this->request->data))
        {
            $this->Propietario->create();
            $this->Propietario->save($this->request->data['Propietario']);
            $mensajeb = 'Propietario registrado';
        }
        else{
            $mensajem = 'No se registro';
        }
        $this->set(compact('mensajeb','mensajem'));
    }
    public function usuario($idPropietario = null,$mensajem = null)
    {
        $this->layout = 'ajax';
        //debug($mensajem);exit;
        $propietario = $this->Propietario->findByid($idPropietario,null,null,null,null,-1);
        $usuario = $this->User->findBypropietario_id($idPropietario,null,null,null,null,-1);
        if(!empty($usuario))
        {
            $this->User->id = $usuario['User']['id'];
            $this->request->data = $this->User->read();
        }
        $this->set(compact('usuario','idPropietario','mensajem','propietario'));
    }
    public function crea_usuario($idPropietario = null)
    {
        $propietario = $this->Propietario->findByid($idPropietario,null,null,null,null,-1);
        if(!empty($propietario['Propietario']['ci']))
        {
            //debug('tiene ci');exit;
            $this->User->create();
            $this->request->data['User']['propietario_id'] = $idPropietario;
            $this->request->data['User']['username'] = 'usuario'.$idPropietario;
            $this->request->data['User']['password'] = $propietario['Propietario']['ci'];
            $this->request->data['User']['role'] = 'propietario';
            $this->User->save($this->request->data['User']);
            $this->redirect(array('action' => 'usuario',$idPropietario));
        }
        else{
            //debug('entro aqui');exit;
            $this->redirect(array('action' => 'usuario',$idPropietario,'Es necesario el C.I. para el propietario'));
        }
        
    }
    public function edita_usuario()
    {
        if(!empty($this->request->data))
        {
            if(!empty($this->request->data['User']['password_n']))
            {
                $this->request->data['User']['password'] = $this->request->data['User']['password_n'];
            }
            $this->User->create();
            $this->User->save($this->request->data['User']);
            $this->Session->setFlash('Se guardo los cambios correctamente','msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('No se guardo','msgerror');
            $this->redirect(array('action' => 'index'));
        }
    }
    public function get_propietarios_act()
    {
        return $this->Propietario->find('count',array('conditions' => array('solicitud !=' => 1)));
    }
 }
?>