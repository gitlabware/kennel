<?php if (!empty($listapropietarios)): ?>
    <table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
        <thead>
            <tr>
                <th>C.I./ID</th>
                <th>Nombre</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listapropietarios as $ma): ?>
                <tr style="cursor: pointer;"onclick="$('#<?php echo $div; ?>').load('<?php echo $this->Html->url(array('action' => 'combo3', $campoform, $div, $ma['Propietario']['id'])); ?>');
                        $('#modalsel').modal('toggle');">
                    <td>
                        <?php if(!empty($ma['Propietario']['ci'])):?>
                        <?php echo $ma['Propietario']['ci']; ?>
                        <?php else: ?>
                        <?php echo 'ID:'.$ma['Propietario']['id'];?>
                        <?php endif;?>
                    </td>
                    <td><?php echo $ma['Propietario']['nombre']; ?></td>
                </tr>
    <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <h4 style="color: blue;">No hay registros!!!</h4>
<?php endif; ?>