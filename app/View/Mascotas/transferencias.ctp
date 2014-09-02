<!-- Table -->
<table class="table table-bordered table-white">

    <!-- Table heading -->
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Propietario</th>
            <th>Accion</th>
        </tr>
    </thead>
    <!-- // Table heading END -->

    <!-- Table body -->
    <tbody>
    <?php foreach($transferencias as $pro):?>
        <tr>
            <td><?php echo $pro['Mascotaspropietario']['fecha_transfer']?></td>
            <td><?php echo $pro['Propietario']['nombre']?></td>
            <td><a href="javascript:" class="label label-primary" onclick="$('#examenes').load('<?php echo $this->Html->url(array('action' => 'transferencia',$idMascota,$pro['Mascotaspropietario']['id']));?>');">Editar</a> 
            <a href="javascript:" class="label label-important" onclick="if(confirm('Esta seguro de aliminar??')){$('#imgcargandoopciones').toggle();$('#examenes').toggle();$('#examenes').load('<?php echo $this->Html->url(array('action' => 'transferenciaelimina',$idMascota,$pro['Mascotaspropietario']['id']));?>');$('#imgcargandoopciones').toggle(100);$('#examenes').toggle();}else{}">Eliminar</a>
            </td>
        </tr>
    <?php endforeach;?>
    <tr>
        <td></td>
        <td></td>
        <td><a href="javascript:" class="label label-success" onclick="$('#examenes').load('<?php echo $this->Html->url(array('action' => 'transferencia',$idMascota));?>');">Adicionar</a></td>
    </tr>
    </tbody>
    <!-- // Table body END -->
</table>
<!-- // Table END -->