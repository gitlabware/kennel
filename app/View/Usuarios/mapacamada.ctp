<div class="innerLR">

	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-white">
		<div class="widget-body">
        <div class="row-fluid">
        <div class="span12">
        <div class="span12" style="color: black;">
        
        <div id="areaImprimir">
<div class="cabecera">
<div class="logo1"></div>

 <div class="logo2">
<?php echo $this->Html->image("../img/logo_fci.png", array('width'=>"114", 'height'=>"106")) ?>
</div>     
<div class="logo2">
<?php echo $this->Html->image("../img/logo_sicalam.png", array('width'=>"114", 'height'=>"106")) ?>
</div>
<div class="titulo1">KENNEL CLUB BOLIVIANO</div>
<div class="titulo2">MAPA DE REGISTRO DE CAMADA</div>
<div class="subtitulo">
   <h3>C&oacute;digo de registro:</h3>
   <label>
   <?php echo $camada['Denuncianacimiento']['id']?>
   </label>
    
</div>

</div>
<div class="contenido-mapa">
<div class="cabecera-contenido">
<table class="cabecera-mapa1">
      <tr>
         <td class="etiqueta-mapa">Fecha recepci&oacute;n</td>
         <td><?php echo $fecha ?></td>
         <td class="etiqueta-mapa">Cite</td>
         <td><?php echo $camada['Camada']['lugar'] ?>/<?php echo $camada['Camada']['id'] ?></td>
      </tr>
      <tr>
         <td>Obs.</td>
         <td>&nbsp;</td>
      </tr>
</table>
<table class="cabecera-mapa2">
      <tr>
         <td class="negrilla">Nombre Criador:</td>
         <td><?php echo $camada['Informecomcria']['dueno'] ?></td>
         
      </tr>
      <tr>
         <td class="negrilla">Raza / Variedad:</td>
         <td><?php echo $camada['Raza']['nombre'] ?>/<?php echo $camada['Camada']['variedad'] ?></td>
      </tr>
</table>
<table class="cabecera-mapa3">
      <tr>
         <td class="negrilla">Nombre Criadero "Afijo":</td>
         <td><?php echo $camada['Criadero']['nombre']?></td>
         <td>FCI</td>
         <td><?php echo $camada['Criadero']['registro_fci'] ?></td>
      </tr>
      <tr>
         <td class="negrilla" colspan="2">Fecha Nacimiento de la Camada:</td>
         <td colspan="2"><?php echo $fecha_nacimiento ?></td>
      </tr>
</table>
<table class="cabecera-mapa4">
   <th>CAMADA</th>
   <td>
   <?php echo $camada['Camada']['camada'] ?>
   </td>
</table>
</div><!--fin cabecera contenido-->

<table class="mapa-camada">
  <tr>
    <td style="width:300px" rowspan="2"><?php echo $this->Html->image('../img/cabecera-mapa.png') ?></td>
    <td style="width:41px">Sexo</td>
    <td style="width:92px" rowspan="2">Color</td>
    <td style="width:67px" rowspan="2">Nro KCB</td>
    <td style="width:75px" rowspan="2">Nro tatuaje</td>
  </tr>
  <tr>
    <td>M-F</td>
  </tr>
  <?php foreach($camada['Mascota'] as $mascota): ?>
  <tr>
    <td class="nombre_ejemplar"><?php echo $mascota['nombre'] ?> <?php echo $camada['Criadero']['nombre']?></td>
    <td>
    <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
    M
    <?php else: ?>
    F
    <?php endif; ?>
    </td>
    <td>
    <?php echo $mascota['color'] ?>
    </td>
    <td class="colorcolumna">
    <?php echo $mascota['id'] ?>
    </td>
    <td class="colorcolumna">
    <?php echo $mascota['num_tatuaje'] ?>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
