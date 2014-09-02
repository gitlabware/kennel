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
    background-color: #EBF1DE; 
    font-weight: bold;
    color: #1F497D; 
    margin-top: 2px;
}
.nota_criadores{
    background-color: #D9D9D9; 
    font-weight: bold; 
    margin-top: 2px;
    color: black;
    font-size: 11px;
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
        DENUNCIA DE MONTA(MACHOS)
        </div>
        </div>
        </div>
        </td>
        <td class="center"><?php echo $this->Html->image('logo_sicalam.png',array('style' => 'width: 90px; height: 90px'));?></td>
        <td class="center"><?php echo $this->Html->image('logo_fci.png',array('style' => 'width: 90px; height: 90px'));?></td>
        </tr>
        </table>
        
        <div class="nota_simple center">
        NOTA: Toda denuncia de Monta (Machos) sera gratuita si se la realiza antes del Nacimiento de la camada.
        </div>
        <table class="table azul">
        <tr>
        <td style="width: 10%;">Yo Sr. (a)</td>
        <td style="width: 60%;"><?php echo $datos['Servicio']['Propietarioreproductor']['nombre'] ?></td>
        <td style="width: 10%;">con C.I.</td>
        <td style="width: 30%;"><?php echo $datos['Servicio']['Propietarioreproductor']['ci'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 20%;">Soy Propietari@ del Ejemplar de Nombre:</td>
        <td style="width: 50%;"><?php echo $datos['Servicio']['Reproductor']['nombre']; ?></td>
        <td style="width: 10%;">Registro No.</td>
        <td style="width: 20%;"><?php echo $datos['Servicio']['Reproductor']['id']; ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 10%;">Raza</td>
        <td style="width: 40%;"><?php if(!empty($datos['Servicio']['Reproductor']['Raza']['nombre'])){echo $datos['Servicio']['Reproductor']['Raza']['nombre'];}?></td>
        <td style="width: 15%;">Fecha de Nacimiento</td>
        <td style="width: 10%;"><?php echo $datos['Servicio']['Reproductor']['fecha_nacimiento']; ?></td>
        <td style="width: 10%;">Color</td>
        <td style="width: 15%">
        <?php echo $datos['Servicio']['Reproductor']['color']; ?>
     (<?php echo $datos['Servicio']['Reproductor']['senas']; ?>)
     </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 20%;">Con domicilio en:</td>
        <td style="width: 40%;"><?php echo $datos['Servicio']['Propietarioreproductor']['direccion'] ?></td>
        <td style="width: 10%;">Telefonos Fijo y Cel.:</td>
        <td style="width: 30;">
        <?php echo $datos['Servicio']['Propietarioreproductor']['telefono1']; ?>
        &nbsp;
             <?php
        echo $datos['Servicio']['Propietarioreproductor']['telefono2'];
        ?>
        &nbsp;
        <?php echo $datos['Servicio']['Propietarioreproductor']['celular']; ?>
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 16%;">Emails</td>
        <td style="width: 42%;"><?php echo $datos['Servicio']['Propietarioreproductor']['email1'] ?></td>
        <td style="width: 42%;"><?php echo $datos['Servicio']['Propietarioreproductor']['email2'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: 1px; margin-bottom: 1px;">
        <tr>
        <td><u>COMPROMISO</u>: Me comprometo a realizar el servicio de mi ejemplar "macho" descrito anteriormente,  con  la  reproductora que se detalla a continuacion, en las fechas que sean mas optimas para asegurar el fin convenido.</td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 20%;">Nombre del Ejemplar:</td>
        <td style="width: 50%;"><?php echo $datos['Servicio']['Reproductora']['nombre']; ?></td>
        <td style="width: 12%;">Registro No.</td>
        <td style="width: 18%;"><?php echo $datos['Servicio']['Reproductora']['id']; ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 20%;">Nombre del Propietari@:</td>
        <td style="width: 57%;"><?php echo $datos['Servicio']['Propietarioreproductora']['nombre'] ?></td>
        <td style="width: 8%;">con C.I.</td>
        <td style="width: 15%;"><?php echo $datos['Servicio']['Propietarioreproductora']['ci'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 10%;">Raza</td>
        <td style="width: 40%;"><?php echo $datos['Servicio']['Reproductora']['Raza']['nombre']; ?></td>
        <td style="width: 15%;">Fecha de Nacimiento</td>
        <td style="width: 10%;"><?php echo $datos['Servicio']['Reproductora']['fecha_nacimiento']; ?></td>
        <td style="width: 10%;">Color</td>
        <td style="width: 15%">
        <?php echo $datos['Servicio']['Reproductora']['color']; ?>
     (<?php echo $datos['Servicio']['Reproductora']['senas']; ?>)
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 20%;">Con domicilio en:</td>
        <td style="width: 40%;"><?php echo $datos['Servicio']['Propietarioreproductora']['direccion'] ?></td>
        <td style="width: 10%;">Telefonos Fijo y Cel.:</td>
        <td style="width: 30;">
        <?php
        echo $datos['Servicio']['Propietarioreproductora']['telefono1']; ?>
             &nbsp;
             <?php
        echo $datos['Servicio']['Propietarioreproductora']['telefono2'];
        ?>
        &nbsp;
        <?php echo $datos['Servicio']['Propietarioreproductora']['celular']; ?>
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 16%;">Emails</td>
        <td style="width: 42%;"><?php echo $datos['Servicio']['Propietarioreproductora']['email1'] ?></td>
        <td style="width: 42%;"><?php echo $datos['Servicio']['Propietarioreproductora']['email2'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: 1px;">
        <tr>
        <td>
        <u>COMPROMISO</u>: Como propietari@ de la reproductora, me comprometo a entregar al propietario del reproductor "Macho",
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 4%;">No.</td>
        <td style="width: 5%; background-color: #DAEEF3;"><?php echo $datos['Servicio']['numcachorros'] ?></td>
        <td style="width: 10%;">Cachorros:</td>
        <td style="width: 5%; background-color: #DAEEF3;"><?php echo $datos['Servicio']['num_macho'] ?></td>
        <td style="width: 10%;">Machos:</td>
        <td style="width: 5%; background-color: #DAEEF3;"><?php echo $datos['Servicio']['num_hembra'] ?></td>
        <td style="width: 10%;">Hembras:</td>
        <td style="width: 14%;">o el Monto de:</td>
        <td style="width: 10%; background-color: #DAEEF3;"><?php echo $datos['Servicio']['bs'] ?></td>
        <td style="width: 4%;">$us</td>
        <td style="width: 4%;">Bs</td>
        <td style="width: 9%;">u otros:</td>
        <td style="width: 10%; background-color: #DAEEF3;"><?php echo $datos['Servicio']['otros'] ?></td>
        </tr>
        </table>
        <table class="table azul">
        <tr>
        <td style="width: 49%;">por el servicio prestado por el reproductor, hasta fecha:</td>
        <td style="width: 14%; background-color: #DAEEF3;"><?php echo $datos['Servicio']['fecha_hasta'] ?></td>
        <td style="width: 37%;">si hubiese sido efectivo lo convenido.</td>
        </tr>
        </table>
        
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
        <td style="width: 40%;"><?php echo $datos['Monta']['lugar'] ?></td>
        <td style="width: 20%;">Fecha:</td>
        <td style="width: 40%;"><?php echo $datos['Monta']['fecha'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 40%;"><?php echo $datos['Monta']['recibo'] ?></td>
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
        Firma Propietari@ Macho  (Aclaracion de Firma)
        </div>
        </td>
        <td style="width:20%;">
        <div class="sec_firmas center">
        Firma Propietari@ Hembra  (Aclaracion de Firma)
        </div>
        </td>
        <td style="width:20%;">
        <div class="sec_firmas center">
        Firma y Sello Recetor REGIONAL    (Aclaracion de Firma)
        </div>
        </td>
        </tr>
        </table>
        <div class="nota_criadores">
        Nota para los criadores: Toda la informacion y/o compromisos, suscritos en este documento y otros de registro, son y tienen caracter legal regidos ante los estatutos y reglamentos del club, asi tambien a las normas vigentes legales del pais, cualquier  incumplimiento y/o omision  podra ser pasible a sanciones y/o el inicio de las acciones legales pertinentes por parte del afectado.
        </div>
        </div>
        </div>
        </div>
    </div>
</div>      