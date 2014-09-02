<style>
table.azul{
    border: 2px solid #1F497D;
    margin-top: 0px;
    margin-bottom: 0px;
}
.azul td{
    border: 1px solid;
    border-color: #1F497D;
    color: #1F497D;
    padding-top: 1px;
    padding-bottom: 1px;
    font-weight: bold;
    padding-left: 2px;
    line-height: 15px;
    font-size: 12px;
}
.titulo_certificado{
    border: 3px solid #1F497D; 
    color: #1F497D; 
    font-weight: bold; 
    font-size: 18px; 
    background-color: #DAEEF3;
    margin-top: 8px;
}
.titulo_kennel{
    color: #1F497D; 
    font-weight: bold; 
    font-size: 21px; 
    margin-top: 10px;
}
.anuncio{
    background-color: #D9D9D9; 
    color: #1F497D; 
    padding: 5px;
}
.nota{
    background-color: #EBF1DE; 
    font-weight: bold;
    color: #1F497D; 
    margin-top: 2px; 
    text-decoration: underline;
}
.sec_firmas{
    border-top: 2px solid #1F497D; 
    color: #1F497D; 
    margin-top: 45px;
}
</style>
<div class="innerLR">

	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-white">
		<div class="widget-body">
        
        <div class="row-fluid">
        <div class="span12">
        <table class="table">
        <tr>
        <td class="center"><?php echo $this->Html->image('logo_kennel2.png');?></td>
        <td>
        <div class="row-fluid">
        <div class="span12 center">
        <div class="titulo_kennel">
        KENNEL CLUB BOLIVIANO
        </div>
        <div class="titulo_certificado">
        INSCRIPCION DE CRIADERO
        </div>
        </div>
        </div>
        </td>
        <td class="center"><?php echo $this->Html->image('logo_sicalam.png',array('style' => 'width: 90px; height: 90px'));?></td>
        <td class="center"><?php echo $this->Html->image('logo_fci.png',array('style' => 'width: 90px; height: 90px'));?></td>
        </tr>
        </table>
        <table class="table azul">
            <tr>
            <td style="width: 10%;">Nombre Propietari@:</td>
            <td style="width: 55%;"><?php echo $criadero['Propietario']['nombre']?></td>
            <td style="width: 10%;">con C.I:</td>
            <td style="width: 25%;"><?php echo $criadero['Propietario']['ci']?></td>
            </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
            <tr>
            <td style="width: 10%;">Nombre Co-Propietari@:</td>
            <td style="width: 55%;"><?php echo $criadero['Copropietario']['nombre']?></td>
            <td style="width: 10%;">con C.I:</td>
            <td style="width: 25%;"><?php echo $criadero['Copropietario']['ci']?></td>
            </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
            <tr>
            <td style="width: 10%;">Direccion Domicilio Completo:</td>
            <td style="width: 55%;"><?php echo $criadero['Propietario']['direccion']?></td>
            <td style="width: 10%;">Ciudad:</td>
            <td style="width: 25%;"><?php echo $criadero['Departamento']['nombre']?></td>
            </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
            <tr>
            <td style="width: 10%;">Direccion Criadero:</td>
            <td style="width: 90%;"><?php echo $criadero['Criadero']['direccion']?></td>
            </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
            <tr>
            <td style="width: 10%;">Telefonos Fijos:</td>
            <td style="width: 40%;">
            <?php echo $criadero['Criadero']['telefono1']?>&nbsp;
            <?php echo $criadero['Criadero']['telefono2']?>
            </td>
            <td style="width: 10%;">Telefonos Celulares</td>
            <td style="width: 20%;"><?php echo $criadero['Criadero']['celular1']?></td>
            <td style="width: 20%;"><?php echo $criadero['Criadero']['celular2']?></td>
            </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
            <tr>
            <td style="width: 20%;">Correo Electronico Email 1:</td>
            <td style="width: 36%;"><?php echo $criadero['Criadero']['email1']?></td>
            <td style="width: 9%;">Email 2:</td>
            <td style="width: 35%;"><?php echo $criadero['Criadero']['email2']?></td>
            </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
            <tr>
            <td style="width: 35%;">Es Socio del Kennel Club Boliviano: (Marque con una cruz):</td>
            <td style="width: 3%;">SI</td>
            <td style="width: 3%; background: #D9D9D9;">
            <?php if($criadero['Propietario']['tipo_id'] == 1):?>
            X
            <?php endif;?>
            </td>
            <td style="width: 3%;">NO</td>
            <td style="width: 3%; background: #D9D9D9;">
            <?php if($criadero['Propietario']['tipo_id'] != 1):?>
            X
            <?php endif;?>
            </td>
            <td style="width: 9%;">Desde Fecha:</td>
            <td style="width: 44%;"><?php echo $criadero['Criadero']['fecha_desde'] ?></td>
            </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
          <tr>
            <td rowspan="3" style="width: 16%;">Razas que cria:</td>
            <td style="width: 21%; font-size: 9px;">1.-<?php if(!empty($razas[0]['nombre'])){echo $razas[0]['nombre'];}?></td>
            <td style="width: 21%; font-size: 9px;">2.-<?php if(!empty($razas[1]['nombre'])){echo $razas[1]['nombre'];}?></td>
            <td style="width: 21%; font-size: 9px;">3.-<?php if(!empty($razas[2]['nombre'])){echo $razas[2]['nombre'];}?></td>
            <td style="width: 21%; font-size: 9px;">4.-<?php if(!empty($razas[3]['nombre'])){echo $razas[3]['nombre'];}?></td>
          </tr>
          <tr>
            <td style="font-size: 9px">5.-<?php if(!empty($razas[4]['nombre'])){echo $razas[4]['nombre'];}?></td>
            <td style="font-size: 9px">6.-<?php if(!empty($razas[5]['nombre'])){echo $razas[5]['nombre'];}?></td>
            <td style="font-size: 9px">7.-<?php if(!empty($razas[6]['nombre'])){echo $razas[6]['nombre'];}?></td>
            <td style="font-size: 9px">8.-<?php if(!empty($razas[7]['nombre'])){echo $razas[7]['nombre'];}?></td>
          </tr>
          <tr>
            <td style="font-size: 9px">9.-<?php if(!empty($razas[8]['nombre'])){echo $razas[8]['nombre'];}?></td>
            <td style="font-size: 9px">10.-<?php if(!empty($razas[9]['nombre'])){echo $razas[9]['nombre'];}?></td>
            <td style="font-size: 9px">11.-<?php if(!empty($razas[10]['nombre'])){echo $razas[10]['nombre'];}?></td>
            <td style="font-size: 9px">12.-<?php if(!empty($razas[11]['nombre'])){echo $razas[11]['nombre'];}?></td>
          </tr>
        </table>
        <table class="table azul" style="margin-top: 1px;">
        <tr>
            <td style="width:27%;">Nombres de Criadero propuestos:</td>
            <td style="width:63%;">
            (NO son permitidos: Nombres de Paises y /o "kennel", Nombres Ofensivos, Nombres iguales y/o similares ya registrados ante la FCI, antes revisar similitudes en la pagina de la FCI http://www.fci.be/affixes.aspx )
            </td>
        </tr>
        </table>
        <table class="table">
        <tr>
        <td style="width: 60%;">
        <table class="table azul">
        <tr>
        <td style="width: 6%;">1.-</td>
        <td style="width: 94%;">&nbsp;<?php if(!empty($nombres[0]['observacion'])){echo $nombres[0]['observacion'];}?></td>
        </tr>
        <tr>
        <td>2.-</td>
        <td>&nbsp;<?php if(!empty($nombres[1]['observacion'])){echo $nombres[1]['observacion'];}?></td>
        </tr>
        <tr>
        <td>3.-</td>
        <td>&nbsp;<?php if(!empty($nombres[2]['observacion'])){echo $nombres[2]['observacion'];}?></td>
        </tr>
        </table>
        </td>
        <td style="width: 40%;">
        <table class="table azul">
        <tr>
        <td>&nbsp;<?php if(!empty($nombres[0]['obsexclusivo'])){echo $nombres[0]['obsexclusivo'];}?></td>
        </tr>
        <tr>
        <td>&nbsp;<?php if(!empty($nombres[1]['obsexclusivo'])){echo $nombres[1]['obsexclusivo'];}?></td>
        </tr>
        <tr>
        <td>&nbsp;<?php if(!empty($nombres[2]['obsexclusivo'])){echo $nombres[2]['obsexclusivo'];}?></td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        <div class="anuncio">
        El <b>KennelClub Boliviano</b>, enviara las tres opciones en el mismo orden especifico a la Federacion Cinologica Internacional (FCI) en Thuin Belgica, nuestro ente rector a nivel mundial, encargada tambien de dichos registros, quienes aprobaran y/o negaran las solicitudes, <b>la Opcion ACEPTADA</b> sera Registrada a nivel Mundial, y ninguna otra persona podra usar el mismo o similar nombre en el mundo.
        </div>
        <div class="nota">
        Nota: Al presente tramite Se debe adjuntar: 1.- Fotocopias de las cedulas de identidad de cada propietario. 2.- Inspeccion de Criadero. 3.- En caso de Socios y Criadores NUEVOS el KARDEX Completo. 4.- Carta de Solicitud de Inscripcion de Criadero.
        </div>
        <table class="table">
        <tr>
        <td style="width:40%;">
        <table class="table">
        <tr>
        <td style="width: 15%;">
        <table class="table azul" style=" border-color: white;">
        <tr>
        <td>Lugar:</td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px; border-color: white;">
        <tr>
        <td>Recibo:</td>
        </tr>
        </table>
        </td>
        <td style="width: 85%;">
        <table class="table azul">
        <tr>
        <td style="width: 40%;"><?php echo $criadero['Inspeccioncriadero']['lugar']?></td>
        <td style="width: 20%;">Fecha:</td>
        <td style="width: 40%;"><?php echo $criadero['Inspeccioncriadero']['fecha']?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 40%;"><?php echo $criadero['Inspeccioncriadero']['recibo']?></td>
        <td style="width: 30%;">Socio</td>
        <td style="width: 30%;">Criador</td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        
        </td>
        <td style="width:20%;">
        <div class="sec_firmas center">
        Firma Propietario Criadero (Aclaracion de Firma)
        </div>
        </td>
        <td style="width:20%;">
        <div class="sec_firmas center">
        Firma Co-propietario (Aclaracion de Firma)
        </div>
        </td>
        <td style="width:20%;">
        <div class="sec_firmas center">
        Firma y Sello Recetor REGIONAL (Aclaracion de Firma)
        </div>
        </td>
        </tr>
        </table>
        </div>
        </div>
        </div>
  </div>
 </div>
<script type="text/javascript">
   jQuery(document).ready(function() {

         jQuery("#btnimprimir").click(function() {
             printElem({ 
                overrideElementCSS: ['/kennel/css/imprimir.css'] 
                });
         });
     });
 function printElem(options){
     jQuery('#areaImprimir').printElement(options);
 }

 </script> 