<table class="mapa-datos-pie">
   <tr>
     <td>Nombre reproductor</td>
     <td>
     <?php echo $camada['Padre']['nombre'] ?>
     </td>
     <td>Registro</td>
     <td>
     <?php echo $camada['Padre']['id'] ?>
     </td>
     <td rowspan="4">
     <?php echo $this->Html->image('../img/sello-mapa.png') ?>
     </td>
   </tr>
   <tr>
      <td>Fecha nacimiento</td>
      <td>
      <?php echo $camada['Padre']['fecha_nacimiento'] ?>
      </td>
      <td>Tatuaje</td>
      <td>
      <?php echo $camada['Padre']['num_tatuaje'] ?>
      </td>
   </tr>
   <?php if(!empty($camada['Padre']['Propietarioactual'])): ?>
   <tr>
      <td>Nombre propietario</td>
      <td>
      <?php echo $camada['Padre']['Propietarioactual']['nombre'] ?>
      </td>
      <td>Direcci&oacute;n</td>
      <td>
      <?php echo $camada['Padre']['Propietarioactual']['direccion'] ?>
      </td>
   </tr>
   
   <?php else: ?>
      <tr>
         <td>Nombre propietario</td>
         <td>&nbsp;</td>
         <td>Direcci&oacute;n</td>
         <td>&nbsp;</td>
      </tr>
   <?php endif; ?>
</table>
<table class="mapa-datos-pie">
   <tr>
     <td>Nombre reproductor</td>
     <td>
     <?php echo $camada['Madre']['nombre'] ?>
     </td>
     <td>Registro</td>
     <td>
     <?php echo $camada['Madre']['id'] ?>
     </td>
     <td rowspan="4">
     <?php echo $this->Html->image('../img/sello-mapa.png') ?>
     </td>
   </tr>
   <tr>
      <td>Fecha nacimiento</td>
      <td>
      <?php echo $camada['Madre']['fecha_nacimiento'] ?>
      </td>
      <td>Tatuaje</td>
      <td>
      <?php echo $camada['Madre']['num_tatuaje'] ?>
      </td>
   </tr>
   <?php if(!empty($camada['Madre']['Propietarioactual'])): ?>
   <tr>
      <td>Nombre propietario</td>
      <td>
      <?php echo $camada['Madre']['Propietarioactual']['nombre'] ?>
      </td>
      <td>Direcci&oacute;n</td>
      <td>
      <?php echo $camada['Madre']['Propietarioactual']['direccion'] ?>
      </td>
   </tr>
   
   <?php else: ?>
      <tr>
         <td>Nombre propietario</td>
         <td>&nbsp;</td>
         <td>Direcci&oacute;n</td>
         <td>&nbsp;</td>
      </tr>
   <?php endif; ?>
     
</table>

</div><!--fin contenido-mapa-->

<div class="mapa-pie">
<div class="mapa-fecha">
   <?php echo $fecha ?>
</div>
<div class="mapa-fecha-impresion">
   <?php echo $fecha_impresion ?>
</div>
<?php //echo $this->Html->image('../img/pie-mapacamada.png', array('width'=>927, 'height'=>287)) ?>
</div>
</div><!--fin caja imprimir-->
        
        </div>
        <div class="span2">
        <a id="btnimprimir" class="label label-inverse" href="javascript:">Imprimir</a>
        </div>
        <div class="span2">
            <?php echo $this->Html->link('Atras',$this->request->referer(),array('class'=>'btn btn-green'));?>
        </div>
        </div>
        </div>
</div>
</div>
</div>
<script src="<?php echo $this->webroot;?>js/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
   jQuery(document).ready(function() {
         jQuery("#btnimprimir").click(function() {
             //printElem({ leaveOpen: true, printMode: 'popup' });
             printElem({ overrideElementCSS: ['/kennel/css/print.css'] });
         });
     });
 function printElem(options){
     jQuery('#areaImprimir').printElement(options);
 }

 </script> 