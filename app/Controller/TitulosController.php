<?php
App::uses('AppController', 'Controller');
/**
 * Titulos Controller
 *
 * @property Titulo $Titulo
 * @property PaginatorComponent $Paginator
 */
class TitulosController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $layout = 'kennel';
	public $components = array('Paginator');
    public $uses = array('Titulo');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Titulo->recursive = 0;
		$this->set('titulos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Titulo->exists($id)) {
			throw new NotFoundException(__('Invalid titulo'));
		}
		$options = array('conditions' => array('Titulo.' . $this->Titulo->primaryKey => $id));
		$this->set('titulo', $this->Titulo->find('first', $options));
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
            $this->Titulo->create();
            if ($this->Titulo->save($this->data))
            {
                $this->Session->setFlash('Titulo registrado con exito', 'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('No se pudo registrar el Titulo');
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
        $this->Titulo->id = $id;
        if (!$id)
        {
            $this->Session->setFlash('No existe el Titulo');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->request->data))
        {
            $this->request->data = $this->Titulo->read();
        } else
        {
            if ($this->Titulo->save($this->request->data))
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
        $this->Titulo->id = $id;
        $this->request->data = $this->Titulo->read();
        if (!$id)
        {
            $this->Session->setFlash('No existe el Titulo a eliminar');
            $this->redirect(array('action' => 'index'));
        } else
        {
            if ($this->Titulo->delete($id))
            {
                $this->Session->setFlash('Se elimino el Titulo ' . $this->data['Titulo']['nombre'], 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash('Error al eliminar');
            }
        }
    }
    public function ajaxtitulo($idTitulo = null)
    {
        $this->layout = 'ajax';
        $this->Titulo->id = $idTitulo;
        $this->request->data = $this->Titulo->read();
    }
    public function guardatitulo()
    {
        if(!empty($this->request->data))
        {
            //debug($this->request->data);exit;
            $this->Titulo->create();
            $this->Titulo->save($this->request->data);
            $this->Session->setFlash('Se guardo correctamente!!!','msgbueno');
            $this->redirect(array('action' => 'index'));
        }
        else{
            $this->Session->setFlash('No se guardo intente de nuevo!!!','msgerror');
            $this->redirect(array('action'=> 'index'));
        }
    }
 }
?>