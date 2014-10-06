<?php
App::uses('AppController', 'Controller');
class UsuariosController extends AppController {

    public $layout = 'kennel';
    public $uses = array('Mascota','User','Raza','Propietario','Departamento','Tipospelo','Informecomcria','Observacionesinformecomcria',
    'EstadosMascota','Criadero','Mascotaspropietario','Ingreso','Cuentasbancaria','Tramite','Tarifa','Servicio','Monta','Denuncianacimiento','Camada','Evento','Mascotastitulo','Categoriaspista','Sucursale','Temporalmascota');
    var $components = array('RequestHandler','Lechigada','DataTable');
    public $helpers = array('Html', 'Form');
    public function beforeFilter(){
        parent::beforeFilter();
        if($this->RequestHandler->responseType() == 'json'){
            $this->RequestHandler->setContent('json', 'application/json' );
        }
        $this->Auth->allow();
    }
	public function index()
    {
		$usuario = $this->Session->read('Auth.User');
        $mascotas = $this->Mascota->findAllBypropietario_id($usuario['propietario_id'],null,null,null,null,-1);
        $this->set(compact('mascotas'));
	}
    public function propietario()
    {
        $this->layout = 'ajax';
        $this->User->id = $this->Session->read('Auth.User.id');
        $this->request->data = $this->User->read();
    }
    public function guardapropietario()
    {
        if(!empty($this->request->data))
        {
            $this->User->create();
            
            $this->User->saveAll($this->request->data);
            $this->Session->setFlash('Se guardo correctamente','msgbueno');
            $this->redirect($this->referer());
        }
        else{
            $this->Session->setFlash('No se guardo!!!','msgerror');
            $this->redirect($this->referer());
        }
    }
    public function mascotas()
    {
        $usuario = $this->Session->read('Auth.User');
        $mascotas = $this->Mascota->findAllBypropietarioactual_id($usuario['propietario_id'],null,null,null,null,0);
        $this->set(compact('mascotas'));
    }
    public function ajaxmascota($idMascota = null,$generacion = null,$tpadre = null)
    {
        $this->layout = 'ajax';
        $mascota = $this->Mascota->find('first',array('recursive' => -1,'conditions' => array('Mascota.id' => $idMascota),'fields' => array('Mascota.raza_id')));
        $razas = $this->Raza->find('list',array('fields' => 'Raza.nombre_completo','order' => 'Raza.nombre ASC'));
        $this->request->data['Mascota']['raza_id'] = $mascota['Mascota']['raza_id'];
        if($tpadre == 1)
        {
           $this->request->data['Mascota']['sexo'] = 'macho'; 
        }
        elseif($tpadre == 2){
            $this->request->data['Mascota']['sexo'] = 'hembra'; 
        }
        $this->set(compact('razas','idMascota','generacion','tpadre'));
    }
    public function ejemplar($idMascota = null)
    {
        $razas = $this->Raza->find('list',array('fields' => 'Raza.nombre_completo','order' => 'Raza.nombre ASC'));
        //debug($razas);exit;
        //$dcm = $this->Mascota->find('list', array('recursive' => -1, 'fields' => array('nombre_completo'),'order' => 'Mascota.nombre_completo ASC'));
        $dcp = $this->Propietario->find('list', array('recursive' => -1, 'fields' => array('nombre'),'order' => 'Propietario.nombre ASC'));
        //debug($dcp);exit;
        $criaderos = $this->Criadero->find('list', array('fields'=>array('Criadero.id', 'Criadero.nombre'),'order' => 'Criadero.nombre ASC'));
        $departamentos = $this->Departamento->find('list', array('fields'=>array('Departamento.id', 'Departamento.nombre'),'order' => 'Departamento.nombre ASC'));
        $this->Mascota->id = $idMascota;
        $this->request->data = $this->Mascota->read();
        
        //$this->Session->setFlash("");
        
        $this->set(compact('razas','dcm','dcp','criaderos','departamentos','idMascota'));
    }
    public function extranjero($idMascota = null)
    {
        $razas = $this->Raza->find('list',array('fields' => 'Raza.nombre_completo','order' => 'Raza.nombre ASC'));
        //debug($razas);exit;
        //$dcm = $this->Mascota->find('list', array('recursive' => -1, 'fields' => array('nombre_completo'),'order' => 'Mascota.nombre_completo ASC'));
        $dcp = $this->Propietario->find('list', array('recursive' => -1, 'fields' => array('nombre'),'order' => 'Propietario.nombre ASC'));
        //debug($dcp);exit;
        $criaderos = $this->Criadero->find('list', array('fields'=>array('Criadero.id', 'Criadero.nombre'),'order' => 'Criadero.nombre ASC'));
        $departamentos = $this->Departamento->find('list', array('fields'=>array('Departamento.id', 'Departamento.nombre'),'order' => 'Departamento.nombre ASC'));
        $this->Mascota->id = $idMascota;
        $this->request->data = $this->Mascota->read();
        
        //$this->Session->setFlash("");
        
        $this->set(compact('razas','dcm','dcp','criaderos','departamentos','idMascota'));
    }
    public function guardaejemplar()
    {
        if(!empty($this->request->data))
        {
            $cadena_nombre = null;
            $this->Mascota->create();
            $cadena_nombre = strtoupper($this->genera_nombre());
            $this->request->data['Mascota']['nombre_completo'] = $cadena_nombre;
            if(empty($this->request->data['Mascota']['kcb']))
            {
                $this->request->data['Mascota']['kcb'] = 'nulo';
            }
            if(!empty($this->request->data['Mascota']['criadero_id']))
            {
                $this->request->data['Mascota']['propietario_id'] = $this->get_prop_cri($this->request->data['Mascota']['criadero_id']);
            }
            
            $this->request->data['Mascota']['solicitud'] = 1;
            $valida = $this->validar('Mascota');
            if(empty($valida))
            {
                if ($this->Mascota->save($this->request->data['Mascota'])){
                    $idMascota = $this->Mascota->getLastInsertID();
                    if(empty($idMascota))
                    {
                        $idMascota = $this->request->data['Mascota']['id'];
                    }
                    $this->request->data = null;
                    $this->propietario_actual($idMascota);
                    $this->Session->setFlash('Se envio el regsitro correctamente Usted debe de esperar ser aceptado o confirmar el registro en la Sucursal de Kennel','msgbueno');
                }
                else{
                    $this->Session->setFlash('No se pudo enviar el registro, intente nuevamente');
                }
            }
            else{
                $this->Session->setFlash($valida,'msgerror');
            }
        }
        $this->redirect(array('action' => 'mascotas'));
    }
    //OBTIENE EL PROPIETARIO DEL CRIADERO
    public function get_prop_cri($idCriadero)
    {
        $criadero = $this->Criadero->find('first',array('recursive' => -1,'conditions' => array('Criadero.id' => $idCriadero)));
        if(!empty($criadero))
        {
            return $criadero['Criadero']['propietario_id'];
        }
        else{
            return null;
        }
    }
    public function genera_nombre()
    {
        $cadena_nombre = '';
        //debug($this->request->data);exit;
        if($this->request->data['Mascota']['orden'] == 0){
                $cadena_nombre = $this->request->data['Mascota']['nombre'];
                
                if($this->request->data['Mascota']['prefijo'] != null){
                   $cadena_nombre .= " ";
                    $cadena_nombre .= $this->request->data['Mascota']['prefijo'];
                }
                if($this->request->data['Mascota']['criadero_id'] != ''){
                   $criadero = $this->Criadero->find('first', array(
                   'conditions'=>array('Criadero.id'=>$this->request->data['Mascota']['criadero_id']), 
                   'recursive'=>-1
                   ));
                //debug($criadero);
                   if(!empty($criadero)){
                     $nombre_criadero = $criadero['Criadero']['nombre'];
                     $cadena_nombre .= " ".$nombre_criadero;    
                   }
            
                }
            }elseif($this->request->data['Mascota']['orden'] == 1){
                
                if($this->request->data['Mascota']['criadero_id'] != ''){
                   $criadero = $this->Criadero->find('first', array(
                   'conditions'=>array('Criadero.id'=>$this->request->data['Mascota']['criadero_id']), 
                   'recursive'=>-1
                   ));
                //debug($criadero);
                   if(!empty($criadero)){
                     $nombre_criadero = $criadero['Criadero']['nombre'];
                     $cadena_nombre .= $nombre_criadero;    
                   }
            
                }
                if($this->request->data['Mascota']['prefijo'] != null){
                   $cadena_nombre .= " ";
                    $cadena_nombre .= $this->request->data['Mascota']['prefijo'];
                }
                
                $cadena_nombre .= " ".$this->request->data['Mascota']['nombre'];
                
            }elseif (empty ($this->request->data['Mascota']['orden'])) {
            $cadena_nombre = $this->request->data['Maascota']['nombre'];
        }
            
            return $cadena_nombre;
    }
    public function guardamascota($idMascota = null,$generacion = null,$tpadre =null)
    {
        $this->layout = 'ajax';
        $this->Mascota->create();
        $this->request->data['Mascota']['nombre_completo'] = $this->request->data['Mascota']['nombre'];
        $valida = $this->validar('Mascota');
        if(!empty($valida))
        {
            $this->redirect(array('controller' => 'Mascotas','action' => 'ajaxpadre',$idMascota,$generacion,0,0,$valida));
        }
        else{
            $this->Mascota->save($this->request->data['Mascota']);
            $idMascotan = $this->Mascota->getLastInsertID();
            $this->guarda_padre($generacion,$idMascotan,$tpadre);
            $this->redirect(array('controller' => 'Mascotas','action' => 'ajaxpadre',$idMascota,$generacion,$tpadre,$idMascotan));
        }
        
        $array['mascota_id'] = $idMascota;
        $this->respond($array, true);
    }
    //acualiza al padre de la mascota
    public function guarda_padre($generacion = null,$idMascotan = null,$tpadre = null)
    {
        $this->request->data = null;
        $this->Mascota->id = $generacion;
        if($tpadre == 1)
        {
            $this->request->data['Mascota']['reproductor_id'] = $idMascotan;
        }
        elseif ($tpadre == 2) {
            $this->request->data['Mascota']['reproductora_id'] = $idMascotan;
        }
        $this->Mascota->save($this->request->data['Mascota']);
        $this->request->data = null;
    }
    public function pagos()
    {
        $pagos = $this->Ingreso->find('all',array('order' => 'Ingreso.id DESC','conditions' => array('Ingreso.propietario_id' => $this->Session->read('Auth.User.propietario_id'))));
        //$pagos = $this->Ingreso->findAllByuser_id($this->Session->read('Auth.User.id'),null,null,null,null,0);
        
        $this->set(compact('pagos'));
    }
    public function ajaxpago($idIngreso = null)
    {
        $this->layout = 'ajax';
        $this->Ingreso->id = $idIngreso;
        $this->request->data = $this->Ingreso->read();
        $cuentas =$this->Cuentasbancaria->find('list',array('fields' => 'Cuentasbancaria.cuenta'));
        $tramites = $this->Tramite->find('list',array('fields' => 'Tramite.nombre'));
        $this->set(compact('cuentas','tramites'));
    }
    public function guardaingreso()
    {
        if(!empty($this->request->data))
        {
            $this->Ingreso->create();
            $this->request->data['Ingreso']['user_id'] = $this->Session->read('Auth.User.id');
            $tramite = $this->request->data['Ingreso']['tramite_id'];
            $idcuenta = $this->request->data['Ingreso']['cuentasbancaria_id'];
            $cuentasbancaria = $this->Cuentasbancaria->findByid($idcuenta,null,null,null,null,-1);
            $idPropietario = $this->request->data['Ingreso']['propietario_id'];
            $propietario = $this->Propietario->findByid($idPropietario,null,null,null,null,-1);
            
            if(!empty($cuentasbancaria) && !empty($propietario['Propietario']['tipo_id']))
            {
                $this->request->data['Ingreso']['sucursale_id'] = $cuentasbancaria['Cuentasbancaria']['sucursale_id'];
                $tarifa = $this->Tarifa->find('first',array('recursive' => -1,'conditions' => array('Tarifa.tipo_id' => $propietario['Propietario']['tipo_id'],'Tarifa.sucursale_id' => $cuentasbancaria['Cuentasbancaria']['sucursale_id'],'Tarifa.tramite_id' => $tramite)));
            }
            
            if(!empty($tarifa))
            {
                $this->request->data['Ingreso']['monto'] = $tarifa['Tarifa']['regional'];
                //$this->request->data['Ingreso']['monto_total'] = $tarifa['Tarifa']['monto_total'];
                $this->request->data['Ingreso']['nacional'] = $tarifa['Tarifa']['nacional'];
                if($this->request->data['Ingreso']['monto_total'] != $tarifa['Tarifa']['monto_total'])
                {
                    $montototal = $this->request->data['Ingreso']['monto_total'];
                    $pornacional = ($tarifa['Tarifa']['nacional']/$tarifa['Tarifa']['monto_total']);
                    $porregional = ($tarifa['Tarifa']['regional']/$tarifa['Tarifa']['monto_total']);
                    $this->request->data['Ingreso']['nacional'] = $pornacional*$montototal;
                    $this->request->data['Ingreso']['monto'] = $porregional*$montototal;
                }
            }
            else{
                $this->Session->setFlash('No se encontro una configuracion para su solicitud!!!!','msgerror');
                $this->redirect(array('action' => 'pagos'));
            }
            if($this->Ingreso->save($this->request->data))
            {
                $this->Session->setFlash('Se Envio Correctamente!!!!','msgbueno');
                $this->redirect(array('action' => 'pagos'));
            }
            else{
                $this->Session->setFlash('No se pudo Enviar!!!!','msgerror');
                $this->redirect(array('action' => 'pagos'));
            }
            
        }
    }
    public function anulapago($idIngreso = null)
    {
        $ingreso = $this->Ingreso->findByid($idIngreso,null,null,null,null,-1);
        if(!empty($ingreso))
        {
            if($ingreso['Ingreso']['estado'] != 1)
            {
                $this->Ingreso->delete($idIngreso);
                $this->Session->setFlash('Se anulo correctamnete su peticion!!!','msgbueno');
                $this->redirect(array('action' => 'pagos'));
            }
            else{
                $this->Session->setFlash('No se puede anular !!!','msgerror');
                $this->redirect(array('action' => 'pagos'));
            }
        }
        $this->redirect(array('action' => 'pagos'));
    }
    public function ajaxmontototal()
    {
        $this->layout = 'ajax';
        //debug($this->request->data);exit;
        
            
        if(!empty($this->request->data['Ingreso']['tramite_id']) && !empty($this->request->data['Ingreso']['propietario_id']))
        {
            $tramite = $this->request->data['Ingreso']['tramite_id'];
            $idPropietario = $this->request->data['Ingreso']['propietario_id'];
        }
        if(!empty($idPropietario))
        {
            $propietario = $this->Propietario->find('first',array('recursive' => -1,'conditions' => array('Propietario.id' => $idPropietario)));
            $tipo = $propietario['Propietario']['tipo_id'];
        }
        elseif(!empty($this->request->data['Ingreso']['tipo_id'])){
            $tipo = $this->request->data['Ingreso']['tipo_id'];
        }
        $idSucursal = $this->request->data['Ingreso']['sucursale_id'];
        if(!empty($idSucursal) && !empty($tipo))
        {
            $tarifa = $this->Tarifa->find('first',array('recursive' => -1,'conditions' => array('Tarifa.tipo_id' => $tipo,'Tarifa.sucursale_id' => $idSucursal,'Tarifa.tramite_id' => $tramite)));
        }
        if(!empty($tarifa['Tarifa']['monto_total']))
        {
            $valor = $tarifa['Tarifa']['monto_total'];
        }
        else{
            $valor = 0.00;
        }
        $this->set(compact('valor'));
    }
    public function ajaxfoto($idMascota = null)
    {
        $this->layout = 'ajax';
        $mascota = $this->Mascota->findByid($idMascota,null,null,null,null,-1);
        if(empty($mascota['Mascota']['imagen']))
        {
            $imagen = 'perro.jpg';
        }
        else{
            $imagen = 'fotos/'.$mascota['Mascota']['imagen'];
        }
        $this->set(compact('idMascota','mascota','imagen'));
    }
    public function guardafoto()
    {
        $archivoImagen = $this->request->data['Mascota']['foto'];
        $nombreOriginal = $this->request->data['Mascota']['foto']['name'];
        $idMascota = $this->request->data['Mascota']['id'];
        
        if ($archivoImagen['error'] === UPLOAD_ERR_OK)
        {
            //$nombre = string::uuid();
            $nombre = $idMascota.date("Y-m-d H-i-s");
            $mascota = $this->Mascota->findByid($idMascota,null,null,null,null,-1);
            //debug($mascota['Mascota']['imagen']);exit;
            if (move_uploaded_file($archivoImagen['tmp_name'], WWW_ROOT . 'img/fotos' . DS . $nombre . '.jpg'))
            {
                if(!empty($mascota['Mascota']['imagen']))
                {
                    $dir=WWW_ROOT . 'img/fotos' . DS . $mascota['Mascota']['imagen']; //puedes usar dobles comillas si quieres 
                    if(file_exists($dir)) 
                    { 
                        unlink($dir);
                    }
                }
                
                //$mascota = $this->Mascota->findByid($idMascota,null,null,null,null,-1);
                //debug($mascota);
                $this->Mascota->id = $idMascota;
                $this->request->data = $this->Mascota->read();
                //$this->Mascota->create();
                $this->request->data['Mascota']['imagen'] = $nombre.'.jpg';
                //debug($this->request->data['Mascota']);exit;
                $this->Mascota->save($this->request->data['Mascota']);
                $this->Session->setFlash('Se gurado correctamente!!!','msgbueno');
                $this->redirect(array('action' => 'mascotas'));
            }
            else{
                $this->redirect(array('action' => 'mascotas'));
            }
        }
        else{
            $this->redirect(array('action' => 'mascotas'));
        }
    }
    public function ver()
    {
        
    }
    public function propietario_actual($idMascota = null)
    {
        //debug($idMascota);exit;
        $propac = null;
            $mascota = $this->Mascota->findByid($idMascota,null,null,null,null,-1);
            $mascotas_prop = $this->Mascotaspropietario->find('first',array('recursive' => -1,'order' => 'Mascotaspropietario.fecha_transfer DESC','conditions' => array('Mascotaspropietario.mascota_id' => $idMascota)));
            if(!empty($mascotas_prop))
            {
                $propac = $mascotas_prop['Mascotaspropietario']['propietario_id'];
            }
            else{
                if(empty($mascota['Mascota']['propietarioactual_id']))
                {
                    $propac = $mascota['Mascota']['propietario_id'];
                }
                else{
                    $propac = $mascota['Mascota']['propietarioactual_id'];
                }
            }
            $this->Mascota->id = $idMascota;
            $this->request->data['Mascota']['propietarioactual_id'] = $propac;
            $this->Mascota->save($this->request->data['Mascota']);
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
            //$this->request->data['Ingreso']['comprobante'] = $this->request->data['Servicio']['recibo'];
            //$this->request->data['Ingreso']['tramite_id'] = 8;
            //$this->generapago();
            /*if(empty($this->request->data['Aux']['ingreso_id']))
                {
                    $this->Session->setFlash('No se encontro una configuracion para los pagos','msgerror');
                    $this->redirect(array('action' => 'listadenuncias'));
                }
                $sucursal = $this->Sucursale->find('first',array('recursive' => -1,'conditions' => array('Sucursale.id' => $this->request->data['Ingreso']['sucursale_id'])));
                $montototal = $this->request->data['Ingreso']['monto_total'];
                $this->request->data['Servicio']['ingreso_id'] =  $this->request->data['Aux']['ingreso_id'];*/
                $this->request->data['Servicio']['user_id'] = $this->Session->read('Auth.User.id');
                if(!empty($this->request->data['Servicio']['reproductor_id']))
                {
                    $this->request->data['Servicio']['propietarioreproductor_id'] = $this->get_propietario_actual($this->request->data['Servicio']['reproductor_id']);
                }
                if(!empty($this->request->data['Servicio']['reproductora_id']))
                {
                    $this->request->data['Servicio']['propietarioreproductora_id'] = $this->get_propietario_actual($this->request->data['Servicio']['reproductora_id']);
                }
                //$idIngreso = $this->request->data['Aux']['ingreso_id'];
            if ($this->Servicio->save($this->data))
            {
                if(empty($idServicio))
                {
                    $idServicio = $this->Servicio->getLastInsertID();
                }
                $mensajeb = 'SE ENVIO CORRECTAMENTE LA SOLICITUD DE SERVICIO EL CODIGO DEL SERVICIO ES EL '.$idServicio;
                //$mensajeb = 'SE ENVIO CORRECTAMENTE LA SOLICITUD USTED DEBE DE CANCELAR EL MONTO CORRESPONDIENTE AL TARIFARIO ,PARA LUEGO PASAR POR LA SUCURSAL CON SU COMPROBANTE DE PAGO Y PEDIR LA DENUNCIA CON EL CODIGO: '.$idServicio;
                $this->Session->setFlash($mensajeb,'notabuena');
                
                //$this->Session->setFlash("Denuncia de servicio " . $this->Servicio->id . " guardado exitosamente!",'msgbueno');
                $this->redirect(array('action' => 'listadenuncias'));
            } else
            {
                $this->Session->setFlash("Error al guardar!",'msgerror');
                $this->redirect(array('action' => 'listadenuncias'));
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
            $sucursales = $this->Sucursale->find('list',array('fields' => 'Sucursale.nombre'));
            $idPropietario = $this->Session->read('Auth.User.propietario_id');
            $mismachos = $this->Mascota->find('list',array(
                'fields' => 'Mascota.nombre_completo'
                ,'conditions' => array('Mascota.propietarioactual_id' => $idPropietario,'Mascota.sexo' => 'macho','Mascota.solicitud !=' => 1))); 
           $this->set(compact('mascotas', 'propietarios', 'departamentos','sucursales','mismachos'));
        }
    }
    public function generapago($veces = null)
    {
        //debug('entro aqui');
        //debug($this->request->data);exit;
        if(!empty($this->request->data))
        {
            $this->Ingreso->create();
            $this->request->data['Ingreso']['user_id'] = $this->Session->read('Auth.User.id');
            $tramite = $this->request->data['Ingreso']['tramite_id'];
            $idSucursal = $this->request->data['Ingreso']['sucursale_id'];
           
            if(empty($this->request->data['Ingreso']['propietario_id']))
            {
                 $idPropietario = $this->Session->read('Auth.User.propietario_id');
                 $this->request->data['Ingreso']['propietario_id'] = $idPropietario;
            }
            else{
                $idPropietario = $this->request->data['Ingreso']['propietario_id'];
            }
            
            $propietario = $this->Propietario->findByid($idPropietario,null,null,null,null,-1);
            
            if(!empty($propietario['Propietario']['tipo_id']))
            {
                $tarifa = $this->Tarifa->find('first',array('recursive' => -1,'conditions' => array('Tarifa.tipo_id' => $propietario['Propietario']['tipo_id'],'Tarifa.sucursale_id' => $idSucursal,'Tarifa.tramite_id' => $tramite)));
            }
            if(!empty($veces))
            {
                $this->request->data['Ingreso']['monto_total'] = $tarifa['Tarifa']['monto_total']*$veces;
            }
            if(!empty($tarifa))
            {
                if(!empty($this->request->data['Ingreso']['monto_total']) && $this->request->data['Ingreso']['monto_total'] != $tarifa['Tarifa']['monto_total'])
                {
                    $montototal = $this->request->data['Ingreso']['monto_total'];
                    $pornacional = ($tarifa['Tarifa']['nacional']/$tarifa['Tarifa']['monto_total']);
                    $porregional = ($tarifa['Tarifa']['regional']/$tarifa['Tarifa']['monto_total']);
                    $this->request->data['Ingreso']['nacional'] = $pornacional*$montototal;
                    $this->request->data['Ingreso']['monto'] = $porregional*$montototal;
                }
                else{
                    $this->request->data['Ingreso']['nacional'] = $tarifa['Tarifa']['nacional'];
                    $this->request->data['Ingreso']['monto'] = $tarifa['Tarifa']['regional'];
                    $this->request->data['Ingreso']['monto_total'] = $tarifa['Tarifa']['monto_total'];
                }
                if($this->Ingreso->save($this->request->data['Ingreso']))
                {
                    $idIngreso = $this->Ingreso->getLastInsertID();
                    $this->request->data['Aux']['ingreso_id'] = $idIngreso;
                }
                else{

                }
            }
            else{
            }
            
            
        }
    }
    public function listadenuncias()
    {
        $denuncias = $this->Servicio->find('all', array('recursive' => 2,'order' => 'Servicio.id DESC','conditions' =>array('Servicio.user_id' => $this->Session->read('Auth.User.id'))));
        //debug($denuncias);exit;
        $this->set(compact('denuncias'));
    }
    function registrarmonta($idServicio = null)
    {
        if (!empty($this->data))
        {
            //debug($this->data);exit;
            $this->Monta->create();
            if (isset($this->data['Monta']['departamento_id2']))
            {
                $this->request->data['Monta']['lugar'] = $this->Lechigada->obtenerNombre($this->
                        data['Monta']['departamento_id2']);
            }
            //$this->request->data['Monta']['usuario_id'] = $this->Session->read('usuario_id');
            $this->request->data['Monta']['lugar_denuncia'] = $this->Lechigada->obtenerNombre($this->data['Monta']['departamento_id']);

            //debug($this->data);exit;
            $idMonta = $this->request->data['Monta']['id'];
            
            //$this->request->data['Ingreso']['comprobante'] = $this->request->data['Servicio']['recibo'];
                //$this->request->data['Ingreso']['tramite_id'] = 7;
                //$this->generapago();
                $this->request->data['Servicio']['user_id'] = $this->Session->read('Auth.User.id');
                /*if(empty($this->request->data['Aux']['ingreso_id']))
                {
                    $this->Session->setFlash('No se encontro una configuracion para los pagos','msgerror');
                    $this->redirect(array('action' => 'listadenuncias'));
                }*/
                //$sucursal = $this->Sucursale->find('first',array('recursive' => -1,'conditions' => array('Sucursale.id' => $this->request->data['Ingreso']['sucursale_id'])));
                //$montototal = $this->request->data['Ingreso']['monto_total'];
                //$this->request->data['Servicio']['ingreso_id'] = $this->request->data['Aux']['ingreso_id'];
               
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
                //$idIngreso = $this->request->data['Aux']['ingreso_id'];
                $this->Servicio->save($this->request->data);
                if(empty($idServicio))
                {
                    $idServicio = $this->Servicio->getLastInsertID();
                }
                $mensajeb = 'SE ENCIO CORRECTAMENTE LA SOLICITUD DE SERVICIO, EL CODIGO DE SERVICIO ES: '.$idServicio;
                //$mensajeb = 'SE ENVIO CORRECTAMENTE LA SOLICITUD USTED DEBE DE CANCELAR EL MONTO CORRESPONDIENTE AL TARIFARIO ,PARA LUEGO PASAR POR LA SUCURSAL CON SU COMPROBANTE DE PAGO Y PEDIR LA DENUNCIA CON EL CODIGO: '.$idServicio;
                $this->Session->setFlash($mensajeb,'notabuena');
                $this->redirect(array('action' => 'listadenuncias'));
            } else
            {
                $this->Session->setFlash("Error al guardar!",'msgerror');
                $this->redirect(array('action' => 'listadenuncias'));
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
            //$cuentasbancarias = $this->Cuentasbancaria->find('list',array('fields' => 'Cuentasbancaria.cuenta'));
            $idPropietario = $this->Session->read('Auth.User.propietario_id');
            $mismachos = $this->Mascota->find('list',array(
                'fields' => 'Mascota.nombre_completo'
                ,'conditions' => array('Mascota.propietarioactual_id' => $idPropietario,'Mascota.sexo' => 'macho','Mascota.solicitud !=' => 1))); 
            //debug($mismachos);exit;
            $sucursales = $this->Sucursale->find('list',array('fields' => 'Sucursale.nombre'));
            $this->set(compact('sucursales','mascotas', 'kcbs', 'propietarios', 'perfil', 'departamentos','mismachos'));
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
    public function denuncia($id=null,$idDenuncia = null){
        if(!empty($this->data)){
           //debug($this->data);exit;
            $this->request->data['Denuncianacimiento']['servicio_id']=$id;
            $this->request->data['Denuncianacimiento']['lugar']=$this->Lechigada->obtenerNombre($this->data['Denuncianacimiento']['departamento_id']);
            
            //$this->request->data['Ingreso']['comprobante'] = $this->request->data['Denuncianacimiento']['recibo'];
            /*$this->request->data['Ingreso']['tramite_id'] = 9;
            $this->generapago();
            if(empty($this->request->data['Aux']['ingreso_id']))
                {
                    $this->Session->setFlash('No se encontro una configuracion para los pagos','msgerror');
                    $this->redirect(array('action' => 'listadenuncias'));
                }
                $sucursal = $this->Sucursale->find('first',array('recursive' => -1,'conditions' => array('Sucursale.id' => $this->request->data['Ingreso']['sucursale_id'])));
                $montototal = $this->request->data['Ingreso']['monto_total'];
            $this->request->data['Denuncianacimiento']['ingreso_id'] = $this->request->data['Aux']['ingreso_id'];*/
            if($this->Denuncianacimiento->save($this->data)){
                
                //$idIngreso = $this->request->data['Aux']['ingreso_id'];
                
                $mensajeb = 'SE ENVIO CORRECTAMENTE LA SOLICITUD EL CODIGO DEL SERVICIO ES '.$id;
                //$mensajeb = 'SE ENVIO CORRECTAMENTE LA SOLICITUD USTED DEBE DE CANCELAR EL MONTO CORRESPONDIENTE AL TARIFARIO ,PARA LUEGO PASAR POR LA SUCURSAL CON SU COMPROBANTE DE PAGO Y PEDIR LA DENUNCIA CON EL CODIGO: '.$id;
                $this->Session->setFlash($mensajeb,'notabuena');
                
               //$this->Session->setFlash("Denuncia de servicio ".$this->Denuncianacimiento->id." guardado exitosamente!",'msgbueno');
               $this->redirect(array('action'=>'listadenuncias'));
            }else{
               $this->Session->setFlash("Error al guardar!",'msgerror');
               $this->redirect(array('action'=>'listadenuncias'));
            }
        }
        else{
            $this->Denuncianacimiento->id = $idDenuncia;
            $this->request->data = $this->Denuncianacimiento->read();
        }
        $criaderos = $this->Criadero->find('list', array(
        'fields'=>array('Criadero.id', 'Criadero.nombre'),'order' => 'Criadero.nombre ASC'
        ));
        $departamentos = $this->Departamento->find('list', array('fields'=>array('Departamento.id', 'Departamento.nombre')));
        $sucursales = $this->Sucursale->find('list',array('fields' => 'Sucursale.nombre'));
        $this->set(compact('criaderos', 'departamentos','sucursales'));
    }//fin funcion denuncia de nacimientos nueva
    public function registrarcamada($id_servicio = null, $id_nacimiento = null,$idCamada = null)
    {
        if (!empty($this->data))
        {
            
            $nacimiento = $this->Servicio->find('first', array('conditions' => array('Servicio.id' => $id_servicio), 'recursive' => 0));
            //debug($nacimiento);exit;
            $madre = $nacimiento['Servicio']['reproductora_id'];
            $padre = $nacimiento['Servicio']['reproductor_id'];
            $raza = $this->data['Camada']['raza_id'];
            $fecha_nacimiento = $nacimiento['Denuncianacimiento']['fecha_denuncia'];
            $departamento = $nacimiento['Denuncianacimiento']['departamento_id'];
            $variedad = $this->data['Camada']['variedad'];
            if (!empty($departamento))
            {
                $this->request->data['Camada']['lugar'] = $this->Lechigada->obtenerNombre($departamento);
            }
            if(!empty($this->data['Mascota']))
            {
                $mascotas = $this->data['Mascota'];
                $i = 0;
                //debug($this->data);exit;
                foreach ($mascotas as $mascota)
                {
                    $this->request->data['Mascota'][$i]['nommbre_completo'] = $this->request->data['Mascota'][$i]['nombre']; 
                    $this->request->data['Mascota'][$i]['raza_id'] = $raza;
                    $this->request->data['Mascota'][$i]['reproductora_id'] = $madre;
                    $this->request->data['Mascota'][$i]['reproductor_id'] = $padre;
                    $this->request->data['Mascota'][$i]['fecha_nacimiento'] = $fecha_nacimiento;
                    $this->request->data['Mascota'][$i]['variedad'] = $variedad;
                    $this->request->data['Mascota'][$i]['origen'] = $this->data['Camada']['lugar'];
                    $this->request->data['Mascota'][$i]['departamento_id'] = $departamento;
                    $this->request->data['Mascota'][$i]['criadero_id'] = $nacimiento['Denuncianacimiento']['criadero_id'];
                    $this->request->data['Mascota'][$i]['estado'] = 0;
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
            
            /*$this->request->data['Ingreso']['tramite_id'] = 11;
            $this->generapago($i);
            
            if(empty($this->request->data['Aux']['ingreso_id']))
                {
                    $this->Session->setFlash('No se encontro una configuracion para los pagos','msgerror');
                    $this->redirect(array('action' => 'listadenuncias'));
                }
                $idIngreso = $this->request->data['Aux']['ingreso_id'];
                $sucursal = $this->Sucursale->find('first',array('recursive' => -1,'conditions' => array('Sucursale.id' => $this->request->data['Ingreso']['sucursale_id'])));
                $montototal = $this->request->data['Ingreso']['monto_total'];
            $this->request->data['Camada']['ingreso_id'] = $this->request->data['Aux']['ingreso_id'];*/
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
                $mensajeb = 'SE ENVIO CORRECTAMENTE LA SOLICITUD DE SERVICIO EL CODIGO DEL SERVICIO ES: '.$id_servicio ;
                //$mensajeb = 'SE ENVIO CORRECTAMENTE LA SOLICITUD USTED DEBE DE CANCELAR EL MONTO CORRESPONDIENTE AL TARIFARIO ,PARA LUEGO PASAR POR LA SUCURSAL CON SU COMPROBANTE DE PAGO Y PEDIR LA DENUNCIA CON EL CODIGO: '.$id_servicio;
                $this->Session->setFlash($mensajeb,'notabuena');
                
                $this->redirect(array('action' => 'listadenuncias'));
            } else
            {
                $this->Session->setFlash("Error en el registro",'msgerror');
                $this->redirect(array('action' => 'listadenuncias'));
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
        $sucursales = $this->Sucursale->find('list',array('fields' => 'Sucursale.nombre'));
        $this->set(compact('sucursales','razas', 'pelos', 'id_servicio', 'id_nacimiento', 'sexo', 'departamentos','idCamada','leemascotas'));
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
                    $mensajeb = 'SE ENVIO CORRECTAMENTE LA SOLICITUD DE SERVICIO EL CODIGO DE SERVICIO ES: '.$camada['Camada']['servicio_id'];
                    //$mensajeb = 'SE ENVIO CORRECTAMENTE LA SOLICITUD USTED DEBE DE CANCELAR EL MONTO CORRESPONDIENTE AL TARIFARIO ,PARA LUEGO PASAR POR LA SUCURSAL CON SU COMPROBANTE DE PAGO Y PEDIR LA DENUNCIA CON EL CODIGO: '.$camada['Camada']['servicio_id'];
                    $this->Session->setFlash($mensajeb,'notabuena');
                    //$this->Session->setFlash("Registro de informe creado",'msgbueno');
                }
                
                $this->redirect(array('action' => 'listadenuncias'));
            } else
            {
                $this->Session->setFlash("Error al registrar el informe de comision de cria",'msgerror');
                $this->redirect(array('action' => 'listadenuncias'));
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
    public function mapacamada($id = null)
    {
        $camada = $this->Camada->find('first', array('conditions' => array('Camada.id' => $id), 'recursive' => 2));
        //debug($camada);exit;
        $fecha = $camada['Camada']['fecha'];
        $fecha_nacimiento = $camada['Camada']['fecha_nacimiento'];
        $fecha_impresion = date('Y-m-d');
        $this->set(compact('camada', 'fecha', 'fecha_nacimiento', 'fecha_impresion'));
    }
    public function listadomascotas()
    {
        //debug($this->RequestHandler->responseType());exit;
        if($this->RequestHandler->responseType() == 'json') {
            $this->Mascota->virtualFields = array(
                'together' => "CONCAT('".' <a class="label label-warning" href="javascript:"  onclick="ver('."', ".''."Mascota.id".''." ,'".')">Ver</a>'."')"
                //,'prop' => 'SELECT titulo_id FROM mascotas_titulos WHERE mascota_id = Mascota.id'
            );
            $this->paginate = array(
                'fields' => array('Mascota.kcb', 'Mascota.nombre_completo', 'Mascota.num_tatuaje','Raza.nombre','Propietarioactual.nombre','Mascota.together'),
                //'joins' => array( array('table' => 'mascotas_propietarios', 'alias' => 'Mascotaspropieatario', 'type' => 'LEFT', 'conditions' => array( 'Mascota.id = Mascotaspropieatario.mascota_id' ) ) ),
                'conditions' => array('Mascota.kcb !=' => array('null','nulo')),'recursive' => 0,
                'order' => 'Mascota.kcb ASC'
            );
            $this->DataTable->fields = array('Mascota.kcb', 'Mascota.nombre_completo', 'Mascota.num_tatuaje','Raza.nombre','Propietarioactual.nombre','Mascota.together');
            $this->DataTable->emptyElements = 1;
            $this->set('mascotas', $this->DataTable->getResponse());
            $this->set('_serialize','mascotas');
        }
        $razas = $this->Raza->find('list',array('order' => 'Raza.nombre ASC','fields' => 'Raza.nombre'));
        $this->set(compact('razas'));
    }
    public function genera_usuarios()
    {
        $propietario = $this->Propietario->find('first');
        $nombre_completo = split(" ",$propietario['Propietario']['nombre']);
        $nombre_usuario = $nombre_completo[0].$propietario['Propietario']['id'];
        debug($nombre_usuario);
        debug(split(" ",$propietario['Propietario']['nombre']));exit;
        $propietarios = $this->Propietario->find('all',array('recursive' => -1));
        foreach($propietarios as $pro)
        {
            
        }
    }
    public function listaeventos()
    {
        $eventos = $this->Evento->find('all',array('order' => 'Evento.id DESC'));
        $this->set(compact('eventos'));
    }
    public function ajaxinscribe1($idEvento = null)
    {
        $this->layout = 'ajax';
        $idPropietario = $this->Session->read('Auth.User.propietario_id');
        $mascotas = $this->Mascota->findAllBypropietarioactual_id($idPropietario,null,null,null,null,0);
        $evento = $this->Evento->find('first',array('conditions' => array('Evento.id' => $idEvento)));
        $this->set(compact('mascotas','idEvento','evento'));
    }
    public function ajaxinscribe2($idMascota = null,$idEvento = null)
    {
        $this->layout = 'ajax';
        //debug($idEvento);exit;
        $evento = $this->Evento->find('first',array('conditions' => array('Evento.id' => $idEvento)));
        $fecha1 = $evento['Evento']['fecha_inicio'];
        $mas = $this->Mascota->find('first',array('conditions' => array('Mascota.id' => $idMascota)));
        $catepistas = $this->Categoriaspista->find('list',array('fields' => 'Categoriaspista.nombre'));
        //debug($mas);exit;
        $titulos = $this->Mascotastitulo->find('all',array('conditions' => array('Mascotastitulo.mascota_id' => $idMascota)));
        $sucursales = $this->Sucursale->find('list',array('fields' => 'Sucursale.nombre'));
        $this->set(compact('mas','catepistas','idEvento','fecha1','titulos','sucursales'));
    }
    public function inscribe_mascota($idEvento = null)
    {
        if(!empty($this->request->data['EventosMascota']['categoriaspista_id']))
        {
            
        }
        else{
            $this->Session->setFlash('Debe de seleccionar una categoria!!!!','msgerror');
            $this->redirect(array('action' => 'listaeventos'));
        }
    }
    public function prueba()
    {
        if(!empty($this->request->data))
        {
            //debug($this->request->data);exit;
            
            if($this->Sucursale->validates())
            {
                //$this->Sucursale->save($this->request->data['Sucursale']);
                //debug('entro aqui');exit;
                $this->Sucursale->set($this->request->data);
                //$errors = $this->Sucursale->validationErrors;
                $errors2 = $this->Sucursale->invalidFields();
                foreach ($errors2 as $er)
                {
                    //debug($er[0]);
                }
                //debug(current(current($errors2)));exit;
                //debug($errors);exit;
                if(!empty($errors2))
                {
                    
                        $this->Session->setFlash(current(current($errors2)),'msgerror');
                }
                $this->Sucursale->create();
                $this->Sucursale->save($this->request->data);
                $this->render('index');
                //$this->set('validationErrorsArray', $this->Sucursale->invalidFields());
            }
            else{
                $errors2 = $this->Sucursale->invalidFields();
                $errors = $this->Sucursale->validationErrors;
                debug($errors2);
                debug($errors);exit;
            }
            
        }
        else{
            
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
    public function inscripcion($idEvento = null)
    {
        //debug($this->request->data);exit;
        if(!empty($this->request->data))
        {
            $this->solicitud_inscripcion();
        }
        $razas = $this->Raza->find('list',array('fields' => 'Raza.nombre_completo','order' => 'Raza.nombre_completo ASC'));
        $categorias = $this->Categoriaspista->find('list',array('fields' => 'Categoriaspista.nombre'));
        //debug($categorias);exit;
        if(empty($idEvento))
        {
            $evento = $this->Evento->find('first',array('recursive' => -1,'order' => 'Evento.id DESC','conditions' => array('Evento.estado' => 1)));
            
        }
        else{
            $evento = $this->Evento->find('first',array('recursive' => -1,'conditions' => array('Evento.id' => $idEvento)));
        }
        if(empty($evento))
        {
            $this->Session->setFlash('Ahora no hay eventos disponibles!!!','msginfo');
        }
        else{
            $idEvento = $evento['Evento']['id'];
        }
        $this->set(compact('razas','categorias','idEvento','evento'));
    }
    public function verifica_kcb()
    {
        $verifica = $this->Mascota->find('first',array('recursive' => 0,'conditions' => array('Mascota.kcb' => $this->request->data['Temporalmascota']['kcb'])));
        //debug($this->request->data);exit;
        if(!empty($verifica))
        {
            //debug($verifica['Mascota']);exit;
            $array['mascota'] = $verifica;
        }
        else{
            $array['mascota'] = '';
        }
        $this->respond($array, true);
    }
    public function verifica_codigo()
    {
        $verifica = $this->Mascota->find('first',array('recursive' => 0,'conditions' => array('Mascota.codigo' => $this->request->data['Temporalmascota']['codigo'])));
        if(!empty($verifica))
        {
            $array['mascota'] = $verifica;
        }
        else{
            $array['mascota'] = '';
        }
        $this->respond($array, true);
    }
    public function solicitud_inscripcion()
    {
        if(!empty($this->request->data['Temporalmascota']['fecha_nacimiento']) && !empty($this->request->data['Temporalmascota']['categoriaspista_id']))
        {
            $categoria = $this->Categoriaspista->find('first',array('conditions' => array('Categoriaspista.id' => $this->request->data['Temporalmascota']['categoriaspista_id'])));
            $meses = $this->requestAction(array('controller' => 'Eventos','action' => 'meses',$this->request->data['Temporalmascota']['fecha_nacimiento'],date('Y-m-d')));
            if($meses <= $categoria['Categoriaspista']['hasta'] && $meses >= $categoria['Categoriaspista']['desde'])
            {
                $this->Temporalmascota->create();
                $this->Temporalmascota->save($this->request->data['Temporalmascota']);
                $this->Session->setFlash('Su solicitud fue enviada correctamente!!!','msgbueno');
                $this->request->data = array();
            }
            else{
                $this->Session->setFlash('El ejemplar tiene '.$meses.' meses, no puede estar en categoria '.$categoria['Categoriaspista']['nombre'],'msgerror');
                //$this->render('inscripcion');
            }
        }
        else{
            $this->Session->setFlash('Es necesario llenar los datos!!!','msgerror');
        }
        //debug($this->request->data);exit;
        //$this->redirect($this->referer());
    }
    
 }
 
