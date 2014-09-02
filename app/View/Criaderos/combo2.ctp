<?php if(!empty($listacriaderos)):?>
<table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
    <thead>
    <tr>
    
    <th>Nombre</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($listacriaderos as $ma):?>
    <tr style="cursor: pointer;"onclick="$('#<?php echo $div;?>').load('<?php echo $this->Html->url(array('action' => 'combo3',$campoform,$div,$ma['Criadero']['id']));?>');$('#modalsel').modal('toggle');">
    <td><?php echo $ma['Criadero']['nombre'];?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
<?php else:?>
<h4 style="color: blue;">No hay registros!!!</h4>
<?php endif;?>