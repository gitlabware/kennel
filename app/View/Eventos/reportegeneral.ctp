<style>
table, td{
	font:100% Arial, Helvetica, sans-serif; 
}
table{width:100%;border-collapse:collapse;margin:1em 0;}

th, td{border:1px solid white;}

th{background:#95C4DF;color:white;}
td{background:#F0F0F0;}


tr.even td{background:#F0F0F0;}
tr.odd td{background:#F8F8F8;}

th.over, tr.even th.over, tr.odd th.over{background:#4a98af;}
th.down, tr.even th.down, tr.odd th.down{background:#bce774;}
th.selected, tr.even th.selected, tr.odd th.selected{}

td.over, tr.even td.over, tr.odd td.over{background:#ecfbd4;}
td.down, tr.even td.down, tr.odd td.down{background:#bce774;color:white;}
td.selected, tr.even td.selected, tr.odd td.selected{background:#bce774;color:#555;}

</style>
<?php
App::Import('Model', 'EventosMascotasPuntaje');
$evenmaspun = new EventosMascotasPuntaje();
?>
<div class="innerLR">
<h3><?php echo $evento['Evento']['nombre'];?></h3>
<h4>Lista General ejemplares Nacionales y Extrangeros que obtubieron CJC's - CAC's - CGC's - CACLAB's - CACIB's</h4>
    <div class="widget widget-heading-simple widget-body-gray">
        <div class="widget-body">
        <div class="row-fluid">
        <div class="span12">        
        <a href="#myModal" data-toggle="modal" class="label label-info" onclick="$('#imgcargando').toggle();$('#mimodal').toggle();$('#mimodal').load('<?php echo $this->Html->url(array('controller' => 'Eventos','action' => 'reporte',$idEvento));?>',function(){$('#imgcargando').toggle(100);$('#mimodal').toggle();});">Reportes</a>
        </div>
        </div>
        <div class="row-fluid">
        <div class="span12">
        <table id="table-example" border="1" cellpadding="2" cellspacing="2">
    <thead>
        <tr>
            <th rowspan="2" style="background:#95C4DF;color:white;" >NOMBRE</th>
            <th rowspan="2" style="background:#95C4DF;color:white;" >Nro</th>
            <th rowspan="2" style="background:#95C4DF;color:white;" >RAZA</th>
            <th rowspan="2" style="background:#95C4DF;color:white;" >PROPIETARIO</th>
            <th rowspan="2" style="background:#95C4DF;color:white;">REGISTRO</th>
            <?php foreach($pistas as $pi):?>
            <th colspan="7">
            <?php 
            echo $evento['Evento']['nombre']."<br>";
             echo $pi['EventosPista']['numero'].' '.$pi['Pista']['nombre']."<br>";
             echo $pi['EventosPista']['juez'];
             ?>
             </th>
             
            <?php endforeach;?>
            <th colspan="7" style="background:#95C4DF;color:white;"><h3 style="color: white;">TOTAL</h3></th>
            <th rowspan="2" style="background:#95C4DF;color:white;">TITULOS OBTENIDOS</th>
        </tr>
        <tr>
            <?php foreach($pistas as $pi):?>
            
            <th style="background:#95C4DF;color:white;" >C.Esp</th>
            <th style="background:#95C4DF;color:white;">C.Abs</th>
            <th style="background:#95C4DF;color:white;">CJC</th>
            <th style="background:#95C4DF;color:white;">CAC</th>
            <th style="background:#95C4DF;color:white;">CGC</th>
            <th style="background:#95C4DF;color:white;">CACIB</th>
            <th style="background:#95C4DF;color:white;">CACLAB</th>
            <?php endforeach;?>
            <th style="background:#95C4DF;color:white;">C.Esp</th>
            <th style="background:#95C4DF;color:white;">C.Abs</th>
            <th style="background:#95C4DF;color:white;">CJC</th>
            <th style="background:#95C4DF;color:white;">CAC</th>
            <th style="background:#95C4DF;color:white;">CGC</th>
            <th style="background:#95C4DF;color:white;">CACIB</th>
            <th style="background:#95C4DF;color:white;">CACLAB</th>
        </tr>
    </thead>
        <tbody>
        <?php foreach($mascotas as $ma):?>
        <tr>
        <?php 
        $totalesp = 0;
        $totalabs= 0;
        $totalcjc = 0;
        $totalcac = 0;
        $totalcgc = 0;
        $totalcacib = 0;
        $totalcaclab = 0;
        ?>
        <td><?php echo $ma['Mascota']['nombre_completo']?></td>
        <td><?php echo $ma['EventosMascota']['catalogo']?></td>
        <td><?php echo $ma['Mascota']['Raza']['nombre']?></td>
        <td><?php echo $ma['Mascota']['Propietarioactual']['nombre']?></td>
        <?php if(empty($ma['Mascota']['kcb']) || $ma['Mascota']['kcb'] == 'nulo'):?>
        <td><?php echo $ma['Mascota']['codigo']?></td>
        <?php else:?>
        <td><?php echo 'kcb '.$ma['Mascota']['kcb']?></td>
        <?php endif?>
        <?php foreach($pistas as $pi):?>
        <?php $puntos = $evenmaspun->find('first',array(
        'recursive' => -1,'conditions' => array(
        'EventosMascotasPuntaje.mascota_id' => $ma['Mascota']['id'],
        'EventosMascotasPuntaje.eventosmascota_id' => $ma['EventosMascota']['id'],
        'EventosMascotasPuntaje.eventospista_id' => $pi['EventosPista']['id'],
        'EventosMascotasPuntaje.evento_id' => $idEvento)));?>
        <?php 
        $esp = '';
        $abs = '';
        $cac = '';
        $cgc = '';
        if(!empty($puntos))
        {
            if($puntos['EventosMascotasPuntaje']['mejor_cachorro'] == 1)
            {
                if($ma['EventosMascota']['categoriaspista_id'] == 1)
                {
                    $esp = '1';
                    $totalesp = $totalesp + 1;
                }
                if($ma['EventosMascota']['categoriaspista_id'] == 2)
                {
                    $abs = '1';
                    $totalesp = $totalabs + 1;
                }
            }
            if(!empty($puntos['EventosMascotasPuntaje']['cac']))
            {
                $cac = '1';
                $totalcac = $totalcac + 1;
                if(!empty($puntos['EventosMascotasPuntaje']['puntaje_cac']))
                {
                    $totalcac = $totalcac + $puntos['EventosMascotasPuntaje']['puntaje_cac']-1;
                    $cac = $puntos['EventosMascotasPuntaje']['puntaje_cac'];
                }
            }
            if(!empty($puntos['EventosMascotasPuntaje']['cgc']))
            {
                $cgc = '1';
                $totalcgc = $totalcgc + 1;
                if(!empty($puntos['EventosMascotasPuntaje']['puntaje_cgc']))
                {
                    $totalcgc = $totalcgc + $puntos['EventosMascotasPuntaje']['puntaje_cgc']-1;
                    $cgc = $puntos['EventosMascotasPuntaje']['puntaje_cgc'];
                }
            }
            $totalcjc = $totalcjc + $puntos['EventosMascotasPuntaje']['cjc'];
            $totalcacib = $totalcacib + $puntos['EventosMascotasPuntaje']['cacib'];
            $totalcaclab = $totalcaclab + $puntos['EventosMascotasPuntaje']['caclab'];
        }
        
        ?>
            <td class="center"><?php echo $esp; ?></td>
            <td class="center"><?php echo $abs; ?></td>
            <td class="center"><?php echo $puntos['EventosMascotasPuntaje']['cjc']; ?></td>
            <td class="center"><?php echo $cac; ?></td>
            <td class="center"><?php echo $cgc; ?></td>
            <td class="center"><?php echo $puntos['EventosMascotasPuntaje']['cacib']; ?></td>
            <td class="center"><?php echo $puntos['EventosMascotasPuntaje']['caclab']; ?></td>
            <?php endforeach;?>
            
            <td class="center"><?php echo $totalesp;?></td>
            <td class="center"><?php echo $totalabs;?></td>
            <td class="center"><?php echo $totalcjc;?></td>
            <td class="center"><?php echo $totalcac;?></td>
            <td class="center"><?php echo $totalcgc;?></td>
            <td class="center"><?php echo $totalcacib;?></td>
            <td class="center"><?php echo $totalcaclab;?></td>
            <td class="center"><?php 
            if($totalcjc >= 5)
            {
                echo 'JO CH BOL';
            }
            if($totalcac >= 20)
            {
                echo 'CH BOL';
            }
            if($totalcgc >= 20)
            {
                echo 'GR CH BOL';
            }
            if($totalcaclab >= 5)
            {
                echo 'CH LAT';
            }
            if($totalcacib >= 5)
            {
                echo 'CH INT';
            }
            ?></td>
        </tr>
        <?php endforeach;?>
        </tbody>
</table>
        </div>
        </div>
        
        </div>
    </div>
</div>
<script>
                                    $(document).ready( function () {
                                     	var oTable = $('#table-example').dataTable( {
                                     		"sScrollX": "100%",
                                     		//"sScrollXInner": "300%",
                                            "bScrollCollapse": true
                                     	} );
                                     	new FixedColumns( oTable, {
                                     		"iLeftColumns": 5,
                                    		"iLeftWidth": 650
                                     	} );
                                     } );
</script>