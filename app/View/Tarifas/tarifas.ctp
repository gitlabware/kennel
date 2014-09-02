<?php 
App::import('Model', 'Tarifa');
$tarifa = new Tarifa();
?>
<?php $vrole = $this->Session->read('Auth.User.role');?>
<div class="innerLR">
	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-gray">
            <?php foreach($sucursales as $suc):?>
            <div class="widget-body">
                <h3>TARIFARIO PARA <?php if($tipo == 1){echo 'SOCIOS';}else{echo 'CRIADORES';}?> DE: <?php echo $suc['Sucursale']['nombre'].' - CUENTA: '.$suc['Sucursale']['cuenta'];?></h3>
                <table class="table table-bordered table-white">
                    <thead>
                        <tr>
                            <th class="center">No.</th>
                            <th>Detalle</th>
                            <th>Monto Total</th>
                            <?php if($vrole == 'administrador'): $col = 5;?>
                            <th>Nacional</th>
                            <th>Regional</th>
                            <?php else: $col = 3;?>
                            <?php endif;?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categorias as $ca):?>
                        <tr>
                            <td style="background-color: #d9edf7;" class="center" colspan="<?php echo $col;?>"><b><?php echo $ca['Categoriastarifa']['nombre'];?></b></td>
                        </tr>
                        <?php $tarifas = $tarifa->find('all',array('conditions' => array('Tarifa.tipo_id' => $tipo,'Tramite.categoriastarifa_id' => $ca['Categoriastarifa']['id'])));?> 
                        <?php foreach($tarifas as $ta):?>
                        <tr>
                            <td><?php echo $ta['Tarifa']['id'];?></td>
                            <td><?php echo $ta['Tramite']['nombre'].' '.$ta['Tramite']['descripcion'];?></td>
                            <td><?php echo $ta['Tarifa']['monto_total'];?></td>
                            <?php if($vrole == 'administrador'): $col = 5;?>
                            <td><?php echo $ta['Tarifa']['nacional'];?></td>
                            <td><?php echo $ta['Tarifa']['regional'];?></td>
                            <?php else: $col = 3;?>
                            <?php endif;?>
                        </tr>
                        <?php endforeach;?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <?php endforeach;?>
        </div>
</div>