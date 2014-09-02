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
<h3>Evento : <?php echo $evento['Evento']['nombre']?></h3>
<div class="row-fluid">

		<div class="span12">
    <div class="widget widget-tabs widget-tabs-double">
    <!-- Tabs Heading -->
    <div class="widget-head">
        <ul>
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
                                        echo $nombre1;?></h4>
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
                                                array('action' => 'ajaxpistasfinal',$idEvento,$p['EventosPista']['id']),
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