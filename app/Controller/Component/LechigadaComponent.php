<?php
class LechigadaComponent extends Component{

    public function obtenerLechigada($departamento, $tramite){
        $anio = date('Y');
        switch($departamento){
            case 1:$depa = "LP";
            break;
            case 2:$depa = "CBBA";
            break;
            case 3:$depa = "STCZ";
            break;
            case 4:$depa = "OR";
            break;
            case 5:$depa = "POT";
            break;
            case 6:$depa = "TJ";
            break;
            case 7:$depa = "BEN";
            break;
            case 8:$depa = "PAN";
            break;
            case 9:$depa = "SCR";
            break;
        }
        $arreglo = $depa.'/'.$tramite.'/'.$anio;
        
        return($arreglo);
    }
   public function obtenerNombre($iddepartamento){
    $depa = 0;
    //debug($iddepartamento);
    switch($iddepartamento){
            case 1:$depa = "LA PAZ";
            break;
            case 2:$depa = "COCHABAMBA";
            break;
            case 3:$depa = "SANTA CRUZ";
            break;
            case 4:$depa = "ORURO";
            break;
            case 5:$depa = "POTOSI";
            break;
            case 6:$depa = "TARIJA";
            break;
            case 7:$depa = "BENI";
            break;
            case 8:$depa = "PANDO";
            break;
            case 9:$depa = "SUCRE";
            break;
        }
        return($depa);
   }
}
?>
