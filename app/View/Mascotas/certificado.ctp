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
<div style="margin-top: -10px; margin-left: -8px; width: 1135px; height: 735px;background-repeat: no-repeat; background-size: 1137px 742px; background-image: url('<?php echo $this->Html->webroot('img/PEDIGREE KENNEL CLUB FINALES-02.jpg') ?>'); border-top: 1px solid blue; border-bottom: 1px solid blue; border-left: 1px solid blue; border-right: 1px solid blue; font-family: Arial;">
    <div id="certificado" style="padding-top: 46px;">
        <div style="width: 1100px; height: 113px;  margin-left: 30px; padding-top: 1px;">
            <table style=" border-spacing: 0px;">
                <tr>
                    <td style="width: 980px;">

                        <table style="width: 980px; height: 50px; border: 0px; border-spacing: 0px; color: #124996; font-weight: bold;margin-top: 4px;">
                            <tr style="height: 25px; border: 0px; border-spacing: 0px;">
                                <td style="width: 80px;"></td>
                                <td style="width: 535px;">
                                    <div id="divnombre" style="width: 535px; height: 21px;">
                                        <span id="spannombre"><?php echo strtoupper($mascota['Mascota']['nombre_completo']); ?></span>
                                    </div>
                                </td>
                                <td style="width: 65px; "></td>
                                <td style="width: 300px;">
                                    <div id="divafijo" style='width: 295px; height: 21px;'>
                                        <span id="spanafijo">
                                            <?php
                                            if (isset($mascota['Criadero']['registro_fci'])) {
                                                echo strtoupper($mascota['Criadero']['nombre'] . ' FCI: ' . $mascota['Criadero']['registro_fci']);
                                            } else {
                                                echo strtoupper($mascota['Criadero']['nombre']);
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                            <tr style="height: 25px;">
                                <td style="width: 80px; "></td>
                                <td style="width: 535px;">
                                    <div id="divtitulos" style="width: 533px; height: 21px;">
                                        <span id="spantitulos">
                                            <?php echo $vartitulos; ?>
                                        </span>
                                    </div>
                                </td>
                                <td style="width:65px;"></td>
                                <td style="width: 300px">
                                    <div id="divcriador" style="width: 295px; height: 21px; ">
                                        <span id="spancriador">
                                            <?php echo mb_strtoupper($mascota['Propietario']['nombre'], 'UTF-8'); ?>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <table style="width: 980px; height: 25px; border-spacing: 0px; color: #124996; font-weight: bold; ">
                            <tr style="height: 25px;">
                                <td style="width:80px;"></td>
                                <td style="width: 335px;">
                                    <div id="divraza" style="width: 335px; height: 23px;">
                                        <span id="spanraza">
                                            <?php echo strtoupper($mascota['Raza']['nombre']); ?>
                                        </span>
                                    </div>
                                </td>
                                <td style="width: 78px;"></td>
                                <td style="width: 128px; ">
                                    <div id="divcolor" style="width: 128px; height: 23px;" align="center">
                                        <span id="spancolor">
                                            <?php
                                            if (!empty($mascota['Mascota']['color'])) {
                                                echo strtoupper($mascota['Mascota']['color']);
                                            }
                                            if (!empty($mascota['Mascota']['senas'])) {
                                                echo '/' . $mascota['Mascota']['senas'];
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </td>
                                <td style="width: 60px;"></td>
                                <td style="width: 299px;  ">
                                    <div id="divdireccion" style="width: 295px;height: 23px;">
                                        <span id="spandireccion">
                                            <?php echo $mascota['Criadero']['direccion'] . " " . $this->requestAction(array('action' => 'get_departamento', $mascota['Criadero']['departamento_id'])); ?>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <table style="width: 980px; height: 17px; border-spacing: 0px; color: #124996; font-size: 13px; font-weight: bold; ">
                            <tr style="height: 17px;">
                                <td style="width: 80px;"></td>
                                <td style="width: 90px; ">
                                    <div id="divsexo" style="width: 90px; height: 16;" align="center">
                                        <span id="spansexo">
                                            <?php echo strtoupper($mascota['Mascota']['sexo']); ?>
                                        </span>
                                    </div>
                                </td>
                                <td style="width: 98px;">
                                </td>
                                <td style="width: 148px;">
                                    <div id="divfechanac" style="width: 147px; height: 16px;" align="center">
                                        <span id="spanfechanac">
                                            <?php
                                            $fecha_nacimiento = split('-', $mascota['Mascota']['fecha_nacimiento']);
                                            echo $fecha_nacimiento[2] . '/' . $fecha_nacimiento[1] . '/' . $fecha_nacimiento[0];
                                            ?>
                                        </span>
                                    </div>
                                </td>
                                <td style="width:75px;">
                                </td>
                                <td style="width: 132px;">
                                    <div id="divconsanguinidad" style="width: 130px; height: 16px;" align="center">
                                        <span id="spanconsanguinidad" >
                                            <?php
                                            if (!empty($mascota['Mascota']['consanguinidad'])) {
                                                echo $mascota['Mascota']['consanguinidad'];
                                            } else {
                                                echo '-------';
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </td>
                                <td style="width: 56px;">

                                </td>
                                <td style="width: 301px;">
                                    <div id="divtelefonos" style="width: 299px; height: 16px;">
                                        <span id="spantelefonos">

                                            <?php
                                            if (!empty($mascota['Propietario']['telefono1'])) {
                                                echo $mascota['Propietario']['telefono1'];
                                            }if (!empty($mascota['Propietario']['telefono2'])) {
                                                echo ' ' . $mascota['Propietario']['telefono2'];
                                            }if (!empty($mascota['Propietario']['celular'])) {
                                                echo ' ' . $mascota['Propietario']['celular'];
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <table style=" width: 980px; font-size: 11px; border-spacing: 0px; color: #124996; font-weight: bold;">
                            <tr style="height: 17px;">
                                <td style="width: 80px;"></td>
                                <td style="width: 90px;">
                                    <div id="divkcb" style="width: 90px; height: 15px;" align="center">
                                        <span id="spankcb">
                                            <?php echo $mascota['Mascota']['kcb']; ?>
                                        </span>
                                    </div>
                                </td>
                                <td style="width: 98px;">
                                </td>
                                <td style="width: 147px; ">
                                    <div id="divtatuaje" style="width: 145px; height: 15px;"  align="center">
                                        <span id="spantatuaje">
                                            <?php
                                            if (!empty($mascota['Mascota']['num_tatuaje'])) {
                                                echo $mascota['Mascota']['num_tatuaje'];
                                            } else {
                                                echo '------';
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </td>
                                <td style="width: 78px;">
                                </td>
                                <td style="width: 130px;">
                                    <div id="divmicrochip" style="width: 129px; height: 15px;" align="center">
                                        <span id="spanmicrochip" >
                                            <?php
                                            if (!empty($mascota['Mascota']['chip'])) {
                                                echo $mascota['Mascota']['chip'];
                                            } else {
                                                echo '-----';
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </td>
                                <td style="width: 105px;">

                                </td>
                                <td style="width: 252px;">
                                    <div id="divcorreo" style="width: 250px; height: 15px;">
                                        <span id="spancorreo">
                                            <?php
                                            if (!empty($mascota['Propietario']['email1'])) {
                                                echo $mascota['Propietario']['email1'];
                                            }if (!empty($mascota['Propietario']['email2'])) {
                                                if (!empty($mascota['Propietario']['email1'])) {
                                                    echo ' ';
                                                }echo '' . $mascota['Propietario']['email2'];
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </table>


                    </td>
                    <td style="width: 100px;">
                        <div style="" id="codigoQRejemplar">
                            <?php //echo $this->Html->image('codigoQR.jpg',array('style' => 'width:100px; heigth:100px;'))  ?>
                        </div>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
        <div style="width: 1100px; margin-left: 30px;">
            <table style="width: 1080px; font-size: 11px; border-spacing: 0px; color: #124996; font-weight: bold;">
                <tr style="height: 17px;">
                    <td style="width: 80px; "></td>
                    <td style="width: 540px;">
                        <div id="divhermanos" style="width: 540px; height: 16px;">
                            <span id="spanhermanos">
                                <?php echo $mascota['Mascota']['hermano']; ?>  
                            </span>
                        </div>
                    </td>
                    <td style="width: 75px; ">
                    </td>
                    <td style="width: 250px;">
                        <div id="divadn" style="width: 247px; height: 16px;">
                            <span id="spanadn">

                            </span>
                        </div>
                    </td>
                    <td style="width: 38px;"></td>
                    <td style="width: 97px;">
                        <div id="divfecha" style="width: 93px; height: 16px;">
                            <span id="spanfecha">

                            </span>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div style="width: 1082px; height: 432px; margin-left: 30px; margin-top: 21px;">
            <table style="width: 1080px; height: 216px; padding: 0px; border-spacing: 0px; color: #124996; font-size: 9px; font-weight: bold;">

                <tr style="">
                    <td rowspan="8" style="width: 246px; height: 216px; ">
                        <div id="divuno" style="width: 220px; height: 170px; margin-left: 20px;">
                            <span id="spanuno">
                                <?php if (!empty($padre[1])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[1]['titulos'])) {
                                            echo strtoupper($padre[1]['titulos']) . '<br/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[1][0]['nombre_completo']; ?><br />
                                    <?php
                                    if (!empty($padre[1][0]['codigo'])) {
                                        echo '' . $padre[1][0]['codigo'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[1]['Mascota']['kcb']) && $padre[1]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[1]['Mascota']['kcb'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[1]['Mascota']['num_tatuaje'])) {
                                        echo 'No. x Raza ' . $padre[1]['Mascota']['num_tatuaje'] . '<br />';
                                    }
                                    ?>                   
                                    <?php
                                    if (!empty($padre[1]['Mascota']['chip'])) {
                                        echo 'Chip ' . $padre[1]['Mascota']['chip'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[1]['apto_reproduccion'])) {
                                        echo 'Apto de Reproduccion <br />' . $padre[1]['apto_reproduccion']['Examenesmascota']['resultado'] . '   <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[1]['apto_cria'])) {
                                        echo 'Apto de Cria <br />' . $padre[1]['apto_cria']['Examenesmascota']['resultado'] . '   <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[1]['displacia'])) {
                                        echo $padre[1]['displacia']['Examenesmascota']['dcf'] . '   <br />';
                                    }
                                    ?>

                                    <?php
                                    if (!empty($padre[1]['Mascota']['color'])) {
                                        echo 'Color: ' . $padre[1]['Mascota']['color'] . ' <br />';
                                    }
                                    if (!empty($padre[1]['Mascota']['senas'])) {
                                        echo 'Se&ntilde;as: ' . $padre[1]['Mascota']['senas'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                        
                    </td>
                    <td rowspan="4" style="width: 224px; height: 108px;">
                        <div id="divtres" style="width: 190px; height: 85px; margin-left: 20px;">
                            <span id="spantres">
                                <?php if (!empty($padre[3])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[3]['titulos'])) {
                                            echo strtoupper($padre[3]['titulos']) . '<br/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[3][0]['nombre_completo']; ?><br />
                                    <?php
                                    if (!empty($padre[3][0]['codigo'])) {
                                        echo '' . $padre[3][0]['codigo'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[3]['Mascota']['kcb']) && $padre[3]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[3]['Mascota']['kcb'] . '<br />';
                                    }
                                    ?>
                                    <?php //if(!empty($padre[3]['Mascota']['num_tatuaje'])){echo 'No. x Raza '.$padre[3]['Mascota']['num_tatuaje'].'<br />';} ?>                   
                                    <?php //if(!empty($padre[3]['Mascota']['chip'])){echo 'Chip '.$padre[3]['Mascota']['chip'].'<br />';}?>
                                    <?php
                                    if (!empty($padre[3]['apto_reproduccion'])) {
                                        echo 'Apto de Reproduccion <br />' . $padre[3]['apto_reproduccion']['Examenesmascota']['resultado'] . '   <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[3]['apto_cria'])) {
                                        echo 'Apto de Cria <br />' . $padre[3]['apto_cria']['Examenesmascota']['resultado'] . '   <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[3]['displacia'])) {
                                        echo $padre[3]['displacia']['Examenesmascota']['dcf'] . '   <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[3]['Mascota']['color'])) {
                                        echo ' ' . $padre[3]['Mascota']['color'] . '';
                                    }
                                    ?>

                                <?php endif; ?>
                            </span>

                        </div>
                    </td>
                    <td rowspan="2" style="width: 254px; height: 54px;">
                        <div id="divsiete" style="width: 228px; height: 45px; margin-left: 21px; ">
                            <span id="spansiete">
                                <?php if (!empty($padre[7])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[7]['titulos'])) {
                                            echo strtoupper($padre[7]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[7][0]['nombre_completo']; ?> <br class="brnombre"/>
                                    <?php
                                    if (!empty($padre[7][0]['codigo'])) {
                                        echo '' . $padre[7][0]['codigo'] . '';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[7]['Mascota']['kcb']) && $padre[7]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[7]['Mascota']['kcb'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[7]['apto_reproduccion'])) {
                                        echo 'Apto de Reproduccion ' . $padre[7]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[7]['Mascota']['color'])) {
                                        echo ' ' . $padre[7]['Mascota']['color'] . '';
                                    }
                                    ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                    <td style="width: 356px ;height: 27px;">
                        <div id="divquince" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 2px;  ">
                            <span id="spanquince">
                                <?php if (!empty($padre[15])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[15]['titulos'])) {
                                            echo strtoupper($padre[15]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[15][0]['nombre_completo']; ?> 
                                    <?php
                                    if (!empty($padre[15][0]['codigo'])) {
                                        echo '' . $padre[15][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[15]['Mascota']['kcb']) && $padre[15]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[15]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[15]['apto_reproduccion'])) {
                                        echo '' . $padre[15]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[15]['Mascota']['color'])) {
                                        echo ' ' . $padre[15]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>

                </tr>
                <tr>
                    <td style="width: 356px ;height: 27px;">
                        <div id="divdiezseis" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 2px; ">
                            <span id="spandiezseis">
                                <?php if (!empty($padre[16])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[16]['titulos'])) {
                                            echo strtoupper($padre[16]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[16][0]['nombre_completo']; ?> 
                                    <?php
                                    if (!empty($padre[16][0]['codigo'])) {
                                        echo '' . $padre[16][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[16]['Mascota']['kcb']) && $padre[16]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[16]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[16]['apto_reproduccion'])) {
                                        echo '' . $padre[16]['apto_reproduccion']['Examenesmascota']['resultado'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[16]['Mascota']['color'])) {
                                        echo ' ' . $padre[16]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" style="width: 254px; height: 54px;">
                        <div id="divocho" style="width: 228px; height: 45px; margin-left: 21px; ">
                            <span id="spanocho">
                                <?php if (!empty($padre[8])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[8]['titulos'])) {
                                            echo strtoupper($padre[8]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[8][0]['nombre_completo']; ?> <br class="brnombre"/>
                                    <?php
                                    if (!empty($padre[8][0]['codigo'])) {
                                        echo '' . $padre[8][0]['codigo'] . '';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[8]['Mascota']['kcb']) && $padre[8]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[8]['Mascota']['kcb'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[8]['apto_reproduccion'])) {
                                        echo 'Apto de Reproduccion ' . $padre[8]['apto_reproduccion']['Examenesmascota']['resultado'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[8]['Mascota']['color'])) {
                                        echo ' ' . $padre[8]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                    <td style="width: 356px ;height: 27px;">
                        <div id="divdiezsiete" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 1px; ">
                            <span id="spandiezsiete">
                                <?php if (!empty($padre[17])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[17]['titulos'])) {
                                            echo strtoupper($padre[17]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[17][0]['nombre_completo']; ?> 
                                    <?php
                                    if (!empty($padre[17][0]['codigo'])) {
                                        echo '' . $padre[17][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[17]['Mascota']['kcb']) && $padre[17]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[17]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[17]['apto_reproduccion'])) {
                                        echo '' . $padre[17]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[17]['Mascota']['color'])) {
                                        echo ' ' . $padre[17]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 356px ;height: 27px;">
                        <div id="divdiezocho" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 0px; ">
                            <span id="spandiezocho">
                                <?php if (!empty($padre[18])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[18]['titulos'])) {
                                            echo strtoupper($padre[18]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[18][0]['nombre_completo']; ?> 
                                    <?php
                                    if (!empty($padre[18][0]['codigo'])) {
                                        echo '' . $padre[18][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[18]['Mascota']['kcb']) && $padre[18]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[18]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[18]['apto_reproduccion'])) {
                                        echo '' . $padre[18]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[18]['Mascota']['color'])) {
                                        echo ' ' . $padre[18]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div> 
                    </td>
                </tr>
                <tr>
                    <td rowspan="4" style="width: 224px; height: 108px;">
                        <div id="divcuatro" style="width: 190px; height: 85px; margin-left: 20px; ">
                            <span id="spancuatro">
                                <?php if (!empty($padre[4])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[4]['titulos'])) {
                                            echo strtoupper($padre[4]['titulos']) . '<br/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[4][0]['nombre_completo']; ?><br />
                                    <?php
                                    if (!empty($padre[4][0]['codigo'])) {
                                        echo '' . $padre[4][0]['codigo'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[4]['Mascota']['kcb']) && $padre[4]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[4]['Mascota']['kcb'] . '<br />';
                                    }
                                    ?>
                                    <?php //if(!empty($padre[4]['Mascota']['num_tatuaje'])){echo 'No. x Raza '.$padre[4]['Mascota']['num_tatuaje'].'<br />';} ?>                   
                                    <?php //if(!empty($padre[4]['Mascota']['chip'])){echo 'Chip '.$padre[4]['Mascota']['chip'].'<br />';} ?>
                                    <?php
                                    if (!empty($padre[4]['apto_reproduccion'])) {
                                        echo 'Apto de Reproduccion <br />' . $padre[4]['apto_reproduccion']['Examenesmascota']['resultado'] . '  <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[4]['apto_cria'])) {
                                        echo 'Apto de Cria <br />' . $padre[4]['apto_cria']['Examenesmascota']['resultado'] . '  <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[4]['Mascota']['color'])) {
                                        echo ' ' . $padre[4]['Mascota']['color'] . '';
                                    }
                                    ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                    <td rowspan="2" style="width: 254px; height: 54px;">
                        <div id="divnueve" style="width: 228px; height: 45px; margin-left: 21px; ">
                            <span id="spannueve">
                                <?php if (!empty($padre[9])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[9]['titulos'])) {
                                            echo strtoupper($padre[9]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[9][0]['nombre_completo']; ?> <br class="brnombre"/>
                                    <?php
                                    if (!empty($padre[9][0]['codigo'])) {
                                        echo '' . $padre[9][0]['codigo'] . '';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[9]['Mascota']['kcb']) && $padre[9]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[9]['Mascota']['kcb'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[9]['apto_reproduccion'])) {
                                        echo 'Apto de Reproduccion ' . $padre[9]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[9]['Mascota']['color'])) {
                                        echo ' ' . $padre[9]['Mascota']['color'] . '';
                                    }
                                    ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                    <td style="width: 356px ;height: 27px;">
                        <div id="divdieznueve" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 2px; ">
                            <span id="spandieznueve">
                                <?php if (!empty($padre[19])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[19]['titulos'])) {
                                            echo strtoupper($padre[19]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[19][0]['nombre_completo']; ?> 
                                    <?php
                                    if (!empty($padre[19][0]['codigo'])) {
                                        echo '' . $padre[19][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[19]['Mascota']['kcb']) && $padre[19]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[19]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[19]['apto_reproduccion'])) {
                                        echo '' . $padre[19]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[19]['Mascota']['color'])) {
                                        echo ' ' . $padre[19]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 356px ;height: 27px; ">
                        <div id="divvente" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 2px; ">
                            <span id="spanvente">
                                <?php if (!empty($padre[20])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[20]['titulos'])) {
                                            echo strtoupper($padre[20]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[20][0]['nombre_completo']; ?> 
                                    <?php
                                    if (!empty($padre[20][0]['codigo'])) {
                                        echo '' . $padre[20][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[20]['Mascota']['kcb']) && $padre[20]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[20]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[20]['apto_reproduccion'])) {
                                        echo '' . $padre[20]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[20]['Mascota']['color'])) {
                                        echo ' ' . $padre[20]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" style="width: 254px; height: 54px;">
                        <div id="divdiez" style="width: 228px; height: 45px; margin-left: 21px; ">
                            <span id="spandiez">
                                <?php if (!empty($padre[10])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[10]['titulos'])) {
                                            echo strtoupper($padre[10]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[10][0]['nombre_completo']; ?> <br class="brnombre"/>
                                    <?php
                                    if (!empty($padre[10][0]['codigo'])) {
                                        echo '' . $padre[10][0]['codigo'] . '';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[10]['Mascota']['kcb']) && $padre[10]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[10]['Mascota']['kcb'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[10]['apto_reproduccion'])) {
                                        echo 'Apto de Reproduccion ' . $padre[10]['apto_reproduccion']['Examenesmascota']['resultado'] . '   ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[10]['Mascota']['color'])) {
                                        echo ' ' . $padre[10]['Mascota']['color'] . '';
                                    }
                                    ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                    <td style="width: 356px ;height: 27px;">
                        <div id="divventeuno" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 2px; ">
                            <span id="spanventeuno">
                                <?php if (!empty($padre[21])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[21]['titulos'])) {
                                            echo strtoupper($padre[21]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[21][0]['nombre_completo']; ?> 
                                    <?php
                                    if (!empty($padre[21][0]['codigo'])) {
                                        echo '' . $padre[21][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[21]['Mascota']['kcb']) && $padre[21]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[21]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[21]['apto_reproduccion'])) {
                                        echo '' . $padre[21]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[21]['Mascota']['color'])) {
                                        echo ' ' . $padre[21]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 356px ;height: 27px;">
                        <div id="divventedos" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 2px; ">
                            <span id="spanventedos">
                                <?php if (!empty($padre[22])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[22]['titulos'])) {
                                            echo strtoupper($padre[22]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[22][0]['nombre_completo']; ?> 
                                    <?php
                                    if (!empty($padre[22][0]['codigo'])) {
                                        echo '' . $padre[22][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[22]['Mascota']['kcb']) && $padre[22]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[22]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[22]['apto_reproduccion'])) {
                                        echo '' . $padre[22]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[22]['Mascota']['color'])) {
                                        echo ' ' . $padre[22]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                </tr>

            </table>

            <table style="width: 1080px; height: 216px; padding: 0px; border-spacing: 0px; color: #124996; font-weight: bold; font-size: 9px; margin-top: 0px;">
                <tr>
                    <td rowspan="8" style="width: 246px; height: 216px; ">
                        <div id="divdos" style="width: 220px; height: 170px; margin-left: 20px;">
                            <span id="spandos">
                                <?php if (!empty($padre[2])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[2]['titulos'])) {
                                            echo strtoupper($padre[2]['titulos']) . '<br/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[2][0]['nombre_completo']; ?><br />
                                    <?php
                                    if (!empty($padre[2][0]['codigo'])) {
                                        echo '' . $padre[2][0]['codigo'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[2]['Mascota']['kcb']) && $padre[2]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[2]['Mascota']['kcb'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[2]['Mascota']['num_tatuaje'])) {
                                        echo 'No. x Raza ' . $padre[2]['Mascota']['num_tatuaje'] . '<br />';
                                    }
                                    ?>                   
                                    <?php
                                    if (!empty($padre[2]['Mascota']['chip'])) {
                                        echo 'Chip ' . $padre[2]['Mascota']['chip'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[2]['apto_reproduccion'])) {
                                        echo 'Apto de Reproduccion <br />' . $padre[2]['apto_reproduccion']['Examenesmascota']['resultado'] . '  <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[2]['apto_cria'])) {
                                        echo 'Apto de Cria <br />' . $padre[2]['apto_cria']['Examenesmascota']['resultado'] . '  <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[2]['displacia'])) {
                                        echo $padre[2]['displacia']['Examenesmascota']['dcf'] . '   <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[2]['Mascota']['color'])) {
                                        echo 'Color: ' . $padre[2]['Mascota']['color'] . '';
                                    }
                                    if (!empty($padre[2]['Mascota']['senas'])) {
                                        echo 'Se&ntilde;as: ' . $padre[2]['Mascota']['senas'] . '';
                                    }
                                    ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                    <td rowspan="4" style="width: 224px; height: 108px;">
                        <div id="divcinco" style="width: 190px; height: 85px; margin-left: 20px;">
                            <span id="spancinco">
                                <?php if (!empty($padre[5])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[5]['titulos'])) {
                                            echo strtoupper($padre[5]['titulos']) . '<br/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[5][0]['nombre_completo']; ?><br />
                                    <?php
                                    if (!empty($padre[5][0]['codigo'])) {
                                        echo '' . $padre[5][0]['codigo'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[5]['Mascota']['kcb']) && $padre[5]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[5]['Mascota']['kcb'] . '<br />';
                                    }
                                    ?>
                                    <?php //if(!empty($padre[5]['Mascota']['num_tatuaje'])){echo 'No. x Raza '.$padre[5]['Mascota']['num_tatuaje'].'<br />';}  ?>                   
                                    <?php //if(!empty($padre[5]['Mascota']['chip'])){echo 'Chip '.$padre[5]['Mascota']['chip'].'<br />';} ?>
                                    <?php
                                    if (!empty($padre[5]['apto_reproduccion'])) {
                                        echo 'Apto de Reproduccion <br />' . $padre[5]['apto_reproduccion']['Examenesmascota']['resultado'] . ' <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[5]['apto_cria'])) {
                                        echo 'Apto de Cria <br />' . $padre[5]['apto_cria']['Examenesmascota']['resultado'] . ' <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[5]['displacia'])) {
                                        echo $padre[5]['displacia']['Examenesmascota']['dcf'] . '   <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[5]['Mascota']['color'])) {
                                        echo ' ' . $padre[5]['Mascota']['color'] . '';
                                    }
                                    ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                    <td rowspan="2" style="width: 254px; height: 54px;">
                        <div id="divonce" style="width: 228px; height: 45px; margin-left: 21px;">
                            <span id="spanonce">
                                <?php if (!empty($padre[11])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[11]['titulos'])) {
                                            echo strtoupper($padre[11]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[11][0]['nombre_completo']; ?><br class="brnombre"/>
                                    <?php
                                    if (!empty($padre[11][0]['codigo'])) {
                                        echo '' . $padre[11][0]['codigo'] . '';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[11]['Mascota']['kcb']) && $padre[11]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[11]['Mascota']['kcb'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[11]['apto_reproduccion'])) {
                                        echo 'Apto de Reproduccion ' . $padre[11]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[11]['Mascota']['color'])) {
                                        echo ' ' . $padre[11]['Mascota']['color'] . '';
                                    }
                                    ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                    <td style="width: 356px ;height: 27px; ">
                        <div id="divventetres" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 2px;  ">
                            <span id="spanventetres">
                                <?php if (!empty($padre[23])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[23]['titulos'])) {
                                            echo strtoupper($padre[23]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[23][0]['nombre_completo']; ?> 
                                    <?php
                                    if (!empty($padre[23][0]['codigo'])) {
                                        echo '' . $padre[23][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[23]['Mascota']['kcb']) && $padre[23]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[23]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[23]['apto_reproduccion'])) {
                                        echo '' . $padre[23]['apto_reproduccion']['Examenesmascota']['resultado'] . '   ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[23]['Mascota']['color'])) {
                                        echo ' ' . $padre[23]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 356px ;height: 27px;">
                        <div id="divventecuatro" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 2px;  ">
                            <span id="spanventecuatro">
                                <?php if (!empty($padre[24])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[24]['titulos'])) {
                                            echo strtoupper($padre[24]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[24][0]['nombre_completo']; ?> 

                                    <?php
                                    if (!empty($padre[24][0]['codigo'])) {
                                        echo '' . $padre[24][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[24]['Mascota']['kcb']) && $padre[24]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[24]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[24]['apto_reproduccion'])) {
                                        echo '' . $padre[24]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[24]['Mascota']['color'])) {
                                        echo ' ' . $padre[24]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" style="width: 254px; height: 54px;">
                        <div id="divdoce" style="width: 228px; height: 45px; margin-left: 21px;">
                            <span id="spandoce">
                                <?php if (!empty($padre[12])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[12]['titulos'])) {
                                            echo strtoupper($padre[12]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[12][0]['nombre_completo']; ?> <br class="brnombre"/>
                                    <?php
                                    if (!empty($padre[12][0]['codigo'])) {
                                        echo '' . $padre[12][0]['codigo'] . '';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[12]['Mascota']['kcb']) && $padre[12]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[12]['Mascota']['kcb'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[12]['apto_reproduccion'])) {
                                        echo 'Apto de Reproduccion ' . $padre[12]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[12]['Mascota']['color'])) {
                                        echo ' ' . $padre[12]['Mascota']['color'] . '';
                                    }
                                    ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                    <td style="width: 356px ;height: 27px;">
                        <div id="divventecinco" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 2px;  ">
                            <span id="spanventecinco">
                                <?php if (!empty($padre[25])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[25]['titulos'])) {
                                            echo strtoupper($padre[25]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[25][0]['nombre_completo']; ?> 
                                    <?php
                                    if (!empty($padre[25][0]['codigo'])) {
                                        echo '' . $padre[25][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[25]['Mascota']['kcb']) && $padre[25]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[25]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[25]['apto_reproduccion'])) {
                                        echo '' . $padre[25]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[25]['Mascota']['color'])) {
                                        echo ' ' . $padre[25]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span> 
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 356px ;height: 27px;">
                        <div id="divventeseis" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 2px;  ">
                            <span id="spanventeseis">
                                <?php if (!empty($padre[26])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[26]['titulos'])) {
                                            echo strtoupper($padre[26]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[26][0]['nombre_completo']; ?> 
                                    <?php
                                    if (!empty($padre[26][0]['codigo'])) {
                                        echo '' . $padre[26][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[26]['Mascota']['kcb']) && $padre[26]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[26]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[26]['apto_reproduccion'])) {
                                        echo '' . $padre[26]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[26]['Mascota']['color'])) {
                                        echo ' ' . $padre[26]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span> 
                        </div>
                    </td>
                </tr>
                <tr>
                    <td rowspan="4" style="width: 224px; height: 108px; ">
                        <div id="divseis" style="width: 190px; height: 85px; margin-left: 20px;">
                            <span id="spanseis">
                                <?php if (!empty($padre[6])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[6]['titulos'])) {
                                            echo strtoupper($padre[6]['titulos']) . '<br/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[6][0]['nombre_completo']; ?><br />
                                    <?php
                                    if (!empty($padre[6][0]['codigo'])) {
                                        echo '' . $padre[6][0]['codigo'] . '<br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[6]['Mascota']['kcb']) && $padre[6]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[6]['Mascota']['kcb'] . '<br />';
                                    }
                                    ?>
                                    <?php //if(!empty($padre[6]['Mascota']['num_tatuaje'])){echo 'No. x Raza '.$padre[6]['Mascota']['num_tatuaje'].'<br />';}  ?>                   
                                    <?php //if(!empty($padre[6]['Mascota']['chip'])){echo 'Chip '.$padre[6]['Mascota']['chip'].'<br />';}  ?>
                                    <?php
                                    if (!empty($padre[6]['apto_reproduccion'])) {
                                        echo 'Apto de Reproduccion <br />' . $padre[6]['apto_reproduccion']['Examenesmascota']['resultado'] . '  <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[6]['apto_cria'])) {
                                        echo 'Apto de Cria <br />' . $padre[6]['apto_cria']['Examenesmascota']['resultado'] . '  <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[6]['displacia'])) {
                                        echo $padre[6]['displacia']['Examenesmascota']['dcf'] . '   <br />';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[6]['Mascota']['color'])) {
                                        echo ' ' . $padre[6]['Mascota']['color'] . '';
                                    }
                                    ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                    <td rowspan="2" style="width: 254px; height: 54px;">
                        <div id="divtrece" style="width: 228px; height: 45px; margin-left: 21px;">
                            <span id="spantrece">
                                <?php if (!empty($padre[13])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[13]['titulos'])) {
                                            echo strtoupper($padre[13]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[13][0]['nombre_completo']; ?> <br class="brnombre"/>
                                    <?php
                                    if (!empty($padre[13][0]['codigo'])) {
                                        echo '' . $padre[13][0]['codigo'] . '';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[13]['Mascota']['kcb']) && $padre[13]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[13]['Mascota']['kcb'] . '<br />';
                                    }
                                    ?>
                                    <?php //if(!empty($padre[14]['Mascota']['num_tatuaje'])){echo 'No. x Raza '.$padre[14]['Mascota']['num_tatuaje'].'<br />';}  ?>                   
                                    <?php //if(!empty($padre[14]['Mascota']['chip'])){echo 'Chip '.$padre[14]['Mascota']['chip'].'<br />';}  ?>
                                    <?php
                                    if (!empty($padre[13]['apto_reproduccion'])) {
                                        echo 'Apto de Reproduccion ' . $padre[13]['apto_reproduccion']['Examenesmascota']['resultado'] . '   ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[13]['Mascota']['color'])) {
                                        echo ' ' . $padre[13]['Mascota']['color'] . '';
                                    }
                                    ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                    <td style="width: 356px ;height: 27px;">
                        <div id="divventesiete" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 2px;  ">
                            <span id="spanventesiete">
                                <?php if (!empty($padre[27])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[27]['titulos'])) {
                                            echo strtoupper($padre[27]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[27][0]['nombre_completo']; ?> 
                                    <?php
                                    if (!empty($padre[27][0]['codigo'])) {
                                        echo '' . $padre[27][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[27]['Mascota']['kcb']) && $padre[27]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[27]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[27]['apto_reproduccion'])) {
                                        echo '' . $padre[27]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[27]['Mascota']['color'])) {
                                        echo ' ' . $padre[27]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 356px ;height: 27px;">
                        <div id="divventeocho" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 2px;  ">
                            <span id="spanventeocho">
                                <?php if (!empty($padre[28])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[28]['titulos'])) {
                                            echo strtoupper($padre[28]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[28][0]['nombre_completo']; ?> 
                                    <?php
                                    if (!empty($padre[28][0]['codigo'])) {
                                        echo '' . $padre[28][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[28]['Mascota']['kcb']) && $padre[28]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[28]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[28]['apto_reproduccion'])) {
                                        echo '' . $padre[28]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[28]['Mascota']['color'])) {
                                        echo ' ' . $padre[28]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" style="width: 254px; height: 54px;">
                        <div id="divcatorce" style="width: 228px; height: 45px; margin-left: 21px;">
                            <span id="spancatorce">
                                <?php if (!empty($padre[14])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[14]['titulos'])) {
                                            echo strtoupper($padre[14]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[14][0]['nombre_completo']; ?> <br class="brnombre"/>
                                    <?php
                                    if (!empty($padre[14][0]['codigo'])) {
                                        echo '' . $padre[14][0]['codigo'] . '';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[14]['Mascota']['kcb']) && $padre[14]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[14]['Mascota']['kcb'] . '<br />';
                                    }
                                    ?>
                                    <?php //if(!empty($padre[14]['Mascota']['num_tatuaje'])){echo 'No. x Raza '.$padre[14]['Mascota']['num_tatuaje'].'<br />';}  ?>                   
                                    <?php //if(!empty($padre[14]['Mascota']['chip'])){echo 'Chip '.$padre[14]['Mascota']['chip'].'<br />';}  ?>
                                    <?php
                                    if (!empty($padre[14]['apto_reproduccion'])) {
                                        echo 'Apto de Reproduccion ' . $padre[14]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[14]['Mascota']['color'])) {
                                        echo ' ' . $padre[14]['Mascota']['color'] . '';
                                    }
                                    ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                    <td style="width: 356px ;height: 27px; ">
                        <div id="divventenueve" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 2px;  "> 
                            <span id="spanventenueve">
                                <?php if (!empty($padre[29])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[29]['titulos'])) {
                                            echo strtoupper($padre[29]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[29][0]['nombre_completo']; ?> 
                                    <?php
                                    if (!empty($padre[29][0]['codigo'])) {
                                        echo '' . $padre[29][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[29]['Mascota']['kcb']) && $padre[29]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[29]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[29]['apto_reproduccion'])) {
                                        echo '' . $padre[29]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[29]['Mascota']['color'])) {
                                        echo ' ' . $padre[29]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td style="width: 356px ;height: 27px; ">
                        <div id="divtrenta" style="width: 332px; height: 23px; margin-left: 20px; margin-top: 2px;  ">
                            <span id="spantrenta">
                                <?php if (!empty($padre[30])): ?>
                                    <span style="color: red;">
                                        <?php
                                        if (!empty($padre[30]['titulos'])) {
                                            echo strtoupper($padre[30]['titulos']) . '<br class="brtitulos"/>';
                                        }
                                        ?>
                                    </span>
                                    <?php echo $padre[30][0]['nombre_completo']; ?> <br />
                                    <?php
                                    if (!empty($padre[30][0]['codigo'])) {
                                        echo '' . $padre[30][0]['codigo'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[30]['Mascota']['kcb']) && $padre[30]['Mascota']['kcb'] != 'nulo') {
                                        echo 'K.C.B. ' . $padre[30]['Mascota']['kcb'] . ' ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[30]['apto_reproduccion'])) {
                                        echo '' . $padre[30]['apto_reproduccion']['Examenesmascota']['resultado'] . '  ';
                                    }
                                    ?>
                                    <?php
                                    if (!empty($padre[30]['Mascota']['color'])) {
                                        echo ' ' . $padre[30]['Mascota']['color'] . '';
                                    }
                                    ?>
                                <?php endif; ?>
                            </span>
                        </div>
                    </td>
                </tr>
            </table>
            <div style="width: 600px; height: 42px; color: #124996; font-weight: bold; margin-left: 50px; margin-top: 5px; ">
                <div style="margin-left: 220px; width: 280px; height: 20px; font-size: 13px;">
                    <?php echo $mascota['Mascota']['lechigada']; ?>
                </div>
                <div style="margin-left: 190px;width: 250px; height: 20px; margin-top: 3px; font-size: 13px;">
                    <?php
                    $fechahoy = $this->requestAction(array('action' => 'SpanishDate'));
                    ?>
                    <?php echo $this->requestAction(array('action' => 'get_departamento', $this->Session->read('Auth.User.Sucursale.departamento_id'))) . ' ' . $fechahoy; ?>

                </div>
            </div>

            <div class="oculto" style="margin-left: 100px;">
                <a href="<?php echo $this->Html->url(array('action' => 'ver', $idMascota)) ?>">ATRAS</a> <a href="javascript:" onclick="window.print();">IMPRIMIR</a> <a href="<?php echo $this->Html->url(array('action' => 'certificado2', $idMascota)) ?>">SIGUIENTE</a>
            </div>
        </div>
    </div>

    <script type="text/javascript">


        $(document).ready(function () {
            autosize("spanafijo", "divafijo");
            autosize("spannombre", "divnombre");
            autosize("spantitulos", "divtitulos");
            autosize("spancriador", "divcriador");
            autosize("spandireccion", "divdireccion");
            autosize("spancolor", "divcolor");
            autosize("spanfechanac", "divfechanac");
            autosize("spansexo", "divsexo");
            autosize("spanraza", "divraza");
            autosize("spanconsanguinidad", "divconsanguinidad");
            autosize("spantelefonos", "divtelefonos");
            autosize("spankcb", "divkcb");
            autosize("spantatuaje", "divtatuaje");
            autosize("spanmicrochip", "divmicrochip");
            autosize("spancorreo", "divcorreo");
            autosize("spanhermanos", "divhermanos");
            autosize("spanadn", "divadn");
            autosize("spanfecha", "divfecha");
            autosize("spanuno", "divuno", 16);
            autosize("spandos", "divdos", 16);
            autosize("spantres", "divtres", 14);
            autosize("spancuatro", "divcuatro", 14);
            autosize("spancinco", "divcinco", 14);
            autosize("spanseis", "divseis", 14);
            autosize("spansiete", "divsiete", 11);
            autosize("spanocho", "divocho", 11);
            autosize("spannueve", "divnueve", 11);
            autosize("spandiez", "divdiez", 11);
            autosize("spanonce", "divonce", 11, 1);
            autosize("spandoce", "divdoce", 11);
            autosize("spantrece", "divtrece", 11);
            autosize("spancatorce", "divcatorce", 11);
            autosize("spanquince", "divquince", 10, 1);
            autosize("spandiezseis", "divdiezseis", 10, 1);
            autosize("spandiezsiete", "divdiezsiete", 10, 1);
            autosize("spandiezocho", "divdiezocho", 10, 1);
            autosize("spandieznueve", "divdieznueve", 10, 1);
            autosize("spanvente", "divvente", 10, 1);
            autosize("spanventeuno", "divventeuno", 10, 1);
            autosize("spanventedos", "divventedos", 10, 1);
            autosize("spanventetres", "divventetres", 10, 1);
            autosize("spanventecuatro", "divventecuatro", 10, 1);
            autosize("spanventecinco", "divventecinco", 10, 1);
            autosize("spanventeseis", "divventeseis", 10, 1);
            autosize("spanventesiete", "divventesiete", 10, 1);
            autosize("spanventeocho", "divventeocho", 10, 1);
            autosize("spanventenueve", "divventenueve", 10, 1);
            autosize("spantrenta", "divtrenta", 10, 1);
        });
    </script>

    <script type="text/javascript">
        function autosize(dynamicSpan, dynamicDiv, size, sw)
        {

            var textSpan = document.getElementById(dynamicSpan);
            var textDiv = document.getElementById(dynamicDiv);
            if (size != null)
            {
                textSpan.style.fontSize = size;
            }
            else {
                textSpan.style.fontSize = 64;
            }
            var activa = false;
            var activa2 = false;
            while (textSpan.offsetHeight >= textDiv.offsetHeight)
            {
                if (parseInt(textSpan.style.fontSize) == 9 && sw == 1)
                {
                    //alert('eynar');
                    var nombrediv = '#' + dynamicDiv;
                    $(nombrediv).find('br.brtitulos').remove();
                    if (activa == false)
                    {
                        textSpan.style.fontSize = parseInt(textSpan.style.fontSize) + 1;
                        activa = true;
                    }
                    else {
                        $(nombrediv).find('br.brnombre').remove();
                        if (activa2 == false)
                        {
                            textSpan.style.fontSize = parseInt(textSpan.style.fontSize) + 1;
                            activa2 = true;
                        }
                        else {
                            textSpan.style.fontSize = parseInt(textSpan.style.fontSize) - 1;
                        }
                    }
                }
                else {
                    textSpan.style.fontSize = parseInt(textSpan.style.fontSize) - 1;
                }
            }
            while (textSpan.offsetWidth >= textDiv.offsetWidth)
            {
                if (parseInt(textSpan.style.fontSize) == 9 && sw == 1)
                {
                    var nombrediv = '#' + dynamicDiv;
                    $(nombrediv).find('br.brtitulos').remove();
                    if (activa == false)
                    {
                        textSpan.style.fontSize = parseInt(textSpan.style.fontSize) + 1;
                        activa = true;
                    }
                    else {
                        $(nombrediv).find('br.brnombre').remove();
                        if (activa2 == false)
                        {
                            textSpan.style.fontSize = parseInt(textSpan.style.fontSize) + 1;
                            activa2 = true;
                        }
                        else {
                            textSpan.style.fontSize = parseInt(textSpan.style.fontSize) - 1;
                        }
                    }
                }
                else {
                    textSpan.style.fontSize = parseInt(textSpan.style.fontSize) - 1;
                }
            }
        }
        //$('#grape1,#grape12').find('br').remove();
    </script>

    <script>
        var textoqr = "<?php echo 'KCB: ' . trim($mascota['Mascota']['kcb']) . '\nNombre: ' . trim($mascota['Mascota']['nombre_completo']) . '\nRaza: ' . trim($mascota['Raza']['nombre']) . '\nN. Tatuaje: ' . trim($mascota['Mascota']['num_tatuaje']) . '\nChip: ' . trim($mascota['Mascota']['chip']) . '\nSexo: ' . trim($mascota['Mascota']['sexo']) . '\nF.nacimiento: ' . $mascota['Mascota']['fecha_nacimiento']; ?>";

        var opcionesQRejmeplar = {
            render: 'image'
            , size: 95
            , background: '#fdfdfd'
            , text: textoqr
        };
        var divSelector = '#codigoQRejemplar';
    </script>
    <?php
    $this->Html->script(array(
        'jquery.qrcode-0.10.0.js'
        , 'codigoQRini.js'
            ), array('block' => 'scriptQR'));
    ?>
