
<div class="innerLR">
    <div class="widget widget-heading-simple widget-body-gray">
    <h3 class="center">Reporte de Pagos realizados a la sucursal: <?php if(!empty($sucursal['Sucursale']['nombre'])){echo $sucursal['Sucursale']['nombre'];}else{echo 'TODOS';}?></h3>
    <h3 class="center">Desde <?php echo $fechaini;?> hasta <?php echo $fechafin;?></h3>
        <div class="widget-body">
        <!-- Table -->
<table class="table table-bordered table-white">

    <!-- Table heading -->
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Propietario</th>
            <th>Detalle</th>
            <th>Comprobante</th>
            <th>Monto total</th>
            <?php if(empty($tipo)):?>
            <th>Nacional</th>
            <?php elseif($tipo == 'nacional'):?>
            <th>Nacional</th>
            <?php endif;?>
            <?php if(empty($tipo)):?>
            <th>Regional</th>
            <?php elseif($tipo == 'regional'):?>
            <th>Regional</th>
            <?php endif;?>
        </tr>
    </thead>
    <!-- // Table heading END -->

    <!-- Table body -->
    <tbody>
    <?php $montototal = $nacional = $regional = 0.00;?>
        <?php foreach($pagos as $pa):?>
        <tr>
        <td><?php echo $pa['Ingreso']['created'];?></td>
        <td><?php echo $pa['Propietario']['nombre'];?></td>
        <td><?php echo $pa['Tramite']['nombre'];?></td>
        <td><?php echo $pa['Ingreso']['comprobante'];?></td>
        <td><?php echo $pa['Ingreso']['monto_total'];?></td>
        <?php if(empty($tipo)):?>
        <td><?php echo $pa['Ingreso']['nacional'];?></td>
        <?php elseif($tipo == 'nacional'):?>
        <td><?php echo $pa['Ingreso']['nacional'];?></td>
        <?php endif;?>
        <?php if(empty($tipo)):?>
        <td><?php echo $pa['Ingreso']['monto'];?></td>
        <?php elseif($tipo == 'regional'):?>
        <td><?php echo $pa['Ingreso']['monto'];?></td>
        <?php endif;?>
        <?php 
        
        $montototal = $montototal + $pa['Ingreso']['monto_total'];
        $nacional = $nacional + $pa['Ingreso']['nacional'];
        $regional = $regional + $pa['Ingreso']['monto'];
        ?>
        </tr>
        <?php endforeach;?>
        <tr>
        <td></td>
        <td></td>
        <td></td>
        <td><b>TOTAL</b></td>
        <td><?php echo $montototal;?></td>
        
        <?php if(empty($tipo)):?>
        <td><?php echo $nacional;?></td>
        <?php elseif($tipo == 'nacional'):?>
        <td><?php echo $nacional;?></td>
        <?php endif;?>
        <?php if(empty($tipo)):?>
        <td><?php echo $regional;?></td>
        <?php elseif($tipo == 'regional'):?>
        <td><?php echo $regional;?></td>
        <?php endif;?>
        </tr>
    </tbody>
    <!-- // Table body END -->

</table>
<!-- // Table END -->
        </div>
    </div>
    
</div>