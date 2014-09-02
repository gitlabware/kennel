<?php 
class CriaderosController extends AppController{
    public $layout = 'kennel';
    public $helpers = array('Html','Form','Session','Js');public $uses = array('Criadero',
        'Propietario','Tipo','Sucursale','Raza','CriaderosRaza','Departamento','Condicioneshigienica',
        'Condicionejemplare','Instalacione','Inspeccioncriadero','Observacionesinspeccione');
    //public $components = array('Lechigada');
    var $components = array('RequestHandler','DataTable','Paginator','Lechigada');
    public function beforeFilter(){
        parent::beforeFilter();
        if($this->RequestHandler->responseType() == 'json'){
            $this->RequestHandler->setContent('json', 'application/json' );
        }
    }
    public function index()
    {
        if($this->RequestHandler->responseType() == 'json') {
            
            $this->Criadero->virtualFields = array(
                //'together' => "CONCAT('".'<a href="#myModal" data-toggle="modal" class="btn-action glyphicons pencil btn-success" id="'."',Criadero.id,'".'"'.' onclick="cargadatos('."', ".''."Criadero.id".''." ,'".')"><i class="icon-pencil"></i></a> <a class="btn btn-danger btn-xs" href="javascript:"'.' onclick="elimina('."', ".''."Criadero.id".''." ,'".')"><i class="icon-trash"></i></a>'."')"
                //'ac_edita' => 'CONCAT("eynar 1")'
                //,'ac_edita2' => 'CONCAT("eynar 2")'
                'together' => "CONCAT('', (SELECT if (Criadero.nombre !='null',(CONCAT('".'<a href="#myModal" data-toggle="modal" class="btn-action glyphicons pencil btn-success" id="'."',Criadero.id,'".'"'.' onclick="cargadatos('."',Criadero.id ,'".',0)"><i class="icon-pencil" title="Editar Criadero"></i></a>'."')),CONCAT('".'<a href="#myModal" data-toggle="modal" class="btn-action glyphicons pencil btn-success" id="'."',Criadero.id,'".'"'.' onclick="cargadatos('."', ".''."Criadero.id".''." ,'".',1)"><i class="icon-pencil" title="Editar Criadero"></i></a>'."'))),'".' <a href="#myModal" data-toggle="modal" class="btn-action glyphicons dog btn-inverse" onclick="cargarazas('."', ".''."Criadero.id".''." ,'".')"><i class="icon-dog" title="Insertar Raza"></i></a>'."',' ".'<a href="javascript:" onclick="inspeccion('."',Criadero.id ,'".')" class="btn-action glyphicons sort btn-inverse"><i title="Inspeccion Criadero"></i></a>'."',' ".'<a href="javascript:" onclick="elimina('."',Criadero.id ,'".')" class="btn-action glyphicons bin btn-danger"><i title="Eliminar Criadero"></i></a>'."',(SELECT if((SELECT criadero_id FROM `inspeccioncriaderos` WHERE criadero_id = Criadero.id LIMIT 1)= Criadero.id,(CONCAT('".'<a class="btn-action glyphicons log_book btn-primary" href="javascript:" onclick="inspeccion2('."',Criadero.id,',',Inspeccioncriadero.id,'".')"><i title="Ver Inspeccion"></i></a> <a class="btn-action glyphicons log_book btn-inverse" href="javascript:" onclick="verinspeccion2('."',Criadero.id,'".')"><i title="Ver Inspeccion"></i></a>'."')),(CONCAT('".' <a class="btn-action glyphicons log_book btn-primary" href="javascript:" onclick="verinspeccion('."',Criadero.id ,'".')"><i title="Ver Inspeccion"></i></a> <a href="#myModal" data-toggle="modal" class="btn-action glyphicons show_lines btn-warning" onclick="cargarecomendaciones('."',Criadero.id ,'".')"><i title="Recomendaciones"></i></a>'."'))) ))"
            );
            $this->paginate = array(
                'fields' => array('Criadero.registro_fci', 'Criadero.fecha_desde', 'Criadero.nombre','Propietario.nombre','Criadero.celular1','Departamento.nombre','Criadero.together'),
                'recursive' => 0,
                'order' => 'Criadero.id ASC'
            );
            
            $this->DataTable->emptyElements = 1;
            $this->set('criaderos', $this->DataTable->getResponse());
            $this->set('_serialize','criaderos');
        }
    }
    
