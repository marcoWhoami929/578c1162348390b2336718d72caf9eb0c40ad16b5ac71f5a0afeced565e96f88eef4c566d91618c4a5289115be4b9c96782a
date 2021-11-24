<?php
require_once "../models/admon.model.php";
$ventas = new ModelAdmon();
function searchValueForName($name, $array)
{

    foreach ($array as $key => $val) {

        if ($val['name'] === $name) {

            return $val['value'];
        }
    }
    return null;
}
if (isset($_GET["ventas"])) {
    if ($_GET["ventas"] == "semanal") {
        $ventasDiarias = $ventas->mdlTotalVentasDiarias();
        $ventasDiariasTiendas = $ventas->mdlTotalVentasDiariasDesglose();

        $canales = array();
        $canals = array();
        $tiendas = array();
        $tiends = array();
        $canal = array('CEDIS', 'E-COMMERCE', 'FLOTILLAS',  'RUTAS', 'TIENDAS');
        $tienda = array('PV CAPU', 'PV REFORMA', 'PV SAN MANUEL', 'PV SANTIAGO', 'PV TORRES');
        foreach ($ventasDiarias as $key => $value) {

            array_push($canals, array("name" => $value["canalComercial"], "value" => (float)$value["Totales"]));
        }

        for ($i = 0; $i < count($canal); $i++) {
            $valor = searchValueForName($canal[$i], $canals);

            if ($valor != NULL) {
                array_push($canales, array("name" => $canal[$i], "value" => (float)$valor));
            } else {
                array_push($canales, array("name" => $canal[$i], "value" => (float)0));
            }
        }

        foreach ($ventasDiariasTiendas as $key => $value2) {


            array_push($tiends, array("name" => $value2["Agente"], "value" => (float)$value2["Totales"]));
        }
        for ($i = 0; $i < count($tienda); $i++) {
            $valor = searchValueForName($tienda[$i], $tiends);

            if ($valor != NULL) {
                array_push($tiendas, array("name" => $tienda[$i], "value" => (float)$valor));
            } else {
                array_push($tiendas, array("name" => $tienda[$i], "value" => (float)0));
            }
        }
        $respuesta = [
            "canales" => $canales,
            "tiendas" => $tiendas,

        ];
        echo json_encode($respuesta);
    }
}
