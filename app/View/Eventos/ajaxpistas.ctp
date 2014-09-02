
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
                                                        <th>R.Cach.</th>
                                                        <th>R.Jov</th>
                                                        <th>R.Adul</th>
                                                        <th>G.Cach.Jo</th>
                                                        <th>G.Adul</th>
                                                        <th>BIS.Cach.Jo</th>
                                                        <th>BIS.Adul</th>
                                                        <th>CJC</th>
                                                        <th>CAC</th>
                                                        <th>CGC</th>
                                                        <th>CACIB</th>
                                                        <th>CACLAB</th>
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
                                                             
                                                            <?php echo $this->Form->select("EventosMascotasPuntaje.$k.calificacione_id",$listcalificaciones, array('id' => $m['EventosMascotasPuntaje']['id'],'value' => $m['EventosMascotasPuntaje']['calificacione_id'],'class' => 'span12'));?>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            <div class="span6">
                                                            <?php 
                                                            if($m['EventosMascotasPuntaje']['mejor_cachorro'] == 1)
                                                            {
                                                                $checked = 'checked';
                                                            }
                                                            else{
                                                                $checked = '';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['mejor_cachorro_opuesto'] == 1)
                                                            {
                                                                $checkedo = 'checked';
                                                            }
                                                            else{
                                                                $checkedo = '';
                                                            }
                                                            ?>
                                                            <?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.mejor_cachorro", array('hiddenField' => false,$checked));
                                                                  echo $this->Form->hidden("EventosMascotasPuntaje.$k.id",array('value' => $m['EventosMascotasPuntaje']['id'])); 
                                                                  //echo $this->Form->hidden("EventosMascotasPuntaje.$k.ggg",array('value' => $m['Mascota']['nombre_completo'])); 
                                                            ?>
                                                            
                                                            </div>
                                                            <div class="span6">
                                                            <?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.mejor_cachorro_opuesto", array('hiddenField' => false,$checkedo));?>
                                                            </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            <div class="span6">
                                                            <?php 
                                                            if($m['EventosMascotasPuntaje']['mejor_raza_joven'] == 1)
                                                            {
                                                                $checked = 'checked';
                                                            }
                                                            else{
                                                                $checked = '';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['mejor_raza_joven_sexo_opuesto'] == 1)
                                                            {
                                                                $checkedo = 'checked';
                                                            }
                                                            else{
                                                                $checkedo = '';
                                                            }
                                                            ?>
                                                            <?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.mejor_raza_joven", array('hiddenField' => false,$checked)); 
                                                            ?>
                                                            
                                                            </div>
                                                            <div class="span6">
                                                            <?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.mejor_raza_joven_sexo_opuesto", array('hiddenField' => false,$checkedo));?>
                                                            </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            <div class="span6">
                                                            <?php 
                                                            if($m['EventosMascotasPuntaje']['mejor_raza_adulto'] == 1)
                                                            {
                                                                $checked = 'checked';
                                                            }
                                                            else{
                                                                $checked = '';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['mejor_raza_adulto_sexo_opuesto'] == 1)
                                                            {
                                                                $checkedo = 'checked';
                                                            }
                                                            else{
                                                                $checkedo = '';
                                                            }
                                                            ?>
                                                            <?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.mejor_raza_adulto", array('hiddenField' => false,$checked)); 
                                                            ?>
                                                            
                                                            </div>
                                                            <div class="span6">
                                                            <?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.mejor_raza_adulto_sexo_opuesto", array('hiddenField' => false,$checkedo));?>
                                                            </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            <div class="span6">
                                                            <?php 
                                                            if($m['EventosMascotasPuntaje']['mejor_grupo'] == 1)
                                                            {
                                                                $checked = 'checked';
                                                            }
                                                            else{
                                                                $checked = '';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['reserva_grupo'] == 1)
                                                            {
                                                                $checkedo = 'checked';
                                                            }
                                                            else{
                                                                $checkedo = '';
                                                            }
                                                            ?>
                                                            <?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.mejor_grupo", array('hiddenField' => false,$checked));
                                                            ?>
                                                            
                                                            </div>
                                                            <div class="span6">
                                                            <?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.reserva_grupo", array('hiddenField' => false,$checkedo));?>
                                                            </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            <div class="span6">
                                                            <?php 
                                                            if($m['EventosMascotasPuntaje']['mejor_grupo_adultos'] == 1)
                                                            {
                                                                $checked = 'checked';
                                                            }
                                                            else{
                                                                $checked = '';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['reserva_grupo_adultos'] == 1)
                                                            {
                                                                $checkedo = 'checked';
                                                            }
                                                            else{
                                                                $checkedo = '';
                                                            }
                                                            ?>
                                                            <?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.mejor_grupo_adultos", array('hiddenField' => false,$checked));
                                                            ?>
                                                            
                                                            </div>
                                                            <div class="span6">
                                                            <?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.reserva_grupo_adultos", array('hiddenField' => false,$checkedo));?>
                                                            </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            
                                                            <?php echo $this->Form->select("EventosMascotasPuntaje.$k.puesto_exposicion", array('1' => '1','2' => '2','3'=>'3','4'=>'4','5'=>'5'),array('value' => $m['EventosMascotasPuntaje']['puesto_exposicion'],'id' => 'bis'.$m['EventosMascotasPuntaje']['id'],'class' => 'span12'));
                                                            ?>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            
                                                            <?php echo $this->Form->select("EventosMascotasPuntaje.$k.puesto_exposicion_adultos", array('1' => '1','2' => '2','3'=>'3','4'=>'4','5'=>'5'),array('value' => $m['EventosMascotasPuntaje']['puesto_exposicion_adultos'],'id' => 'bisadul'.$m['EventosMascotasPuntaje']['id'],'class' => 'span12'));
                                                            ?>
                                                            </div>
                                                            </td>
                                                            <?php
                                                            if($m['EventosMascotasPuntaje']['cjc'] == 1)
                                                            {
                                                                $checked = 'checked';
                                                            }
                                                            else{
                                                                $checked = '';
                                                            } 
                                                            ?>
                                                            <td><?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.cjc", array('hiddenField' => false,$checked));?></td>
                                                            
                                                            <?php
                                                            if($m['EventosMascotasPuntaje']['caclab'] == 1)
                                                            {
                                                                $caclab = 'checked';
                                                            }
                                                            else{
                                                                $caclab = '';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['cacib'] == 1)
                                                            {
                                                                $cacib = 'checked';
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
                                                                $cac = 'checked';
                                                            }
                                                            else{
                                                                $cac = '';
                                                            }
                                                            if($m['EventosMascotasPuntaje']['cgc'] == 1)
                                                            {
                                                                $cgc = 'checked';
                                                            }
                                                            else{
                                                                $cgc = '';
                                                            }  
                                                            ?>
                                                            <?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.cac",array($cac));?>
                                                            <?php echo $this->Form->hidden("EventosMascotasPuntaje.$k.categoriaspista_id",array('value' => $m['EventosMascotasPuntaje']['categoriaspista_id']));?>
                                                            </div>
                                                            <div class="span6">
                                                            <?php echo $this->Form->text("EventosMascotasPuntaje.$k.puntaje_cac",array('value' => $m['EventosMascotasPuntaje']['puntaje_cac'],'class' => 'span12','style' => 'width: 20px'));?>
                                                            
                                                            </div>
                                                            </div>
                                                            </td>
                                                            <td>
                                                            <div class="span12">
                                                            <div class="span6">
                                                            <?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.cgc",array($cgc));?>
                                                            </div>
                                                            <div class="span6">
                                                            <?php echo $this->Form->text("EventosMascotasPuntaje.$k.puntaje_cgc",array('value' => $m['EventosMascotasPuntaje']['puntaje_cgc'],'class' => 'span12','style' => 'width: 20px'));?></td>
                                                            
                                                            </div>
                                                            </div>
                                                            <td><?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.caclab",array($caclab));?></td>
                                                            <td><?php echo $this->Form->checkbox("EventosMascotasPuntaje.$k.cacib",array($cacib));?></td>
                                                            
                                                            
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                               
                                            </table>
                                            
                                            <div class="span2">
                                            <b>Numero de Especiales</b> <?php echo $this->Form->text('Numero.numero_especiales',array('value' => $p['EventosPista']['numero_especiales'],'class' =>'span12'));?>
                                            
                                            </div>
                                            <div class="span2">
                                            <b>Numero de Absolutos</b> <?php echo $this->Form->text('Numero.numero_absolutos',array('value' => $p['EventosPista']['numero_absolutos'],'class' =>'span12'));?>
                                            
                                            </div>
                                            <div class="span2">
                                            <b>Numero de Jovenes</b> <?php echo $this->Form->text('Numero.numero_jovenes',array('value' => $p['EventosPista']['numero_jovenes'],'class' =>'span12'));?>
                                            
                                            </div>
                                            <div class="span2">
                                            <b>Numero de Adultos</b> <?php echo $this->Form->text('Numero.numero_adultos',array('value' => $p['EventosPista']['numero_adultos']-$p['EventosPista']['numero_jovenes'],'class' =>'span12'));?>
                                            
                                            </div>
                                            
                                            <div class="span2">
                                            <br />
                                            <?php $mostdiv = 'espegrupo'.$p['EventosPista']['id'].'-1'; $pis = '#espegrupo'.$p['EventosPista']['id'].'-1';
                                            echo $this->Js->submit('Registrar', array('url' => array('controller' => 'Eventos','action' => 'ajaxespegrupo',$idEvento,$k,$p['EventosPista']['id']), 
                                            'update' => '#espegrupo'.$p['EventosPista']['id'].'-1',
                                            'before' => '$("#espegrupo'.$p['EventosPista']['id'].'-1").toggle(300);',
                                            'complete' => '$("#espegrupo'.$p['EventosPista']['id'].'-1").toggle(300);',
                                            //'complete' => $this->Js->get('#todoscachoespe'.$p['EventosPista']['id'].'-1')->effect('hide', array('buffer' => false)),
                                            'class' => 'btn btn-block btn-primary','id' => 'espec'.$p['EventosPista']['id'].'-1')); 
                                                  echo $this->Form->end();  ?>
                                            </div>
                                            
                                           <?php $this->Js->get('#espec'.$p['EventosPista']['id'].'-1')->event(
                                    'click',
                                    " 
                                    "
                                    );?>
                                    <script>
                                    $(document).ready( function () {
                                     	var oTable = $('#table-example<?php echo $p['EventosPista']['id']?>').dataTable( {
                                     		"sScrollX": "100%",
                                     		//"sScrollXInner": "380%",
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