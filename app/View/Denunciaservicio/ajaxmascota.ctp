<div>
<?php if($tipo): ?>
<?php echo $this->Form->select('Servicio.reproductor_id', $mascotas,array('class' => 'span12'))?>
<?php else: ?>
<?php echo $this->Form->select('Servicio.reproductora_id', $mascotas,array('class' => 'span12'))?>
<?php endif; ?>
</div>