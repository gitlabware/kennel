<?php echo $this->Form->create('Mascota',array('action' => 'guarda_ajaxmascota/'.$idMascota.'/'.$generacion));?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Mascota</h3>
  </div>
  
  <div class="modal-body">
    <div class="row-fluid">
	
		<!-- Column -->
        
		<div class="span12">
		
            <!-- Widget -->
			<div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
				<!-- // Widget heading END -->
				<div class="widget-body">
                                    <?php if(!empty($mensajem)):?>
                                    <label style="color: red; font-weight: bold;"><?php echo $mensajem;?></label>
                                    <?php endif;?>
                <div id="divselectpadre">
                <h5>Seleccione el Padre del Ejemplar</h5>
                <div id="divselectpadreajax">
                <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'combomascotas1','Mascota.reproductor_id','divselectpadreajax'));?>');"> <?php if(!empty($this->request->data['Reproductor']['nombre_completo'])){echo $this->request->data['Reproductor']['nombre_completo'];}else{echo '<label style="color: red;">SELECCIONE AL PADRE</label>';}?> </a>
                </div>
                </div>
                                    <label style="color: blue;">Si es un ejemplar extranjero y no esta registrado puede registrarlo <a href="javascript:" class="label label-inverse" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'ajaxmascota',$idMascota,$generacion,1));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Registrar</a></label>
                <div id="divselectmadre">
                <h5>Seleccione la Madre del Ejemplar</h5>
                <div id="divselectmadreajax">
                <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'combomascotas1','Mascota.reproductora_id','divselectmadreajax'));?>');"> <?php if(!empty($this->request->data['Reproductora']['nombre_completo'])){echo $this->request->data['Reproductora']['nombre_completo'];}else{echo '<label style="color: red;">SELECCIONE LA MADRE</label>';}?> </a>
                </div>
                </div>
                <label style="color: blue;">Si es un ejemplar extranjero y no esta registrado puede registrarlo <a href="javascript:" class="label label-inverse" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'ajaxmascota',$idMascota,$generacion,2));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Registrar</a></label>
                </div>
            </div>
        </div>
    </div>
   </div>
   
   <div class="modal-footer">
    <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-primary'));?>
    <?php echo $this->Form->end()?>
                
  </div>
<script>
<?php if(!empty($tpadre) && !empty($idPadre)):?>
    <?php if($tpadre == 1):?>
        $('#divselectpadreajax').load('<?php echo $this->Html->url(array('action' => 'combomascotas3','Mascota.reproductor_id','divselectpadreajax',$idPadre));?>');
    <?php elseif($tpadre == 2):?>
        $('#divselectmadreajax').load('<?php echo $this->Html->url(array('action' => 'combomascotas3','Mascota.reproductora_id','divselectmadreajax',$idPadre));?>');
    <?php endif;?>
<?php endif;?>
</script>