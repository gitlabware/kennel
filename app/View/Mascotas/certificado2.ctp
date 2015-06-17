<style>

table{
    border-spacing: 0px;
    padding: 0px;
  }
div{
    border-spacing: 0px;
    padding: 0px;
  }
td{
    border-spacing: 0px;
    padding: 0px;
  }
</style>
<div style="margin-top: -10px; margin-left: -8px; width: 1135px; height: 735px;background-repeat: no-repeat; background-size: 1137px 742px; background-image: url('<?php echo $this->Html->webroot('img/PEDIGREE KENNEL CLUB FINALES-01.jpg')?>'); border-top: 1px solid blue; border-bottom: 1px solid blue; border-left: 1px solid blue; border-right: 1px solid blue;">
    <div id="certificado" style="font-size: 12px;">
    <table style="border-spacing: 0px; ">
        <tr>
        <td>
        <div style="padding-top: 51px; padding-left: 28px;">
            
            <table style="width: 240px; color: #124996; font-weight: bold;margin-left: 5px; margin-top: 20px; font-size: 10px; border-spacing: 0px;">
                <tr style="height: 11px;">
                <td style="width: 32px; height: 11px;"></td>
                <td style="width: 63px; height: 11px;"><div id="divfechacria" style="width: 62px; height: 10px;"><span id="spanfechacria"><?php if(!empty($a_cria['Examenesmascota']['fecha_examen'])){echo $a_cria['Examenesmascota']['fecha_examen'];}?></span></div></td>
                <td style="width: 78px;"></td>
                <td style="width: 67px; height: 11px;"><?php if(!empty($a_cria['Examenesmascota']['numero_formulario'])){echo $a_cria['Examenesmascota']['numero_formulario'];}?></td>
                </tr>
            </table>
            <table style="color: #124996; font-weight: bold;margin-left: 5px; width: 240px; height: 11px; margin-top: 0px; font-size: 10px; border-spacing: 0px; margin-top: 1px;">
                <tr>
                <td style="width: 27px;"></td>
                <td style="width: 213px; height: 11px;"><div id="divjuezcria" style="width: 212px; height: 10px;"><span id="spanjuezcria"><?php if(!empty($a_cria['Examenesmascota']['revisor'])){echo $a_cria['Examenesmascota']['revisor'];}?></span></div></td>
                </tr>
            </table>
            <table style="color: #124996; font-weight: bold;margin-left: 5px; width: 240px; height: 11px;  font-size: 10px; border-spacing: 0px; margin-top: 70px;">
                <tr>
                <td style="width: 32px; height: 11px;"></td>
                <td style="width: 63px; height: 11px;"><?php if(!empty($a_reproduccion['Examenesmascota']['fecha_examen'])){echo $a_reproduccion['Examenesmascota']['fecha_examen'];}?></td>
                <td style="width: 78px;"></td>
                <td style="width: 67px; height: 11px;"><?php if(!empty($a_reproduccion['Examenesmascota']['numero_formulario'])){echo $a_reproduccion['Examenesmascota']['numero_formulario'];}?></td>
                </tr>
            </table>
            <table style="color: #124996; font-weight: bold;margin-left: 5px; width: 240px; height: 11px; margin-top: 0px; font-size: 9px; border-spacing: 0px;">
                <tr>
                <td style="width: 113px; height: 11px;"></td>
                <td style="width: 127px; height: 11px;"><div id="divmiembroreproduccion" style="width: 122pxpx; height: 10px;"><span id="spanmiembroreproduccion"><?php if(!empty($a_reproduccion['Examenesmascota']['revisor'])){echo $a_reproduccion['Examenesmascota']['revisor'];}?></span></div></td>
                </tr>
            </table>
            <table style="color: #124996; font-weight: bold;margin-left: 5px; width: 240px; height: 11px;  font-size: 10px; border-spacing: 0px; margin-top: 74px;">
                <tr>
                <td style="width: 32px;"></td>
                <td style="width: 80px; height: 11px;"><div style="width: 79; height: 10px;"><span><?php if(!empty($displacias[0]['Examenesmascota']['fecha_examen'])){echo $displacias[0]['Examenesmascota']['fecha_examen'];}?></span></div></td>
                <td style="width: 47px;"></td>
                <td style="width: 81px; height: 11px;"><div style="width: 79px; height: 10px;"><span><?php if(!empty($displacias[1]['Examenesmascota']['fecha_examen'])){echo $displacias[1]['Examenesmascota']['fecha_examen'];}?></span></div></td>
                </tr>
            </table>
            <table class="tabla_dcf" style="color: #124996; font-weight: bold;margin-left: 5px; width: 240px; height: 11px; border-spacing: 0px; font-size: 7px; margin-top: 4px;">
                <tr>
                <td style="width: 95px;"></td>
                <td style="width: 23px; height: 11px;"><div id="divdcfdisplacia1" style="width: 22px; height: 10px;"><span id="spandcfdisplacia1"><?php if(!empty($displacias[0]['Examenesmascota']['dcf'])){echo $displacias[0]['Examenesmascota']['dcf'];}?></span></div></td>
                <td style="width: 100;"></td>
                <td style="width: 22px; height: 11px;"><div id="divdcfdisplacia2" style="width: 21px; height: 10px;"><span id="spandcfdisplacia2"><?php if(!empty($displacias[1]['Examenesmascota']['dcf'])){echo $displacias[1]['Examenesmascota']['dcf'];}?></span></div></td>
                </tr>
            </table>
            <table class="table_resultado" style="color: #124996; font-weight: bold;margin-left: 5px; width: 240px; height: 11px;  font-size: 9px; border-spacing: 0px; margin-top: 0px;">
                <tr>
                <td style="width: 42px;"></td>
                <td style="width: 73px; height: 11px;"><div id="divresultadodisplacia1" style="width: 72px; height: 10px;"><span id="spanresultadodisplacia1"><?php if(!empty($displacias[0]['Examenesmascota']['resultado'])){echo $displacias[0]['Examenesmascota']['resultado'];}?></span></div></td>
                <td style="width: 54px;"></td>
                <td style="width: 71px; height: 11px;"><div id="divresultadodisplacia2" style="width: 70px; height: 10px;"><span id="spanresultadodisplacia2"><?php if(!empty($displacias[1]['Examenesmascota']['resultado'])){echo $displacias[1]['Examenesmascota']['resultado'];}?></span></div></td>
                </tr>
            </table>
            <table class="" style="color: #124996; font-size: 5px; font-weight: bold;margin-left: 5px; width: 240px; height: 11px; border-spacing: 0px; margin-top: 3px;">
                <tr>
                <td style="width: 30px;"></td>
                <td style="width: 85px; height: 11px;"><div id="divrevisordisplacia1" style="width: 84px; height: 10px;"><span id="spanrevisordisplacia1"><?php if(!empty($displacias[0]['Examenesmascota']['revisor'])){echo strtoupper($displacias[0]['Examenesmascota']['revisor']);}?></span></div></td>
                <td style="width: 42px;"></td>
                <td style="width: 83px; height: 11px;"><div id="divrevisordisplacia2" style="width: 82px; height: 10px;"><span id="spanrevisordisplacia2"><?php if(!empty($displacias[1]['Examenesmascota']['revisor'])){echo strtoupper($displacias[1]['Examenesmascota']['revisor']);}?></span></div></td>
                </tr>
            </table>
            <table style="color: #124996; font-weight: bold;margin-left: 5px; width: 240px; height: 11px; margin-top: 142px; font-size: 9px; border-spacing: 0px;" >
                <tr>
                <td style="width: 50px;"></td>
                <td style="width: 190px; height: 11px;"><div id="divtransferido1" style="width: 183px; height: 10px;"><span id="spantransferido1"><?php if(!empty($transferencias[0]['Propietario']['nombre'])){echo mb_strtoupper($transferencias[0]['Propietario']['nombre'], 'UTF-8');if(!empty($transferencias[0]['Propietario']['ci'])){echo ' C.I.: '.$transferencias[0]['Propietario']['ci'];}}?></span></div></td>
                </tr>
            </table>
            <table style="color: #124996; font-weight: bold; margin-left: 5px; width: 240px; height: 11px; margin-top: 2px; font-size: 8px; border-spacing: 0px; " >
                <tr style="">
                <td style="width: 30px; height: 11px;"></td>
                <td style="width: 77px; height: 11px;"><div id="divfechatransfer1" style="width: 76px; height: 10px;"><span id="spanfechatransfer1"><?php if(!empty($transferencias[0]['Mascotaspropietario']['fecha_transfer'])){echo strtoupper($transferencias[0]['Mascotaspropietario']['fecha_transfer']);}?></span></div></td>
                <td style="width: 47px; height: 11px;"></td>
                <td style="width: 86px; height: 11px;"><div id="divciudadtransfer1" style="width: 84px; height: 10px;"><span id="spanciudadtransfer1"><?php if(!empty($transferencias[0]['Mascotaspropietario']['pais_destino'])){echo strtoupper($transferencias[0]['Mascotaspropietario']['pais_destino']);}?></span></div></td>
                </tr>
            </table>
            <table class="" style="color: #124996; font-weight: bold;margin-left: 5px; width: 240px; height: 11px; margin-top: 1px; font-size: 9px; border-spacing: 0px;" >
                <tr>
                <td style="width: 40px;"></td>
                <td style="width: 200px; height: 11px;"><div id="divdirecciontransfer1" style="width: 198px; height: 10px;"><span id="spandirecciontransfer1"><?php if(!empty($transferencias[0]['Propietario']['direccion'])){echo strtoupper($transferencias[0]['Propietario']['direccion']);}?></span></div></td>
                </tr>
            </table>
            
            <table style="color: #124996; font-weight: bold;margin-left: 5px; width: 240px; height: 11px; margin-top: 2px; font-size: 9px; border-spacing: 0px;" >
                <tr>
                <td style="width: 40px;"></td>
                <td style="width: 200px; height: 11px;"><div id="divtelefonostransfer1" style="width: 198px; height: 10px; "><span id="spantelefonostransfer1"><?php if(!empty($transferencias[0]['Propietario']['telefono1'])){echo $transferencias[0]['Propietario']['telefono1'];if(!empty($transferencias[0]['Propietario']['telefono2'])){echo ' '.$transferencias[0]['Propietario']['telefono2'];}}?></span></div></td>
                </tr>
            </table>
            
            <table style="color: #124996; font-weight: bold;margin-left: 5px; width: 240px; height: 11px; margin-top: 52px; font-size: 9px; border-spacing: 0px;" >
                <tr>
                <td style="width: 50px;"></td>
                <td style="width: 190px; height: 11px;"><div id="divtransferido2" style="width: 183px; height: 10px;"><span id="spantransferido2"><?php if(!empty($transferencias[1]['Propietario']['nombre'])){echo strtoupper($transferencias[1]['Propietario']['nombre']);if(!empty($transferencias[1]['Propietario']['ci'])){echo ' C.I.: '.$transferencias[1]['Propietario']['ci'];}}?></span></div></td>
                </tr>
            </table>
            <table style="color: #124996; font-weight: bold; margin-left: 5px; width: 240px; height: 11px; margin-top: 2px; font-size: 8px; border-spacing: 0px; " >
                <tr style="">
                <td style="width: 30px; height: 11px;"></td>
                <td style="width: 77px; height: 11px;"><div id="divfechatransfer2" style="width: 76px; height: 10px;"><span id="spanfechatransfer2"><?php if(!empty($transferencias[1]['Mascotaspropietario']['fecha_transfer'])){echo strtoupper($transferencias[1]['Mascotaspropietario']['fecha_transfer']);}?></span></div></td>
                <td style="width: 47px; height: 11px;"></td>
                <td style="width: 86px; height: 11px;"><div id="divciudadtransfer2" style="width: 84px; height: 10px;"><span id="spanciudadtransfer2"><?php if(!empty($transferencias[1]['Mascotaspropietario']['pais_destino'])){echo strtoupper($transferencias[1]['Mascotaspropietario']['pais_destino']);}?></span></div></td>
                </tr>
            </table>
            <table class="" style="color: #124996; font-weight: bold;margin-left: 5px; width: 240px; height: 11px; margin-top: 1px; font-size: 9px; border-spacing: 0px;" >
                <tr>
                <td style="width: 40px;"></td>
                <td style="width: 200px; height: 11px;"><div id="divdirecciontransfer2" style="width: 198px; height: 10px;"><span id="spandirecciontransfer2"><?php if(!empty($transferencias[1]['Propietario']['direccion'])){echo strtoupper($transferencias[1]['Propietario']['direccion']);}?></span></div></td>
                </tr>
            </table>
            
            <table style="color: #124996; font-weight: bold;margin-left: 5px; width: 240px; height: 11px; margin-top: 2px; font-size: 9px; border-spacing: 0px;" >
                <tr>
                <td style="width: 40px;"></td>
                <td style="width: 200px; height: 11px;"><div id="divtelefonostransfer2" style="width: 198px; height: 10px; "><span id="spantelefonostransfer2"><?php if(!empty($transferencias[1]['Propietario']['telefono1'])){echo $transferencias[1]['Propietario']['telefono1'];if(!empty($transferencias[1]['Propietario']['telefono2'])){echo ' '.$transferencias[1]['Propietario']['telefono2'];}}?></span></div></td>
                </tr>
            </table>
        </div>
        </td>
        <td>
        <div>
        <div class="oculto" style="width: 500px; height: 30px;margin-left: 160px;">
        <a href="<?php echo $this->Html->url(array('action' => 'certificado',$idMascota))?>">ATRAS</a> <a href="javascript:" onclick="window.print();">IMPRIMIR</a> <a href="<?php echo $this->Html->url(array('action' => 'ver',$idMascota))?>">SIGUIENTE</a>
        </div>
        </div>
        </td>
        </tr>
    </table>
        
    </div>
