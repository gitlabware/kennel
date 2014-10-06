<?php echo $this->Form->create('Evento',array('controller' => 'Eventos','action' => 'actualiza',$idEvento));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Editar Pista</h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
    <div class="span12">
    <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
        <div class="row-fluid">
            <div class="span12">
                <div class="span6">
                    <h5>Nro de pista</h5>
                    <?php echo $this->Form->text('EventosPista.numero',array('required','class' => 'span12','type' => 'number')); ?>
                    <?php echo $this->Form->hidden('EventosPista.evento_id',array('value' => $idEvento)); ?>
                    <?php echo $this->Form->hidden('EventosPista.id'); ?>
                </div>
                <div class="span6">
                    <h5>Expocicion</h5>
                    <?php echo $this->Form->select('EventosPista.pista_id',$selecpistas,array('required','class' => 'span12')); ?>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <h5>Juez</h5>
                <?php echo $this->Form->text('EventosPista.juez',array('required','class' => 'span12')); ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="span6">
                    <h5>Fecha</h5>
                    <?php echo $this->Form->date('EventosPista.fecha',array('required','class' => 'span12')); ?>
                </div>
                <div class="span6">
                    <h5>Hora</h5>
                    <?php echo $this->Form->text('EventosPista.hora', array( 'type' => 'time', 'required', 'data-date-relative' => 'now','class' => 'span12')); ?>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="span6">
                    <?php echo $this->Html->link('Eliminar',array('action' => 'eliminapista',$this->request->data['EventosPista']['id']),array('class' => 'btn btn-danger span12','confirm' => 'Esta seguro de eliminar la pista???'))?>
                </div>
                <div class="span6">
                    <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary span12'));?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
  </div>
<?php echo $this->Form->end()?>
