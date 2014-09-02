
<div class="innerLR">
    <div class="widget widget-heading-simple widget-body-gray">
    <h3>Pagos de <?php echo $propietario['Propietario']['nombre'];?></h3>
        <div class="widget-body">
        <h3>Listado de pagos</h3>
    <table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
            <thead>
            <tr>
                <th>Codigo</th>
            <th>Fecha</th>
            <th>Pago</th>
            <th>Monto Total</th>
            <th>Sucursal</th>
            <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            
            <?php foreach($ingresos as $ing):?>
            <?php 
            if($ing['Ingreso']['estado'] == 1)
            {
             $color = '#CAF2A2';   
            }
            else{
             $color = '#FBD2D2';
            }
             ?>
            <tr>
                <td style="background: <?php echo $color;?>;"><?php echo $ing['Ingreso']['id']?></td>
            <td style="background: <?php echo $color;?>;"><?php echo $ing['Ingreso']['created']?></td>
            <td style="background: <?php echo $color;?>;"><?php echo $ing['Tramite']['nombre']?></td>
            <td style="background: <?php echo $color;?>;"><?php echo $ing['Ingreso']['monto_total']?></td>
            <td style="background: <?php echo $color;?>;"><?php echo $ing['Sucursale']['nombre']?></td>
            <td style="background: <?php echo $color;?>;">
            <a href="#myModal" data-toggle="modal" class="label label-info" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Cuentas','action' => 'ajaxpago',$ing['Ingreso']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Editar</a>
            
             <?php echo $this->Html->link('Eliminar',array('action' => 'elimina',$ing['Ingreso']['id']),array('escape' => false,'confirm' => 'Esta seguro de eliminar','class' => 'label label-important'));?></td>
            </tr>
            <?php endforeach;?>
            </tbody>
        </table>
        </div>
    </div>
    
</div>