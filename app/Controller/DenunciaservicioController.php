<?php 
class DenunciaservicioController extends AppController{
    public $layout = 'kennel';
    public $uses = array(
        'Servicio',
        'Mascota',
        'Propietario',
        'Camada',
        'Raza',
        'Tipospelo',
        'Informecomcria',
        'Criadero',
        'Ingreso',
        'Cuentasbancaria',
        'Denuncianacimiento',
        'Observacionesinformecomcria',
        'Monta', 'Departamento', 'Mascotaspropietario');
    public $components = array('Lechigada','RequestHandler');
    
    public function index()
    {
        $denuncias = $this->Servicio->find('all', array('recursive' => 2,'order' => 'Servicio.id DESC'));
        //debug($denuncias);exit;
        $this->set(compact('denuncias'));
    }
     function listadomontas()
    {
        $montas = $this->Monta->find('all');
        $this->set(compact('montas'));
    }
    function registrarmonta($idServicio = null)
    {
        if (!empty($this->data))
        {
            //debug($this->data);exit;
            $this->Monta->create();
            if (isset($this->data['Monta']['departamento_id2']))
            {
                $this->request->data['Monta']['lugar'] = $this->Lechigada->obtenerNombre($this->data['Monta']['departamento_id2']);
            }
            //$this->request->data['Monta']['usuario_id'] = $this->Session->read('usuario_id');
            $this->request->data['Monta']['lugar_denuncia'] = $this->Lechigada->obtenerNombre($this->data['Monta']['departamento_id']);

            //debug($this->data);exit;
            $idMonta = $this->request->data['Monta']['id'];
            if ($this->Monta->save($this->data))
            {
                if(empty($idMonta))
                {
                    $this->request->data['Servicio']['monta_id'] = $this->Monta->getLastInsertID();
                }
                
                if(!empty($this->request->data['Servicio']['reproductor_id']))
                {
                    $this->request->data['Servicio']['propietarioreproductor_id'] = $this->get_propietario_actual($this->request->data['Servicio']['reproductor_id']);
                }
                if(!empty($this->request->data['Servicio']['reproductora_id']))
                {
                    $this->request->data['Servicio']['propietarioreproductora_id'] = $this->get_propietario_actual($this->request->data['Servicio']['reproductora_id']);
                }
                
                $this->Servicio->save($this->request->data);
                $this->Session->setFlash("Denuncia" . $this->Servicio->id .
                        " registrado!",'msgbueno');
                if($this->request->data['Servicio']['activa'])
                {
                    $this->redirect($this->referer());
                }
                else{
                    $this->redirect(array('action' => 'index'));
                }
            } else
            {
                $this->Session->setFlash("Error al guardar!",'msgerror');
                $this->redirect(array('action' => 'index'));
            }
        } else
        {
            $this->Servicio->id = $idServicio;
            
            $this->request->data = $this->Servicio->read();
            //debug($this->request->data);exit;
            //$perfil = $this->Session->read('tipousuario_id');
            /*$mascotas = $this->Mascota->find('list', array('fields' => array('Mascota.id',
                    'Mascota.nombre')));*/
            $kcbs = $this->Mascota->find('list', array('fields' => array('Mascota.id',
                    'Mascota.id')));
            $propietarios = $this->Propietario->find('list', array('fields' => array('Propietario.id',
                    'Propietario.nombre')));
            $departamentos = $this->Departamento->find('list', array('fields' => array('Departamento.id', 'Departamento.nombre')));
            $cuentasbancarias = $this->Cuentasbancaria->find('list',array('fields' => 'Cuentasbancaria.cuenta'));
            $this->set(compact('cuentasbancarias','mascotas', 'kcbs', 'propietarios', 'perfil', 'departamentos'));
        }
    }
    public function get_propietario_actual($idMascota = null)
    {
        $mascota = $this->Mascota->find('first',array('recursive' => -1,'conditions' => array('Mascota.id' => $idMascota),'fields' => array('Mascota.propietarioactual_id')));
        if(!empty($mascota))
        {
            return $mascota['Mascota']['propietarioactual_id'];
        }
        else{
            return null;
        }
    }
    function insertarservicio($idServicio = null)
    {
        if (!empty($this->data))
        {
            //debug($this->request->data);exit;
            $this->request->data['Servicio']['lugar_denuncia'] = $this->Lechigada->obtenerNombre($this->data['Servicio']['departamento_id']);
            
            if (isset($this->data['Servicio']['departamento_id2']))
            {
                $this->request->data['Servicio']['lugar'] = $this->Lechigada->obtenerNombre($this->data['Servicio']['departamento_id2']);
            }
            //debug($this->data);exit;
                if(!empty($this->request->data['Servicio']['reproductor_id']))
                {
                    $this->request->data['Servicio']['propietarioreproductor_id'] = $this->get_propietario_actual($this->request->data['Servicio']['reproductor_id']);
                }
                if(!empty($this->request->data['Servicio']['reproductora_id']))
                {
                    $this->request->data['Servicio']['propietarioreproductora_id'] = $this->get_propietario_actual($this->request->data['Servicio']['reproductora_id']);
                }
            if ($this->Servicio->save($this->data))
            {
                $this->Session->setFlash("Denuncia de servicio " . $this->Servicio->id . " guardado exitosamente!",'msgbueno');
                if($this->request->data['Servicio']['activa'])
                {
                    $this->redirect($this->referer());
                }
                else{
                    $this->redirect(array('action' => 'index'));
                }
            } else
            {
                $this->Session->setFlash("Error al guardar!",'msgerror');
                $this->redirect($this->referer());
            }
        } else
        {
            $this->Servicio->id = $idServicio;
            $this->request->data = $this->Servicio->read();
            
            $mascotas = $this->Mascota->find('list', array('fields' => array('Mascota.id',
                    'Mascota.nombre_completo')));
            $propietarios = $this->Propietario->find('list', array('fields' => array('Propietario.id',
                    'Propietario.nombre')));
            $departamentos = $this->Departamento->find('list', array('fields' => array('Departamento.id', 'Departamento.nombre')));
            $this->set(compact('mascotas', 'propietarios', 'departamentos'));
        }
    }
    public function ajaxmascota($idpropietario = null, $tipo = null)
    {
        $this->layout = 'ajax';
        $mascotas = $this->Mascotaspropietario->find('list', array(
            'conditions' => array('Mascotaspropietario.propietario_id' => $idpropietario),
            'fields' => array('Mascotaspropietario.mascota_id', 'Mascota.nombre_completo'),
            'recursive' => 2
                ));
        $this->set(compact('mascotas', 'tipo'));
    }
    public function denuncia($id=null,$idDenuncia = null){
        if(!empty($this->data)){
           //debug($this->data);exit;
            $this->request->data['Denuncianacimiento']['servicio_id']=$id;
            $this->request->data['Denuncianacimiento']['lugar']=$this->Lechigada->obtenerNombre($this->data['Denuncianacimiento']['departamento_id']);
         
            if($this->Denuncianacimiento->save($this->data)){
               $this->Session->setFlash("Denuncia de servicio ".$this->Denuncianacimiento->id." guardado exitosamente!",'msgbueno');
               
                if($this->request->data['Servicio']['activa'])
                {
                    $this->redirect($this->referer());
                }
                else{
                    $this->redirect(array('action' => 'index'));
                }
            }else{
               $this->Session->setFlash("Error al guardar!",'msgerror');
               $this->redirect(array('action'=>'index', 'controller'=>'denunciaservicio'));
            }
        }
        else{
            $this->Denuncianacimiento->id = $idDenuncia;
            $this->request->data = $this->Denuncianacimiento->read();
        }
        $criaderos = $this->Criadero->find('list', array(
        'fields'=>array('Criadero.id', 'Criadero.nombre'),'order' => 'Criadero.nombre ASC'
        ));
        $idPropietario = $this->propietario_servicio($id);
        $departamentos = $this->Departamento->find('list', array('fields'=>array('Departamento.id', 'Departamento.nombre')));
        $this->set(compact('criaderos', 'departamentos','idPropietario'));
    }//fin funcion denuncia de nacimientos nueva
    public function propietario_servicio($idServicio = null)
    {
        $servicio = $this->Servicio->find('first',array('recursive' => -1,'conditions' => array('Servicio.id' => $idServicio)));
        if(!empty($servicio))
        {
            return $servicio['Servicio']['propietarioreproductor_id'];
        }
        else{
            return NULL;
        }
    }
    public function registrarcamada($id_servicio = null, $id_nacimiento = null,$idCamada = null)
    {
        if (!empty($this->data))
        {
            //debug($this->request->data);exit;
            if ($this->data['Camada']['departamento_id'] != null)
            {
                $this->request->data['Camada']['lugar'] = $this->Lechigada->obtenerNombre($this->data['Camada']['departamento_id']);
            }

            $nacimiento = $this->Servicio->find('first', array('conditions' => array('Servicio.id' => $id_servicio), 'recursive' => 0));
            //debug($nacimiento);exit;
            $madre = $nacimiento['Servicio']['reproductora_id'];
            $padre = $nacimiento['Servicio']['reproductor_id'];
            $raza = $this->data['Camada']['raza_id'];
            $fecha_nacimiento = $nacimiento['Denuncianacimiento']['fecha_denuncia'];
            $departamento = $nacimiento['Denuncianacimiento']['departamento_id'];
            $variedad = $this->data['Camada']['variedad'];
            if(!empty($this->data['Mascota']))
            {
                $mascotas = $this->data['Mascota'];
                $i = 0;
                //debug($this->data);exit;
                foreach ($mascotas as $mascota)
                {
                    $this->request->data['Mascota'][$i]['nombre_completo'] = $this->request->data['Mascota'][$i]['nombre'];
                    $this->request->data['Mascota'][$i]['raza_id'] = $raza;
                    $this->request->data['Mascota'][$i]['reproductora_id'] = $madre;
                    $this->request->data['Mascota'][$i]['reproductor_id'] = $padre;
                    $this->request->data['Mascota'][$i]['fecha_nacimiento'] = $fecha_nacimiento;
                    $this->request->data['Mascota'][$i]['variedad'] = $variedad;
                    $this->request->data['Mascota'][$i]['origen'] = $this->data['Camada']['lugar'];
                    $this->request->data['Mascota'][$i]['departamento_id'] = $this->data['Camada']['departamento_id'];
                    $this->request->data['Mascota'][$i]['criadero_id'] = $nacimiento['Denuncianacimiento']['criadero_id'];
                    if ($mascota['sexo'] == 1)
                        $this->request->data['Mascota'][$i]['sexo'] = "macho";
                    else
                        $this->request->data['Mascota'][$i]['sexo'] = "hembra";
                    $i++;
                }
            }
            
            $this->request->data['Camada']['numregistropadre'] = $padre;
            $this->request->data['Camada']['numregistromadre'] = $madre;
            $this->request->data['Camada']['criadero_id'] = $nacimiento['Denuncianacimiento']['criadero_id'];
            $this->request->data['Camada']['fecha_nacimiento'] = $fecha_nacimiento;
            $this->request->data['Camada']['denuncianacimiento_id'] = $id_nacimiento;
            $this->request->data['Camada']['servicio_id'] = $id_servicio;

            //debug($this->data);exit;
            if ($this->Camada->saveAll($this->data))
            {
                //debug($this->Camada->id);exit;
                $id_camada = $this->Camada->getLastInsertID();
                if(empty($id_camada))
                {
                    $id_camada = $idCamada;
                }
                //$id_camada = $this->Camada->id;
                //debug($id_camada);exit;
                //$lechigada = $this->Lechigada->obtenerLechigada($this->data['Camada']['departamento_id'], $this->Camada->id);
                $mascotas = $this->Mascota->find('all', array('conditions' => array('Mascota.camada_id' => $this->Camada->id), 'recursive' => -1));
                //debug($mascotas);exit;
                $lechigada = $this->Lechigada->obtenerLechigada($departamento, $id_camada);
                //debug($lechigada);exit;
                foreach ($mascotas as $mascota)
                {
                    $this->data = '';
                    $this->Mascota->id = $mascota['Mascota']['id'];
                    $this->data = $this->Mascota->read();
                    $this->request->data['Mascota']['lechigada'] = $lechigada;
                    //debug($this->data);exit;
                    $this->Mascota->save($this->data);
                }
                
                $data = array('id'=>$id_camada, 'lechigada'=>$lechigada);
                $this->Camada->save($data);
                $this->Session->setFlash("Registro de cachorros exitoso",'msgbueno');
                $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash("Error en el registro",'msgerror');
                $this->redirect(array('action' => 'index'));
            }
        }
        else{
            if(!empty($idCamada))
            {
                $this->Camada->id = $idCamada;
                $this->request->data = $this->Camada->read();
                $leemascotas = $this->Mascota->findAllBycamada_id($idCamada,null,null,null,null,-1);
            }
            
        }
        $razas = $this->Raza->find('list', array('fields' => array('Raza.id',
                'Raza.nombre'),'order' => 'Raza.nombre ASC'));
        $pelos = $this->Tipospelo->find('list', array('fields' => array('Tipospelo.id',
                'Tipospelo.nombre')));
        //debug($pelos);
        $sexo = array("0" => 'HEMBRA', "1" => 'MACHO');
        $departamentos = $this->Departamento->find('list', array('fields' => array('Departamento.id', 'Departamento.nombre')));
        //debug($sexo);exit;
        $this->set(compact('razas', 'pelos', 'id_servicio', 'id_nacimiento', 'sexo', 'departamentos','idCamada','leemascotas'));
    }
    
