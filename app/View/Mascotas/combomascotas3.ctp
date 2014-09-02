
<?php if(!empty($smascota['Mascota']['id'])):?>
    <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'combomascotas1',$campoform,$div));?>');"> <?php echo $smascota['Mascota']['nombre_completo'];?> </a>
    <?php echo $this->Form->hidden($campoform,array('value' => $smascota['Mascota']['id']));?>
<?php else:?>
    <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'combomascotas1',$campoform,$div));?>');"> <?php echo 'SELECCIONE EL EJEMPLAR';?> </a>
    <?php echo $this->Form->hidden($campoform,array('value' => null));?>
<?php endif; ?>
