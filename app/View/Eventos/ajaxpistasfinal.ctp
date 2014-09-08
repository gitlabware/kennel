
<div class="content">
                                           <?php 
                                            
                                            //debug($cachoespe);exit;
                                            if(!empty($cachoespe)):
                                            //foreach($gruposr as $gra):
                                            ?>
                                            <h2>LISTADO DE INSCRITOS / RAZA: <?php echo $nomraza?></h2>
                                            
                                            <?php //echo $pista?>
                                            <?php echo $this->Form->create('EventosMascotasPuntaje',array('action' => 'ajaxespegrupo',$idEvento));?>
                                            <table id="table-example<?php echo $pista?>" class="dynamicTable colVis table table-striped table-bordered table-condensed table-white">
                                                <thead>
                                                    <tr>
                                                        <th>Registro</th>
                                                        <th>Ejemplar</th>
                                                        <th>Catalogo</th>
                                                        <?php if($sw == 1):?>
                                                        <th>Raza</th>
                                                        <?php endif;?>
                                                        <th>Cate.</th>
                                                        <th>Sexo</th>
                                                        <th>Calificacion</th>
                                                        <th>Mj.R.Cach.</th>
                                                        <th>Mj.R.Jo.</th>
                                                        <th>Mj.R.Adul.</th>
                                                        <th>Gr.Cach.Jo.</th>
                                                        <th>Gr.Adul.</th>
                                                        <th>Bis.Cach.Jo.</th>
                                                        <th>Bis.Adul.</th>
                                                        <th>CJC</th>
                                                        <th>CAC</th>
                                                        <th>CGC</th>
                                                        <th>CACIB</th>
                                                        <th>CACLAB</th>
                                                        <th>TOTAL</th>
                                                        <th>Total Adult.</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                
                                                    <?php 
                                                    $k = 0;
                                                    foreach ($cachoespe as $m): $k++;?>
                                                    
                                                        <tr class="gradeX">
                                                            <?php if(!empty($m['Mascota']['kcb'])):?>
                                                            <td><?php echo 'KCB '.$m['Mascota']['kcb'] ?></td> 
                                                            <?php else:?>
                                                            <td><?php echo $m['Mascota']['codigo'] ?></td> 
                                                            <?php endif;?>
                                                            <td><?php echo $m['Mascota']['nombre_completo']; ?></td>
                                                            <?php 
                                                            if($m['EventosMascotasPuntaje']['categoriaspista_id'] == 1)
                                                            {
                                                                $colortd = 'FFFF99';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['categoriaspista_id'] == 2)
                                                            {
                                                                $colortd = 'A9BFFA';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['categoriaspista_id'] == 3 || $m['EventosMascotasPuntaje']['categoriaspista_id'] == 4)
                                                            {
                                                                $colortd = 'CCF7CE';
                                                            }
                                                            
                                                            if($m['EventosMascotasPuntaje']['categoriaspista_id'] == 5 || $m['EventosMascotasPuntaje']['categoriaspista_id'] == 6)
                                                            {
                                                                $colortd = 'F7E49B';
                                                            }
                                                            
                                                            if($m['EventosMascotasPuntaje']['categoriaspista_id'] == 7 || $m['EventosMascotasPuntaje']['categoriaspista_id'] == 8)
                                                            {
                                                                $colortd = 'FDC2AA';
                                                            }
                                                            
                                                            if($m['EventosMascotasPuntaje']['categoriaspista_id'] == 9 || $m['EventosMascotasPuntaje']['categoriaspista_id'] == 10)
                                                            {
                                                                $colortd = 'F0D7F2';
                                                            }
                                                            
                                                            ?>
                                                            <td style="background-color:#<?php echo $colortd?>"><b><?php echo $m['EventosMascota']['catalogo']?></b></td>
                                                            <?php if($sw == 1):?>
                                                            <td><?php echo $m['Raza']['nombre'] ?></td>
                                                            <?php endif;?>
                                                            <?php 
                                                            if($m['EventosMascotasPuntaje']['categoriaspista_id'] == 1)
                                                            {
                                                                $categoriam = 'C.esp';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['categoriaspista_id'] == 2)
                                                            {
                                                                $categoriam = 'C.abs';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['categoriaspista_id'] == 3 || $m['EventosMascotasPuntaje']['categoriaspista_id'] == 4)
                                                            {
                                                                $categoriam = 'Jov.';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['categoriaspista_id'] == 5 || $m['EventosMascotasPuntaje']['categoriaspista_id'] == 6)
                                                            {
                                                                $categoriam = 'Int.';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['categoriaspista_id'] == 7 || $m['EventosMascotasPuntaje']['categoriaspista_id'] == 8)
                                                            {
                                                                $categoriam = 'Abie.';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['categoriaspista_id'] == 9 || $m['EventosMascotasPuntaje']['categoriaspista_id'] == 10)
                                                            {
                                                                $categoriam = 'Camp.';
                                                            }
                                                            
                                                            ?>
                                                            <td style="background-color:#<?php echo $colortd?>"><?php echo $categoriam;?></td>
                                                            <td class="center">
                                                                <?php //echo $m['Mascota']['Propietarioactual']['nombre'] ?>
                                                                <?php echo $m['Mascota']['sexo']?>
                                                            </td>
                                                            <td>
                                                            <?php echo $m['Calificacione']['nombre']?>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            <div class="span6">
                                                            <?php 
                                                            if($m['EventosMascotasPuntaje']['mejor_cachorro'] == 1)
                                                            {
                                                                $checked = '10';
                                                            }
                                                            else{
                                                                $checked = '';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['mejor_cachorro_opuesto'] == 1)
                                                            {
                                                                $checkedo = '5';
                                                            }
                                                            else{
                                                                $checkedo = '';
                                                            }
                                                            ?>
                                                            <?php echo $checked;?>
                                                            
                                                            </div>
                                                            <div class="span6">
                                                            <?php echo $checkedo;?>
                                                            </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            <div class="span6">
                                                            <?php 
                                                            if($m['EventosMascotasPuntaje']['mejor_raza_joven'] == 1)
                                                            {
                                                                $checked = '10';
                                                            }
                                                            else{
                                                                $checked = '';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['mejor_raza_joven_sexo_opuesto'] == 1)
                                                            {
                                                                $checkedo = '5';
                                                            }
                                                            else{
                                                                $checkedo = '';
                                                            }
                                                            ?>
                                                            <?php echo $checked;?>
                                                            </div>
                                                            <div class="span6">
                                                            <?php echo $checkedo;?>
                                                            </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            <div class="span6">
                                                            <?php 
                                                            if($m['EventosMascotasPuntaje']['mejor_raza_adulto'] == 1)
                                                            {
                                                                $checked = '10';
                                                            }
                                                            else{
                                                                $checked = '';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['mejor_raza_adulto_sexo_opuesto'] == 1)
                                                            {
                                                                $checkedo = '5';
                                                            }
                                                            else{
                                                                $checkedo = '';
                                                            }
                                                            ?>
                                                            <?php echo $checked;?>
                                                            </div>
                                                            <div class="span6">
                                                            <?php echo $checkedo;?>
                                                            </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            <div class="span6">
                                                            <?php 
                                                            if($m['EventosMascotasPuntaje']['mejor_grupo'] == 1)
                                                            {
                                                                $checked = '20';
                                                            }
                                                            else{
                                                                $checked = '';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['reserva_grupo'] == 1)
                                                            {
                                                                $checkedo = '10';
                                                            }
                                                            else{
                                                                $checkedo = '';
                                                            }
                                                            ?>
                                                            <?php echo $checked;?>
                                                            </div>
                                                            <div class="span6">
                                                            <?php echo $checkedo;?>
                                                            </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            <div class="span6">
                                                            <?php 
                                                            if($m['EventosMascotasPuntaje']['mejor_grupo_adultos'] == 1)
                                                            {
                                                                $checked = '20';
                                                            }
                                                            else{
                                                                $checked = '';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['reserva_grupo_adultos'] == 1)
                                                            {
                                                                $checkedo = '10';
                                                            }
                                                            else{
                                                                $checkedo = '';
                                                            }
                                                            ?>
                                                            <?php echo $checked;?>
                                                            </div>
                                                            <div class="span6">
                                                            <?php echo $checkedo;?>
                                                            </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            
                                                            <?php echo $m['EventosMascotasPuntaje']['puntosex'].' ('.$m['EventosMascotasPuntaje']['puesto_exposicion'].' o)';?>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            
                                                            <?php echo $m['EventosMascotasPuntaje']['puntosex_adultos'].' ('.$m['EventosMascotasPuntaje']['puesto_exposicion_adultos'].' o)';?>
                                                            </div>
                                                            </td>
                                                            <?php
                                                            if($m['EventosMascotasPuntaje']['cjc'] == 1)
                                                            {
                                                                $checked = 'CJC';
                                                            }
                                                            else{
                                                                $checked = '';
                                                            } 
                                                            ?>
                                                            <td><?php echo $checked;?></td>
                                                            
                                                            <?php
                                                            if($m['EventosMascotasPuntaje']['caclab'] == 1)
                                                            {
                                                                $caclab = 'CACLAB';
                                                            }
                                                            else{
                                                                $caclab = '';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['cacib'] == 1)
                                                            {
                                                                $cacib = 'CACIB';
                                                            }
                                                            else{
                                                                $cacib = '';
                                                            }  
                                                            ?>
                                                            <td>
                                                            <div class="span12">
                                                            <div class="span6">
                                                            <?php
                                                            if($m['EventosMascotasPuntaje']['cac'] == 1)
                                                            {
                                                                $cac = 'CAC';
                                                            }
                                                            else{
                                                                $cac = '';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['cgc'] == 1)
                                                            {
                                                                $cgc = 'CGC';
                                                            }
                                                            else{
                                                                $cgc = '';
                                                            }  
                                                            ?>
                                                            <?php echo $cac;?>
                                                            <?php //echo $this->Form->hidden("EventosMascotasPuntaje.$k.categoriaspista_id",array('value' => $m['EventosMascotasPuntaje']['categoriaspista_id']));?>
                                                            </div>
                                                            <div class="span6">
                                                            <?php echo $m['EventosMascotasPuntaje']['puntaje_cac'];?>
                                                            
                                                            </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            <div class="span6">
                                                            <?php echo $cgc;?>
                                                            </div>
                                                            <div class="span6">
                                                            <?php echo $m['EventosMascotasPuntaje']['puntaje_cgc'];?></td>
                                                            
                                                            </div>
                                                            </div>
                                                            <td><?php echo $caclab;?></td>
                                                            <td><?php echo $cacib;?></td>
                                                            <td><?php echo $m['EventosMascotasPuntaje']['puntos'];?></td>
                                                            <td><?php echo $m['EventosMascotasPuntaje']['puntos_adultos'];?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                
                                                
                                            </table>
                                            
                                            
                                    <script>
                                    $(document).ready( function () {
                                     	var oTable = $('#table-example<?php echo $p['EventosPista']['id']?>').dataTable( {
                                     		"sScrollX": "100%",
                                     		//"sScrollXInner": "300%",
                                     		"bScrollCollapse": true
                                     	} );
                                     	new FixedColumns( oTable, {
                                     		"iLeftColumns": 4,
                                    		"iLeftWidth": 650
                                     	} );
                                     } );
                                    </script>
                                    
                                    <div id="<?php echo 'espegrupo'.$p['EventosPista']['id'].'-1'?>" class="span12">
                                    
                                    </div>
                                <?php else:?>
                                    <h3>NO SE ENCONTRO INSCRITOS!!!!</h3>        
                                    <?php endif;
                                                    ?>
                                        </div>