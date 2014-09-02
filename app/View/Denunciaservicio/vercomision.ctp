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
    color: #1F497D; 
    margin-top: 2px;
    line-height: 15px;
    padding: 3px;
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
        INFORME COMISION DE CR&Iacute;A
        </div>
        </div>
        </div>
        </td>
        <td class="center"><?php echo $this->Html->image('logo_sicalam.png',array('style' => 'width: 90px; height: 90px'));?></td>
        <td class="center"><?php echo $this->Html->image('logo_fci.png',array('style' => 'width: 90px; height: 90px'));?></td>
        </tr>
        </table>
        <div class="nota_simple">
        <b>NOTA: Sr. Inspector de Sub-Comision de Cria</b>: Al momento de la 1ra. y 2da inspeccion usted a notado alteraciones fisicas de Feno y Genotipo "Segun el estandar de la raza" en la camada y/o cualquiera de los ejemplares los cuales tengan enfermedades y/o faltas descalificantes, debe anotar detalladamente sus observaciones, para ser consideradas en la emision de Pedigrees.
        </div>
        <table class="table azul">
        <tr>
        <td style="width: 40%;">Nombre Responsable (Sub-Comision de Cria):</td>
        <td style="width: 60%;"><?php echo $comision['Informecomcria']['responsablec'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 30%;">Nombre Propietario camada:</td>
        <td style="width: 70%;"><?php echo $comision['Informecomcria']['dueno'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 30%;"></td>
        <td class="center" style="width: 40%;">DATOS DE LA CAMADA</td>
        <td style="width: 30%;"></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 35%;">Fecha de Nacimiento de la Camada:</td>
        <td style="width: 15%;"><?php echo $comision['Camada']['fecha_nacimiento'] ?></td>
        <td style="width: 4%;"></td>
        <td style="width: 10%;">Camada:</td>
        <td style="width: 12%;"><?php echo $comision['Camada']['camada'] ?></td>
        <td style="width: 4%;"></td>
        <td style="width: 10%;">Lechigada:</td>
        <td style="width: 10%;"><?php echo $comision['Camada']['lechigada'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 30%;">Numero de parto de la Madre:</td>
        <td style="width: 15%;"><?php echo $comision['Camada']['numpartomadre'] ?></td>
        <td style="width: 37%;">Cachorros encontrados con la madre No.:</td>
        <td style="width: 18%;"><?php echo $comision['Camada']['cachorrosencontrados'] ?></td>
        </tr>
        </table>
        <table class="table">
        <tr>
        <td style="width: 25%;">
        <table class="table azul">
        <tr>
        <?php 
   $totalvivos = $comision['Denuncianacimiento']['num_vivos_machos'] + $comision['Denuncianacimiento']['num_vivos_hembras'];
   $totalmuertos = $comision['Denuncianacimiento']['num_muertos_machos'] + $comision['Denuncianacimiento']['num_muertos_hembras'];
   $totalsacrificados = $comision['Denuncianacimiento']['num_sacrificados_machos'] + $comision['Denuncianacimiento']['num_sacrificados_hembras'];
   
   ?>
        <td class="" style="width: 50%;"><?php echo $totalvivos;?></td>
        <td style="width: 50%;">Cachorros </td>
        </tr>
        </table>
        </td>
        <td style="width: 75%;">
        
        <table class="table azul">
        <tr>
        <td style="width: 15%;"><?php echo $totalvivos?></td>
        <td style="width: 25%;">nacidos VIVOS</td>
        <td style="width: 10%;"><?php echo $comision['Denuncianacimiento']['num_vivos_machos']?></td>
        <td style="width: 20%;">Machos</td>
        <td style="width: 10%;"><?php echo $comision['Denuncianacimiento']['num_vivos_hembras']?></td>
        <td style="width: 20%;">Hembras</td>
        </tr>
        <tr>
        <td style="width: 15%;"><?php echo $totalmuertos?></td>
        <td style="width: 25%;">nacidos MUERTOS</td>
        <td style="width: 10%;"><?php echo $comision['Denuncianacimiento']['num_muertos_machos']?></td>
        <td style="width: 20%;">Machos</td>
        <td style="width: 10%;"><?php echo $comision['Denuncianacimiento']['num_muertos_hembras']?></td>
        <td style="width: 20%;">Hembras</td>
        </tr>
        <tr>
        <td style="width: 15%;"><?php echo $totalsacrificados?></td>
        <td style="width: 25%;">ser&aacute;n sacrificados</td>
        <td style="width: 10%;"><?php echo $comision['Denuncianacimiento']['num_sacrificados_machos']?></td>
        <td style="width: 20%;">Machos</td>
        <td style="width: 10%;"><?php echo $comision['Denuncianacimiento']['num_sacrificados_hembras']?></td>
        <td style="width: 20%;">Hembras</td>
        </tr>
        </table>
        </td>
        
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="height: 100px;">
        Observaciones: 
        <?php if(!empty($comision['Observacionesinformecomcria'])): ?>
         <?php foreach($comision['Observacionesinformecomcria'] as $ejemplar): ?>
         <?php if($ejemplar['observacion'] != null):?>
            <?php echo $ejemplar['Mascota']['nombre'];?>:  
            
            <?php echo $ejemplar['observacion'] ?>,
            
         <?php endif; ?>
         <?php endforeach; ?>
      <?php endif; ?>
        </td>
        </tr>
        </table>
        <table class="table">
        <tr>
        <td style="width: 55%;">
        <table class="table azul">
        <tr>
        <td style="width: 15%;">Lugar:</td>
        <td style="width: 35%;"><?php echo $this->requestAction(array('action' => 'get_departamento',$comision['Informecomcria']['departamento_id'])) ?></td>
        <td style="width: 15%;">Fecha:</td>
        <td style="width: 35%;"><?php echo $comision['Informecomcria']['fechainforme'] ?></td>
        </tr>
        </table>
        </td>
        <td style="width: 45%;">
        <div class="sec_firmas center">
        Nombre: <br />
        Inspector Sub-Comisi&oacute;n de Cr&iacute;a
        </div>
        </td>
        </tr>
        </table>
        <table class="table azul" style="width: 50%; margin-top: -3px;">
        <tr>
        <td>
        Visado por Regional:
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
        <td style="width: 40%;"><?php echo $this->requestAction(array('action' => 'get_departamento',$comision['Informecomcria']['departamento_id2'])) ?></td>
        <td style="width: 20%;">Fecha:</td>
        <td style="width: 40%;"><?php echo $comision['Informecomcria']['fecha'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 40%;"><?php echo $comision['Informecomcria']['recibo'] ?></td>
        <td style="width: 30%;">Socio</td>
        <td style="width: 30%;">Criador</td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        
        </td>
        <td style="width:20%;">
        <div class="center" style="color: #1F497D; font-weight: bold;">
        Sello Regional
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
        </div>
        </div>
        </div>
    </div>
</div>