<?php //debug($this->request->data);exit;?>
<h3 align="center">Registro de Denuncia de Servicio</h3>
<div class="innerLR">
	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
        <?php echo $this->Form->create('Servicio'); ?>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <?php //echo $this->Form->hidden('Servicio.id');?>
        <?php echo $this->Form->hidden('id');?>
        <!--
        <h5>Propietario macho</h5>
        
        <div id="divselectpropajax">
        <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'combo1','Servicio.propietarioreproductor_id','divselectpropajax'));?>');"><?php echo $this->request->data['Propietarioreproductor']['nombre']?> </a>
        </div>
        -->
        <?php //echo $this->Form->select('Servicio.propietarioreproductor_id',$propietarios, array('id' => 'combobox1', 'class'=>'span12','required')); ?>
        </div>
        <div class="span6">
            <!--
        <h5>Propietario hembra</h5>
        <div id="divselectprophembraajax">
        <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Propietarios','action' => 'combo1','Servicio.propietarioreproductora_id','divselectprophembraajax'));?>');"><?php echo $this->request->data['Propietarioreproductora']['nombre']?> </a>
        </div>-->
        <?php //echo $this->Form->select('Servicio.propietarioreproductora_id',$propietarios, array('id' => 'combobox2', 'class' => 'span12','required')); ?>
        </div>
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Seleccione el Macho</h5>
        <div id="divselectmacho">
        <?php echo $this->Form->select('Servicio.reproductor_id',$mismachos,array('class' => 'selectpicker span12', 'data-style' => 'btn-success'));?>
        </div>
        
        <?php //echo $this->Form->select('Servicio.reproductor_id', $mascotas,array('class' => 'span12','required')); ?>
        </div>
        <div class="span6">
        <h5>Seleccione la Hembra</h5>
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
        <?php echo $this->Form->text('fecha_denuncia', array('id' => 'idfecha_denuncia','class' =>'span12','required')) ?>
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
					<h4 align="center">Acta de compromiso</h4>
				</div>
				<!-- // Widget heading END -->
				
				<div class="widget-body">
                <div class="row-fluid">
                <div class="span12">
                <div class="span3">
                <h5>Cachorros (Numero)</h5>
                <?php echo $this->Form->text('Servicio.numcachorros', array('class' =>"span12")); ?>
                </div>
                <div class="span3">
                <h5>Bolivianos o $us</h5>
                <?php echo $this->Form->text('Servicio.bs', array('class' =>"span12")); ?>
                </div>
                <div class="span3">
                <h5>Otros</h5>
                <?php echo $this->Form->text('Servicio.otros', array('class' =>"span12")); ?>
                </div>
                <div class="span3">
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
<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>


