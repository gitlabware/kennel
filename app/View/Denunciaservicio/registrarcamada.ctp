<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    var sheepItForm = $('#sheepItForm').sheepIt({
        separator: '',
        allowRemoveLast: true,
        allowRemoveCurrent: true,
        allowRemoveAll: true,
        allowAdd: true,
        allowAddN: true,
        maxFormsCount: 10,
        minFormsCount: 0,
        iniFormsCount: 1
    });
});
</script>
<h3 align="center">Registro de Camada de Denuncia Nacimiento</h3>
<div class="innerLR">
	<!-- Widget -->
      <?php echo $this->Form->create('Camada',array('id' => 'registroservicio')); ?>
      <?php echo $this->Form->hidden('id');?>
      <?php 
      echo $this->Form->hidden('fecha', array('value'=>date('Y-m-d')));
      echo $this->Form->hidden('servicio_id', array('value'=>$id_servicio));
      echo $this->Form->hidden('denuncianacimiento_id', array('value'=>$id_nacimiento));
      ?>
	<div class="widget widget-heading-simple widget-body-gray">
		<div class="widget-body">
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <h5>Raza</h5>
        <?php echo $this->Form->select('raza_id',$razas,array('class' => 'span12','required'))?>
        </div>
        <div class="span6">
        <h5>Variedad</h5>
        <?php echo $this->Form->text('variedad',array('class' => 'span12','required'))?>
        </div>
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span3">
        <h5>Tipo de Pelo</h5>
        <?php echo $this->Form->select('tipospelo_id', $pelos,array('class' => 'span12','required'))?>
        </div>
        <div class="span3">
        <h5>Camada</h5>
        <?php echo $this->Form->text('camada',array('class' => 'span12','required'))?>
        </div>
        <div class="span3">
        <h5>Nro.de Parto Madre</h5>
        <?php echo $this->Form->text('numpartomadre',array('class' => 'span12','required'))?>
        </div>
        <div class="span3">
        <h5>Cachorros encontrados con la Madre</h5>
        <?php echo $this->Form->text('cachorrosencontrados',array('class' => 'span12'))?>
        </div>
        </div>
        </div>
        
        </div>
    </div>
    
    <div class="widget row-fluid widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
	
				<div class="widget-head">
					<h4 align="center">DATOS CACHORROS</h4>
				</div>
				<div class="widget-body">
                <?php if(empty($idCamada)):?>
                <!-- sheepIt Form -->
<div id="sheepItForm">
 
  <!-- Form template-->
  
  <div id="sheepItForm_template">
                <div class="row-fluid">
                <div class="span12">
                <div class="span6">
                <label for="sheepItForm_#index#_perro">Nombre cachorro <span id="sheepItForm_label"></span></label>
                <?php echo $this->Form->text(null, array('id'=>"sheepItForm_#index#_nombre", 'name'=>"data[Mascota][#index#][nombre]", 'class' => "span12",'required'))?>
                </div>
                <div class="span4">
                <label for="sheepItForm_#index#_sexo">Sexo <span id="sheepItForm_label"></span></label>
                <?php echo $this->Form->select(null, $sexo, array('name'=>"data[Mascota][#index#][sexo]",'class' =>'span12','required'));?>
                </div>
                <div class="span2">
                <a id="sheepItForm_remove_current" href="javascript:" class="label label-important">Quitar</a>
                </div>
                </div>
                </div>
                <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                <label for="sheepItForm_#index#_color">Color <span id="sheepItForm_label"></span></label>
                <?php echo $this->Form->text("Mascota.#index#.color", array('id'=>"sheepItForm_#index#_color", 'class' =>'span12'));?>
                </div>
                <div class="span4">
                <label for="sheepItForm_#index#_sena">Se&ntilde;as <span id="sheepItForm_label"></span></label>
                <?php echo $this->Form->text(null, array('id'=>"sheepItForm_#index#_sena", 'name'=>"data[Mascota][#index#][senas]",'class' => 'span12'));?>
                </div>
                <div class="span4">
                <label for="sheepItForm_#index#_obs">Observaciones <span id="sheepItForm_label"></span></label>
                <?php echo $this->Form->textarea(null, array('id'=>"sheepItForm_#index#_observacion", 'name'=>"data[Mascota][#index#][observaciones]",'class' => 'span12'));?>
                </div>
                </div>
                </div>
                </div>
  
  
  <!-- /Form template-->
  
   
  <!-- No forms template -->
  <div id="sheepItForm_noforms_template">Sin cachorros</div>
  <!-- /No forms template-->
   
  <!-- Controls -->
  <div id="sheepItForm_controls" class="row-fluid">
  <div class="span12">
  <div id="sheepItForm_add" class="span4"><a href="javascript:"><span class="label label-success">Insertar otro Cachorro</span></a></div>
    <div id="sheepItForm_remove_last" class="span4"><a href="javascript:"><span class="label label-important">Quitar cachorro</span></a></div>
    <div class="span4">
    
    </div>
    
  </div>
    
  </div>
  <!-- /Controls -->
   
