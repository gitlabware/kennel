<?php
App::uses('AppController', 'Controller');
/**
 * Pistas Controller
 *
 * @property Pista $Pista
 * @property PaginatorComponent $Paginator
 */
class PistasController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $layout = 'kennel';
	public $components = array('Paginator');
    public $uses = array('Pista');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Pista->recursive = 0;
		$this->set('pistas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pista->exists($id)) {
			throw new NotFoundException(__('Invalid pista'));
		}
		$options = array('conditions' => array('Pista.' . $this->Pista->primaryKey => $id));
		$this->set('pista', $this->Pista->find('first', $options));
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
            $this->Pista->create();
            if ($this->Pista->save($this->data))
            {
                $this->Session->setFlash('Pista registrada con exito', 'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('No se pudo registrar la Pista');
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
        $this->Pista->id = $id;
        if (!$id)
        {
            $this->Session->setFlash('No existe la Pista');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->request->data))
        {
            $this->request->data = $this->Pista->read();
        } else
        {
            if ($this->Pista->save($this->request->data))
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
        $this->Pista->id = $id;
        $this->request->data = $this->Pista->read();
        if (!$id)
        {
            $this->Session->setFlash('No existe la Pista a eliminar');
            $this->redirect(array('action' => 'index'));
        } else
        {
            if ($this->Pista->delete($id))
            {
                $this->Session->setFlash('Se elimino la Pista ' . $this->data['Pista']['nombre'], 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash('Error al eliminar');
            }
        }
    }
 }
 ?>
