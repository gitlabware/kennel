<style type="text/css" media="print">
  @page { 
    size: letter landscape;
     }
</style>
<style>
table.azul{
    border: 1px solid #1F497D;
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
    line-height: 14px;
    font-size: 11px;
}
.titulo_certificado{
    border: 1px solid #1F497D; 
    color: #1F497D; 
    font-weight: bold; 
    font-size: 16px; 
    background-color: #DAEEF3;
    margin-top: 5px;
}
.titulo_kennel{
    color: #1F497D; 
    font-weight: bold; 
    font-size: 17px; 
    margin-top: 5px;
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
        MAPA DE REGISTRO DE CAMADA
        </div>
        <div style="color: #1F497D; font-size: 11px; background: #DDD9C4; border: 1px solid #1F497D;">
        C&oacute;digos de Registro: <?php echo $camada['Denuncianacimiento']['id']?>
        </div>
        </div>
        </div>
        </td>
        <td class="center"><?php echo $this->Html->image('logo_sicalam.png',array('style' => 'width: 70px; height: 70px'));?></td>
        <td class="center"><?php echo $this->Html->image('logo_fci.png',array('style' => 'width: 70px; height: 70px'));?></td>
        </tr>
        </table>
        <table class="table">
        <tr>
        <td style="width: 90%;">
        <table class="table azul">
        <tr>
        <td style="width: 13%;">Nombre Criador:</td>
        <td style="width: 40%;"><?php echo $camada['Informecomcria']['dueno'] ?></td>
        <td style="width: 12%;">Nombre "Afijo":</td>
        <td style="width: 35%;"><?php echo $camada['Criadero']['nombre']?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 13%;">Raza / Variedad:</td>
        <td style="width: 40%;"><?php echo $camada['Raza']['nombre'] ?>/<?php echo $camada['Camada']['variedad'] ?></td>
        <td style="width: 6%;">FCI:</td>
        <td style="width: 14%;"><?php echo $camada['Criadero']['registro_fci'] ?></td>
        <td class="center" style="width: 15%;">Fecha Nacimiento Camada:</td>
        <td style="width: 12%;"><?php echo $fecha_nacimiento ?></td>
        </tr>
        </table>
        </td>
        <td style="width: 10%;">
        
        <style>
        /* Styles for rotateTableCellContent plugin*/
        table div.rotated {
          -webkit-transform: rotate(270deg);
          -moz-transform: rotate(270deg);
          writing-mode:tb-rl;
          white-space: nowrap;
        }
         
        td.camada {
          vertical-align: top;
        }
         
        table .vertical {
          white-space: nowrap;
        }
        </style>
        <table id="tablaprueba" class="table azul vertical">
         <tr>
         <td class="camada" style="width: 20%;">Camada:</td>
         <td style="width: 80%;"><?php echo $camada['Camada']['camada'] ?></td>
         </tr>
        </table>
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -22px;">
        <tr>
        <td>
        NOMBRES de los Ejemplares 1,- Nombre + Prefijo (The-De-La-Los -Of, ect.)+ Afijo.  2,- Nombre + Afijo. 3,- Afijo + Nombre <span style="color: red;">(todo no debe exceder de 25 a 28 letras)</span>
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 92%;">
        
        <table class="table azul" style="vertical-align: text-top;">
        <tr>
        <td style="width: 5%;">No.</td>
        <td style="width: 27%;">Nombre:</td>
        <td style="width: 6%;">Sexo</td>
        <td style="width: 25%;">COLOR + (Se&ntilde;as o Marcas)</td>
        <td style="width: 19%;">No. de Microchip</td>
        <td style="width: 9%; background-color: #DDD9C4;">No. KCB</td>
        <td style="width: 9%; background-color: #DDD9C4;">No. x Raza</td>
        </tr>
        <?php $i = 0;?>
        <?php if(!empty($camada['Mascota'][0])):?>
        <?php $mascota = $camada['Mascota'][0]?>
        <?php else: $mascota = null;?>
        <?php endif; $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 27%;"><?php if(!empty($mascota['nombre_completo'])){echo $mascota['nombre_completo'];}?></td>
        <td style="width: 6%;">
        <?php if(!empty($mascota['sexo'])):?>
        <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
        M
        <?php else: ?>
        F
        <?php endif; ?>
        <?php endif;?>
        </td>
        <td style="width: 25%;"><?php if(!empty($mascota['color'])){echo $mascota['color'];}?></td>
        <td style="width: 19%;"><?php if(!empty($mascota['chip'])){echo $mascota['chip'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['kcb'])){echo $mascota['kcb'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['num_tatuaje'])){echo $mascota['num_tatuaje'];} ?></td>
        </tr>
        <?php if(!empty($camada['Mascota'][1])):?>
        <?php $mascota = $camada['Mascota'][1]?>
        <?php else: $mascota = null;?>
        <?php endif; $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 27%;"><?php if(!empty($mascota['nombre_completo'])){echo $mascota['nombre_completo'];}?></td>
        <td style="width: 6%;">
        <?php if(!empty($mascota['sexo'])):?>
        <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
        M
        <?php else: ?>
        F
        <?php endif; ?>
        <?php endif;?>
        </td>
        <td style="width: 25%;"><?php if(!empty($mascota['color'])){echo $mascota['color'];}?></td>
        <td style="width: 19%;"><?php if(!empty($mascota['chip'])){echo $mascota['chip'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['kcb'])){echo $mascota['kcb'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['num_tatuaje'])){echo $mascota['num_tatuaje'];} ?></td>
        </tr>
        <?php if(!empty($camada['Mascota'][2])):?>
        <?php $mascota = $camada['Mascota'][2]?>
        <?php else: $mascota = null;?>
        <?php endif; $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 27%;"><?php if(!empty($mascota['nombre_completo'])){echo $mascota['nombre_completo'];}?></td>
        <td style="width: 6%;">
        <?php if(!empty($mascota['sexo'])):?>
        <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
        M
        <?php else: ?>
        F
        <?php endif; ?>
        <?php endif;?>
        </td>
        <td style="width: 25%;"><?php if(!empty($mascota['color'])){echo $mascota['color'];}?></td>
        <td style="width: 19%;"><?php if(!empty($mascota['chip'])){echo $mascota['chip'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['kcb'])){echo $mascota['kcb'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['num_tatuaje'])){echo $mascota['num_tatuaje'];} ?></td>
        </tr>
        <?php if(!empty($camada['Mascota'][3])):?>
        <?php $mascota = $camada['Mascota'][3]?>
        <?php else: $mascota = null;?>
        <?php endif; $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 27%;"><?php if(!empty($mascota['nombre_completo'])){echo $mascota['nombre_completo'];}?></td>
        <td style="width: 6%;">
        <?php if(!empty($mascota['sexo'])):?>
        <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
        M
        <?php else: ?>
        F
        <?php endif; ?>
        <?php endif;?>
        </td>
        <td style="width: 25%;"><?php if(!empty($mascota['color'])){echo $mascota['color'];}?></td>
        <td style="width: 19%;"><?php if(!empty($mascota['chip'])){echo $mascota['chip'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['kcb'])){echo $mascota['kcb'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['num_tatuaje'])){echo $mascota['num_tatuaje'];} ?></td>
        </tr>
        <?php if(!empty($camada['Mascota'][4])):?>
        <?php $mascota = $camada['Mascota'][4]?>
        <?php else: $mascota = null;?>
        <?php endif; $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 27%;"><?php if(!empty($mascota['nombre_completo'])){echo $mascota['nombre_completo'];}?></td>
        <td style="width: 6%;">
        <?php if(!empty($mascota['sexo'])):?>
        <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
        M
        <?php else: ?>
        F
        <?php endif; ?>
        <?php endif;?>
        </td>
        <td style="width: 25%;"><?php if(!empty($mascota['color'])){echo $mascota['color'];}?></td>
        <td style="width: 19%;"><?php if(!empty($mascota['chip'])){echo $mascota['chip'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['kcb'])){echo $mascota['kcb'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['num_tatuaje'])){echo $mascota['num_tatuaje'];} ?></td>
        </tr>
        <?php if(!empty($camada['Mascota'][5])):?>
        <?php $mascota = $camada['Mascota'][5]?>
        <?php else: $mascota = null;?>
        <?php endif; $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 27%;"><?php if(!empty($mascota['nombre_completo'])){echo $mascota['nombre_completo'];}?></td>
        <td style="width: 6%;">
        <?php if(!empty($mascota['sexo'])):?>
        <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
        M
        <?php else: ?>
        F
        <?php endif; ?>
        <?php endif;?>
        </td>
        <td style="width: 25%;"><?php if(!empty($mascota['color'])){echo $mascota['color'];}?></td>
        <td style="width: 19%;"><?php if(!empty($mascota['chip'])){echo $mascota['chip'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['kcb'])){echo $mascota['kcb'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['num_tatuaje'])){echo $mascota['num_tatuaje'];} ?></td>
        </tr>
        <?php if(!empty($camada['Mascota'][6])):?>
        <?php $mascota = $camada['Mascota'][6]?>
        <?php else: $mascota = null;?>
        <?php endif; $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 27%;"><?php if(!empty($mascota['nombre_completo'])){echo $mascota['nombre_completo'];}?></td>
        <td style="width: 6%;">
        <?php if(!empty($mascota['sexo'])):?>
        <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
        M
        <?php else: ?>
        F
        <?php endif; ?>
        <?php endif;?>
        </td>
        <td style="width: 25%;"><?php if(!empty($mascota['color'])){echo $mascota['color'];}?></td>
        <td style="width: 19%;"><?php if(!empty($mascota['chip'])){echo $mascota['chip'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['kcb'])){echo $mascota['kcb'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['num_tatuaje'])){echo $mascota['num_tatuaje'];} ?></td>
        </tr>
        <?php if(!empty($camada['Mascota'][7])):?>
        <?php $mascota = $camada['Mascota'][7]?>
        <?php else: $mascota = null;?>
        <?php endif; $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 27%;"><?php if(!empty($mascota['nombre_completo'])){echo $mascota['nombre_completo'];}?></td>
        <td style="width: 6%;">
        <?php if(!empty($mascota['sexo'])):?>
        <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
        M
        <?php else: ?>
        F
        <?php endif; ?>
        <?php endif;?>
        </td>
        <td style="width: 25%;"><?php if(!empty($mascota['color'])){echo $mascota['color'];}?></td>
        <td style="width: 19%;"><?php if(!empty($mascota['chip'])){echo $mascota['chip'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['kcb'])){echo $mascota['kcb'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['num_tatuaje'])){echo $mascota['num_tatuaje'];} ?></td>
        </tr>
        <?php if(!empty($camada['Mascota'][8])):?>
        <?php $mascota = $camada['Mascota'][8]?>
        <?php else: $mascota = null;?>
        <?php endif; $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 27%;"><?php if(!empty($mascota['nombre_completo'])){echo $mascota['nombre_completo'];}?></td>
        <td style="width: 6%;">
        <?php if(!empty($mascota['sexo'])):?>
        <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
        M
        <?php else: ?>
        F
        <?php endif; ?>
        <?php endif;?>
        </td>
        <td style="width: 25%;"><?php if(!empty($mascota['color'])){echo $mascota['color'];}?></td>
        <td style="width: 19%;"><?php if(!empty($mascota['chip'])){echo $mascota['chip'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['kcb'])){echo $mascota['kcb'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['num_tatuaje'])){echo $mascota['num_tatuaje'];} ?></td>
        </tr>
        <?php if(!empty($camada['Mascota'][9])):?>
        <?php $mascota = $camada['Mascota'][9]?>
        <?php else: $mascota = null;?>
        <?php endif; $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 27%;"><?php if(!empty($mascota['nombre_completo'])){echo $mascota['nombre_completo'];}?></td>
        <td style="width: 6%;">
        <?php if(!empty($mascota['sexo'])):?>
        <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
        M
        <?php else: ?>
        F
        <?php endif; ?>
        <?php endif;?>
        </td>
        <td style="width: 25%;"><?php if(!empty($mascota['color'])){echo $mascota['color'];}?></td>
        <td style="width: 19%;"><?php if(!empty($mascota['chip'])){echo $mascota['chip'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['kcb'])){echo $mascota['kcb'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['num_tatuaje'])){echo $mascota['num_tatuaje'];} ?></td>
        </tr>
        <?php if(!empty($camada['Mascota'][10])):?>
        <?php $mascota = $camada['Mascota'][10]?>
        <?php else: $mascota = null;?>
        <?php endif; $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 27%;"><?php if(!empty($mascota['nombre_completo'])){echo $mascota['nombre_completo'];}?></td>
        <td style="width: 6%;">
        <?php if(!empty($mascota['sexo'])):?>
        <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
        M
        <?php else: ?>
        F
        <?php endif; ?>
        <?php endif;?>
        </td>
        <td style="width: 25%;"><?php if(!empty($mascota['color'])){echo $mascota['color'];}?></td>
        <td style="width: 19%;"><?php if(!empty($mascota['chip'])){echo $mascota['chip'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['kcb'])){echo $mascota['kcb'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['num_tatuaje'])){echo $mascota['num_tatuaje'];} ?></td>
        </tr>
        <?php if(!empty($camada['Mascota'][11])):?>
        <?php $mascota = $camada['Mascota'][11]?>
        <?php else: $mascota = null;?>
        <?php endif; $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 27%;"><?php if(!empty($mascota['nombre_completo'])){echo $mascota['nombre_completo'];}?></td>
        <td style="width: 6%;">
        <?php if(!empty($mascota['sexo'])):?>
        <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
        M
        <?php else: ?>
        F
        <?php endif; ?>
        <?php endif;?>
        </td>
        <td style="width: 25%;"><?php if(!empty($mascota['color'])){echo $mascota['color'];}?></td>
        <td style="width: 19%;"><?php if(!empty($mascota['chip'])){echo $mascota['chip'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['kcb'])){echo $mascota['kcb'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['num_tatuaje'])){echo $mascota['num_tatuaje'];} ?></td>
        </tr>
        <?php if(!empty($camada['Mascota'][12])):?>
        <?php $mascota = $camada['Mascota'][12]?>
        <?php else: $mascota = null;?>
        <?php endif; $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 27%;"><?php if(!empty($mascota['nombre_completo'])){echo $mascota['nombre_completo'];}?></td>
        <td style="width: 6%;">
        <?php if(!empty($mascota['sexo'])):?>
        <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
        M
        <?php else: ?>
        F
        <?php endif; ?>
        <?php endif;?>
        </td>
        <td style="width: 25%;"><?php if(!empty($mascota['color'])){echo $mascota['color'];}?></td>
        <td style="width: 19%;"><?php if(!empty($mascota['chip'])){echo $mascota['chip'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['kcb'])){echo $mascota['kcb'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['num_tatuaje'])){echo $mascota['num_tatuaje'];} ?></td>
        </tr>
        <?php if(!empty($camada['Mascota'][13])):?>
        <?php $mascota = $camada['Mascota'][13]?>
        <?php else: $mascota = null;?>
        <?php endif; $i++;?>
        <tr>
        <td style="width: 5%;"><?php echo $i;?></td>
        <td style="width: 27%;"><?php if(!empty($mascota['nombre_completo'])){echo $mascota['nombre_completo'];}?></td>
        <td style="width: 6%;">
        <?php if(!empty($mascota['sexo'])):?>
        <?php if($mascota['sexo']=="MACHO" || $mascota['sexo']=="macho"): ?>
        M
        <?php else: ?>
        F
        <?php endif; ?>
        <?php endif;?>
        </td>
        <td style="width: 25%;"><?php if(!empty($mascota['color'])){echo $mascota['color'];}?></td>
        <td style="width: 19%;"><?php if(!empty($mascota['chip'])){echo $mascota['chip'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['kcb'])){echo $mascota['kcb'];}?></td>
        <td style="width: 9%; background-color: #DDD9C4;"><?php if(!empty($mascota['num_tatuaje'])){echo $mascota['num_tatuaje'];} ?></td>
        </tr>
        </table>
        
        </td>
        <td style="width: 8%;">
        <table id="tabladefechas" class="table azul vertical">
        <tr>
        <td class="fecha_registro" style=" background-color: #DDD9C4;">
        Fecha de Impresion:<br />
        
        </td>
        <td class="fecha_registro">
        <?php echo $fecha_impresion ?> 
        </td>
        </tr>
        <tr>
        <td class="fecha_registro" style=" background-color: #DDD9C4;">
        Fecha de Registro:
        </td>
        <td class="fecha_registro" ><?php echo $fecha ?> </td>
        </tr>
        </table>
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 40%;">
        <table class="table azul">
        <tr>
        <td style="width: 13%;">Padre:</td>
        <td style="width: 50%;"><?php echo $camada['Padre']['nombre'] ?></td>
        <td style="width: 17%;">KCB-REG:</td>
        <td style="width: 20%;"><?php echo $camada['Padre']['kcb'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 13%;">Nacido:</td>
        <td style="width: 32%;"><?php echo $camada['Padre']['fecha_nacimiento'] ?></td>
        <td style="width: 35%;">No. Raza &oacute; Tatuaje:</td>
        <td style="width: 20%;"><?php echo $camada['Padre']['num_tatuaje'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 18%;">Propietario:</td>
        <td style="width: 82%;"><?php if(!empty($camada['Padre']['Propietarioactual']['nombre'])){echo $camada['Padre']['Propietarioactual']['nombre'];}?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 18%;">Telefonos:</td>
        <td style="width: 82%;"><?php if(!empty($camada['Padre']['Propietarioactual'])){echo $camada['Padre']['Propietarioactual']['telefono1'].' '.$camada['Padre']['Propietarioactual']['telefono2'];}?></td>
        </tr>
        </table>
        </td>
        <td style="width: 10%;"></td>
        <td style="width: 40%;">
        <table class="table azul">
        <tr>
        <td style="width: 13%;">Madre:</td>
        <td style="width: 50%;"><?php echo $camada['Madre']['nombre'] ?></td>
        <td style="width: 17%;">KCB-REG:</td>
        <td style="width: 20%;"><?php echo $camada['Madre']['kcb'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 13%;">Nacido:</td>
        <td style="width: 32%;"><?php echo $camada['Madre']['fecha_nacimiento'] ?></td>
        <td style="width: 35%;">No. Raza &oacute; Tatuaje:</td>
        <td style="width: 20%;"><?php echo $camada['Madre']['num_tatuaje'] ?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 18%;">Propietario:</td>
        <td style="width: 82%;"><?php if(!empty($camada['Madre']['Propietarioactual']['nombre'])){echo $camada['Madre']['Propietarioactual']['nombre'];}?></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 18%;">Telefonos:</td>
        <td style="width: 82%;"><?php if(!empty($camada['Madre']['Propietarioactual'])){echo $camada['Madre']['Propietarioactual']['telefono1'].' '.$camada['Madre']['Propietarioactual']['telefono2'];}?></td>
        </tr>
        </table>
        </td>
        <td style="width: 10%;"></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 50%; height: 40px; background-color: #DDD9C4;">
        OBS. OF NAL:
        
        </td>
        <td style="width: 50%; height: 40px; background-color: #DDD9C4;">
        OBS. OF NAL:
        </td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 23%;">
        Sello y Firma Resp. Regional
        </td>
        <td style="width: 37%;">
        <table class="table azul">
        <tr>
        <td style="width: 15%;">Recibo:</td>
        <td style="width: 23%;"></td>
        <td style="width: 39%;">Recibo Monta Macho:</td>
        <td style="width: 23%;"></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 75%;">Fecha de Recepci&oacute;n Tramite en REGIONAL:</td>
        <td style="width: 25%;"></td>
        </tr>
        </table>
        <table class="table azul" style="margin-top: -1px;">
        <tr>
        <td style="width: 75%;">Fecha de envio Oficina Nacional:</td>
        <td style="width: 25%;"></td>
        </tr>
        </table>
        </td>
        <td style="width: 18%;"></td>
        <td style="width: 22%;"></td>
        </tr>
        </table>
        <div style="background-color: #D9D9D9; color: #1F497D; padding: 4px; border: 3px solid #933634; margin-top: 2px;">
        <b><u>Nota para el criador:</u></b>
        Toda la informacion suscrita en este documento y otros de registro, son y tienen caracter legal regidos a los estatutos y reglamentos del club, asi tambien a las normas vigentes legales del pais, cualquier adulteracion, falsificacion de documentos y/o datos por omision o supresion voluntaria, etc., seran posibles a sanciones
        </div>
        </div>
        </div>
        </div>
    </div>
</div>

<script>
(function ($) {
  $.fn.rotateTableCellContent = function (options) {
  /*
Version 1.0
7/2011
Written by David Votrubec (davidjs.com) and
Michal Tehnik (@Mictech) for ST-Software.com
*/

var cssClass = ((options) ? options.className : false) || "vertical";

var cellsToRotate = $('.' + cssClass, this);

var betterCells = [];
cellsToRotate.each(function () {
var cell = $(this)
, newText = cell.text()
, height = cell.height()
, width = cell.width()
, newDiv = $('<div>', { height: width, width: height })
, newInnerDiv = $('<div>', { text: newText, 'class': 'rotated' });

newInnerDiv.css('-webkit-transform-origin', (width / 2) + 'px ' + (width / 2) + 'px');
newInnerDiv.css('-moz-transform-origin', (width / 2) + 'px ' + (width / 2) + 'px');
newDiv.append(newInnerDiv);

betterCells.push(newDiv);
});

cellsToRotate.each(function (i) {
$(this).html(betterCells[i]);
});
};
})(jQuery);

$('#tablaprueba').rotateTableCellContent({className: 'camada'});
$('#tabladefechas').rotateTableCellContent({className: 'fecha_registro'});
</script>