</div>
<!-- /sheepIt Form -->
<?php else:?>
<div class="row-fluid">
<div class="span12">
<?php foreach($leemascotas as $le):?>
<div class="span4">
<a href="#myModal" data-toggle="modal" class="label label-info span12 center" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Mascotas','action' => 'ajaxmascota',$le['Mascota']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><?php echo $le['Mascota']['nombre']?></a>
</div>
<?php endforeach;?>
</div>
</div>
<?php endif;?>
                </div>
    </div>
    
    <div class="widget row-fluid widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
	
				<div class="widget-head">
					<h4 align="center">FIRMAS, SELLOS Y OBSERVACIONES</h4>
				</div>
				<div class="widget-body">
                <h4><strong>Primera inspecci&oacute;n</strong></h4>
                <div class="row-fluid">
                <div class="span12">
                <div class="span3">
                <h5>fecha 1ra inspecci&oacute;n</h5>
                <?php echo $this->Form->date('fechainspeccion1', array('id'=>'date1','class' => 'span12','required'));?>
                </div>
                <div class="span3">
                <h5>D&iacute;as de nacidos</h5>
                <?php echo $this->Form->text('diasdenacidos1',array('class' => 'span12','required'));?>
                </div>
                <div class="span3">
                <h5>Observaciones grales. 1ra inspecci&oacute;n(Comisi&oacute;n cr&iacute;)</h5>
                <?php echo $this->Form->textarea('obs_inspeccion1',array('class' => 'span12'))?>
                </div>
                <div class="span3">
                <h5>Firma y aclaraci&oacute;n de la firma (Insp.Sub-comisi&oacute;n)</h5>
                <?php echo $this->Form->checkbox('firma_inspector_subcomision_1',array('class' => 'span12'))?>
                </div>
                </div>
                </div>
                <h4><strong>Segunda inspecci&oacute;n</strong></h4>
                <div class="row-fluid">
                <div class="span12">
                <div class="span3">
                <h5>fecha 2da inspecci&oacute;n</h5>
                <?php echo $this->Form->date('fechainspeccion2', array('id'=>'date1','class' => 'span12','required'));?>
                </div>
                <div class="span3">
                <h5>D&iacute;as de nacidos</h5>
                <?php echo $this->Form->text('diasdenacidos2',array('class' => 'span12','required'));?>
                </div>
                <div class="span3">
                <h5>Observaciones grales. 2da inspecci&oacute;n(Comisi&oacute;n cr&iacute;)</h5>
                <?php echo $this->Form->textarea('obs_inspeccion2',array('class' => 'span12'))?>
                </div>
                <div class="span3">
                <h5>Firma y aclaraci&oacute;n de la firma (Insp.Sub-comisi&oacute;n)</h5>
                <?php echo $this->Form->checkbox('firma_inspector_subcomision_2',array('class' => 'span12'))?>
                </div>
                </div>
                </div>
                <h5>Firma y aclaraci&oacute;n de la firma Prop. criadero</h5>
                <?php echo $this->Form->checkbox('firma_propietario_criadero',array('class' => 'span6'))?>
                <h4 align="center">Visado por Regional</h4>
                <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                <h5>Lugar</h5>
                <?php echo $this->Form->select('departamento_id', $departamentos,array('class' => 'span12','required'));?>
                </div>
                <div class="span4">
                <h5>Fecha</h5>
                <?php echo $this->Form->date('fecha', array('id'=>'date','class' =>  'span12','required'));?>
                </div>
                <div class="span4">
                    <?php if(!empty($idPropietario)):?>
                <h5>Recibo</h5>
                
                <a href="#myModal" data-toggle="modal" onclick="paga(<?php echo $idPropietario;?>)">
                    <?php echo $this->Form->text('recibo', array('class' =>"span12",'required','id' => 'idrecibo')); ?>
                </a>
                <?php endif;?>
                </div>
                
                </div>
                </div>
                <div class="row-fluid">
                <div class="span12">
                <div class="span4">
                <h5>Sello regional</h5>
                <?php echo $this->Form->checkbox('sello_regional',array('class' => 'span12'))?>
                </div>
                <div class="span4">
                <h5>Firma sub.com.cria</h5>
                <?php echo $this->Form->checkbox('firma_subcomisioncriaultimo',array('class' => 'span12'))?>
                </div>
                <div class="span4">
                <h5>Firma recetor regional</h5>
                 <?php echo $this->Form->checkbox('firma_recetor_regional',array('class' => 'span12'))?>
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
                            <?php echo $this->Form->checkbox('Aux.activa',array('checked','class' => 'span12','id' => 'idactiva'))?>
                    </div>
                <div class="span6">
                    
                <?php //echo $this->Form->hidden('Aux.activa',array('id' => 'idactiva','value' => 0));?>
                <?php echo $this->Form->hidden('ingreso_id',array('id' => 'idingreso_id'));?>
                <?php echo $this->Form->submit('Guardar',array('class' => 'btn btn-block btn-success'));?>
                </div>
                </div>
                </div>
                </div>
    </div>
</div>

<?php

if(empty($this->request->data['Camada']['ingreso_id']))
{
    $idIngreso = 0;
}
else{
    $idIngreso = $this->request->data['Camada']['ingreso_id'];
}
?>
<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
<script>
    
    function paga(aux)
    {
        $('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Cuentas','action' => 'ajaxpagoservicio',$idIngreso));?>/'+aux+'/0',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});
    }
    
</script>