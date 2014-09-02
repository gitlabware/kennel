<?php 
class ReportesController extends AppController{
    public $layout = 'kennel';
    public $uses = array('Sucursale','Ingreso','sucursal','Raza','Departamento','Mascota');
    var $components = array('RequestHandler');
    public function index()
    {
        $sucursales = $this->Sucursale->find('list',array('fields' => 'Sucursale.nombre'));
        $razas = $this->Raza->find('list',array('fields' => 'Raza.nombre_completo'));
        
        $this->set(compact('sucursales','razas'));
    }
    public function reportepagos()
    {
        $fechaini = $this->request->data['Reporte']['fecha_ini'];
        $fechafin = $this->request->data['Reporte']['fecha_fin'];
        $sucursalid = $this->request->data['Reporte']['sucursale_id'];
        $tipo = $this->request->data['Reporte']['tipo_id'];
        $condiciones = array();
        $condiciones['Ingreso.estado'] = 1;
        if(!empty($fechaini) && !empty($fechafin))
        {
            $condiciones['date(Ingreso.created) BETWEEN ? AND ?'] = array($fechaini,$fechafin);
        }
        if(!empty($sucursalid))
        {
            $condiciones['Ingreso.sucursale_id'] = $sucursalid;
        }
        $sucursal = $this->Sucursale->findByid($sucursalid,null,null,null,null,-1);
        $pagos = $this->Ingreso->find('all',array('conditions' => $condiciones));
        //debug($pagos);exit;
        $this->set(compact('pagos','fechaini','fechafin','sucursal','tipo'));
    }
    public function panel()
    {
        //$ingresos = $this->Ingreso->find('all',array('recursive' => -1,'conditions' => array('estado' => 1)));
        //debug($ingresos);exit;
        $datos = array();
        $sucursales = $this->Sucursale->find('all');
        $i = 0;
        foreach ($sucursales as $su)
        {
            $ingresos = $this->Ingreso->find('all',array('recursive' => -1
                ,'conditions' => array('Ingreso.sucursale_id' => $su['Sucursale']['id'],'estado' => 1)
                ,'fields' => array('Ingreso.monto as total','date(Ingreso.created) fecha')
                
                ));
            $datos[$i]['id'] = $su['Sucursale']['id'];
            $datos[$i]['sucursal'] = $su['Sucursale']['nombre'];
            $datos[$i]['ingresos'] = $ingresos;
            $i++;
        }
        $ingresos = $this->Ingreso->find('all',array('recursive' => -1
                ,'conditions' => array('estado' => 1)
                ,'fields' => array('Ingreso.nacional as total','date(Ingreso.created) fecha')
                
                ));
        $datos[$i]['id'] = 0;
            $datos[$i]['sucursal'] = 'Nacional';
            $datos[$i]['ingresos'] = $ingresos;
        //debug($datos);exit;
        $razas = $this->Raza->find('list',array('fields' => 'Raza.nombre_completo','order' => 'Raza.nombre_completo ASC'));
        $departamentos = $this->Departamento->find('list',array('fields' => 'Departamento.nombre'));
        $this->set(compact('datos','departamentos','razas'));
    }
    public function consulta_ejemplar()
    {
        $this->layout = 'ajax';
        $condiciones = array();
        if(!empty($this->request->data['Mascota']))
        {
            //debug($this->request->data['Mascota']);exit;
            if(!empty($this->request->data['Mascota']['raza_id']))
            {
                $condiciones['Mascota.raza_id'] = $this->request->data['Mascota']['raza_id'];
            }
            if(!empty($this->request->data['Mascota']['sexo']))
            {
                $condiciones['Mascota.sexo'] = $this->request->data['Mascota']['sexo'];
            }
            if(!empty($this->request->data['Mascota']['departamento_id']))
            {
                $condiciones['Mascota.departamento_id'] = $this->request->data['Mascota']['departamento_id'];
            }
            $condiciones['Mascota.kcb !='] = array('NULL','nulo','null');
            $condiciones['Mascota.estado'] = 1;
            $condiciones['Mascota.solicitud !='] = 1;
            $numero = $this->Mascota->find('count',array('recursive' => -1,'conditions' => $condiciones));
        }
        else{
            $numero = 0;
        }
        $array['numero'] = $numero;
        $this->respond($array, true);
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