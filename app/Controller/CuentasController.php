<?php 
class CuentasController extends AppController{
    public $layout = 'kennel';
    public $uses = array('Ingreso','Tipo','Propietario','Cuentasbancaria', 'Banco', 'Caja', 'Tramite','Tarifa','Examene','Sucursale','Departamento');
    public $components = array('RequestHandler');
    public function index()
    {
        $cuentas =$this->Cuentasbancaria->find('list',array('fields' => 'Cuentasbancaria.cuenta'));
        $tramites = $this->Tramite->find('list',array('fields' => 'Tramite.nombre'));
        $ingresos = $this->Ingreso->find('all',array('recursive' => 0,'limit' => 100, 'order' => 'Ingreso.id DESC','conditions' => array('Ingreso.sucursale_id' => $this->Session->read('Auth.User.sucursale_id'))));
        //debug($ingresos);exit;
        $this->set(compact('cuentas','tramites','ingresos'));
    }
    public function guardaingreso()
    {
        if(!empty($this->request->data))
        {
            $this->Ingreso->create();
            
            $tramite = $this->request->data['Ingreso']['tramite_id'];
            $idPropietario = $this->request->data['Ingreso']['propietario_id'];
            $propietario = $this->Propietario->findByid($idPropietario,null,null,null,null,-1);
            $idSucursal = $this->request->data['Ingreso']['sucursale_id'];
            if(!empty($propietario['Propietario']['tipo_id']) && !empty($this->request->data['Ingreso']['sucursale_id']))
            {
                $idSucursal = $this->request->data['Ingreso']['sucursale_id'];
                $tarifa = $this->Tarifa->find('first',array('recursive' => -1,'conditions' => array('Tarifa.tipo_id' => $propietario['Propietario']['tipo_id'],'Tarifa.sucursale_id' => $idSucursal,'Tarifa.tramite_id' => $tramite)));
            }
            else{
                $this->Session->setFlash('Es obligatorio elegir al propietario y la sucursal','msgbueno');
                $this->redirect(array('action' => 'index'));
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
                $this->Session->setFlash('No se encontro una tarifa para su registro!!!!','msginfo');
                $this->redirect(array('action' => 'index'));
            }
            if($this->Ingreso->save($this->request->data))
            {
                $this->Session->setFlash('Se Registro Correctamente!!!!','msgbueno');
                $this->redirect(array('action' => 'index'));
            }
            else{
                $this->Session->setFlash('No se pudo registrar!!!!','msgerror');
                $this->redirect(array('action' => 'index'));
            }
        }
    }
    public function guardaingresoservicio()
    {
        $this->layout = 'ajax';
        if(!empty($this->request->data))
        {
            $this->Ingreso->create();
            
            $tramite = $this->request->data['Ingreso']['tramite_id'];
            $idPropietario = $this->request->data['Ingreso']['propietario_id'];
            $propietario = $this->Propietario->findByid($idPropietario,null,null,null,null,-1);
            $idSucursal = $this->request->data['Ingreso']['sucursale_id'];
            if(!empty($propietario['Propietario']['tipo_id']) && !empty($this->request->data['Ingreso']['sucursale_id']))
            {
                $idSucursal = $this->request->data['Ingreso']['sucursale_id'];
                $tarifa = $this->Tarifa->find('first',array('recursive' => -1,'conditions' => array('Tarifa.tipo_id' => $propietario['Propietario']['tipo_id'],'Tarifa.sucursale_id' => $idSucursal,'Tarifa.tramite_id' => $tramite)));
            }
            else{
                $array['mensaje'] = 'Es obligatorio elegir al propietario y la sucursal';
                
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
                
                if($this->Ingreso->save($this->request->data))
                {
                    //$this->Session->setFlash('Se Registro el pago correspondiente Correctamente!!!!','msgbueno');
                    //$this->redirect(array('action' => 'index'));
                    if(!empty($this->request->data['Ingreso']['id']))
                    {
                        $array['ingreso_id'] = $this->request->data['Ingreso']['id'];
                    }
                    else{
                        $array['ingreso_id'] = $this->Ingreso->getLastInsertID();
                    }
                }
                else{
                    //$this->Session->setFlash('No se pudo registrar!!!!','msgerror');
                    //$this->redirect(array('action' => 'index'));
                    $array['mensaje'] = 'No se pudo registrar!!!!';
                }
                
            }
            else{
                $array['mensaje'] = 'No se encontro una tarifa para su registro!!!!';
                //$this->Session->setFlash('No se encontro una tarifa para su registro!!!!','msginfo');
                //$this->redirect(array('action' => 'index'));
            }
            
        }
        if(empty($array))
        {
            $array['ingreso_id'] = NULL;
        }
        //debug($array);
        $this->respond($array, true);
    }
    public function get_tarifa($idSucursal = null,$tipo = null,$tramite = null)
    {
        $tarifa = $this->Tarifa->find('first',array('recursive' => -1,'conditions' => array('Tarifa.tipo_id' => $tipo,'Tarifa.sucursale_id' => $idSucursal,'Tarifa.tramite_id' => $tramite)));
        return $tarifa;
    }
    public function guardaingresos()
    {
        if(!empty($this->request->data))
        {
            $idSucursal = $this->request->data['Ingreso']['sucursale_id'];
            $tipo = $this->request->data['Ingreso']['tipo_id'];
            $tramite = $this->request->data['Ingreso']['tramite_id'];
            $idUsuer = $this->Session->read('Auth.User.id');
            if(!empty($idSucursal) && !empty($tipo) && !empty($tramite))
            {
                $tarifa = $this->get_tarifa($idSucursal,$tipo,$tramite);
                debug($tarifa);
                if(!empty($tarifa))
                {
                    $total = $tarifa['Tarifa']['monto_total'];
                    $nacional = $tarifa['Tarifa']['nacional'];
                    $regional = $tarifa['Tarifa']['regional'];
                    $propietarios = $this->Propietario->find('all',array('recursive' => -1,'conditions' => array('Propietario.tipo_id' => $tipo)));
                    foreach ($propietarios as $pro)
                    {
                        $this->request->data = null;
                        $this->Ingreso->create();
                        $this->request->data['Ingreso']['propietario_id'] = $pro['Propietario']['id'];
                        $this->request->data['Ingreso']['monto_total'] = $total;
                        $this->request->data['Ingreso']['nacional'] = $nacional;
                        $this->request->data['Ingreso']['monto'] = $regional;
                        $this->request->data['Ingreso']['tramite_id'] = $tramite;
                        $this->request->data['Ingreso']['sucursale_id'] = $idSucursal;
                        $this->request->data['Ingreso']['user_id'] = $idUsuer;
                        $this->Ingreso->save($this->request->data['Ingreso']);
                    }
                    $this->Session->setFlash('Se genero correctamente los pagos respectivos','msgbueno');
                    exit;
                }
                else{
                    $this->Session->setFlash('No se encontro una configuracion','msgerror');
                }
            }
            else{
                $this->Session->setFlash('Los campos estan vacios','msgerror');
            }
        }
        else{
            $this->Session->setFlash('Los campos estan vacios','msgerror');
        }
    }
    public function ajaxpago($idIngreso = null)
    {
        $this->layout = 'ajax';
        $this->Ingreso->id = $idIngreso;
        $this->request->data = $this->Ingreso->read();
        $cuentas =$this->Cuentasbancaria->find('list',array('fields' => 'Cuentasbancaria.cuenta'));
        $tramites = $this->Tramite->find('list',array('fields' => 'Tramite.nombre'));
        $sucursales = $this->Sucursale->find('list',array('fields' => 'Sucursale.nombre'));
        $this->set(compact('cuentas','tramites','sucursales'));
    }
    public function ajaxpagos()
    {
        $this->layout = 'ajax';
        $tipos = $this->Tipo->find('list',array('fields' => 'Tipo.nombre'));
        $tramites = $this->Tramite->find('list',array('fields' => 'Tramite.nombre'));
        $sucursales = $this->Sucursale->find('list',array('fields' => 'Sucursale.nombre'));
        $this->set(compact('cuentas','tramites','sucursales','tipos'));
    }
    public function ajaxpagoprop($idPropietario = null,$idTramite = null)
    {
        $this->layout = 'ajax';
        //debug($idPropietario);exit;
        $propietario = $this->Propietario->find('first',array('conditions' => array('Propietario.id' => $idPropietario),'fields' => 'Propietario.nombre'));
        $tramites = $this->Tramite->find('list',array('fields' => 'Tramite.nombre'));
        $sucursales = $this->Sucursale->find('list',array('fields' => 'Sucursale.nombre'));
        $this->set(compact('tramites','sucursales','idPropietario','propietario','idTramite'));
    }
    public function ajaxpagoservicio($idIngreso = null,$idPropietario = null,$idTramite = null)
    {
        $this->layout = 'ajax';
        //debug($idPropietario);exit;
        
        $this->Ingreso->id = $idIngreso;
        $this->request->data = $this->Ingreso->read();
        if(empty($this->request->data['Ingreso']['tramite_id']))
        {
            $this->request->data['Ingreso']['tramite_id'] = $idTramite;
        }
        //debug($this->request->data);exit;
        if(!empty($idPropietario))
        {
            $propietario = $this->Propietario->find('first',array('conditions' => array('Propietario.id' => $idPropietario),'fields' => 'Propietario.nombre'));
        }
        $tramites = $this->Tramite->find('list',array('fields' => 'Tramite.nombre'));
        $sucursales = $this->Sucursale->find('list',array('fields' => 'Sucursale.nombre'));
        $this->set(compact('tramites','sucursales','idPropietario','propietario','idTramite'));
    }
    
