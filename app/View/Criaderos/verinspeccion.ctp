<div class="innerLR">

	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-white">
		<div class="widget-body">
        <div class="row-fluid">
        <div class="span12">
        <div class="span10">
        
        <div id="areaImprimir">
        <table class="mi-tabla-header">
   <tr>
      <td rowspan="2" class="logo1">
      <?php //echo $this->Html->image('logo_kennel.png', array('width'=>224, 'height'=>101))?>
      </td>
      <td class="titulo1"> 
      Kennel club boliviano
      </td>
      <td rowspan="2">
      <?php echo $this->Html->image('logo_sicalam.png')?>
      </td>
   </tr>
   <tr>
      <td>
      <span>inspeccion criadero</span>
      </td>
   </tr>
   </table>
   <table class="mi-tabla">
     <tr>
       <td>Nombre Propietario</td>
       <td>
       <?php echo $criadero['Propietario']['nombre']?>
       </td>
       <td>con C.I.</td>
       <td>
       <?php echo $criadero['Propietario']['id']?>
       </td>
     </tr>
     <tr>
       <td>Nombre copropietario</td>
       <td>
       <?php echo $criadero['Copropietario']['nombre']?>
       </td>
       <td>con C.I.</td>
       <td>
       <?php echo $criadero['Copropietario']['id']?>
       </td>
     </tr>
     <tr>
       <td>Direcci&oacute;n criadero</td>
       <td>
       <?php echo $criadero['Criadero']['direccion']?>
       </td>
       <td>Ciudad</td>
       <td>
       <?php echo $criadero['Departamento']['nombre']?>
       </td>
     </tr>
     <tr>
       <td>Telefonos fijos</td>
       <td>
       <?php echo $criadero['Criadero']['telefono1']?>&nbsp;
       <?php echo $criadero['Criadero']['telefono2']?>
       </td>
       <td>Telefonos celulares</td>
       <td>
       <?php echo $criadero['Criadero']['celular1']?>&nbsp;
       <?php echo $criadero['Criadero']['celular2']?>
       </td>
     </tr>
     <tr>
            <td>Correo electr&oacute;nico</td>
            <td>
            <?php echo $criadero['Criadero']['email1']?>
            </td>
            <td>email 2</td>
            <td>
            <?php echo $criadero['Criadero']['email2']?>
            </td>
         </tr>
         <tr>
            <td>Es socio de KCB</td>
            <td>
               <table>
                  <tr>
                  <td>SI</td>
                  <?php if($criadero['Propietario']['tipo_id'] == 1):?>
                     <td>
                     X
                     </td>
                     <td>NO</td>
                     <td>
                     &nbsp;
                     </td>
                  <?php else: ?>
                     <td>
                     &nbsp;
                     </td>
                     <td>NO</td>
                     <td>
                        X
                     </td>
                   <?php endif; ?>                  
                  </tr>
                  </table>
            </td>
            <td>
            Desde fecha
            </td>
            <td>
            <?php echo $criadero['Criadero']['fecha_desde'] ?>
            </td>
         </tr>
   </table>
   <table>
   <tr>
      <td rowspan="2">Razas</td>   
   </tr>
   <tr>
   <?php $i=1; ?>
   <?php foreach($criadero['Raza'] as $razas): ?>
      <?php if($i == 4): ?>
         </tr>
         <tr>
      <?php endif; ?>
      <td>
      <?php 
      echo $i.".- ".$razas['nombre']; 
      ?>
      </td>
      <?php $i++;?>
   <?php endforeach; ?>
   </tr>
   </table>
   <table>
      <tr>
         <td>Instalaciones</td>
         <td>
         <?php echo $criadero['Inspeccioncriadero']['Instalacione']['descripcion'] ?>
         </td>
         <td>Los Ejemplares tienen bastante Espacio:</td>
         <td>
         <table>
         <?php 
         if($criadero['Inspeccioncriadero']['espacio'] == true):
         ?>
            <td>SI</td>
            <td>X</td>
            <td>NO</td>
            <td>&nbsp;</td>
         <?php else: ?>
            <td>SI</td>
            <td>&nbsp;</td>
            <td>NO</td>
            <td>X</td>
         <?php endif; ?>
         </table>
         </td>
      </tr>
       <tr>
         <td>Condiciones de Higiene:</td>
         <td>
         <?php echo $criadero['Inspeccioncriadero']['Condicioneshigienica']['descripcion'] ?>
         </td>
         <td>Condici&oacute;n General de los Ejemplares:</td>
         <td>
         <?php echo $criadero['Inspeccioncriadero']['Condicionejemplare']['descripcion'] ?>
         </td>
      </tr>
   </table>
   <table>
   <tr>
     <td>Recomendaciones y mejoras que debe realizar el propietario del criadero: </td>
   </tr>
      <?php foreach($criadero['Observacionesinspeccione'] as $observacion):  ?>
      <tr>
         <td>
         <?php echo $observacion['observacion'] ?>
         </td>
      </tr>
      <?php endforeach;?> 
      <tr>
         <td>Fecha de Nueva Inspecci&oacute;n: </td>
         <td>
         <?php echo $criadero['Inspeccioncriadero']['nueva_fecha_inspeccion'] ?>
         </td>
      </tr>
   </table>
<div class="box">
</div>
<div class="firmas">
   <span class="lugar">Lugar</span>
   <div class="caja1">
       <div class="contenido">
       <?php echo $criadero['Inspeccioncriadero']['lugar']?>
       </div>
   </div>
   <span class="fecha">Fecha</span>
   <div class="caja2">
      <div class="contenido">
       <?php echo $criadero['Inspeccioncriadero']['fecha']?>
       </div>
   </div>
   <span class="recibo">Recibo</span>
   <div class="caja3">
      <div class="contenido">
       <?php echo $criadero['Inspeccioncriadero']['recibo']?>
       </div>
   </div>
   <div class="espacio-firmas1">
   <p>
   &nbsp;
   </p>
   <?php echo $this->Html->image('fondo_firmas_servicio.png', array('width'=>383, 'height'=>115))?>
   </div>
</div>
        </div><!--fin caja imprimir-->
        
        </div>
        <div class="span2">
        <a id="btnimprimir" class="label label-inverse" href="javascript:">Imprimir</a>
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