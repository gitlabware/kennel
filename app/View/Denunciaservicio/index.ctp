<h3 align="center">&nbsp;&nbsp; Listado de Denuncias de Servicio</h3>
<div class="innerLR">

    <!-- Widget -->
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">

            <!-- Table -->
            <table class="dynamicTable tableTools table table-striped table-bordered table-condensed table-white">
                <!-- Table heading -->
                <thead>
                    <tr>                        
                        <th>COD</th>
                        <th>Prop. Macho</th>
                        <th>Prop. Hembra</th>
                        <th>Ej. Macho</th>
                        <th>Ej. Hembra</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <!-- // Table heading END -->

                <!-- Table body -->
                <tbody>
                    <?php $i = 0; ?>
                    <?php foreach ($denuncias as $denuncia): ?>
                        <tr class="gradeA">
                            <?php $i++; ?>                            
                            <td class="center"><?php echo $denuncia['Servicio']['id'] ?></td>
                            <td>
                                <?php
                                if ($denuncia['Servicio']['propietario_macho'] != null)
                                {
                                    echo $denuncia['Servicio']['propietario_macho'];
                                } else
                                {
                                    echo $denuncia['Propietarioreproductor']['nombre'];
                                }
                                ?>
                            </td>
                            <td><?php echo $denuncia['Propietarioreproductora']['nombre'] ?></td>
                            <td class="center">
                                <?php
                                if ($denuncia['Servicio']['reproductor'] != null)
                                    echo $denuncia['Servicio']['reproductor'];
                                else
                                    echo $denuncia['Reproductor']['nombre'];
                                ?>
                            </td>
                            <td class="center"><?php echo $denuncia['Reproductora']['nombre'] ?></td>
                            <td>

                                <div class="dropdown">
                                    <button class="btn dropdown-toggle sr-only" type="button" id="dropdownMenu1" data-toggle="dropdown">
                                        Accion
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">

                                        <?php if ($denuncia['Monta']['id'] != null): ?>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->Html->url(array('action' => 'vermonta', $denuncia['Monta']['id'])); ?>">Ver Monta</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->Html->url(array('action' => 'registrarmonta', $denuncia['Servicio']['id'])); ?>">Monta</a></li>
                                            <li role="presentation"><a href="javascript:" role="menuitem" tabindex="-1" onclick="if (confirm('Esta seguro de aliminar??')) {
                                                    location.href = '<?php echo $this->Html->url(array('action' => 'eliminarmonta', $denuncia['Monta']['id'])); ?>';
                                                }">Eliminar Monta</a></li>

                                        <?php endif; ?>

                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->Html->url(array('action' => 'ver', $denuncia['Servicio']['id'])); ?>">Ver Servicio</a></li>
                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->Html->url(array('action' => 'insertarservicio', $denuncia['Servicio']['id'])); ?>">Servicio</a></li>
                                        <li role="presentation"><a href="javascript:" role="menuitem" tabindex="-1" onclick="if (confirm('Esta seguro de aliminar??')) {
                                                location.href = '<?php echo $this->Html->url(array('action' => 'eliminar', $denuncia['Servicio']['id'])); ?>';
                                            }">Eliminar Servicio</a></li>

                                        <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->Html->url(array('action' => 'denuncia', $denuncia['Servicio']['id'], $denuncia['Denuncianacimiento']['id'])); ?>">Registrar Nacimiento</a></li>
                                        <?php if ($denuncia['Denuncianacimiento']['servicio_id'] != null): ?>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->Html->url(array('action' => 'vernacimiento', $denuncia['Denuncianacimiento']['id'])); ?>">Ver Nacimiento</a></li>                                        
                                            <li role="presentation"><a href="javascript:" role="menuitem" tabindex="-1" onclick="if (confirm('Esta seguro de aliminar??')) {
                                                    location.href = '<?php echo $this->Html->url(array('action' => 'eliminarnacimiento', $denuncia['Servicio']['id'])); ?>';
                                                }">Eliminar Nacimiento</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->Html->url(array('action' => 'registrarcamada', $denuncia['Servicio']['id'], $denuncia['Denuncianacimiento']['id'], $denuncia['Camada']['id'])); ?>">Camada</a></li>
                                            <?php if ($denuncia['Camada']['id'] != null): ?>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->Html->url(array('action' => 'vercamada', $denuncia['Camada']['id'])); ?>">Ver Camada</a></li>  
                                                <li role="presentation"><a href="javascript:" role="menuitem" tabindex="-1" onclick="if (confirm('Esta seguro de aliminar??')) {
                                                        location.href = '<?php echo $this->Html->url(array('action' => 'eliminarcamada', $denuncia['Camada']['id'])); ?>';
                                                    }">Eliminar Camada</a></li>
                                                
                                                <?php if (empty($denuncia['Camada']['Informecomcria'])): ?>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->Html->url(array('action' => 'informecomision', $denuncia['Camada']['id'])); ?>">Informe de Com Cria</a></li>
                                                <?php else:?>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->Html->url(array('action' => 'informecomision', $denuncia['Camada']['id'],$denuncia['Camada']['Informecomcria']['id'])); ?>">Informe de Com Cria</a></li>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->Html->url(array('action' => 'vercomision', $denuncia['Camada']['Informecomcria']['id'])); ?>">Ver Inf. Com. Cria</a></li>
                                                    <li role="presentation"><a href="javascript:" role="menuitem" tabindex="-1" onclick="if (confirm('Esta seguro de aliminar??')) {
                                                            location.href = '<?php echo $this->Html->url(array('action' => "eliminarcomision", $denuncia['Camada']['Informecomcria']['id'])); ?>';
                                                        }">Eliminar Comision</a></li>
                                                <?php endif; ?>
                                                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo $this->Html->url(array('action' => 'mapacamada', $denuncia['Camada']['id'])); ?>">Mapa Camada</a></li>
                                            <?php endif; ?>
                                        <?php endif; ?>  


                                    </ul>
                                </div>

                            </td>
                        </tr>	
                    <?php endforeach; ?>	
                </tbody>
                <!-- // Table body END -->

            </table>
            <!-- // Table END -->

        </div>
    </div>



</div>	

<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />