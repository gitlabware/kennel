<?php //debug($this->request->data);exit;?>
<h3 align="center">Registrar denuncia de monta(Macho)</h3>
<div class="innerLR">
	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
        <?php echo $this->Form->create('Monta', array('class' => 'validate','id' => 'registroservicio'));?>
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
        -->
        <?php //echo $this->Form->select('Servicio.propietarioreproductor_id',$propietarios, array('id' => 'combobox1', 'class'=>'span12','required')); ?>
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
        <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'combomascotas1','Servicio.reproductor_id','divselectmacho'));?>');"> <?php if(empty($this->request->data['Reproductor']['nombre_completo'])){echo 'SELECCIONE AL MACHO';}else{echo $this->request->data['Reproductor']['nombre_completo'];}?> </a>
        </div>
        
        <?php //echo $this->Form->select('Servicio.reproductor_id', $mascotas,array('class' => 'span12','required')); ?>
        </div>
        <div class="span6">
        <h5>Seleccione la hembra</h5>
        <div id="divselecthembra">
        <a href="#modalsel" data-toggle="modal" class="btn btn-block btn-primary" onclick="$('#modalsele').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'combomascotas1','Servicio.reproductora_id','divselecthembra'));?>');"> <?php if(empty($this->request->data['Reproductora']['nombre_completo'])){echo 'SELECCIONE LA HEMBRA';}else{echo $this->request->data['Reproductora']['nombre_completo'];}?> </a>
        </div>
        <?php //echo $this->Form->select('Servicio.reproductora_id', $mascotas,array('class' => 'span12','required')); ?>
        </div>
        </div>
        </div>
        
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Lugar</h5>
        <?php echo $this->Form->select('departamento_id', $departamentos, array('class'=> 'span12')); ?>
        </div>
        <div class="span6">
        <h5>Fecha</h5>
        <?php echo $this->Form->date('fecha_denuncia', array('id' => 'date1','class' =>'span12')) ?>
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
                <h5>Hasta fecha si es efectivo</h5>
                <?php echo $this->Form->date('Servicio.fecha_hasta',array('class'=> 'span12'))?>
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
                <h5>Fecha</h5>
                <?php echo $this->Form->date('fecha', array('id' => 'fecha', 'class'=>'span12','required')); ?>
                </div>
                <div class="span4">
                <?php if(!empty($idPropietario)):?>
                <h5>Recibo</h5>
                <a  href="#myModal" data-toggle="modal" onclick="paga(<?php echo $idPropietario;?>)">
                    <?php echo $this->Form->text('recibo', array('class' =>"span12",'id' => 'idrecibo')); ?>
                </a>
                <?php endif;?>
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
                <div class="span3 text-right text-info">
                    SALIR AL GUARDAR
                </div>
                    <div class="span3">
                            <?php echo $this->Form->checkbox('Servicio.activa',array('checked','class' => 'span12','id' => 'idactiva'))?>
                    </div>
                <div class="span6">
                
                <?php echo $this->Form->hidden('ingreso_id',array('id' => 'idingreso_id'));?>
                <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-block btn-success'));?>
                </div>
                </div>
                </div>
                </div>
    </div>
</div>
<?php 
if(empty($this->request->data['Monta']['ingreso_id']))
{
    $idIngreso = 0;
}
else{
    $idIngreso = $this->request->data['Monta']['ingreso_id'];
}
?>
<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
<script>
    
    function paga(aux)
    {
        $('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Cuentas','action' => 'ajaxpagoservicio',$idIngreso));?>/'+aux+'/8',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});
    }
    
</script>