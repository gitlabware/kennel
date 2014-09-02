<?php if(!empty($listamascotas)):?>
<table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
    <thead>
    <tr>
    <th>kcb/codigo</th>
    <th>Nombre</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($listamascotas as $ma):?>
    <tr style="cursor: pointer;"onclick="$('#<?php echo $div;?>').load('<?php echo $this->Html->url(array('action' => 'combomascotas3',$campoform,$div,$ma['Mascota']['id']));?>');$('#modalsel').modal('toggle');">
        <td><?php if(!empty($ma['Mascota']['kcb']) && $ma['Mascota']['kcb'] != 'nulo'){echo $ma['Mascota']['kcb'];}elseif (!empty ($ma['Mascota']['codigo'])) {echo $ma['Mascota']['codigo'];}?>   
        </td>
    <td><?php echo $ma['Mascota']['nombre_completo'];?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
<?php else:?>
<h4 style="color: blue;">No hay registros!!!</h4>
<?php endif;?>