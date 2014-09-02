<?php
App::Import('Model', 'Generacione');
$generacion = new Generacione();
?>
<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
<div class="innerLR">
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
        <?php echo $this->Form->create('Mascota')?>
        <div class="row-fluid">
        <div class="span12">
        <div class="span3">
        <?php echo $this->Form->text('Mascota.nombre',array('id' => 'idnombre','class' => 'span12','placeholder'=>'Nombre de Mascota')); ?>
        </div>
        <div class="span3">
        <?php echo $this->form->select('Mascota.raza_id',$razas,array('id' => 'idraza','class' => 'span12','data-placeholder' => 'Seleccione la Raza')); ?>
        </div>
        <div class="span1">
        <?php echo $this->form->text('Mascota.kcb',array('id' => 'idkcb','class' => 'span12','placeholder'=>'kcb')); ?>
        </div>
        <div class="span1">
        <?php echo $this->form->text('Mascota.num_tatuaje',array('id' => 'idnum_tatuaje','class' => 'span12','placeholder'=>'Tatuaje')); ?>
        </div>
        <div class="span1">
        <?php echo $this->form->text('Mascota.chip',array('id' => 'idchip','class' => 'span12','placeholder'=>'Chip')); ?>
        </div>
        <div class="span2">
        <?php echo $this->form->date('Mascota.fecha_nacimiento',array('id' => 'idfecha_nacimiento','class' => 'span12','placeholder'=>'aaaa-mm-dd')); ?>
        </div>
        <div class="span1">
        <?php
                        echo $this->Js->submit('Buscar', array('url' => '/Webs/ajaxlistado', 'update' => '#listado2'));
                        
                        ?>
        </div>
        </div>
        </div>
        <?php echo $this->Form->end();?>
        <div id="listado2">
        <table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
            <thead>
                <tr>
                    <th>Nro KCB</th>
                    <th>Ejemplar</th>
                    <th>Nro tatoo</th>
                    <th>Propietario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
                
            <tbody>
                        <?php foreach($mascotas as $m):?>
                        <tr>
                            <td><?php echo $m['Mascota']['kcb']?></td>
                            <td id="fila<?php echo $m['Mascota']['id']?>">
                            <div id="cfila<?php echo $m['Mascota']['id']?>">
                            <?php echo $m['Mascota']['nombre_completo']; ?>
                            </div>
                             </td>
                            <td><?php echo $m['Mascota']['num_tatuaje']?></td>
                            <td class="center">
                                <?php echo $m['Propietarioactual']['nombre']?>
                            </td>
                            <td class="hidden-print">
                            <a href="<?php echo $this->Html->url(array('action' => 'ver', $m['Mascota']['id'])); ?>" class="label label-warning">Ver</a> 
                             
                            </td>
                        </tr>
                        
                        <?php endforeach;?>
                  </tbody>  
            </table>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <div class="span6">
        <?php echo $this->Html->link('Atras',array('action' => 'index'),array('class' => 'btn btn-block btn-primary'));?>
        </div>
        </div>
        </div>
        </div>
    </div>
</div>
