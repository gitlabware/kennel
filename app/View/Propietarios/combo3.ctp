
<?php if(!empty($propietario['Propietario']['id'])):?>
    <?php echo $this->Form->hidden($campoform,array('value' => $propietario['Propietario']['id']));?>
<a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'combo1',$campoform,$div));?>');"> <?php echo $propietario['Propietario']['nombre'];?> </a>
<?php else:?>
    <?php echo $this->Form->hidden($campoform,array('value' => null));?>
<a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'combo1',$campoform,$div));?>');"> <?php echo 'SELECCIONE AL PROPIETARIO';?> </a>
<?php endif;?>