<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>Inscripcion a <?php echo $evento['Evento']['nombre']?></h3>
  </div>
  <div class="modal-body">
    <div class="row-fluid">
    <div class="span12">
        <div class="widget widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
            <div class="widget-body">
            <!-- Table -->
            <table class="table table-bordered table-white">

                <!-- Table heading -->
                <thead>
                    <tr>
                        <th class="center">KCB</th>
                        <th>Ejemplar</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <!-- // Table heading END -->
                <!-- Table body -->
                <tbody>
                <?php foreach($mascotas as $ma):?>
                    <tr>
                        <td class="center"><?php echo $ma['Mascota']['kcb'];?></td>
                        <td><?php echo $ma['Mascota']['nombre_completo'];?></td>
                        <td>
                            <a href="javascript:" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Usuarios','action' => 'ajaxinscribe2',$ma['Mascota']['id'],$idEvento));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Inscribir</a>
                        </td>
                    </tr>
                <?php endforeach;?>
                </tbody>
                <!-- // Table body END -->

            </table>
            <!-- // Table END -->
            </div>
        </div>
    </div>
    </div>
  </div>