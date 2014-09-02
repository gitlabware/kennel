<h3>Denuncia de Nacimiento</h3>
<div class="innerLR">
	<!-- Widget -->
      <?php echo $this->Form->create('Denuncianacimiento'); ?>
      <?php echo $this->Form->hidden('id');?>
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
        <div class="row-fluid">
        <div class="span12">
        <div class="span4">
        <h5>En Fecha (A&ntilde;o-mes-dia)</h5>
        <?php echo $this->Form->text('fecha_denuncia', array('id'=>'idfecha_denuncia','class' => 'span12','required')); ?>
        <script>
                $(function(){
                    $("#idfecha_denuncia").inputmask("y-m-d", {autoUnmask: true});
                });
                </script>
        </div>
        <div class="span4">
        <h5>En el criadero</h5>
        <?php echo $this->Form->select('criadero_id', $criaderos,array('class' => 'span12','required')); ?> 
        </div>
        <div class="span4">
        <h5># Cachorros</h5>
        <?php echo $this->Form->text('numero_cachorros', array('class' =>'span12','required')); ?>
        </div>
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span4">
        <h5># Machos muertos</h5>
        <?php echo $this->Form->text('num_muertos_machos', array('class' => 'span12','required')); ?>
        </div>
        <div class="span4">
        <h5># Hembras muertas</h5>
        <?php echo $this->Form->text('num_muertos_hembras', array('class' => 'span12','required')); ?>
        </div>
        <div class="span4">
        <h5># Machos vivos</h5>
        <?php echo $this->Form->text('num_vivos_machos', array('class' => 'span12','required')); ?>
        </div>
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span4">
        <h5># Hembras vivas</h5>
        <?php echo $this->Form->text('num_vivos_hembras', array('class' => 'span12','required')); ?>
        </div>
        <div class="span4">
        <h5># Machos sacrificados</h5>
        <?php echo $this->Form->text('num_sacrificados_machos', array('class' => 'span12','required')); ?>
        </div>
        <div class="span4">
        <h5># Hembras sacrificadas</h5>
        <?php echo $this->Form->text('num_sacrificados_hembras', array('class' => 'span12','required')); ?>
        </div>
        </div>
        </div>
        <h5>Por que</h5>
        <?php echo $this->Form->textarea('razon_sacrificio',array('class' => 'span12')); ?>
        
        </div>
    </div>
    
    <div class="widget row-fluid widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
	
				<div class="widget-head">
					<h4 class="heading">Datos para corrobar KCB</h4>
				</div>
				<div class="widget-body">
                <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                <h5>Lugar</h5>
                <?php echo $this->Form->select('departamento_id', $departamentos,array('class' => 'span12','required')); ?>
                </div>
                <div class="span4">
                <h5>Fecha (A&ntilde;o-mes-dia)</h5>
                <?php echo $this->Form->text('fecha_registro', array('id' => 'idfecha_registro','class' => 'span12','required')); ?>
                <script>
                $(function(){
                    $("#idfecha_registro").inputmask("y-m-d", {autoUnmask: true});
                });
                </script>
                </div>
                
                <div class="span4">
                <h5>Recibo</h5>
                <?php echo $this->Form->text('recibo',array('class' => 'span12','disabled'));?>
                </div>
                
                </div>
                </div>
                <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                <h5>Sello Regional</h5>
                <?php echo $this->Form->checkbox('sello_regional',array('class' => 'span12')) ?>
                </div>
                <div class="span4">
                <h5>Firma Prop. Hembra(Aclaraci&oacute;n de Firma)</h5>
                <?php echo $this->Form->checkbox('firma_prop_hembra',array('class' => 'span12')) ?>
                </div>
                <div class="span4">
                <h5>Firma Recetor REGIONAL(Aclaraci&oacute;n de Firma)</h5>
                <?php echo $this->Form->checkbox('firma_recetor_regional',array('class' => 'span12')) ?>
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
    <?php echo $this->Form->end();?>
</div>