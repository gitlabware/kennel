<?php echo $this->Form->create('Mascota');?>
<div class="row-fluid">
<div class="span12">
<div class="span6">
<h5>Titulo Obtenido</h5>
<?php echo $this->Form->hidden('Mascotastitulo.id');?>
<?php echo $this->Form->select('Mascotastitulo.titulo_id',$titulos,array('class' => 'span12'))?>
</div>
<div class="span6">
    <h5>Fecha de obtencion (A&ntilde;o-mes-dia)</h5>
<?php echo $this->Form->text('Mascotastitulo.fecha_obtencion',array('class' => 'span12','id' => 'idfecha_obtencion'));?>
<script>
                $(function(){
                    $("#idfecha_obtencion").inputmask("y-m-d", {autoUnmask: true});
                });
                </script>
</div>
</div>
</div>

<div class="row-fluid">
<div class="span12">
<div class="span6">

</div>
<div class="span3">
<a href="javascript:" class="btn btn-block btn-warning span12" onclick="$('#examenes').load('<?php echo $this->Html->url(array('action' => 'titulos',$idMascota));?>');">Cancelar</a>
</div>
<div class="span3">
<?php 
                    echo $this->Js->submit('Guardar', array(
                        'url' => array(
                            'action' => 'guardatitulo',$idMascota
                        ),
                        'before' => "$('#imgcargandoopciones').toggle();$('#examenes').toggle();",
                        'update' => '#examenes',
                        'success' => "$('#imgcargandoopciones').toggle(100);$('#examenes').toggle();",
                        'class' => 'btn btn-success span12'
                    )
                );
                    ?>
</div>
</div>
</div>
<?php echo $this->Form->end()?>