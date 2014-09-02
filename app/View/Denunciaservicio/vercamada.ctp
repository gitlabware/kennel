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
    margin-top: 30px;
}
.nota_simple{
    background-color: #EBF1DE;
    font-size: 11px;
    color: #1F497D; 
    margin-top: 2px;
    border: 1px solid #1F497D;
    line-height: 15px;
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
        <td class="center"><?php echo $this->Html->image('logo_kennel2.png',array('style' => 'width: 90px; height: 80px'));?></td>
        <td>
        <div class="row-fluid">
        <div class="span12 center">
        <div class="titulo_kennel">
        KENNEL CLUB BOLIVIANO
        </div>
        <div class="titulo_certificado">
        NSPECCION DE CAMADA
        </div>
        <div style="border: 1px solid #1F497D; margin-top: 2px; color: #1F497D;">
        Codigo de Apareamiento: <?php echo $camada['Camada']['servicio_id']?>
        </div>
        </div>
        </div>
        </td>
        <td class="center"><?php echo $this->Html->image('logo_sicalam.png',array('style' => 'width: 70px; height: 70px'));?></td>
        <td class="center"><?php echo $this->Html->image('logo_fci.png',array('style' => 'width: 70px; height: 70px'));?></td>
        </tr>
        </table>
        <table class="table azul">
        <tr>
        <td style="width: 17%;">Nombre Criadero:</td>
        <td style="width: 83%;"><?php echo $camada['Criadero']['nombre']?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 22%;">Nombre Propietario (a):</td>
        <td style="width: 78%;"><?php echo $camada['Criadero']['Propietario']['nombre']?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 7%;">Raza:</td>
        <td style="width: 42%;"><?php echo $camada['Raza']['nombre']?></td>
        <td style="width: 10%;">Variedad:</td>
        <td style="width:41%"><?php echo $camada['Camada']['variedad']?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td>
        Tipo de Pelo: <?php echo $camada['Tipospelo']['nombre']?>
        <!--<input type="checkbox" disabled="disabled" /> Duro <input type="checkbox" disabled="disabled" /> Liso <input type="checkbox" disabled="disabled" /> Corto <input type="checkbox" disabled="disabled" /> Largo -->
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 18%;">Nombre del Padre:</td>
        <td style="width: 53%;"><?php echo $camada['Padre']['nombre_completo']?></td>
        <td style="width: 9%;">No. Reg.</td>
        <td style="width: 20%;">
        <?php 
          echo $camada['Padre']['id'];
          ?>
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 18%;">Nombre del Madre:</td>
        <td style="width: 53%;"><?php echo $camada['Madre']['nombre_completo']?></td>
        <td style="width: 9%;">No. Reg.</td>
        <td style="width: 20%;">
        <?php 
          echo $camada['Madre']['id'];
          ?>
        </td>
        </tr>
        </table>
        <div class="row-fluid">
        <div class="span12 center" style="font-weight: bold; font-size: 13px; color: #1F497D;">
        DATOS DE LA CAMADA
        </div>
        </div>
        <table class="table azul">
        <tr>
        <td style="width: 35%;">Fecha de Nacimiento de la Camada:</td>
        <td style="width: 15%;"><?php echo $fechanacimiento?></td>
        <td style="width: 10%;">Camada:</td>
        <td style="width: 15%;"><?php echo $camada['Camada']['camada']?></td>
        <td style="width: 10%;">Lechigada:</td>
        <td style="width: 15%;"><?php echo $camada['Camada']['lechigada']?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 27%;">Numero de parto de la Madre:</td>
        <td style="width: 18%;"><?php echo $camada['Camada']['numpartomadre']?></td>
        <td style="width: 37%;">Cachorros encontrados con la madre No.:</td>
        <td style="width: 18%;"><?php echo $camada['Camada']['cachorrosencontrados']?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 5%;"></td>
        <td style="width: 45%;"><b>NOMBRES</b> de los Ejemplares (Sin Afijo)</td>
        <td style="width: 6%;">Sexo</td>
        <td style="width: 44%;"><b>COLOR</b> + (Se&ntilde;as o Marcas)</td>
        </tr>
        <?php $i = 0;?>
        <?php foreach($camada['Mascota'] as $mascota):?>
        <?php $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 45%;"><?php echo $mascota['nombre']?></td>
        <td style="width: 6%;"><?php echo $mascota['sexo']?></td>
        <td style="width: 44%;">
        <?php echo $mascota['color']?>
            (<?php echo $mascota['senas']?>)
        </td>
        </tr>
        <?php endforeach;?>
        </table>
        <div class="nota_simple">
        <b>NOTA: Sr. Inspector de Sub-Comision de Cria</b>: Usted debe anotar en observaciones, si el cachorro es tipico de la raza "ver previamente estandar de raza", color, tipo de pelo, etc. si el mismo sufre alguna enfermedad visible al momento de la  1ra. y 2da. Inspeccion, (Ej.: Diarrea, Conjuntivitis,etc.) <b>Si al  momento de la segunda Inspeccion alguno de los ejemplares fallecio anotar la causa</b>, en esta 2da. inspeccion usted debe verificar si a los ejemplares machos ya le descendieron ambos testiculos, <b>en esta 2da. inspeccion se impltaran los Microchips.</b>
        </div>
        <table class="table">
        <tr>
        <td style="width: 65%;">
        <table class="table azul">
        <tr>
        <td style="width: 70%; height: 40px;">
        Fecha 1ra INSPECCION: <?php echo $camada['Camada']['fechainspeccion1'];?>
        <div style="color: #1F497D; border-top: 1px solid #1F497D;">
        (Verificacion de nacimiento de la camada)
        </div>
        </td>
        <td style="width: 30%">dias de nacidos: <?php echo $camada['Camada']['diasdenacidos1'];?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="height: 35px;">OBSERVACIONES GENERALES 1ra. INSPECCION (Comision de Cria): <?php echo $camada['Camada']['obs_inspeccion1'];?></td>
        </tr>
        </table>
        
        <table class="table azul"  style="margin-top: -1px;">
        <tr>
        <td style="width: 70%; height: 40px;">
        Fecha 2da INSPECCION: <?php echo $camada['Camada']['fechainspeccion2'];?>
        <div style="color: #1F497D; border-top: 1px solid #1F497D;">
        (2da Inspeccion OBLIGATORIA - Implante de Chips)
        </div>
        </td>
        <td style="width: 30%">dias de nacidos: <?php echo $camada['Camada']['diasdenacidos2'];?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="height: 35px;">OBSERVACIONES GENERALES 2da. INSPECCION (Comision de Cria): <?php echo $camada['Camada']['obs_inspeccion2'];?></td>
        </tr>
        </table>
        <div class="center" style="border: 2px solid #1F497D; padding: 2px; color: #1F497D; background-color: #DAEEF3;">
        <b>Visado por Regional:</b>
        </div>
        </td>
        <td style="width: 35%;">
        <table class="table azul">
        <tr>
        <td style="height: 30px;"></td>
        </tr>
        <tr>
        <td class="center">
        Firma y aclaracion de firma<br />
        Inspector Sub-Comision de Cria
        </td>
        </tr>
        <tr>
        <td style="height: 30px;"></td>
        </tr>
        <tr>
        <td class="center">
        Firma y aclaracion de firma<br />
        Inspector Sub-Comision de Cria
        </td>
        </tr>
        <tr>
        <td style="height: 30px;"></td>
        </tr>
        <tr>
        <td class="center">
        Firma y aclaracion de firma<br />
        Propietario  del Criadero
        </td>
        </tr>
        </table>
        </td>
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
        <td style="width: 40%;"><?php echo $camada['Camada']['lugar']?></td>
        <td style="width: 20%;">Fecha:</td>
        <td style="width: 40%;"><?php echo $fecha?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 40%;"><?php echo $camada['Camada']['recibo']?></td>
        <td style="width: 30%;">Socio</td>
        <td style="width: 30%;">Criador</td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        
        </td>
        <td style="width:20%;">
        <div class="center" style="color: #1F497D;">
        <b>Sello Regional</b>
        </div>
        </td>
        <td style="width:20%;">
        <div class="sec_firmas center">
        Firma Sub-Comision de Cria   (Aclaracion de Firma)
        </div>
        </td>
        <td style="width:20%;">
        <div class="sec_firmas center">
        Firma Recetor REGIONAL    (Aclaracion de Firma)
        </div>
        </td>
        </tr>
        </table>
        <div style="color: #1F497D; border: 2px solid #1F497D; padding: 3px; font-weight: bold; font-size: 11px; background-color: #D9D9D9;line-height: 15px;">
        <u>Nota para el criador</u>: Toda la informacion suscrita en este documento y otros de registro, son y tienen caracter legal regidos a los estatutos y reglamentos del club, asi tambien a las normas vigentes legales del pais, cualquier adulteracion, falsificacion de documentos y/o datos, por omision o supresion voluntaria, etc.,  seran pasibles a sanciones.

        </div>
        </div>
        </div>
        </div>
    </div>
</div>