    public function elimina($idIngreso = null)
    {
        if($this->Ingreso->delete($idIngreso))
        {
            $this->Session->setFlash('Se elimino correctamnete!!!','msgbueno');
            $this->redirect(array('action' =>'index'));
        }
        else{
            $this->Session->setFlash('No se pudo eliminar!!!','msgerror');
            $this->redirect(array('action' =>'index'));
        }
    }
    public function listaexamenes()
    {
        $examenes = $this->Examene->find('all');
        $this->set(compact('examenes'));
    }
    public function nuevoexamen($idExamen = null)
    {
        $this->layout = 'ajax';
        $this->Examene->id = $idExamen;
        $this->request->data = $this->Examene->read();
    }
    public function guardaexamen()
    {
        if(!empty($this->request->data))
        {
            $this->Examene->create();
            $this->Examene->save($this->request->data['Examene']);
            $this->Session->setFlash('Se guardo correctamente!!!','msgbueno');
        }
        else{
            $this->Session->setFlash('No se pudo guardar!!!','msgerror');
        }
        $this->redirect($this->referer());
    }
    public function eliminaexamen($idExamen = null)
    {
        if($this->Examene->delete($idExamen))
        {
            $this->Session->setFlash('Se elimino correctamnete!!!' ,'msgbueno');
            
        }
        else{
            $this->Session->setFlash('No se puedo eliminar!!!','msgerror');
        }    
        $this->redirect($this->referer());
    }
    public function listacuentasbancarias()
    {
        $cuentas = $this->Cuentasbancaria->find('all');
        $this->set(compact('cuentas'));
    }
    public function nuevacuentabancaria($idCuenta = null)
    {
        $this->layout = 'ajax';
        $this->Cuentasbancaria->id = $idCuenta;
        $this->request->data = $this->Cuentasbancaria->read();
        
        $sucursales = $this->Sucursale->find('list',array('fields' => 'Sucursale.nombre'));
        $this->set(compact('sucursales'));
    }
    public function guardacuentab()
    {
        if(!empty($this->request->data))
        {
            $this->Cuentasbancaria->create();
            $this->Cuentasbancaria->save($this->request->data['Cuentasbancaria']);
            $this->Session->setFlash('Se guardo correctamente!!!','msgbueno');
        }
        else{
            $this->Session->setFlash('No se pudo guardar!!!','msgerror');
        }
        $this->redirect($this->referer());
    }
    public function eliminacuentab($idCuenta = null)
    {
        if($this->Cuentasbancaria->delete($idCuenta))
        {
            $this->Session->setFlash('Se elimino correctamnete!!!' ,'msgbueno');
            
        }
        else{
            $this->Session->setFlash('No se puedo eliminar!!!','msgerror');
        }    
        $this->redirect($this->referer());
    }
    public function listasucursales()
    {
        $sucursales = $this->Sucursale->find('all');
        $this->set(compact('sucursales'));
    }
    public function nuevasucursal($idSucursal = null)
    {
        $this->layout = 'ajax';
        $this->Sucursale->id = $idSucursal;
        $this->request->data = $this->Sucursale->read();
        $departamentos = $this->Departamento->find('list',array('fields' => 'Departamento.nombre'));
        $this->set(compact('departamentos'));
    }
    public function guardasucursal()
    {
        if(!empty($this->request->data))
        {
            //debug($this->request->data);exit;
            $valida = $this->validar('Sucursale');
            if(empty($valida))
            {
                $this->Sucursale->create();
                $this->Sucursale->save($this->request->data['Sucursale']);
                $this->Session->setFlash('Se guardo correctamente!!!','msgbueno');
            }
            else{
                $this->Session->setFlash($valida,'msgerror');
            }
        }
        else{
            $this->Session->setFlash('No se pudo guardar!!!','msgerror');
        }
        $this->redirect($this->referer());
    }
    public function eliminasucursal($idSucursal = null)
    {
        if($this->Sucursale->delete($idSucursal))
        {
            $this->Session->setFlash('Se elimino correctamnete!!!' ,'msgbueno');
            
        }
        else{
            $this->Session->setFlash('No se puedo eliminar!!!','msgerror');
        }    
        $this->redirect($this->referer());
    }
    public function get_pagos_pendientes()
    {
        return $this->Ingreso->find('count',array('conditions' => array('Ingreso.estado' => 0)));
       
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
?>