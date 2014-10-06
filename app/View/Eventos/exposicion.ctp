<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
<?php
App::Import('Model', 'EventosMascota');
$evenmas = new EventosMascota();
App::Import('Model', 'EventosPista');
$evenpis = new EventosPista();
App::Import('Model', 'EventosMascotasPuntaje');
$evenmaspunt = new EventosMascotasPuntaje();
App::Import('Model', 'GruposRaza');
$gruposraza = new GruposRaza();
App::Import('Model', 'Grupo');
$grupos = new Grupo();
$grupos2 = $grupos->find('all');

//$mejoresespeciales = $evenmas->find('all',array('order' => 'EventosMascota.puesto ASC','recursive' => 2,'conditions' => array('EventosMascota.evento_id' => $idEvento,'EventosMascota.categoriaspista_id' => 1)));
//$mejoresabsolutos = $evenmas->find('all',array('recursive' => 2,'order' => 'EventosMascota.puesto ASC','conditions' => array('EventosMascota.evento_id' => $idEvento,'EventosMascota.categoriaspista_id' => 2)));
?>
<div class="innerLR">

<div class="row-fluid">

		<div class="span12">
        <h3 align="center">Evento : <?php echo $evento['Evento']['nombre']?> </h3>
        <?php echo $this->Html->link('TERMINAR EVENTO',array('action' => 'exporeporte',$evento['Evento']['id'],1),array('class' => 'label label-success'));?>
        <a href="#myModal" data-toggle="modal" class="label label-info" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Eventos','action' => 'edita',$evento['Evento']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Editar</a>
        
    <div class="widget widget-tabs widget-tabs-double">

    <!-- Tabs Heading -->
    <div class="widget-head">
        <ul>
            <li class="active"><a href="#tab1-2" class="glyphicons circle_ok" data-toggle="tab"><i></i><span class="strong">Inscripciones</span><span>Inscribelo con el buscador</span></a>
            </li>
            <?php $i = 1;?>
            <?php foreach($pistas as $p):?>
            <?php $i++;?>
            <li class=""><a href="#tab<?php echo $i;?>-2" class="glyphicons credit_card" data-toggle="tab"><i></i><span class="strong"><?php echo $p['EventosPista']['numero'].' '.$p['Pista']['nombre']?></span><span><?php echo $p['EventosPista']['juez'];?></span></a>
            </li>
            <?php endforeach;?>
        </ul>
    </div>
    <!-- // Tabs Heading END -->

    <div class="widget-body">
        <div class="tab-content">

            <!-- Tab content -->
            <div class="tab-pane active" id="tab1-2">
            <div class="row-fluid">
                <div class="span3">
                
                <div class="row-fluid">
        	   <h4>Buscador de Mascota</h4>
        		<!-- Column -->
        		<div class="span12">
        		
        			<!-- Widget -->
        			<div class="widget widget-heading-simple widget-body-white" data-toggle="collapse-widget">
                    <?php
          echo $this->Form->create('Mascota');
                                ?>
        	            <h5 >Nombre de la Mascota</h5>
        				<?php echo $this->Form->text('Mascota.nombre_completo',array('placeholder'=>'Ingrese almenos 3 palabras','class' => 'span12')); ?>
        				<h5 >Kcb</h5>
        				<?php echo $this->Form->text('Mascota.kcb',array('placeholder'=>'Ingrese almenos 3 palabras','class' => 'span12')); ?>
        				<h5>Numero de Tatuaje</h5>
                        <?php echo $this->Form->text('Mascota.num_tatuaje',array('placeholder'=>'Ingrese almenos 3 palabras','class' => 'span12')); ?>
                         <?php
                        echo $this->Js->submit('Buscar', array('url' => array('controller' => 'Eventos','action' => 'ajaxlistado',$idEvento), 'update' => '#listado3','class' => 'btn btn-block btn-success'));
                        echo $this->Form->end();
                        ?>
        			</div>
        			<!-- // Widget END -->
                 </div>
        		<!-- // Column END -->
        		</div>
                </div>	
                <div class="span9">
                     <br />
                                    <?php echo $this->Html->link('ACTUALIZAR',array('controller' => 'Eventos','action' => 'actualizapistas',$idEvento),array('class' => 'btn btn-block btn-primary','align' => 'center'));?>
                                    <input type="button" value="Adicionar Pistas" onclick='$("#adipista").toggle(400);' class="btn btn-block btn-success">
                                    <div id="adipista" style="display:none;">
                                            <div class="row-fluid">
                                            
                                    		<!-- Column -->
                                    		<div class="span12">
                                    		
                                    			<!-- Widget -->
                                    			<div class="widget row-fluid widget-heading-simple widget-body-gray" data-toggle="collapse-widget">
                                                <div class="widget-body">
                                                <h4><?php 
                                        $fecha11 = $evento['Evento']['fecha_inicio'];
                                        $fecha112 = explode("-",$fecha11);
                                        $gestion = $fecha112[0];
                                        if($evento['Evento']['circuito'] == 1)
                                        {
                                            $nombre1 = 'CIRCUITO KCB GESTION '.$gestion;
                                        }
                                        else{
                                            $nombre1 = 'EXPOSICION KCB GESTION '.$gestion;
                                        }
                                        echo $nombre1;?></h4>
                                                <?php echo $this->Form->create('Evento',array('controller' => 'Eventos','action' => 'actualiza',$idEvento));?>
                                                    <div class="row-fluid">
                                                        <div class="span6">
                                                        <h5 >Nro de Pista</h5>
                                    				<?php echo $this->Form->text('EventosPista.numero',array('required','class' => 'span12','type' => 'number')); ?>
                                                    <?php echo $this->Form->hidden('EventosPista.evento_id',array('value' => $idEvento)); ?>
                                                        </div>
                                                        <div class="span6">
                                                        <h5>Expocicion</h5>
                                                        <?php echo $this->Form->select('EventosPista.pista_id',$selecpistas,array('required','class' => 'span12')); ?>
                                                        </div>
                                                    </div>
                                    	            
                                    				<h5 >Juez</h5>
                                    				<?php echo $this->Form->text('EventosPista.juez',array('required','class' => 'span12')); ?>
                                                    <div class="row-fluid">
                                                        <div class="span6"> 
                                                        <h5>Fecha</h5>
                                                        <?php echo $this->Form->date('EventosPista.fecha',array('required','class' => 'span12')); ?>
                                                        </div>
                                                        <div class="span6">
                                                        <h5>Hora</h5>
                                                        <?php echo $this->Form->text('EventosPista.hora', array('id' => 'time', 'type' => 'time', 'required', 'data-date-relative' => 'now','class' => 'span12')); ?>
                                                        </div>
                                                    </div>
                                    				<?php
                                                    echo $this->Form->submit('Adicicionar',array('class' => 'btn btn-block btn-success'));
                                                    echo $this->Form->end();
                                                                    ?>
                                                </div>
                                                
                                    			</div>
                                    			<!-- // Widget END -->
                                                
                                             </div>
                                    		<!-- // Column END -->
                                    		</div>
                                            
                                        </div>
                    <div id="listado3">
                    
                    </div>
                     <div id="inscritosini">
                                        <h3>Inscritos </h3>
                                        </div>
                                        <div id="inscritos">
                                        <?php $j = 0;?>
                                            <?php foreach($cate as $c):?>
                                            
                                            <?php $inscritos = $evenmas->find('all',array(
                                            'recursive' => 2,
                                            'conditions' => array(
                                            'EventosMascota.categoriaspista_id' => $c['Categoriaspista']['id'],
                                            'EventosMascota.evento_id' => $idEvento),
                                            //'order' => 'Mascota.raza_id ASC'
                                            ));
                                                //debug($inscritos);exit;
                                                if(!empty($inscritos)):
                                            ?>
                                            <input type="button" value="<?php echo $c['Categoriaspista']['nombre']?>" onclick='$("#d<?php echo $c['Categoriaspista']['id']?>").toggle(400);' class="btn btn-block btn-inverse">
                                            
                                            <div id="<?php echo 'd'.$c['Categoriaspista']['id']?>" style="display:none;">
                                            <div class="widget widget-heading-simple widget-body-gray">
                                            <div class="widget-body">
                                            <h3><?php echo $c['Categoriaspista']['nombre']?></h3>
                                            <table class="table table-bordered table-striped table-white">
                                                <thead>
                                                    <tr>
                                                        <th>Nro KCB</th>
                                                        <th>Ejemplar</th>
                                                        <th>Catalogo</th>
                                                        <th>Raza</th>
                                                        <th>Propietario</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                
                                                    <?php foreach ($inscritos as $m): $j++;?>
                                                    <?php 
                                                    if($m['Ingreso']['estado'] == 1)
                                                    {
                                                     $color = '#CAF2A2';   
                                                    }
                                                    else{
                                                     $color = '#FBD2D2';
                                                    }
                                                     ?>
                                                    <tr>
                                                        <td style="background: <?php echo $color;?>;"><?php echo $m['Mascota']['kcb'];?></td>
                                                            <td style="background: <?php echo $color;?>;"><?php echo $this->Html->link($m['Mascota']['nombre_completo'],array('action' => 'quitainscripcion',$m['EventosMascota']['id']),array('title' => 'Retirar','confirm' => 'Esta Seguro de retirar a '.$m['Mascota']['nombre_completo'].' del Evento ???'));?></td>
                                                            <td style="background: <?php echo $color;?>;"><?php echo $m['EventosMascota']['catalogo']; ?></td>
                                                            <td style="background: <?php echo $color;?>;"><?php echo $m['Mascota']['Raza']['nombre'] ?></td>
                                                            <td class="center" style="background: <?php echo $color;?>;">
                                                                <?php echo $m['Mascota']['Propietarioactual']['nombre'] ?>
                                                            </td> 
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            
                                            </div>
                                            
                                            </div>
                                            
                                            </div>
                                            
                                            <?php endif;?>
                                            <?php endforeach;?>
                                            
                                            <div class="actions">
                                            <div class="actions-left">
                                            </div>
                                            <div class="actions-right">
                                            
                                            </div>
                                            </div>
                                            
                                        </div>
                </div>
            </div>
                
            </div>
            <!-- // Tab content END -->
            <?php $i = 1;?>
            <?php foreach($pistas as $p):?>
            <?php $i++;;?>
            <!-- Tab content -->
            <div class="tab-pane" id="tab<?php echo $i;?>-2">
            <div class="row-fluid">
            <div class="span12">
            <div class="widget widget-heading-simple widget-body-gray">
            <div class="widget-body">
            <div >
            <h4 class="heading"><?php 
                                        $fecha11 = $evento['Evento']['fecha_inicio'];
                                        $fecha112 = explode("-",$fecha11);
                                        $gestion = $fecha112[0];
                                        if($evento['Evento']['circuito'] == 1)
                                        {
                                            $nombre1 = 'CIRCUITO KCB GESTION '.$gestion;
                                        }
                                        else{
                                            $nombre1 = 'EXPOSICION KCB GESTION '.$gestion;
                                        }
                                        echo $nombre1;?> <a href="#myModal" data-toggle="modal" class="label label-info" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Eventos','action' => 'ajaxeditapista',$p['EventosPista']['id']));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Editar</a></h4>
            </div>
                                        
                                        <h4><?php echo $p['EventosPista']['numero']?>&#176 EXPOSICION <?php echo $p['Pista']['nombre']?>
                                        <br /><?php echo $p['EventosPista']['juez'];?>
                                        <br /><?php echo $p['Evento']['ciudad'].' '.$p['EventosPista']['fecha'];?>
                                        
                                        </h4>
                                        <?php echo $this->Form->create('Raza');?>
                                        <div class="row-fluid">
                                        <div class="span6">
                                        Seleccione la raza: 
                                        <?php echo $this->Form->select('raza',array('todos' => 'TODAS LAS RAZAS',$razas),array('id' => 'select2_'.$p['EventosPista']['id'],'style' => 'width: 100%;'));?>
                                        
                                        </div>
                                        </div>
                                         <?php $this->Js->get('#'.'select2_'.$p['EventosPista']['id']);
                                                $this->Js->event('change', 
                                                $this->Js->request(
                                                array('action' => 'ajaxpistas',$idEvento,$p['EventosPista']['id']),
                                                array('async' => true,
                                                'update' => '#contenidopista'.$p['EventosPista']['id'],
                                                'before' => '$("#imagencargando'.$p['EventosPista']['id'].'").toggle(400);',
                                                'complete' => '$("#imagencargando'.$p['EventosPista']['id'].'").toggle(400);',
                                                'method' => 'post','dataExpression'=>true,
                                                'data'=> $this->Js->serializeForm(array('isForm' => true,'inline' => true)))));?>
                                        <?php echo $this->Form->end();?>
                                        <script>
                                         $(function()
                                         {
                                            $('#select2_<?php echo $p['EventosPista']['id']?>').select2();
                                         });
                                         
                                         </script>
            
            </div>
            
            </div>
            </div>
            </div>
            <div class="row-fluid">
            <div class="span12">
            <div class="widget-body">
            
                <div id="container<?php echo $p['EventosPista']['id']?>">
									<div id="imagencargando<?php echo $p['EventosPista']['id']?>" style="display: none;">
                                    <?php echo $this->Html->image('cargando.gif');?>
                                    </div>
                                   <div id="contenidopista<?php echo $p['EventosPista']['id']?>">
                                    
                                   </div>     
                </div>
            </div>
            </div>
            </div>
             </div>
            <!-- // Tab content END -->
            <?php endforeach;?>
        </div>

    </div>
</div>
        </div>
</div>
</div>

<?php echo $this->Js->writeBuffer();?>