    public function informecomision($id = null,$idInforme = null)
    {
        $camada = $this->Camada->find('first', array('conditions' => array('Camada.id' =>
                $id), 'recursive' => 2));
        if (!empty($this->data))
        {

            if ($this->data['Informecomcria']['departamento_id'] != null)
            {
                $this->request->data['Informecomcria']['lugar'] = $this->Lechigada->obtenerNombre($this->data['Informecomcria']['departamento_id']);
            }
            $this->request->data['Informecomcria']['dueno'] = $camada['Criadero']['Propietario']['nombre'];
            $this->Informecomcria->create();
            //debug($this->data);exit;
            
            if ($this->Informecomcria->save($this->data))
            {
                $id_informe = $this->Informecomcria->getLastInsertID();
                if(empty($id_informe))
                {
                    $id_informe = $idInforme;
                }
                $this->Observacionesinformecomcria->create();
                $i = 0;
                foreach($this->request->data['Observacionesinformecomcria'] as $obs)
                {
                    $this->request->data['Observacionesinformecomcria'][$i]['informecomcria_id'] = $id_informe;
                    $i++;
                }
                if($this->Observacionesinformecomcria->saveAll($this->request->data['Observacionesinformecomcria']))
                {
                    $this->Session->setFlash("Registro de informe creado",'msgbueno');
                }
                
                $this->redirect(array('action' => 'index'));
            } else
            {
                $this->Session->setFlash("Error al registrar el informe de comision de cria",'msgerror');
                $this->redirect(array('action' => 'index'));
            }
        }
        else{
            $this->Informecomcria->id = $idInforme;
            $this->request->data = $this->Informecomcria->read();
            
        }

        //debug($camada);exit;
        $cachorros = $camada['Mascota'];
        $crias = array();
        foreach ($cachorros as $cachorro)
        {
            $crias[$cachorro['id']] = $cachorro['nombre'];
        }
        $departamentos = $this->Departamento->find('list', array('fields' => array('Departamento.id', 'Departamento.nombre')));
        $this->set(compact('camada', 'cachorros', 'id', 'departamentos','idInforme'));
    }
    