</div>
<script type="text/javascript">


$(document).ready(function() {
    autosize("spanfechacria","divfechacria");
    autosize("spanjuezcria","divjuezcria");
    autosize("spantelefonostransfer2","divtelefonostransfer2");
    autosize("spanciudadtransfer2","divciudadtransfer2");
    autosize("spanfechatransfer2","divfechatransfer2");
    autosize("spantransferido2","divtransferido2");
    autosize("spandirecciontransfer2","divdirecciontransfer2");
    autosize("spantelefonostransfer1","divtelefonostransfer1");
    autosize("spanciudadtransfer1","divciudadtransfer1");
    autosize("spanfechatransfer1","divfechatransfer1");
    autosize("spantransferido1","divtransferido1");
    autosize("spandirecciontransfer1","divdirecciontransfer1");
    autosize("spanrevisordisplacia1","divrevisordisplacia1",15);
    autosize("spanrevisordisplacia2","divrevisordisplacia2");
    autosize("spanresultadodisplacia1","divresultadodisplacia1",15);
    autosize("spanresultadodisplacia2","divresultadodisplacia2",15);
    autosize("spandcfdisplacia1","divdcfdisplacia1",10);
    autosize("spandcfdisplacia2","divdcfdisplacia2",10);
    autosize("spanmiembroreproduccion","divmiembroreproduccion");
    }
    );
