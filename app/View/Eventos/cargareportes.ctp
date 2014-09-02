<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>REPORTES <?php echo $ano;?></h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
    <div class="span12">
    <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
				<!-- // Widget heading END -->
				<div class="widget-body">
                <div class="row-fluid">
                <div class="span12">
                <?php echo $this->Html->link('GENERAL CJC-CAC-CGC-CACLAB-CACIB',array('action' => 'reportegeneral',0,$ano),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING ABSOLUTOS',array('action' => 'ranking_absolutos',0,$ano),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING ABSOLUTOS x RAZAS',array('action' => 'ranking_razas_absolutos',0,$ano),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING ESPECIALES',array('action' => 'ranking_especiales',0,$ano),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING ESPECIALES x RAZAS',array('action' => 'ranking_razas_especiales',0,$ano),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING JOVENES',array('action' => 'ranking_jovenes',0,$ano),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING JOVENES x RAZAS',array('action' => 'ranking_razas_jovenes',0,$ano),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING ADULTOS',array('action' => 'ranking_adultos',0,$ano),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING ADULTOS X RAZAS',array('action' => 'ranking_razas_adultos',0,$ano),array('class' => 'btn btn-block btn-primary'));?>
                </div>
                </div>
                </div>
    </div>
    </div>
    </div>
  </div>
  <div class="modal-footer">
  <a href="#" class="btn btn-block btn-inverse" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('action' => 'reportesanuales'));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">REGRESAR</a>
    
  </div>