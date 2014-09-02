<?php
App::uses('AppController', 'Controller');
/**
 * Departamentos Controller
 *
 * @property Departamento $Departamento
 * @property PaginatorComponent $Paginator
 */
class DepartamentosController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $layout = 'kennel';
	public $components = array('Paginator');
    public $uses = array('Departamento');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Departamento->recursive = 0;
		$this->set('departamentos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Departamento->exists($id)) {
			throw new NotFoundException(__('Invalid departamento'));
		}
		$options = array('conditions' => array('Departamento.' . $this->Departamento->primaryKey => $id));
		$this->set('departamento', $this->Departamento->find('first', $options));
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
            $this->Departamento->create();
            if ($this->Departamento->save($this->data))
            {
                $this->Session->setFlash('Departamento registrado con exito', 'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('No se pudo registrar el Departamento');
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
        $this->Departamento->id = $id;
        if (!$id)
        {
            $this->Session->setFlash('No existe el Departamento');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->request->data))
        {
            $this->request->data = $this->Departamento->read();
        } else
        {
            if ($this->Departamento->save($this->request->data))
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
        $this->Departamento->id = $id;
        $this->request->data = $this->Departamento->read();
        if (!$id)
        {
            $this->Session->setFlash('No existe el Departamento a eliminar');
            $this->redirect(array('action' => 'index'));
        } else
        {
            if ($this->Departamento->delete($id))
            {
                $this->Session->setFlash('Se elimino el Departamento ' . $this->data['Departamento']['nombre'], 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash('Error al eliminar');
            }
        }
    }
 }
 ?>
