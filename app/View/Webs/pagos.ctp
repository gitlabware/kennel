
<div class="innerLR">
    <div class="widget widget-heading-simple widget-body-gray">
    
        <div class="widget-body">
        <h3>Listado de Pagos</h3>
    <table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
            <thead>
            <tr>
            <th>Fecha</th>
            <th>Detalle</th>
            <th>Monto Total</th>
            <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($pagos as $ing):?>
            <tr>
            <td><?php echo $ing['Ingreso']['created'];?></td>
            <td><?php echo $ing['Propietario']['nombre'];?></td>
            <td><?php echo $ing['Ingreso']['monto_total']?></td>
            <td>
            <a href="#myModal" data-toggle="modal" class="label label-info" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Cuentas','action' => 'ajaxpago',$ing['Ingreso']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Editar</a>
             <?php echo $this->Html->link('Eliminar',array('action' => 'elimina',$ing['Ingreso']['id']),array('escape' => false,'confirm' => 'Esta seguro de eliminar','class' => 'label label-important'));?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        </div>
    </div>
    
</div>