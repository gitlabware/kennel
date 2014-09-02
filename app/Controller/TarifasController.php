<?php
App::uses('AppController', 'Controller');
/**
 * Tarifas Controller
 *
 * @property Tarifa $Tarifa
 * @property PaginatorComponent $Paginator
 */
class TarifasController extends AppController {

/**
 * Components
 *
 * @var array
 */
    public $layout = 'kennel';
	public $components = array('Paginator');
    public $uses = array('Tarifa','Categoriastarifa','Tipostarifa','Tipo','Departamento','Sucursale','Tramite');

/**
 * index method
 *
 * @return void
 */
	public function index() {
        $tarifas = $this->Tarifa->find('all',array('recursive' => 2));
        //debug($tarifas);exit;
		$this->set(compact('tarifas'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tarifa->exists($id)) {
			throw new NotFoundException(__('Invalid tarifa'));
		}
		$options = array('conditions' => array('Tarifa.' . $this->Tarifa->primaryKey => $id));
		$this->set('tarifa', $this->Tarifa->find('first', $options));
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
            $this->Tarifa->create();
            if ($this->Tarifa->save($this->data))
            {
                $this->Session->setFlash('Tarifa registrada con exito', 'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('No se pudo registrar la Tarifa');
            }
        }
    $categorias = $this->Categoriastarifa->find('list', array(
            'fields'=>array('Categoriastarifa.id', 'Categoriastarifa.nombre')
            ));
    $tipos= $this->Tipo->find('list', array('fields'=>array('Tipo.id', 'Tipo.nombre')));
    $this->set(compact('categorias', 'tipos'));
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
        $this->Tarifa->id = $id;
        if (!$id)
        {
            $this->Session->setFlash('No existe la Tarifa');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->request->data))
        {
            $this->request->data = $this->Tarifa->read();
        } else
        {
            if ($this->Tarifa->save($this->request->data))
            {
                $this->Session->setFlash('Los datos fueron modificados', 'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else
            {
                $this->Session->setFlash('no se pudo modificar!!');
            }
        }
    $categorias = $this->Categoriastarifa->find('list', array(
            'fields'=>array('Categoriastarifa.id', 'Categoriastarifa.nombre')
            ));
    $tipos= $this->Tipo->find('list', array('fields'=>array('Tipo.id', 'Tipo.nombre')));
    $this->set(compact('categorias', 'tipos'));
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
        $this->Tarifa->id = $id;
        $this->request->data = $this->Tarifa->read();
        if (!$id)
        {
            $this->Session->setFlash('No existe la Tarifa a eliminar');
            $this->redirect(array('action' => 'index'));
        } else
        {
            if ($this->Tarifa->delete($id))
            {
                $this->Session->setFlash('Se elimino la Tarifa ' . $this->data['Tarifa']['nombre'], 'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash('Error al eliminar');
            }
        }
    }
    public function ajaxtarifa($idTarifa = null)
    {
        $this->layout = 'ajax';
        $this->Tarifa->id = $idTarifa;
        $this->request->data = $this->Tarifa->read();
        //debug($this->request->data);exit;
        $listacategorias = $this->Categoriastarifa->find('list', array(
            'fields'=> 'Categoriastarifa.nombre'
            ));
        $tipos= $this->Tipo->find('list', array('fields'=>array('Tipo.id', 'Tipo.nombre')));
        $sucursales = $this->Sucursale->find('list',array('fields' => 'Sucursale.nombre'));
        $tramites = $this->Tramite->find('list',array('fields' => 'Tramite.nombre'));
        //debug($listacategorias);exit;
        
        $this->set(compact('idTarifa','listacategorias','tipos','sucursales','tramites'));
    }
    public function guardatarifa()
    {
        if(!empty($this->request->data))
        {
            $this->Tarifa->create();
            if($this->Tarifa->save($this->request->data))
            {
                $this->Session->setFlash('Se guardo correctamente','msgbueno');
                $this->redirect($this->referer());
            }
            else{
                $this->Session->setFlash('No se guardo!! Intentelo nuevamente','msgerror');
                $this->redirect($this->referer());
            }
        }
        else{
            $this->Session->setFlash('No se guardo!! Intentelo nuevamente','msgerror');
            $this->redirect($this->referer());
        }
        
    }
    public function tarifas($tipo = null)
    {
        $sucursales = $this->Sucursale->find('all');
        $categorias = $this->Categoriastarifa->find('all');
        $this->set(compact('categorias','sucursales','tipo'));
    }
 }
?>