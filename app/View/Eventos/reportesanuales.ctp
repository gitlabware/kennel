<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Reportes Evento</h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
    <div class="span12">
    <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
				<!-- // Widget heading END -->
				<div class="widget-body">
                <div class="row-fluid">
                <div class="span12">
                <?php 
                foreach($anos as $an):
                ?>
                <a href="#" class="btn btn-block btn-primary" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('action' => 'cargareportes',$an));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">REPORTE <?php echo $an?></a>
                <?php //echo $this->Html->link('REPORTE '.$an,array('action' => 'ranking_absolutos'),array('class' => 'btn btn-block btn-primary'));?>
                <?php endforeach;?>
                </div>
                </div>
                </div>
    </div>
    </div>
    </div>
  </div>
  <div class="modal-footer">
    
  </div>