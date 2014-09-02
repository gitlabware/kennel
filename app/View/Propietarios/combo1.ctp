<?php echo $this->Form->create('Propietario',array('id' => 'formularioselecpropietario'));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Seleccione el Propietario</h3>
  </div>
  
  <div class="modal-body">
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Busque el Porpietario</h5>
        </div>
        <div class="span6">
        <?php echo $this->Form->text('nombre',array('class' =>'span12','placeholder' => 'Ingrese el nombre del propietario','id' => 'combobuscapropietariotext'));?>
        </div>
        </div>
        </div>
            <div class="row-fluid">
                <div class="span12">
                    <a class="label label-inverse" onclick="$('#<?php echo $div;?>').load('<?php echo $this->Html->url(array('action' => 'combo3',$campoform,$div,null));?>');$('#modalsel').modal('toggle');">NINGUNO</a>
                </div>
            </div>
        <div id="listadocombopropietarios">
        
        </div>
        </div>
    </div>
  </div>
  
 <script>
 $(document).ready(function(){
  $("#formularioselecpropietario").submit(function() {
    return false;		
    });
});
 </script>
  <?php 
  echo $this->Js->get('#combobuscapropietariotext')->event(
  'keyup',
  $this->Js->request(
                                                array('action' => 'combo2',$campoform,$div),
                                                array('async' => true,
                                                'update' => '#listadocombopropietarios',
                                                'method' => 'post','dataExpression'=>true,
                                                'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true))))
  );
  
  ?>
  <?php echo $this->Form->end()?>