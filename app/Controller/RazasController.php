<?php 
class RazasController extends AppController{
    public $layout = 'kennel';
    public $uses = array('Raza');
    public function index()
    {
        $razas=$this->Raza->find('all', array('recursive'=>-1,'order'=>'Raza.id DESC'));
        //debug($razas);exit;
	    $this->set(compact('razas'));
    }
    function insertar($id = null){
        if(!empty($this->data)){
            $this->Raza->create();
            
            if($this->Raza->save($this->request->data)){
                
                $this->Session->setFlash("Se guardo correctamente!!",'msgbueno');
                $this->redirect(array('action'=>'index'), null, true);
            }else{
                $this->Session->setFlash("No se pudo guardar",'msgerror');
                $this->redirect(array('action'=>'index'), null, true);
            }
        }
    }
     public function elimina($id = null){
        if (!$id) {
            $this->Session->setFlash('id Invalida para borrar','msginfo');
            $this->redirect(array('action' => 'index'));
        }
        if ($this->Raza->delete($id)) {
           $this->Session->setFlash('la raza ' . $id . ' fue borrada','msgbueno');
           $this->redirect(array('action' => 'index'));
        }

    }
    public function ajaxraza($id = null)
    {
        //debug($id);exit;
        $this->layout = 'ajax';
        if(!empty($id))
        {
           $this->Raza->id = $id;
           $this->request->data = $this->Raza->read(); 
        }
        
    }
    public function guardaraza()
    {
        //debug($this->request->data);exit;
        if(!empty($this->request->data))
        {
            $this->Raza->create();
            if($this->Raza->save($this->request->data))
            {
                $this->Session->setFlash('Se guardo correctamente!!!','msgbueno');
                $this->redirect($this->referer());
            }
            else{
                $this->Session->setFlash('No se guardo!!!','msgerror');
                $this->redirect($this->referer());
            }
        }
        else{
            $this->Session->setFlash('No se guardo!!!','msgerror');
                $this->redirect($this->referer());
        }
    }
}
?>