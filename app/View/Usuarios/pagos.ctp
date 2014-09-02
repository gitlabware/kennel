<div class="innerLR">
<h3>Mis Pagos</h3>
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
        <table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
        <thead>
        <tr>
        <th>Fecha</th>
        <th>Pago</th>
        <th>Monto</th>
        <th>Comprobante</th>
        <th>Cuenta</th>
        <th>Accion</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($pagos as $pa):?>
        <?php 
        if($pa['Ingreso']['estado'] == 1)
        {
         $color = '#CAF2A2';   
        }
        else{
         $color = '#FBD2D2';
        }
         ?>
        <tr>
        <td style="background: <?php echo $color;?>;"><?php echo $pa['Ingreso']['created']?></td>
        <td style="background: <?php echo $color;?>;"><?php echo $pa['Tramite']['nombre']?></td>
        <td style="background: <?php echo $color;?>;"><?php echo $pa['Ingreso']['monto_total']?></td>
        <td style="background: <?php echo $color;?>;"><?php echo $pa['Ingreso']['comprobante']?></td>
        <td style="background: <?php echo $color;?>;"><?php echo $pa['Cuentasbancaria']['cuenta']?></td>
        <td style="background: <?php echo $color;?>;">
        <?php if($pa['Ingreso']['estado'] == 0):?>
        <?php echo $this->Html->link('Anular',array('action' => 'anulapago',$pa['Ingreso']['id']),array('class' => 'label label-important','confirm' => 'Esta seguro de anular el pago de '.$pa['Tramite']['nombre']))?>
        <?php endif;?>
        </td>
        </tr>
        <?php endforeach;?>
        </tbody>
        </table>
        </div>
    </div>
</div>