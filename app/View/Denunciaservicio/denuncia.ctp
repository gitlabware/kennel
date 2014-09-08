<h3>Denuncia de Nacimiento</h3>
<div class="innerLR">
	<!-- Widget -->
      <?php echo $this->Form->create('Denuncianacimiento',array('id' => 'registroservicio')); ?>
      <?php echo $this->Form->hidden('id');?>
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
        <div class="row-fluid">
        <div class="span12">
        <div class="span4">
        <h5>En Fecha</h5>
        <?php echo $this->Form->date('fecha_denuncia', array('id'=>'date','class' => 'span12','required')); ?>
        </div>
        <div class="span4">
        <h5>En el criadero</h5>
        <?php echo $this->Form->select('criadero_id', $criaderos,array('class' => 'span12', 'required')); ?> 
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
        <h5>Direccion (Donde se encuentra la camada)</h5>
        <?php echo $this->Form->text('direccion', array('class' => 'span12','required')); ?>
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
                <h5>Fecha</h5>
                <?php echo $this->Form->date('fecha_registro', array('id' => 'date2','class' => 'span12','required')); ?>
                </div>
                <div class="span4">
                <h5>Recibo</h5>
                <a href="#myModal" data-toggle="modal" onclick="paga(<?php echo $idPropietario;?>)">
                    <?php echo $this->Form->text('recibo', array('class' =>"span12",'required','id' => 'idrecibo')); ?>
                </a>
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
                 <?php echo $this->Html->link('Atras',array('controller'=>'Denunciaservicio','action'=>'index'),array('class' => 'btn btn-block btn-success'));?>
                </div>
                <div class="span6">
                    <?php echo $this->Form->hidden('Servicio.activa',array('id' => 'idactiva','value' => 0));?>
                    <?php echo $this->Form->hidden('ingreso_id',array('id' => 'idingreso_id'));?>
                <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-block btn-success'));?>
                </div>
                </div>
                </div>
                </div>
    </div>
    <?php echo $this->Form->end();?>
</div>
<?php 
if(empty($this->request->data['Denuncianacimiento']['ingreso_id']))
{
    $idIngreso = 0;
}
else{
    $idIngreso = $this->request->data['Denuncianacimiento']['ingreso_id'];
}
?>
<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
<script>
    
    function paga(aux)
    {
        $('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Cuentas','action' => 'ajaxpagoservicio',$idIngreso));?>/'+aux+'/8',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});
    }
    
</script>