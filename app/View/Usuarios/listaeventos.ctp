

<div class="innerLR">

    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
            
            <div class="row-fluid">
                <div class="span12">
                    <h3>Listado de Eventos</h3>
            <table class="table table-bordered table-white">
                <tbody>
                    <tr>
                        <th>Evento</th>
                        <th>Ciudad</th>
                        <th>Entre Fechas</th>
                        <th>Lugar</th>
                        <th>Accion</th>
                    </tr>
                </tbody>
                <tbody>
                    <?php foreach ($eventos as $ev):?>
                    <tr>
                        <td><?php echo $ev['Evento']['nombre']?></td>
                        <td><?php echo $ev['Evento']['ciudad']?></td>
                        <td><?php echo $ev['Evento']['fecha_inicio'].'/'.$ev['Evento']['fecha_fin']?></td>
                        <td><?php echo $ev['Evento']['direccion']?></td>
                        <td>
                            <?php if($ev['Evento']['estado'] == 1):?>
                            <a title="Inscribir" class="btn-action glyphicons pencil btn-warning" href="#myModal" data-toggle="modal" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'ajaxinscribe1',$ev['Evento']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});"><i></i></a>
                            <?php endif;?>
                            <?php echo $this->Html->link('<i></i>',array('controller' => 'Eventos','action' => 'catalogo_inicial',$ev['Evento']['id']),array('class' => 'btn-action glyphicons book_open btn-inverse','escape' => false,'title' => 'Catalogo Inicial'));?>
                            <?php echo $this->Html->link('<i><i>',array('controller' => 'Eventos','action' => 'catalogo',$ev['Evento']['id']),array('class' => 'btn-action glyphicons log_book btn-success','escape' => false,'title' => 'Catalogo Oficial'));?>
                            
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
                </div>
            </div>
            
        </div>
    </div>
</div>