    public function criadero($idCriadero = null)
    {
        $this->layout = 'ajax';
        $this->Criadero->id = $idCriadero;
        $this->request->data = $this->Criadero->read();
        $propietarios = $this->Propietario->find('list',array('fields' => 'Propietario.nombre'));
        $departamentos = $this->Departamento->find('list',array('fields' => 'Departamento.nombre'));
        $tipos = $this->Tipo->find('list',array('fields' => 'Tipo.nombre'));
        $opt = array('1' => 'Alta', '0' => 'Baja');
        $this->set(compact('propietarios','departamentos','tipos','opt'));
    }
    function guardacriadero()
    {
        if (!empty($this->data))
        {
            //$sucursales = $this->Sucursale->find('first', array('conditions' => array('Sucursale.departamento_id' =>$this->data['Criadero']['departamento_id'])));
            //$this->request->data['Criadero']['sucursal_id'] = $sucursales['Sucursale']['id'];
            $this->Criadero->create();
            if ($this->Criadero->saveAll($this->data)) {
                $this->Session->setFlash('Criadero registrado nr' . $this->Criadero->id,'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else {
                $this->Session->setFlash('No se pudo registrar!!!','msgerror');
            }
        }
        else{
            $this->Session->setFlash('No se guardo!!!!','msgerror');
            $this->redirect($this->referer());
        }        
    }
    function editar($id = null, $paso = null)
    {
       
        $this->layout = 'ajax';
        $this->Criadero->id = $id;
        if (!$id) {
            $this->Session->setFlash('No existe tal registro','msgerror');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if (empty($this->data)) {
            $propietarios = $this->Propietario->find('list', array('fields' => array('Propietario.id',
                        'Propietario.nombre')));
            $tipos = $this->Tipo->find('list', array('fields' => array('Tipo.id',
                        'Tipo.nombre')));
            $sucursales = $this->Sucursale->find('list', array('fields' => array('Sucursale.id',
                        'Sucursale.nombre')));
            $razas = $this->Raza->find('list', array('fields' => array('Raza.id',
                        'Raza.nombre')));
            $opt = array('1' => 'Alta', '0' => 'Baja');
            $departamentos = $this->Departamento->find('list', array('fields' => array('Departamento.id',
                        'Departamento.nombre')));

            $this->data = $this->Criadero->read(); //find(array('id' => $id));
            //debug($this->data);exit;
            //$fecha = $this->Fechasconvert->doRevert($this->data['Criadero']['fecha_desde']);
            $observaciones = $this->data['Observacionesinscripcioncriadero'];
            $this->set(compact('opt', 'propietarios', 'tipos', 'sucursales', 'razas',
                'departamentos', 'observaciones', 'id', 'fecha'));
        } else {
            //$i=0;
            
           //debug($this->request->data);
            if ($paso == 1) {
                foreach ($this->data['Observacionesinscripcioncriadero'] as $observacion) {
                    if (!empty($observacion['select'])) {
                        $nombre = $observacion['observacion'];
                        $fci = $observacion['obsexclusivo'];
                        $this->request->data['Criadero']['nombre'] = $nombre; 
                        $this->request->data['Criadero']['registro_fci'] = $fci;
                        
                    }
                    //$i++;
                    //$this->request->data['Criadero']['nombre'] = $nombre;
                }
                 //debug($this->data);exit;
            }


            $sucursales = $this->Sucursale->find('first', array('conditions' => array('Sucursale.departamento_id' =>
                        $this->data['Criadero']['departamento_id'])));
            $this->request->data['Criadero']['sucursal_id'] = $sucursales['Sucursale']['id'];
            //debug($this->data['Criadero']['fecha_desde']);exit;
//            if (!empty($this->data['Criadero']['fecha_desde'])) {
//                $fecha = $this->Fechasconvert->doFormatfecha($this->data['Criadero']['fecha_desde']);
//                $this->request->data['Criadero']['fecha_desde'] = $fecha;
//            }
            $this->request->data['Criadero']['id'] = $id;

            //debug($this->data);exit;
            if ($this->Criadero->saveAll($this->data)) {
                $this->Session->setFlash('Los datos fueron modificados','msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else {
                $this->Session->setFlash('no se pudo modificar!!','msgerror');
            }
        }


    }
    public function razas($idCriadero = null)
    {
        $this->layout = 'ajax';
        //debug($idCriadero);
        $razascria = $this->CriaderosRaza->find('all', array('recursive' => 0,'conditions' => array('CriaderosRaza.criadero_id' =>$idCriadero)));
        //debug($razascria);exit;
        $razas = $this->Raza->find('list',array('fields' => 'Raza.nombre'));
        $this->set(compact('razascria','idCriadero','razas'));
    }
    public function eliminaraza($idCriadero = null,$idCriRa = null)
    {
        $this->layout = 'ajax';
        $this->CriaderosRaza->delete($idCriRa);
        $this->redirect(array('action' => 'razas',$idCriadero));
    }
    public function guardaraza()
    {
        $idCriadero = $this->request->data['CriaderosRaza']['criadero_id'];
        if(!empty($this->request->data['CriaderosRaza']['raza_id']))
        {
            $this->CriaderosRaza->create();
            $this->CriaderosRaza->save($this->request->data['CriaderosRaza']);
            $this->redirect(array('action' => 'razas',$idCriadero));
        }
        else{
            $this->redirect(array('action' => 'razas',$idCriadero));
        }
    }
    function baja($id = null)
    {
        $this->Criadero->id = $id;
        if (!$id) {
            $this->Session->setFlash('No se pudo dar de baja','msgerror');
            $this->redirect(array('action' => 'index'), null, true);
        }
        $estado = 0;
        $this->request->data['Criadero']['estado'] = $estado;
        if ($this->Criadero->save($this->data)) {
            $this->Session->setFlash('Los datos fueron modificados','msgbueno');
            $this->redirect(array('action' => 'index'), null, true);
        } else {
            $this->Session->setFlash('no se pudo modificar!!','msgerror');
        }
    }

    function alta($id = null)
    {
        $this->Criadero->id = $id;
        if (!$id) {
            $this->Session->setFlash('No se pudo dar de baja','msgerror');
            $this->redirect(array('action' => 'index'), null, true);
        }
        $estado = 1;
        $this->request->data['Criadero']['estado'] = $estado;
        if ($this->Criadero->save($this->data)) {
            $this->Session->setFlash('Los datos fueron modificados','msgbueno');
            $this->redirect(array('action' => 'index'), null, true);
        } else {
            $this->Session->setFlash('no se pudo modificar!!','msgerror');
        }

    }
    function eliminar($id = null)
    {
        if (!$id) {
            $this->Session->setFlash('id Invalida para reclamo','msgerror');
            $this->redirect(array('action' => 'index'), null, true);
        }
        if ($this->Criadero->delete($id)) {
            $this->Session->setFlash('El Criadero  ' . $id . ' fue borrado','msgbueno');
            $this->redirect(array('action' => 'index'), null, true);
        }
    }
    
    public function ver($idCriadero = null)
    {
        $criadero = $this->Criadero->find('first', 
        array(
        'conditions'=>array('Criadero.id'=>$idCriadero)
        //,'fields' => array('Propietario.nombre','Propietario.ci','Copropietario.nombre','Copropietario.ci','Criadero.direccion','Departamento.nombre','Propietario.direccion','telefono1','telefono2','celular1','celular2','email1','email2','Propietario.tipo_id','fecha_desde')
        ));
        $razas = $criadero['Raza'];
        $nombres = $criadero['Observacionesinscripcioncriadero'];
        //debug($criadero);exit;
        $this->set(compact('criadero','razas','nombres'));
    }
    function inspeccion($id = null,$idInspeccion = null)
    {
        if (!empty($this->data)) {
           
            if (isset($this->data['Inspeccioncriadero']['departamento_id']))
            {
                $this->request->data['Inspeccioncriadero']['lugar'] = $this->Lechigada->obtenerNombre(
                $this->data['Inspeccioncriadero']['departamento_id']);
            } 
            $this->request->data['Inspeccioncriadero']['criadero_id'] = $id;
            //debug($this->data);exit;
            if ($this->Inspeccioncriadero->save($this->data)) {
                $this->Session->setFlash("Registro de inspeccion " . $this->Inspeccioncriadero->getLastInsertID()." guardado",'msgbueno');
                $this->redirect(array('action' => 'index'), null, true);
            } else {
                $this->Session->setFlash("Error al registrar la inspeccion",'msgerror');
                $this->redirect(array('action' => 'index'), null, true);
            }
        }
        else{
            $this->Inspeccioncriadero->id = $idInspeccion;
            $this->request->data = $this->Inspeccioncriadero->read();
        }
        $criadero = $this->Criadero->find('first', array('conditions' => array('Criadero.id' =>
                    $id)));
        $condicioneshiguienicas = $this->Condicioneshigienica->find('list', array('fields' =>
                array('Condicioneshigienica.id', 'Condicioneshigienica.descripcion')));
        $condicionesjemplares = $this->Condicionejemplare->find('list', array('fields' =>
                array('Condicionejemplare.id', 'Condicionejemplare.descripcion')));
        $instalaciones = $this->Instalacione->find('list', array('fields' => array('Instalacione.id',
                    'Instalacione.descripcion')));
        $departamentos = $this->Departamento->find('list', array('fields' => array('Departamento.id', 'Departamento.nombre')));
        //debug($criadero);exit;
        $this->set(compact('criadero', 'id', 'instalaciones', 'condicioneshiguienicas',
            'condicionesjemplares', 'departamentos'));
    }
    public function recomendaciones($idCriadero = null)
    {
        $this->layout = 'ajax';
        $recomendaciones = $this->Observacionesinspeccione->findAllBycriadero_id($idCriadero);
        $this->set(compact('recomendaciones','idCriadero'));
    }
    public function guardarecomendacion()
    {
        $idCriadero = $this->request->data['Observacionesinspeccione']['criadero_id'];
        if(!empty($this->request->data['Observacionesinspeccione']['observacion']))
        {
            $this->Observacionesinspeccione->create();
            $this->Observacionesinspeccione->save($this->request->data['Observacionesinspeccione']);
            $this->redirect(array('action' => 'recomendaciones',$idCriadero));
        }
        else{
            $this->redirect(array('action' => 'recomendaciones',$idCriadero));
        }
    }
    public function eliminarecomendacion($idCriadero = null,$idRecomendacion = null)
    {
        $this->Observacionesinspeccione->delete($idRecomendacion);
        $this->redirect(array('action' => 'recomendaciones',$idCriadero));
    }
    function verinspeccion($id = null)
    {
        $criadero = $this->Criadero->find('first', array('conditions' => array('Criadero.id' =>
                    $id), 'recursive' => 2));
        //debug($criadero);exit;
        $this->set(compact('criadero'));
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
        if(!empty($this->request->data['Criadero']['nombre']))
        {
            $listacriaderos = $this->Criadero->find('all',array('recursive' => -1,
            'conditions' => 
            array('Criadero.nombre LIKE' => '%'.$this->request->data['Criadero']['nombre']."%"),
            'limit' => 8,
            'order' => 'Criadero.nombre ASC'
            ));
        }
        //debug($listamascotas);exit;
        $this->set(compact('listacriaderos','div','campoform'));
    }
    public function combo3($campoform = null,$div = null,$idMascota = null)
    {
        $this->layout = 'ajax';
        $criadero = $this->Criadero->findByid($idMascota,null,null,-1);
        $this->set(compact('campoform','criadero','div'));
    }
    public function get_criaderos()
    {
        return $this->Criadero->find('count');
    }
}
?>