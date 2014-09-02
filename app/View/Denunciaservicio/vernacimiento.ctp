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
    font-size: 11px;
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
.nota_simple{
    background-color: #EEECE1; 
    color: #1F497D; 
    margin-top: 2px;
    font-size: 10px;
    border: 2px solid #1F497D;
    line-height: 15px;
    padding-top: 3px;
    font-weight: bold;
}

.nota_compromisos{
    background-color: #EEECE1; 
    color: #1F497D; 
    margin-top: 2px;
    font-size: 10px;
    border: 2px solid #1F497D;
    line-height: 15px;
    padding-top: 3px;
}
</style>
<div class="innerLR">

	<!-- Widget -->
	<div class="widget widget-heading-simple widget-body-white">
            <?php $ocultar = ''; if($this->Session->read('Auth.User.role') != 'administrador'){$ocultar = 'hidden-print';}?>
		<div class="widget-body <?php echo $ocultar;?>">
        
        <div class="row-fluid">
        <div class="span12">
        <table class="table">
        <tr>
        <td class="center"><?php echo $this->Html->image('logo_kennel2.png',array('style' => 'width: 80px; height: 70px'));?></td>
        <td>
        <div class="row-fluid">
        <div class="span12 center">
        <div class="titulo_kennel">
        KENNEL CLUB BOLIVIANO
        </div>
        <div class="titulo_certificado">
        DENUNCIA DE SERVICIO
        </div>
        </div>
        </div>
        </td>
        <td class="center"><?php echo $this->Html->image('logo_sicalam.png',array('style' => 'width: 70px; height: 70px'));?></td>
        <td class="center"><?php echo $this->Html->image('logo_fci.png',array('style' => 'width: 70px; height: 70px'));?></td>
        </tr>
        </table>
        <!-- Empieza la Denuncias de Servicio-->
        <table class="table azul" style="margin-top: -10px;">
        <tr>
        <td style="width: 10%;">Yo Sr. (a) </td>
        <td style="width: 60%;"><?php echo $datos['Propietarioreproductor']['nombre'] ?></td>
        <td style="width: 10%;">con C.I.</td>
        <td style="width: 20%;"><?php echo $datos['Propietarioreproductor']['ci'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 15%;">Domicilio en:</td>
        <td style="width: 25%;"><?php echo $datos['Propietarioreproductor']['direccion'] ?></td>
        <td style="width: 15%;">Telefono fijo:</td>
        <td style="width: 15%;">
        <?php
echo $datos['Propietarioreproductor']['telefono1']; ?>
     &nbsp;
     <?php
echo $datos['Propietarioreproductor']['telefono2'];
?>
        </td>
        <td style="width: 10%;">Celular:</td>
        <td style="width: 20%;"><?php echo $datos['Propietarioreproductor']['celular']; ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 25%;">Soy Propietari@ del Macho:</td>
        <td style="width: 75%;"><?php echo $datos['Reproductor']['nombre_completo']; ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 10%;">No.Registro:</td>
        <td style="width: 13%;"><?php echo $datos['Reproductor']['id']; ?></td>
        <td style="width: 10%;">No.Tatuaje:</td>
        <td style="width: 13%;"><?php echo $datos['Reproductor']['num_tatuaje']; ?></td>
        <td style="width: 16%;">Nacido en Fecha:</td>
        <td style="width: 12%;"><?php echo $datos['Reproductor']['fecha_nacimiento']; ?></td>
        <td style="width: 6%;">Color:</td>
        <td style="width: 20%;">
        <?php echo $datos['Reproductor']['color']; ?>
     (<?php echo $datos['Reproductor']['senas']; ?>)
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 27%;">Ha servido en (Lugar y Fechas):</td>
        <td style="width: 73%;">
        <?php echo $datos['Servicio']['lugar_denuncia'] ?>
      &nbsp;
      <?php echo $datos['Servicio']['fecha_denuncia'] ?>
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr> 
        <td style="width: 20%;">Con la Reproductora:</td>
        <td style="width: 80%;">
        <?php echo $datos['Reproductora']['nombre_completo'] ?>
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 10%;">No.Registro: ss</td>
        <td style="width: 13%;"><?php echo $datos['Reproductora']['id']; ?></td>
        <td style="width: 10%;">No.Tatuaje:</td>
        <td style="width: 13%;"><?php echo $datos['Reproductora']['num_tatuaje']; ?></td>
        <td style="width: 16%;">Nacido en Fecha:</td>
        <td style="width: 12%;"><?php echo $datos['Reproductora']['fecha_nacimiento']; ?></td>
        <td style="width: 6%;">Color:</td>
        <td style="width: 20%;">
        <?php echo $datos['Reproductora']['color']; ?>
     (<?php echo $datos['Reproductora']['senas']; ?>)
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 16%;">De propiedad de:</td>
        <td style="width: 56%;">
        <?php echo $datos['Propietarioreproductora']['nombre'] ?>
        </td>
        <td style="width: 8%;">Afijo:</td>
        <td style="width: 20%;">
        <?php if($datos['Propietarioreproductora']['Criadero']!=null): ?>
          <?php echo $datos['Propietarioreproductora']['Criadero']['nombre'] ?>
          <?php endif; ?>
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 15%;">Domicilio en:</td>
        <td style="width: 25%;"><?php echo $datos['Propietarioreproductora']['direccion'] ?></td>
        <td style="width: 15%;">Telefono fijo:</td>
        <td style="width: 15%;">
        <?php echo $datos['Propietarioreproductora']['telefono1'] ?>
      &nbsp;
      <?php echo $datos['Propietarioreproductora']['telefono2'] ?>
        </td>
        <td style="width: 10%;">Celular:</td>
        <td style="width: 20%;"><?php echo $datos['Propietarioreproductora']['celular'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 8%;">Emails:</td>
        <td style="width: 40%;">
        <?php echo $datos['Propietarioreproductora']['email1'] ?>
      &nbsp;/&nbsp;
      <?php echo $datos['Propietarioreproductora']['email2'] ?> 
        </td>
        <td style="width: 7%;">Web:</td>
        <td style="width: 45%;"></td>
        </tr>
        </table>
        <div class="nota_simple">
        
        Comprometiendose el due&ntilde;@ de la reproductora servida a cumplir con las siguientes condiciones:<br />
        <b>1,- Notificar</b> al due&ntilde;@ del reproductor antes de los 45 dias de la fecha del servicio  <b>el Resultado de la paricion.</b><br />
        <b>2,- Notificar e Inscribir  toda la camada</b> ante oficinas del <b>KCB, antes de los 50 dias de nacidos, todos los cachorros e informar a la Sub-Comision de Cria  del KCB cualquier observacion previo a las inspecciones correspondientes.</b>

        </div>
        <div class="nota_compromisos">
        <b>Compromisos</b> (Entre propietarios de los reproductores) el mismo que tiene caracter legal si fuere necesario:  (Si el servicio ha sido gratuito Obviar este cuadro.)<br />
        <b>El  propietario de la reproductora se compromete a entregar:   <?php if(!empty($datos['Servicio']['numcachorros'])){echo $datos['Servicio']['numcachorros'];}else{echo '_______';}?> Cachorros <?php if(!empty($datos['Servicio']['bs'])){echo $datos['Servicio']['bs'];}else{echo '_______';}?> Bs. o $us, otros <?php if(!empty($datos['Servicio']['otros'])){echo $datos['Servicio']['otros'];}else{echo '________________';}?>
         por el servicio realizado, hasta fecha  <?php if(!empty($datos['Servicio']['fecha_hasta'] )){echo $datos['Servicio']['fecha_hasta'];}else{echo '_______________';}?>. </b><br />
        <table class="table">
        <tr>
        <td style="width: 55%;"></td>
        <td class="center" style="width: 22%;">
        <div style="border-top: 1px solid #1F497D; margin-top: 7px;">
        Fdo. Prop. Macho  
        </div>
        </td>
        <td class="center" style="width: 23%;">
        <div style="border-top: 1px solid #1F497D; margin-top: 7px;">
        Fdo. Prop. Hembra 
        </div>
        </td>
        </tr>
        </table>
        </div>
        <table class="table" style=" margin-top: -15px;">
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
        <td style="width: 40%;"><?php echo $datos['Servicio']['lugar'] ?></td>
        <td style="width: 20%;">Fecha:</td>
        <td style="width: 40%;"><?php echo $datos['Servicio']['fecha'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 40%;"><?php echo $datos['Servicio']['recibo'] ?></td>
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
        Firma Prop. Macho  (Aclaracion de Firma)
        </div>
        </td>
        <td style="width:20%;">
        <div class="sec_firmas center">
        Firma Prop. Hembra  (Aclaracion de Firma)
        </div>
        </td>
        <td style="width:20%;">
        <div class="sec_firmas center">
        Firma Recetor REGIONAL (Aclaracion de Firma)
        </div>
        </td>
        </tr>
        </table>
        <!-- Termina la parte de Denuncias de Servicios -->
<!-- Empieza la parte de nacimientos -->
<table class="table" style="margin-top: -23px;">
    <tr>
        <td style="width: 30%;"></td>
        <td class="center" style="width: 40%;"><div class="titulo_certificado">
        DENUNCIA DE NACIMIENTO
        </div></td>
        <td style="width: 30%;"></td>
    </tr>
</table>
        <table class="table azul" style="margin-top: -15px;">
   <tr>
      <td class="negrilla">En fecha</td>
      <td colspan="2">
      <?php echo $nacimiento['Denuncianacimiento']['fecha_denuncia']?>
      </td>
      <td class="negrilla">En el criadero</td>
      <td colspan="4">
      <?php echo $nacimiento['Criadero']['nombre']?>
      </td>
      <td class="negrilla" colspan="2">Han nacido</td>
   </tr>
   <tr>
     <td class="cuadrito" rowspan="4">
     <?php echo $nacimiento['Denuncianacimiento']['numero_cachorros']?>
     </td>
     <td class="negrilla" rowspan="4">Cachorros</td>
   </tr>
    <?php 
   $totalvivos = $nacimiento['Denuncianacimiento']['num_vivos_machos'] + $nacimiento['Denuncianacimiento']['num_vivos_hembras'];
   $totalmuertos = $nacimiento['Denuncianacimiento']['num_muertos_machos'] + $nacimiento['Denuncianacimiento']['num_muertos_hembras'];
   $totalsacrificados = $nacimiento['Denuncianacimiento']['num_sacrificados_machos'] + $nacimiento['Denuncianacimiento']['num_sacrificados_hembras'];
   
   ?>
   <tr>
      <td class="dato"> 
      <?php echo $totalvivos?>
      </td>
      <td>nacidos vivos</td>
      <td class="dato">
      <?php echo $nacimiento['Denuncianacimiento']['num_vivos_machos']?>
      </td>
      <td class="nombre">Machos</td>
      <td class="dato">
      <?php echo $nacimiento['Denuncianacimiento']['num_vivos_hembras']?>
      </td>
      <td class="nombre">Hembras</td>
      <td></td>
      <td></td>
   </tr>
   <tr>
      <td class="dato">
      <?php echo $totalmuertos?>
      </td>
      <td>nacidos muertos</td>
      <td class="dato">
      <?php echo $nacimiento['Denuncianacimiento']['num_muertos_machos']?>
      </td>
      <td class="nombre">Machos</td>
      <td class="dato">
      <?php echo $nacimiento['Denuncianacimiento']['num_muertos_hembras']?>
      </td>
      <td class="nombre">Hembras</td>
        <td>&nbsp;</td>
      <td>&nbsp;</td>
   </tr>
   <tr>
      <td class="dato">
      <?php echo $totalsacrificados?>
      </td>
      <td>ser&aacute;n sacrificados</td>
      <td class="dato">
      <?php echo $nacimiento['Denuncianacimiento']['num_sacrificados_machos']?>
      </td>
      <td class="nombre">Machos</td>
      <td class="dato">
      <?php echo $nacimiento['Denuncianacimiento']['num_sacrificados_hembras']?>
      </td>
      <td class="nombre">Hembras</td>
      <td class="negrilla">Porque</td>
      <td style="width: 90px;">
      <?php echo $nacimiento['Denuncianacimiento']['razon_sacrificio']?>
      </td>
   </tr>
   <tr>
     <td class="etiqueta" colspan="4">Encontr&aacute;ndose toda la camada en:</td>
     <td colspan="6">
     <?php echo $nacimiento['Denuncianacimiento']['direccion']?>
     </td>
   </tr>
   <tr>
     <td class="etiqueta" colspan="3">Tel&eacute;fonos(fijos y celulares):</td>
     <td colspan="3">
     <?php 
     echo $nacimiento['Criadero']['telefono1'];?>
     &nbsp;
     <?php
     echo $nacimiento['Criadero']['telefono2'];
     ?>
     &nbsp;
     <?php
     echo $nacimiento['Criadero']['celular1'];
     ?>
     &nbsp;
     <?php
     echo $nacimiento['Criadero']['celular2'];
     ?>
     </td>
   <td class="negrilla">email</td>
   <td colspan="3">
   <?php echo $nacimiento['Criadero']['email1'];?>
   &nbsp;
   <?php echo $nacimiento['Criadero']['email2'];?>
   </td>
   </tr>
</table>
        
        
        <div class="nota_simple">
        <u>Nota para el criador</u>: Toda la informacion suscrita en este documento y otros de registro, son y tienen caracter legal regidos a los estatutos y reglamentos del club, asi tambien a las normas vigentes legales del pais, cualquier adulteracion, falsificacion de documentos y/o datos, por omision o supresion voluntaria, etc.,  seran pasibles a sanciones.
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
        <td style="width: 40%;"><?php echo $nacimiento['Denuncianacimiento']['lugar']?></td>
        <td style="width: 20%;">Fecha:</td>
        <td style="width: 40%;"><?php echo $nacimiento['Denuncianacimiento']['fecha_registro']?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 40%;"><?php echo $nacimiento['Denuncianacimiento']['recibo']?></td>
        <td style="width: 30%;">Socio</td>
        <td style="width: 30%;">Criador</td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        
        </td>
        <td class="center" style="width:20%; color: #1F497D;">
        Sello Regional
        </td>
        <td style="width:20%;">
        <div class="sec_firmas center">
        Firma Prop. Hembra  (Aclaracion de Firma)
        </div>
        </td>
        <td style="width:20%;">
        <div class="sec_firmas center">
        Firma Recetor REGIONAL    (Aclaracion de Firma)
        </div>
        </td>
        </tr>
        </table>
        </div>
        </div>
        </div>
    </div>
</div>