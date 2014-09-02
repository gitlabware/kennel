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
                <?php echo $this->Html->link('GENERAL CJC-CAC-CGC-CACLAB-CACIB',array('action' => 'reportegeneral',$idEvento),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING ABSOLUTOS',array('action' => 'ranking_absolutos',$idEvento),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING ABSOLUTOS x RAZAS',array('action' => 'ranking_razas_absolutos',$idEvento),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING ESPECIALES',array('action' => 'ranking_especiales',$idEvento),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING ESPECIALES x RAZAS',array('action' => 'ranking_razas_especiales',$idEvento),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING JOVENES',array('action' => 'ranking_jovenes',$idEvento),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING JOVENES x RAZAS',array('action' => 'ranking_razas_jovenes',$idEvento),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING ADULTOS',array('action' => 'ranking_adultos',$idEvento),array('class' => 'btn btn-block btn-primary'));?>
                <?php echo $this->Html->link('RANKING ADULTOS X RAZAS',array('action' => 'ranking_razas_adultos',$idEvento),array('class' => 'btn btn-block btn-primary'));?>
                </div>
                </div>
                </div>
    </div>
    </div>
    </div>
  </div>
  <div class="modal-footer">
    
  </div>