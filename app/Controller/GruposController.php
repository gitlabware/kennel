<?php
App::uses('AppController', 'Controller');
/**
 * Grupos Controller
 *
 * @property Grupo $Grupo
 * @property PaginatorComponent $Paginator
 */
class GruposController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $layout = 'kennel';
	public $components = array('Paginator');
    public $uses = array('Grupo','GruposRaza','Raza');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Grupo->recursive = 0;
		$this->set('grupos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Grupo->exists($id)) {
			throw new NotFoundException(__('Invalid grupo'));
		}
		$options = array('conditions' => array('Grupo.' . $this->Grupo->primaryKey => $id));
		$this->set('grupo', $this->Grupo->find('first', $options));
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
            $this->Grupo->create();
            if ($this->Grupo->save($this->data))
            {
                $this->Session->setFlash('Grupo registrado con exito', 'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('No se pudo registrar el Grupo');
            }
        }
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
        $this->Grupo->id = $id;
        if (!$id)
        {
            $this->Session->setFlash('No existe el Grupo');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->request->data))
        {
            $this->request->data = $this->Grupo->read();
        } else
        {
            if ($this->Grupo->save($this->request->data))
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
        $this->Grupo->id = $id;
        $this->request->data = $this->Grupo->read();
        if (!$id)
        {
            $this->Session->setFlash('No existe el Grupo a eliminar');
            $this->redirect(array('action' => 'index'));
        } else
        {
            if ($this->Grupo->delete($id))
            {
                $this->Session->setFlash('Se elimino el Grupo ' . $this->data['Grupo']['nombre'], 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash('Error al eliminar');
            }
        }
    }
    public function editaraza($id = null, $grupo=null)
    {
        $gruporazas = $this->GruposRaza->find('all', array('conditions' => 
                                                        array('GruposRaza.grupo_id' =>$id)));
        $razas = $this->Raza->find('list', array('fields' => 
                                                    array('Raza.id','Raza.nombre')));
        $grupo = $this->Grupo->find('all',array('fields'=>
                                                array('Grupo.nombre')));
        //debug($grupo);die;
        //debug($razas);die;
        $this->set(compact('razas', 'gruporazas', 'id', 'grupo'));
        //debug($gruporazas);die;
    }
    public function editraza($id = null, $idgrupo=null)
    {
        if (!empty($this->data)) {
            $grupos=$this->Grupo->find('first', array(
         'conditions'=>array('Grupo.id'=>$idgrupo),
         'recursive'=>-1
         ));
         $grupo = $grupos['Grupo']['nombre'];
            //debug($this->data);exit;
            $this->request->data['GruposRaza']['id'] = $id;
            if ($this->GruposRaza->saveMany($this->data)) {
                $this->Session->setFlash("Registro actualizados");
                $this->redirect(array('action' => 'editaraza', $idgrupo, $grupo), null, true);
            } else {
                $this->Session->setFlash("No se pudo actualizar");
                $this->redirect(array('action' => 'editaraza', $idgrupo, $grupo), null, true);
            }
        }
        $razacria = $this->GruposRaza->find('first', array('conditions' => array('GruposRaza.id' =>
                    $id)));
        $razas = $this->Raza->find('list', array('fields' => array('Raza.id',
                    'Raza.nombre')));
        //debug($razacria);exit;
        $this->set(compact('razas', 'razacria','idgrupo'));
    }
    public function eliminaraza($id = null, $idgrupo=null)
    {
        if (!$id) {
            $this->Session->setFlash('id Invalida para eliminar');
            $this->redirect(array('action' => 'editaraza', $idgrupo, $grupo), null, true);
        }
        if ($this->GruposRaza->delete($id)) {
           $grupos=$this->Grupo->find('first', array(
         'conditions'=>array('Grupo.id'=>$idgrupo),
         'recursive'=>-1
         ));
         $grupo = $grupos['Grupo']['nombre'];
         
            $this->Session->setFlash('La Raza fue borrada');
            $this->redirect(array('action' => 'editaraza', $idgrupo, $grupo), null, true);
        }
    }
    function anaderazas($id=null){
        //$this->layout = 'sheepit';
         $grupos=$this->Grupo->find('first', array(
         'conditions'=>array('Grupo.id'=>$id),
         'recursive'=>-1
         ));
        
         $grupo = $grupos['Grupo']['nombre'];
        if (!empty($this->data)) {
            $this->GruposRaza->create();
           
            if ($this->GruposRaza->saveMany($this->data)) {
                //debug($this->data);exit;
                $this->Session->setFlash('Registro de raza en grupo ' . $id . ' exitosamente','msgbueno');
                $this->redirect(array('action' => 'editaraza', $id, $grupo), null, true);
            } else {
                $this->Session->setFlash('no se pudo registrar las razas del grupo!!','msgerror');
            }
        }
        $razasid = $this->GruposRaza->find('list', array(
                'conditions'=>array('GruposRaza.grupo_id'=>$id),
                'fields'=>array('GruposRaza.raza_id')
                ));
        
        $razas = $this->Raza->find('list', array(
        'fields' => array('Raza.id','Raza.nombre'),
        'conditions'=>array('NOT'=>array('Raza.id'=>$razasid))
        ));
        $this->set(compact('razas', 'id'));
    }
    public function ajaxgrupo($idGrupo = null)
    {
        $this->layout = 'ajax';
        $this->Grupo->id = $idGrupo;
        $this->request->data = $this->Grupo->read();
    }
    public function guardagrupo()
    {
        if(!empty($this->request->data))
        {
            $this->Grupo->create();
            $this->Grupo->save($this->request->data);
            $this->Session->setFlash('Se guardo correctamente!!!','msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('No se pudo guardar!!!','msgerror');
            $this->redirect(array('action' => 'index'));
        }
    }
    public function razas($idGrupo = null)
    {
        $this->layout = 'ajax';
        $razasgrupo = $this->GruposRaza->findAllBygrupo_id($idGrupo,null,null,null,null,0);
        $grupo = $this->Grupo->findByid($idGrupo);
        $razas = $this->Raza->find('list',array('fields' => 'Raza.nombre'));
        $this->set(compact('razas','grupo','razasgrupo','idGrupo'));
    }
    public function guardaraza()
    {
        $idGrupo = $this->request->data['GruposRaza']['grupo_id'];
        if(!empty($this->request->data))
        {
            $this->GruposRaza->create();
            $this->GruposRaza->save($this->request->data);
            
        }
        $this->redirect(array('action' => 'razas',$idGrupo));
    }
    public function eliminarazaa($idGrupo = null,$idRazaC = null)
    {
        //debug($idRazaC);exit;
        $this->layout = 'ajax';
        $this->GruposRaza->delete($idRazaC);
        $this->redirect(array('action' => 'razas',$idGrupo));
    }
 }
 ?>