    public function vermonta($id)
    {
        $datos = $this->Monta->find('first', array('conditions' => array('Monta.id' => $id),
            'recursive' => 3));
        //debug($datos);exit;
        $perfil = $this->Session->read('tipousuario');
        $this->set(compact('datos'));
    }
    
    public function ver($id = null)
    {
        $usuario = $this->Propietario->findById($id);
        //debug($usuario);
        $datos = $this->Servicio->find('first', array('conditions' => array('Servicio.id' =>
                $id), 'recursive' => 2));
        //debug($datos);       exit;
        $this->set(compact('datos'));
    }
    
    public function vernacimiento($id=null){
        $nacimiento = $this->Denuncianacimiento->find(
        'first', 
        array(
        'conditions'=>array('Denuncianacimiento.id'=>$id)
        )
        );
        $datos = $this->Servicio->find('first', array('conditions' => array('Servicio.id' =>
                $nacimiento['Denuncianacimiento']['servicio_id']), 'recursive' => 2));
        //debug($nacimiento);exit;
        $this->set(compact('nacimiento','datos'));
    }
    
    public function vercamada($id = null)
    {
        $camada = $this->Camada->find('first', array('conditions' => array('Camada.id' =>
                $id), 'recursive' => 2));
        $fecha = $camada['Camada']['fecha'];
        $fechanacimiento = $camada['Camada']['fecha_nacimiento'];
        ///debug($camada);exit;
        $this->set(compact('camada', 'fecha', 'fechanacimiento'));
    }
    
