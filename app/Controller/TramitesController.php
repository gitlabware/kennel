<?php
App::uses('AppController', 'Controller');
/**
 * Tramites Controller
 *
 * @property Tramite $Tramite
 * @property PaginatorComponent $Paginator
 */
class TramitesController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $layout = 'kennel';
	public $components = array('Paginator');
    public $uses = array('Tramite','Categoriastarifa');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$tramites = $this->Tramite->find('all');
		$this->set(compact('tramites'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tramite->exists($id)) {
			throw new NotFoundException(__('Invalid tramite'));
		}
		$options = array('conditions' => array('Tramite.' . $this->Tramite->primaryKey => $id));
		$this->set('tramite', $this->Tramite->find('first', $options));
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
            $this->Tramite->create();
            if ($this->Tramite->save($this->data))
            {
                $this->Session->setFlash('Tramite registrado con exito', 'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('No se pudo registrar el Tramite','msgerror');
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
        $this->Tramite->id = $id;
        if (!$id)
        {
            $this->Session->setFlash('No existe el Tramite');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->request->data))
        {
            $this->request->data = $this->Tramite->read();
        } else
        {
            if ($this->Tramite->save($this->request->data))
            {
                $this->Session->setFlash('Los datos fueron modificados', 'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('no se pudo modificar!!','msgerror');
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
        $this->Tramite->id = $id;
        $this->request->data = $this->Tramite->read();
        if (!$id)
        {
            $this->Session->setFlash('No existe el Tramite a eliminar');
            $this->redirect(array('action' => 'index'));
        } else
        {
            if ($this->Tramite->delete($id))
            {
                $this->Session->setFlash('Se elimino el Tramite ' . $this->data['Tramite']['nombre'], 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash('Error al eliminar');
                $this->redirect(array('action' => 'index'));
            }
        }
    }
    public function listatarifas()
    {
        $tarifas = $this->Tarifa->find('all');
        $this->set(compact('tarifas'));
    }
    public function ajaxtramite($idTramite = null)
    {
        $this->layout = 'ajax';
        $this->Tramite->id = $idTramite;
        $this->request->data = $this->Tramite->read();
        $categorias = $this->Categoriastarifa->find('list',array('fields' => 'Categoriastarifa.nombre'));
        $this->set(compact('categorias'));
    }
    public function guardatramite()
    {
        if(!empty($this->request->data))
        {
            $this->Tramite->create();
            $this->Tramite->save($this->request->data);
            $this->Session->setFlash('Se guardo correctamente!!!!','msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('No se pudo guardar!!!!','msgerror');
            $this->redirect(array('action' => 'index'));
        }
    }
 }
 ?>
