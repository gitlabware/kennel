<?php
App::uses('AppController', 'Controller');
/**
 * Sucursales Controller
 *
 * @property Sucursale $Sucursale
 * @property PaginatorComponent $Paginator
 */
class SucursalesController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $layout = 'kennel';
	public $components = array('Paginator');
    public $uses = array('Sucursale','Departamento');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Sucursale->recursive = 0;
		$this->set('sucursales', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sucursale->exists($id)) {
			throw new NotFoundException(__('Invalid sucursale'));
		}
		$options = array('conditions' => array('Sucursale.' . $this->Sucursale->primaryKey => $id));
		$this->set('sucursale', $this->Sucursale->find('first', $options));
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
            $this->Sucursale->create();
            if ($this->Sucursale->save($this->data))
            {
                $this->Session->setFlash('Sucursal registrado con exito', 'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('No se pudo registrar la Sucursal');
            }
        }
    $departamentos = $this->Departamento->find('list', array('fields'=>array('Departamento.id', 'Departamento.nombre')));
    $this->set(compact('departamentos'));
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
        $this->Sucursale->id = $id;
        if (!$id)
        {
            $this->Session->setFlash('No existe la Sucursal');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->request->data))
        {
            $this->request->data = $this->Sucursale->read();
        } else
        {
            if ($this->Sucursale->save($this->request->data))
            {
                $this->Session->setFlash('Los datos fueron modificados', 'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('no se pudo modificar!!');
            }
        }
    $departamentos = $this->Departamento->find('list', array('fields'=>array('Departamento.id', 'Departamento.nombre')));
    $this->set(compact('departamentos'));
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
        $this->Sucursale->id = $id;
        $this->request->data = $this->Sucursale->read();
        if (!$id)
        {
            $this->Session->setFlash('No existe la Sucursal a eliminar');
            $this->redirect(array('action' => 'index'));
        } else
        {
            if ($this->Sucursale->delete($id))
            {
                $this->Session->setFlash('Se elimino la Sucursal ' . $this->data['Sucursale']['nombre'], 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash('Error al eliminar');
            }
        }
    }
 }
 ?>
