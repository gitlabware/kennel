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
    background-color: #D9D9D9; 
    color: #1F497D; 
    margin-top: 2px;
    font-size: 10px;
    line-height: 15px;
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
        <td class="center"><?php echo $this->Html->image('logo_kennel2.png');?></td>
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
        <td class="center"><?php echo $this->Html->image('logo_sicalam.png',array('style' => 'width: 90px; height: 90px'));?></td>
        <td class="center"><?php echo $this->Html->image('logo_fci.png',array('style' => 'width: 90px; height: 90px'));?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
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
        <td style="width: 10%;">No.Registro:</td>
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
        </div>
        </div>
        </div>
    </div>