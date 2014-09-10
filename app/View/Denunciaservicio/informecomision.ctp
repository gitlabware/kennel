<?php
App::Import('Model', 'Observacionesinformecomcria');
$observacionesinf = new Observacionesinformecomcria();
?>
<h3 align="center">Informe de Comision</h3>
<div class="innerLR">
	<!-- Widget -->
      <?php echo $this->Form->create('Informecomcria',array('id' => 'registroservicio')); ?>
      <?php echo $this->Form->hidden('id');?>
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
        <h5>Nombre Responsable (Sub-Comision de Cria)</h5>
        <?php echo $this->Form->text("responsablec", array("class" =>"span12",'required')); ?>
        
        <div class="row-fluid">
        <div class="span12 center">
        <h5>Nombre Propietario camada</h5>
        <?php echo $camada['Criadero']['Propietario']['nombre']?>
        
        </div>
        </div>
        </div>
        
    </div>
    
    <div class="widget row-fluid widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
	
				<!-- Widget heading -->
				<div class="widget-head">
					<h4 align="center">DATOS DE LA CAMADA</h4>
				</div>
				<!-- // Widget heading END -->
				<?php echo $this->Form->hidden('camada_id', array('value'=>$camada['Camada']['id']))?>
                <?php echo $this->Form->hidden('denuncianacimiento_id', array('value'=>$camada['Denuncianacimiento']['id']))?>
				<div class="widget-body">
                <div class="row-fluid">
                <div class="span12">
                <div class="span4 center">
                <h5><strong>Fecha de nacimiento de la Camada</strong></h5>
                <?php $fecha_nac=explode('-',$camada['Camada']['fecha_nacimiento']) ;
        										echo $fecha_nac[2].'/'.$fecha_nac[1].'/'.$fecha_nac[0];?>
                </div>
                <div class="span4 center">
                <h5><strong>Camada</strong></h5>
                <?php echo $camada['Camada']['camada'];?>
                </div>
                <div class="span4 center">
                <h5><strong>Lechigada</strong></h5>
                <?php echo $camada['Camada']['lechigada'];?>
                </div>
                </div>
                </div>
                <div class="row-fluid">
                <div class="span12">
                <div class="span4 center">
                <h5><strong>Numero de Parto de la Madre</strong></h5>
                <?php echo $camada['Camada']['numpartomadre'];?>
                </div>
                <div class="span4 center">
                <h5><strong>Cachorros encontrados con la Madre No.</strong></h5>
                <?php echo $camada['Camada']['cachorrosencontrados'];?>
                </div>
                </div>
                </div>
                <div class="row-fluid">
                <div class="span12">
                <div class="span3 center">
                <h5><strong>Total cachorros</strong></h5>
                <?php echo $camada['Denuncianacimiento']['numero_cachorros'];?>
                </div>
                <div class="span3 center">
                <h5><strong>Total vivos</strong></h5>
                <?php echo $camada['Denuncianacimiento']['numero_cachorros'];?>
                </div>
                <div class="span3 center">
                <h5><strong>Machos</strong></h5>
                <?php echo $camada['Denuncianacimiento']['num_vivos_machos'];?>
                </div>
                <div class="span3 center">
                <h5><strong>Hembras</strong></h5>
                <?php echo $camada['Denuncianacimiento']['num_vivos_hembras'];?>
                </div>
                </div>
                </div>
                <div class="row-fluid">
                <div class="span12">
                <div class="span3 center">
                </div>
                <div class="span3 center">
                <h5><strong>Total Nacidos muertos</strong></h5>
                <?php echo $camada['Denuncianacimiento']['numero_cachorros'];?>
                </div>
                <div class="span3 center">
                <h5><strong>Machos</strong></h5>
                <?php echo $camada['Denuncianacimiento']['num_muertos_machos'];?>
                </div>
                <div class="span3 center">
                <h5><strong>Hembras</strong></h5>
                <?php echo $camada['Denuncianacimiento']['num_muertos_hembras'];?>
                </div>
                </div>
                </div>
                
                <div class="row-fluid">
                <div class="span12">
                <div class="span3 center">
                </div>
                <div class="span3 center">
                <h5><strong>Seran sacrificados</strong></h5>
                <?php echo $camada['Denuncianacimiento']['numero_cachorros'];?>
                </div>
                <div class="span3 center">
                <h5><strong>Machos</strong></h5>
                <?php echo $camada['Denuncianacimiento']['num_sacrificados_machos'];?>
                </div>
                <div class="span3 center">
                <h5><strong>Hembras</strong></h5>
                <?php echo $camada['Denuncianacimiento']['num_sacrificados_hembras'];?>
                </div>
                </div>
                </div>
                <h4 align="center">OBSERVACIONES POR EJEMPLAR</h4>
                <div class="row-fluid">
                <div class="span12">
                 <?php $i=0;?>
                 <?php foreach($cachorros as $cachorro):?>
                 <div class="span6">
                 <h5><?php echo $cachorro['nombre'];?></h5>
                 <?php echo $this->Form->hidden("Observacionesinformecomcria.$i.mascota_id", 
                                        array('value'=>$cachorro['id'])
                                        );
                        
                                        $observacion = null;
                                        if(!empty($idInforme))
                                        {
                                            $obser = $observacionesinf->find('first',array('conditions' => array('Observacionesinformecomcria.informecomcria_id' => $idInforme,'Observacionesinformecomcria.mascota_id' => $cachorro['id'])));
                                            $observacion = $obser['Observacionesinformecomcria']['observacion'];
                                            echo $this->Form->hidden("Observacionesinformecomcria.$i.id",array('value' => $obser['Observacionesinformecomcria']['id']));
                                        }
                                        
                                        ?>                                        
                                        <?php echo $this->Form->textarea("Observacionesinformecomcria.$i.observacion",array('class' => 'span12','value' => $observacion));
                                        ?>
                 </div>
                 <?php $i++;?>
                 <?php endforeach;?>
                </div>
                </div>
                <h4 align="center">DATOS DEL DOCUMENTO A REGISTRAR</h4>
                <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                <h5>Lugar de la inspecci&oacute;n</h5>
                <?php echo $this->Form->select('departamento_id', $departamentos,array('class' => 'span12','required'))?>
                </div>
                <div class="span4">
                <h5>Fecha</h5>
                <?php echo $this->Form->date('fechainforme', array('id'=>'date','class' => 'span12','required'))?>
                </div>
                <div class="span4">
                <h5>Firma Inspector sub comision de cr&iacute;a</h5>
                <?php echo $this->Form->checkbox('firma_inspector_comision',array('class' => 'span12'))?>
                </div>
                </div>
                </div>
                <h4 align="center">Visado por regional</h4>
                <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                <h5>Lugar</h5>
                <?php echo $this->Form->select('departamento_id2', $departamentos,array('class' => 'span12','required'))?>
                </div>
                <div class="span4">
                <h5>Fecha</h5>
                <?php echo $this->Form->date('fecha', array('id'=>'date2','class' => 'span12','required'))?>
                </div>
                <div class="span4">
                <h5>Recibo</h5>
                <a href="#myModal" data-toggle="modal" onclick="paga(<?php echo $idPropietario;?>)">
                    <?php echo $this->Form->text('recibo', array('class' =>"span12",'required','id' => 'idrecibo')); ?>
                </a>
                </div>
                </div>
                </div>
                <h4 align="center">Firmas y sellos</h4>
                <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                <h5>Sellor regional</h5>
                <?php echo $this->Form->checkbox('sello_regional',array('class' => 'span12'))?>
                </div>
                <div class="span4">
                <h5>Firmas Propietario</h5>
                <?php echo $this->Form->checkbox('firma_propietario',array('class' => 'span12'))?>
                </div>
                <div class="span4">
                <h5>Firma Recetor REGIONAL</h5>
                <?php echo $this->Form->checkbox('firma_regional',array('class' => 'span12'))?>
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
                <?php echo $this->Form->hidden('Aux.activa',array('id' => 'idactiva','value' => 0));?>
                <?php echo $this->Form->hidden('ingreso_id',array('id' => 'idingreso_id'));?>
                <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-block btn-success'));?>
                </div>
                </div>
                </div>
                </div>
    </div>
</div>

<?php 
if(empty($this->request->data['Informecomcria']['ingreso_id']))
{
    $idIngreso = 0;
}
else{
    $idIngreso = $this->request->data['Informecomcria']['ingreso_id'];
}
?>
<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
<script>
    
    function paga(aux)
    {
        $('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Cuentas','action' => 'ajaxpagoservicio',$idIngreso));?>/'+aux+'/0',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});
    }
    
</script>