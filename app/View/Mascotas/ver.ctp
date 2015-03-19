<?php
App::Import('Model', 'Mascota');
App::Import('Model', 'Pista');
$mas = new Mascota();
$mpista = new Pista();
?>
<style>
    .blanco{
        background: white;
    }
</style>

<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/jquery.jOrgChart.css"/>

<script>
    jQuery(document).ready(function () {
        $("#org").jOrgChart({
            chartElement: '#chart'
        });
    });
</script>    



<div class="innerLR">
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
            <h3 class="center">Informacion de <?php echo $mascota['Mascota']['nombre_completo'] ?>
                
            </h3>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span12 center blanco">
                        <table class="table table-bordered table-white">
                            <!-- Table heading -->
                            <thead>
                                <tr>
                                    <th>Estado</th>
                                    <th>Fecha</th>
                                    <th>Observacion</th>
                                </tr>
                            </thead>
                            <!-- // Table heading END -->
                            <!-- Table body -->
                            <tbody>
                                <?php foreach ($observaciones as $obs): ?>
                                    <tr>
                                        <td>
                                            <?php if($obs['EstadosMascota']['estado_id']  == 1):?>
                                            <span class="label label-success">Exportacion</span>
                                            <?php endif;?>
                                            <?php if($obs['EstadosMascota']['estado_id']  == 2):?>
                                            <span class="label label-info">Duplicado</span>
                                            <?php endif;?>
                                            <?php if($obs['EstadosMascota']['estado_id']  == 3):?>
                                            <span class="label label-important">Fallecido</span>
                                            <?php endif;?>
                                            <?php if($obs['EstadosMascota']['estado_id']  == 4):?>
                                            <span class="label label-important">Robado</span>
                                            <?php endif;?>
                                            <?php if($obs['EstadosMascota']['estado_id']  == 5):?>
                                            <span class="label label-important">Extraviado</span>
                                            <?php endif;?>
                                        </td>
                                        <td><?php echo $obs['EstadosMascota']['fecha'] ?></td>
                                        <td><?php echo $obs['EstadosMascota']['observacion'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <!-- // Table body END -->

                        </table>
                    </div>
                </div>
            </div>
            <br>
            <div class="row-fluid">
                <div class="span12">
                    <div class="span4 center blanco" >
                        <?php echo $this->Html->image('' . $imagen, array('style' => 'width: 180px; height: 180px;')); ?>
                    </div>
                    <div class="span6 center blanco">
                        <div class="row-fluid">
                            <div class="span12">
                                <h5><strong>Raza</strong></h5>
                                <?php echo $mascota['Raza']['nombre'] . ' ' . $mascota['Raza']['descripcion'] ?>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <h5><strong>Padre</strong></h5>
                                <?php echo $mascota['Reproductor']['nombre_completo'] ?>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <h5><strong>Madre</strong></h5>
                                <?php echo $mascota['Reproductora']['nombre_completo'] ?>
                            </div>
                        </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <h5><strong>Propietario</strong></h5>
                                <?php echo $mascota['Propietarioactual']['nombre'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="span2">
                        <div class="row-fluid">
                            <div class="span12 center" id="codigoQRejemplar">
                                <?php //echo $this->Html->image('codigoQR.jpg',array('style' => 'height: 180px;'));?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <div class="row-fluid">
                <div class="span12">
                    <div class="span4 center blanco">
                        <h5><strong>KCB</strong></h5>
                        <?php echo $mascota['Mascota']['kcb'] ?>
                    </div>
                    <div class="span4 center blanco">
                        <h5><strong>Numero de Tatuaje</strong></h5>
                        <?php echo $mascota['Mascota']['num_tatuaje'] ?>
                    </div>
                    <div class="span4 center blanco">
                        <h5><strong>Numero de Chip</strong></h5>
                        <?php echo $mascota['Mascota']['chip'] ?>
                    </div>
                </div>
            </div>
            <br />
            <div class="row-fluid">
                <div class="span12">
                    <div class="span4 center blanco">
                        <h5><strong>Fecha de Nacimiento</strong></h5>
                        <?php echo $mascota['Mascota']['fecha_nacimiento'] ?>
                    </div>
                    <div class="span4 center blanco">
                        <h5><strong>Color</strong></h5>
                        <?php echo $mascota['Mascota']['color'] ?>
                    </div>
                    <div class="span4 center blanco">
                        <h5><strong>Se&ntilde;as o Marca</strong></h5>
                        <?php echo $mascota['Mascota']['senas'] ?>
                    </div>
                </div>
            </div>
            <br />
            <div class="row-fluid">
                <div class="span12">
                    <div class="span4 center blanco">
                        <h5><strong>Variedad</strong></h5>
                        <?php echo $mascota['Mascota']['variedad'] ?>
                    </div>
                    <div class="span4 center blanco">
                        <h5><strong>Sexo</strong></h5>
                        <?php echo $mascota['Mascota']['sexo'] ?>
                    </div>
                    <div class="span4 center blanco">
                        <h5><strong>Propietario</strong></h5>
                        <?php echo $mascota['Propietarioactual']['nombre'] ?>
                    </div>
                </div>
            </div>
            <br />
            <div class="row-fluid">
                <div class="span12">
                    <div class="span6 center blanco">
                        <h5><strong>Afijo</strong></h5>
                        <?php
                        echo $mascota['Criadero']['nombre'];
                        ?>
                    </div>
                    <div class="span6 center blanco">
                        <h5><strong>Lugar</strong></h5>
                        <?php echo $mascota['Departamento']['nombre'] ?>
                    </div>

                </div>
            </div>
            <br />
            <div class="row-fluid">
                <div class="span12">
                    <div class="span4 center blanco">
                        <h5><strong>Consanguinidad</strong></h5>
                        <?php echo $mascota['Mascota']['consanguinidad'] ?>
                    </div>
                    <div class="span4 center blanco">
                        <h5><strong>Hermanos</strong></h5>
                        <?php echo $mascota['Mascota']['hermano'] ?>
                    </div>
                    <div class="span2 center blanco">
                        <h5><strong>Lechigada</strong></h5>
                        <?php echo $mascota['Mascota']['lechigada'] ?>
                    </div>
                    <div class="span2 center blanco">
                        <h5><strong>Fecha Emision</strong></h5>
                        <?php echo $mascota['Mascota']['fecha_emision'] ?>
                    </div>
                </div>
            </div>
            <h3 align="center">Examenes</h3>
            <!-- Table -->
            <table class="table table-bordered table-white">
                <!-- Table heading -->
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Examen</th>
                    </tr>
                </thead>
                <!-- // Table heading END -->
                <!-- Table body -->
                <tbody>
                    <?php foreach ($examenes as $ex): ?>
                        <tr>
                            <td><?php echo $ex['Examenesmascota']['fecha_examen'] ?></td>
                            <td><?php echo $ex['Examene']['descripcion'] ?></td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <!-- // Table body END -->

            </table>
            <h3 align="center">Transferencias</h3>
            <!-- Table -->
            <table class="table table-bordered table-white">

                <!-- Table heading -->
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Propietario</th>
                    </tr>
                </thead>
                <!-- // Table heading END -->

                <!-- Table body -->
                <tbody>
                    <?php foreach ($transferencias as $pro): ?>
                        <tr>
                            <td><?php echo $pro['Mascotaspropietario']['fecha_transfer'] ?></td>
                            <td><?php echo $pro['Propietario']['nombre'] ?></td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <!-- // Table body END -->
            </table>
            <!-- // Table END -->
            <h3 align="center">Titulos</h3>
            <!-- Table -->
            <table class="table table-bordered table-white">

                <!-- Table heading -->
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Titulo</th>
                    </tr>
                </thead>
                <!-- // Table heading END -->

                <!-- Table body -->
                <tbody>
                    <?php foreach ($titulos as $ti): ?>
                        <tr>
                            <td><?php echo $ti['Mascotastitulo']['fecha_obtencion'] ?></td>
                            <td><?php echo $ti['Titulo']['nombre'] ?></td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
                <!-- // Table body END -->

            </table>
            <!-- // Table END -->
            <!-- // Table END -->

            <div class="row-fluid">
                <div class="span12">
                    <h3 class="center">Eventos</h3>
                    <!-- Table -->
                    <table class="table table-bordered table-white">

                        <!-- Table heading -->
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Evento</th>
                                <th>Pista</th>
                                <th>Categoria</th>
                                <th>Catalogo</th>
                                <th>Puntos</th>
                                <th>Pts. Adult.</th>
                            </tr>
                        </thead>
                        <?php foreach ($eventos as $eve): ?>
                            <tr>
                                <td><?php echo $eve['EventosMascotasPuntaje']['created']; ?></td>
                                <td><?php echo $eve['Evento']['nombre']; ?></td>
                                <?php $nombrepista = array(); ?>
                                <?php $nombrepista = $mpista->find('first', array('conditions' => array('Pista.id' => $eve['EventosPista']['pista_id']))); ?>
                                <td><?php echo $nombrepista['Pista']['nombre']; ?></td>
                                <td><?php echo $eve['Categoriaspista']['nombre']; ?></td>
                                <td><?php echo $eve['EventosMascota']['catalogo']; ?></td>
                                <td><?php echo $eve['EventosMascotasPuntaje']['puntos']; ?></td>
                                <td><?php echo $eve['EventosMascotasPuntaje']['puntos_adultos']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tbody>

                        </tbody>
                        <!-- // Table body END -->

                    </table>
                    <!-- // Table END -->
                </div>
            </div>

            <div class="row-fluid hidden-phone hidden-tablet">
                <div class="span12 center">
                    <div class="span12">
                        <h3>GENERACIONES</h3>
                    </div>
                    <ul id="org" style="display:none">
                        <li>
                            <a href="<?php echo $this->Html->url(array('action' => 'ver', $mascota['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>

                            <ul>
                                <li>
                                    <?php if (!empty($padre[1])): ?>
                                        <?php
                                        $imagen = 'perro.jpg';
                                        if (!empty($padre[1]['Mascota']['imagen'])) {
                                            $imagen = 'fotos/' . $mascota[1]['Mascota']['imagen'];
                                        }
                                        ?>
                                        <a title="<?php echo $padre[1]['Mascota']['nombre_completo']; ?>" href="<?php echo $this->Html->url(array('action' => 'ver', $padre[1]['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>

                                    <?php endif; ?>
                                    <ul>
                                        <li>
                                            <?php if (!empty($padre[3])): ?>
                                                <?php
                                                $imagen = 'perro.jpg';
                                                if (!empty($padre[3]['Mascota']['imagen'])) {
                                                    $imagen = 'fotos/' . $mascota[3]['Mascota']['imagen'];
                                                }
                                                ?>
                                                <a title="<?php echo $padre[3]['Mascota']['nombre_completo']; ?>" href="<?php echo $this->Html->url(array('action' => 'ver', $padre[3]['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>
                                            <?php endif; ?>
                                            <ul>
                                                <li>
<?php if (!empty($padre[7])): ?>
                                                        <?php
                                                        $imagen = 'perro.jpg';
                                                        if (!empty($padre[7]['Mascota']['imagen'])) {
                                                            $imagen = 'fotos/' . $mascota[7]['Mascota']['imagen'];
                                                        }
                                                        ?>
                                                        <a title="<?php echo $padre[7]['Mascota']['nombre_completo']; ?>" href="<?php echo $this->Html->url(array('action' => 'ver', $padre[7]['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>
                                                    <?php endif; ?>
                                                </li>
                                                <li>
                                                    <?php if (!empty($padre[8])): ?>
    <?php
    $imagen = 'perro.jpg';
    if (!empty($padre[8]['Mascota']['imagen'])) {
        $imagen = 'fotos/' . $mascota[8]['Mascota']['imagen'];
    }
    ?>
                                                        <a title="<?php echo $padre[8]['Mascota']['nombre_completo']; ?>" href="<?php echo $this->Html->url(array('action' => 'ver', $padre[8]['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
<?php if (!empty($padre[4])): ?>
    <?php
    $imagen = 'perro.jpg';
    if (!empty($padre[4]['Mascota']['imagen'])) {
        $imagen = 'fotos/' . $mascota[4]['Mascota']['imagen'];
    }
    ?>
                                                <a title="<?php echo $padre[4]['Mascota']['nombre_completo']; ?>" href="<?php echo $this->Html->url(array('action' => 'ver', $padre[4]['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>
                                            <?php endif; ?>
                                            <ul>
                                                <li>
                                            <?php if (!empty($padre[9])): ?>
                                                <?php
                                                $imagen = 'perro.jpg';
                                                if (!empty($padre[9]['Mascota']['imagen'])) {
                                                    $imagen = 'fotos/' . $mascota[9]['Mascota']['imagen'];
                                                }
                                                ?>
                                                        <a title="<?php echo $padre[9]['Mascota']['nombre_completo']; ?>" href="<?php echo $this->Html->url(array('action' => 'ver', $padre[9]['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>
                                                    <?php endif; ?>
                                                </li>
                                                <li>
                                                    <?php if (!empty($padre[10])): ?>
                                                        <?php
                                                        $imagen = 'perro.jpg';
                                                        if (!empty($padre[10]['Mascota']['imagen'])) {
                                                            $imagen = 'fotos/' . $mascota[10]['Mascota']['imagen'];
                                                        }
                                                        ?>
                                                        <a title="<?php echo $padre[10]['Mascota']['nombre_completo']; ?>" href="<?php echo $this->Html->url(array('action' => 'ver', $padre[10]['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                                    <?php if (!empty($padre[2])): ?>
    <?php
    $imagen = 'perro.jpg';
    if (!empty($padre[2]['Mascota']['imagen'])) {
        $imagen = 'fotos/' . $mascota[2]['Mascota']['imagen'];
    }
    ?>
                                        <a title="<?php echo $padre[2]['Mascota']['nombre_completo']; ?>" href="<?php echo $this->Html->url(array('action' => 'ver', $padre[2]['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>
                                    <?php endif; ?>
                                    <ul>
                                        <li>
                                    <?php if (!empty($padre[5])): ?>
                                        <?php
                                        $imagen = 'perro.jpg';
                                        if (!empty($padre[5]['Mascota']['imagen'])) {
                                            $imagen = 'fotos/' . $mascota[5]['Mascota']['imagen'];
                                        }
                                        ?>
                                                <a title="<?php echo $padre[5]['Mascota']['nombre_completo']; ?>" href="<?php echo $this->Html->url(array('action' => 'ver', $padre[5]['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>
                                            <?php endif; ?>
                                            <ul>
                                                <li>
                                            <?php if (!empty($padre[11])): ?>
                                                <?php
                                                $imagen = 'perro.jpg';
                                                if (!empty($padre[11]['Mascota']['imagen'])) {
                                                    $imagen = 'fotos/' . $mascota[11]['Mascota']['imagen'];
                                                }
                                                ?>
                                                        <a title="<?php echo $padre[11]['Mascota']['nombre_completo']; ?>" href="<?php echo $this->Html->url(array('action' => 'ver', $padre[11]['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>
                                                    <?php endif; ?>
                                                </li>
                                                <li>
                                                    <?php if (!empty($padre[12])): ?>
                                                        <?php
                                                        $imagen = 'perro.jpg';
                                                        if (!empty($padre[12]['Mascota']['imagen'])) {
                                                            $imagen = 'fotos/' . $mascota[12]['Mascota']['imagen'];
                                                        }
                                                        ?>
                                                        <a title="<?php echo $padre[12]['Mascota']['nombre_completo']; ?>" href="<?php echo $this->Html->url(array('action' => 'ver', $padre[12]['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>
<?php endif; ?>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                                    <?php if (!empty($padre[6])): ?>
                                                        <?php
                                                        $imagen = 'perro.jpg';
                                                        if (!empty($padre[6]['Mascota']['imagen'])) {
                                                            $imagen = 'fotos/' . $mascota[6]['Mascota']['imagen'];
                                                        }
                                                        ?>
                                                <a title="<?php echo $padre[6]['Mascota']['nombre_completo']; ?>" href="<?php echo $this->Html->url(array('action' => 'ver', $padre[6]['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>
<?php endif; ?>
                                            <ul>
                                                <li>
                                            <?php if (!empty($padre[13])): ?>
                                                <?php
                                                $imagen = 'perro.jpg';
                                                if (!empty($padre[13]['Mascota']['imagen'])) {
                                                    $imagen = 'fotos/' . $mascota[13]['Mascota']['imagen'];
                                                }
                                                ?>
                                                        <a title="<?php echo $padre[13]['Mascota']['nombre_completo']; ?>" href="<?php echo $this->Html->url(array('action' => 'ver', $padre[13]['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>
                                            <?php endif; ?>
                                                </li>
                                                <li>
                                                    <?php if (!empty($padre[14])): ?>
                                                        <?php
                                                        $imagen = 'perro.jpg';
                                                        if (!empty($padre[14]['Mascota']['imagen'])) {
                                                            $imagen = 'fotos/' . $mascota[14]['Mascota']['imagen'];
                                                        }
                                                        ?>
                                                        <a title="<?php echo $padre[14]['Mascota']['nombre_completo']; ?>" href="<?php echo $this->Html->url(array('action' => 'ver', $padre[14]['Mascota']['id'])); ?>"><?php echo $this->Html->image('' . $imagen, array('style' => 'width: 120px; height: 120px;')); ?></a>
                                                    <?php endif; ?>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div id="chart" class="orgChart"></div>

                </div>
            </div>
            <div class="row-fluid hidden-phone hidden-tablet">
                <div class="span12 center">
<?php
if ($this->Session->read('Auth.User.role') == 'administrador') {
    echo $this->Html->link('CERTIFICADO', array('action' => 'certificado', $mascota['Mascota']['id']), array('class' => 'btn btn-block btn-inverse'));
}
?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    var textoqr = "<?php echo 'KCB: ' . trim($mascota['Mascota']['kcb']) . '\nNombre: ' . trim($mascota['Mascota']['nombre_completo']) . '\nRaza: ' . trim($mascota['Raza']['nombre']) . '\nN. Tatuaje: ' . trim($mascota['Mascota']['num_tatuaje']) . '\nChip: ' . trim($mascota['Mascota']['chip']) . '\nSexo: ' . trim($mascota['Mascota']['sexo']) . '\nF.nacimiento: ' . $mascota['Mascota']['fecha_nacimiento']; ?>";

    var opcionesQRejmeplar = {
        render: 'image'
        , size: 176
        , background: '#fdfdfd'
        , text: textoqr
    };
    var divSelector = '#codigoQRejemplar';
</script>
<?php
$this->Html->script(array(
    'jquery.qrcode-0.10.0.js'
    , 'codigoQRini.js'
        ), array('block' => 'scriptQR'));
?>
    