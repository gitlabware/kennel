<?php echo $this->Form->create('Criadero',array('id' => 'formularioseleccriadero'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Seleccione el Criadero</h3>
  </div>
  
  <div class="modal-body">
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Busque el Criadero</h5>
        </div>
        <div class="span6">
        <?php echo $this->Form->text('nombre',array('class' =>'span12','placeholder' => 'Ingrese el nombre del criadero','id' => 'combobuscacriaderotext'));?>
        </div>
        </div>
        </div>
        <div id="listadocombocriaderos">
        
        </div>
        </div>
    </div>
  </div>
  
 <script>
 $(document).ready(function(){
  $("#formularioseleccriadero").submit(function() {
    return false;		
    });
});
 </script>
  <?php 
  echo $this->Js->get('#combobuscacriaderotext')->event(
  'keyup',
  $this->Js->request(
                                                array('action' => 'combo2',$campoform,$div),
                                                array('async' => true,
                                                'update' => '#listadocombocriaderos',
                                                'method' => 'post','dataExpression'=>true,
                                                'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true))))
  );
  
  ?>
  <?php echo $this->Form->end()?>