</script>

<script type="text/javascript">
    function autosize(dynamicSpan,dynamicDiv,size,sw)
    {
        
    	var textSpan = document.getElementById(dynamicSpan);
    	var textDiv = document.getElementById(dynamicDiv);
        if(size != null)
        {
            textSpan.style.fontSize = size;
        }
        else{
            textSpan.style.fontSize = 64;
        }
        var activa = false;
    	while(textSpan.offsetHeight >= textDiv.offsetHeight)
    	{
    	   if(parseInt(textSpan.style.fontSize) == 9 && sw ==1)
           {
                var nombrediv = '#'+dynamicDiv;
                //$(nombrediv).find('br').remove();
                if(activa == false)
                {
                    textSpan.style.fontSize = parseInt(textSpan.style.fontSize) + 1;
                    activa = true;
                }
                else{
                    textSpan.style.fontSize = parseInt(textSpan.style.fontSize) - 1;
                }
           }
           else{
            textSpan.style.fontSize = parseInt(textSpan.style.fontSize) - 1;
           }
    	}
        while(textSpan.offsetWidth >= textDiv.offsetWidth)
        {
            if(parseInt(textSpan.style.fontSize) == 9 && sw ==1)
           {
                var nombrediv = '#'+dynamicDiv;
                $(nombrediv).find('br').remove();
                if(activa == false)
                {
                    textSpan.style.fontSize = parseInt(textSpan.style.fontSize) + 1;
                    activa = true;
                }
                else{
                    textSpan.style.fontSize = parseInt(textSpan.style.fontSize) - 1;
                }
           }
           else{
            textSpan.style.fontSize = parseInt(textSpan.style.fontSize) - 1;
           }
        }
    }
    //$('#grape1,#grape12').find('br').remove();
</script>