<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Razas</h3>
  </div>
  <div class="modal-body">
  <!-- Widget -->
		<div class="widget widget-heading-simple widget-body-gray">
			<div class="widget-body">
            <div id="cargaraza">
            <?php echo $this->Form->create('Criadero',array('action' => 'guardaraza'));?>
            <div class="row-fluid">
            <div class="span12">
            <div class="span9">
            <?php echo $this->Form->select('CriaderosRaza.raza_id',$razas,array('class' => 'span12'));?>
            <?php echo $this->Form->hidden('CriaderosRaza.criadero_id',array('value' => $idCriadero));?>
            </div>
            <div class="span3">
            <?php //echo $this->Form->submit('Add',array('class' => 'btn btn-block btn-success'));?>
            <?php
                    echo $this->Js->submit('Add', array(
                        'url' => array(
                            'action' => 'guardaraza'
                        ),
                        'before' => "$('#imgcargando').toggle();$('#mimodal').toggle();",
                        'update' => '#mimodal',
                        'success' => "$('#imgcargando').toggle(100);$('#mimodal').toggle();",
                        'class' => 'btn btn-success span12'
                    )
                );
                    ?>
            </div>
            </div>
            </div>
            <?php echo $this->Form->end();?>
            </div>
            <table class="table table-bordered table-white">
                <thead>
                <tr>
                <th>Raza</th>
                <th>Accion</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($razascria as $ra):?>
                <tr>
                <td><?php echo $ra['Raza']['nombre']?></td>
                <td><a href="javascript:" class="label label-important" onclick="if(confirm('Esta seguro de aliminar??')){$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('action' => 'eliminaraza',$idCriadero,$ra['CriaderosRaza']['id']));?>');$('#imgcargando').toggle(100);$('#mimodal').toggle();}else{}">Eliminar</a></td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
   </div>