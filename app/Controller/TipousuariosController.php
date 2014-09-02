<?php
App::uses('AppController', 'Controller');
/**
 * Tipousuarios Controller
 *
 * @property Tipousuario $Tipousuario
 * @property PaginatorComponent $Paginator
 */
class TipousuariosController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $layout = 'kennel';
	public $components = array('Paginator');
    public $uses = array('Tipousuario');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tipousuario->recursive = 0;
		$this->set('tipousuarios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tipousuario->exists($id)) {
			throw new NotFoundException(__('Invalid tipousuario'));
		}
		$options = array('conditions' => array('Tipousuario.' . $this->Tipousuario->primaryKey => $id));
		$this->set('tipousuario', $this->Tipousuario->find('first', $options));
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
            $this->Tipousuario->create();
            if ($this->Tipousuario->save($this->data))
            {
                $this->Session->setFlash('Tipousuario registrado con exito', 'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('No se pudo registrar el Tipousuario','msgerror');
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
        $this->Tipousuario->id = $id;
        if (!$id)
        {
            $this->Session->setFlash('No existe el Tipousuario');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->request->data))
        {
            $this->request->data = $this->Tipousuario->read();
        } else
        {
            if ($this->Tipousuario->save($this->request->data))
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
        $this->Tipousuario->id = $id;
        $this->request->data = $this->Tipousuario->read();
        if (!$id)
        {
            $this->Session->setFlash('No existe el Tipousuario a eliminar');
            $this->redirect(array('action' => 'index'));
        } else
        {
            if ($this->Tipousuario->delete($id))
            {
                $this->Session->setFlash('Se elimino el Tipousuario ' . $this->data['Tipousuario']['nombre'], 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash('Error al eliminar');
            }
        }
    }
 }
 ?>