    public function vercomision($id = null)
    {
        $comision = $this->Informecomcria->find('first', array(
            'conditions' => array('Informecomcria.id' => $id),
            'recursive' => 2
                ));
        //debug($comision);exit;
        $this->set(compact('comision'));
    }
    public function get_departamento($idDepartamento = null)
    {
        $departamento = $this->Departamento->find('first',array('conditions' => array('Departamento.id' => $idDepartamento)));
        //debug($departamento['Departamento']['nombre']);exit;
        if(!empty($departamento))
        {
            return $departamento['Departamento']['nombre'];
        }
        else{
            return NULL;
        }
    }
    
    public function mapacamada($id = null)
    {
        $camada = $this->Camada->find('first', array('conditions' => array('Camada.id' => $id), 'recursive' => 2));
        //debug($camada);exit;
        $fecha = $camada['Camada']['fecha'];
        $fecha_nacimiento = $camada['Camada']['fecha_nacimiento'];
        $fecha_impresion = date('Y-m-d');
        //debug($camada);exit;
        $this->set(compact('camada', 'fecha', 'fecha_nacimiento', 'fecha_impresion'));
    }
     public function eliminarmonta($id = null)
    {
        if (!$id)
        {
            $this->Session->setFlash('id Invalida para borrar','msgerror');
            $this->redirect($this->referer());
        }
        if ($this->Monta->delete($id))
        {
            $this->Session->setFlash('La monta con registro  ' . $id . ' fue borrado','msgbueno');
            $this->redirect($this->referer());
        }
    }
    public function eliminar($id = null)
    {
        if (!$id)
        {
            $this->Session->setFlash('id Invalida para borrar','msgerror');
            $this->redirect($this->referer());
        }
        $servicio = $this->Servicio->findByid($id,null,null,null,null,-1);
        if ($this->Servicio->delete($id))
        {
            if(!empty($servicio['Servicio']['ingreso_id']))
            {
                $this->Ingreso->delete($servicio['Servicio']['ingreso_id']);
            }
            $this->Session->setFlash('El Servicio con registro  ' . $id . ' fue borrado','msgbueno');
            $this->redirect($this->referer());
        }
    }
    function eliminarnacimiento($id=null){
        $denuncia = $this->Denuncianacimiento->findByid($id,null,null,null,null,-1);
        //debug($id);exit;
        if($this->Denuncianacimiento->delete($id)){
            if(!empty($denuncia['Denuncianacimiento']['ingreso_id']))
            {
                $this->Ingreso->delete($denuncia['Denuncianacimiento']['ingreso_id']);
            }
            $this->Session->setFlash("Se elimino el nacimiento nro ".$id,'msgbueno');
               $this->redirect($this->referer());
        }else{
            $this->Session->setFlash("Error al tratar de eliminar el nacimiento nro ".$id,'msgerror');
               $this->redirect($this->referer());
        }
    }
    function eliminarcamada($id = null)
    {
        $camada = $this->Camada->findByid($id,null,null,null,null,-1);
        
        if ($this->Camada->delete($id))
        {
            if(!empty($camada['Camada']['ingreso_id']))
            {
                $this->Ingreso->delete($camada['Camada']['ingreso_id']);
            }
            $this->Session->setFlash("Se elimino el tramite de camada nro " . $id,'msgbueno');
            $this->redirect($this->referer());
        } else
        {
            $this->Session->setFlash("Error al tratar de eliminar tramite de camada nro " . $id,'msgerror');
            $this->redirect($this->referer());
        }
    }
    public function eliminarcomision($id = null)
    {
        if ($this->Informecomcria->delete($id))
        {
            $this->Session->setFlash("Se elimino el tramite de comision nro " . $id,'msgbueno');
            $this->redirect($this->referer());
        } else
        {
            $this->Session->setFlash("Error al tratar de eliminar tramite de camada nro " . $id,'msgerror');
            $this->redirect($this->referer());
        }
    }
    function respond($message = null, $json = false)
    {
        if ($message != null)
        {
            if ($json == true)
            {
                $this->RequestHandler->setContent('json', 'application/json');
                $message = json_encode($message);
            }
            $this->set('message', $message);
        }
        $this->render('message');
    }
}