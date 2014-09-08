<?php
App::Import('Model', 'Observacionesinformecomcria');
$observacionesinf = new Observacionesinformecomcria();
?>
<h3 align="center">Informe de Comision</h3>
<div class="innerLR">
	<!-- Widget -->
      <?php echo $this->Form->create('Informecomcria'); ?>
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
                                            $obser = $observacionesinf->find('first',array('conditions' => array('Observacionesinformecomcria.informecomcria_id' => $idInforme)));
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
                <h5>Lugar de la inspecci&oacute</h5>
                <?php echo $this->Form->select('departamento_id', $departamentos,array('class' => 'span12','required'))?>
                </div>
                <div class="span4">
                <h5>Fecha (A&ntilde;o-mes-dia)</h5>
                <?php echo $this->Form->text('fechainforme', array('id'=>'idfechainforme','class' => 'span12','required'))?>
                <script>
                $(function(){
                    $("#idfechainforme").inputmask("y-m-d", {autoUnmask: true});
                });
                </script>
                </div>
                <div class="span4">
                <h5>Firma Inspector sub comision de cr&iacute;a</h5>
                <?php echo $this->Form->checkbox('firma_inspector_comision',array('class' => 'span12'))?>
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