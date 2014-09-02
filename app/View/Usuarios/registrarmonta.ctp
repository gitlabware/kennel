<?php //debug($this->request->data);exit;?>
<h3 align="center">Registrar denuncia de monta(Macho)</h3>
<div class="innerLR">
	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
        <?php echo $this->Form->create('Monta', array('class' => 'validate')); ?>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <?php echo $this->Form->hidden('Servicio.id');?>
        <?php echo $this->Form->hidden('id');?>
        <!--
        <h5>Propietario macho</h5>
        
        <div id="divselectpropajax">
        <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'combo1','Servicio.propietarioreproductor_id','divselectpropajax'));?>');"><?php echo $this->request->data['Propietarioreproductor']['nombre']?> </a>
        </div>
        <?php //echo $this->Form->select('Servicio.propietarioreproductor_id',$propietarios, array('id' => 'combobox1', 'class'=>'span12','required')); ?>
        -->
        </div>
        <div class="span6">
        <!--
        <h5>Propietario hembra</h5>
        <div id="divselectprophembraajax">
        <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'combo1','Servicio.propietarioreproductora_id','divselectprophembraajax'));?>');"><?php echo $this->request->data['Propietarioreproductora']['nombre']?> </a>
        </div>
        -->
        <?php //echo $this->Form->select('Servicio.propietarioreproductora_id',$propietarios, array('id' => 'combobox2', 'class' => 'span12','required')); ?>
        </div>
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Seleccione el macho</h5>
        <div id="divselectmacho">
        <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'combomascotas1','Servicio.reproductor_id','divselectmacho'));?>');"> <?php if(!empty($this->request->data['Reproductor']['nombre_completo'])){echo $this->request->data['Reproductor']['nombre_completo'];}else{echo 'SELECCIONE EL EJEMPLAR';}?> </a>
        </div>
        
        <?php //echo $this->Form->select('Servicio.reproductor_id', $mascotas,array('class' => 'span12','required')); ?>
        </div>
        <div class="span6">
        <h5>Seleccione la hembra</h5>
        <div id="divselecthembra">
        <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'combomascotas1','Servicio.reproductora_id','divselecthembra'));?>');"> <?php if(!empty($this->request->data['Reproductora']['nombre_completo'])){echo $this->request->data['Reproductora']['nombre_completo'];}else{echo 'SELECCIONE EL EJEMPLAR';}?> </a>
        </div>
        <?php //echo $this->Form->select('Servicio.reproductora_id', $mascotas,array('class' => 'span12','required')); ?>
        </div>
        </div>
        </div>
        
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Lugar</h5>
        <?php echo $this->Form->select('departamento_id', $departamentos, array('class'=> 'span12','required')); ?>
        </div>
        <div class="span6">
        <h5>Fecha (A&ntilde;o-mes-dia)</h5>
        <?php echo $this->Form->text('fecha_denuncia', array('id' => 'date1','class' =>'span12','required','id' => 'idfecha_denuncia')) ?>
        <script>
                $(function(){
                    $("#idfecha_denuncia").inputmask("y-m-d", {autoUnmask: true});
                });
                </script>
        </div>
        </div>
        </div>
        
        </div>
        
    </div>
    
    <div class="widget row-fluid widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
	
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 align="center">Acta de Compromiso</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
                <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                <h5>Cachorros (en caso de entregar un numero)</h5>
                <?php echo $this->Form->text('Servicio.numcachorros', array('class' =>"span12",'required')); ?>
                </div>
                <div class="span4">
                <h5>Bolivianos o $us</h5>
                <?php echo $this->Form->text('Servicio.bs', array('class' =>"span12",'required')); ?>
                </div>
                <div class="span4">
                <h5>Otros</h5>
                <?php echo $this->Form->text('Servicio.otros', array('class' =>"span12")); ?>
                </div>
                </div>
                </div>
				
                <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                <h5>No. Machos</h5>
                <?php echo $this->Form->text('Servicio.num_macho',array('class'=> 'span12'))?>
                </div>
                <div class="span4">
                <h5>No. Hembras</h5>
                <?php echo $this->Form->text('Servicio.num_hembra',array('class'=> 'span12'))?>
                </div>
                <div class="span4">
                <h5>Hasta fecha si es efectivo (A&ntilde;o-mes-dia)</h5>
                <?php echo $this->Form->text('Servicio.fecha_hasta',array('class'=> 'span12','required','id' => 'idfecha_hasta'))?>
                <script>
                $(function(){
                    $("#idfecha_hasta").inputmask("y-m-d", {autoUnmask: true});
                });
                </script>
                </div>
                </div>
                </div>
				</div>
	</div>
    
    <div class="widget row-fluid widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
	
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 align="center">Datos para verificar con documento fisico</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
                <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                <h5>Lugar</h5>
                
                <?php echo $this->Form->select('departamento_id2',$departamentos,array('class' =>'span12','required')); ?>
                </div>
                <div class="span4">
                    <h5><span style="color: red;">*</span>Fecha (A&ntilde;o-mes-dia)</h5>
                <?php echo $this->Form->text('fecha', array('id' => 'fecha', 'class'=>'span12','required','id' => 'idfecha')); ?>
                <script>
                $(function(){
                    $("#idfecha").inputmask("y-m-d", {autoUnmask: true});
                });
                </script>
                </div>
                <div class="span4">
                <h5>Recibo</h5>
                <?php echo $this->Form->text('recibo',array('class' => 'span12','disabled'));?>
                </div>
                
                </div>
                </div>
				
				</div>
                
                
	</div>
    
    <div class="widget row-fluid widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
	
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 class="heading">Datos para verificar con documento fisico</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
                <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                <h5>Firma propietario hembra (Aclaraci&oacute;n de Firma)</h5>
                <?php echo $this->Form->checkbox('firma_propietario_hembra',array('class' =>'span12')); ?>
                </div>
                <div class="span4">
                <h5>Firma propietario macho (Aclaraci&oacute;n de Firma)</h5>
                <?php echo $this->Form->checkbox('firma_propietario_macho',array('class' =>'span12')); ?>
                </div>
                <div class="span4">
                <h5>Firma Recetor REGIONAL    (Aclaraci&oacute;n de Firma)</h5>
                <?php echo $this->Form->checkbox('firma_sello_recetor_regional',array('class' =>'span12')); ?>
                </div>
                </div>
                </div>
				</div>
                
                
	</div>
    
    <div class="widget row-fluid widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
                <div class="widget-body">
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <?php //echo $this->Form->submit('Atras',array('controller'=>'Denunciaservicio','action'=>'index','class' => 'btn btn-block btn-success'));?>
                </div>
                <div class="span6">
                <?php echo $this->Form->submit('Enviar',array('class' => 'btn btn-block btn-success'));?>
                </div>
                </div>
                </div>
                </div>
    </div>
</div>