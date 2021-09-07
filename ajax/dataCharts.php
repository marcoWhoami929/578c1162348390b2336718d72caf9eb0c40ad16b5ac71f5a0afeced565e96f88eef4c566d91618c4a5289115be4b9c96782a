<?php
require_once "../models/admon.model.php";
$ventas = new ModelAmdon();
if (isset($_GET["grafico"])) {
    if ($_GET["grafico"] == "grafico1") {
        $ventasDiarias = $ventas->mdlTotalVentasDiarias();
        $ventasDiariasTiendas = $ventas->mdlTotalVentasDiariasDesglose();

        $etiquetas = array();
        $series = array();
        foreach ($ventasDiarias as $key => $value) {

            array_push($etiquetas, array("name" => $value["canalComercial"], "y" => (float)$value["Totales"], "drilldown" => $value["canalComercial"]));
        }
        foreach ($ventasDiariasTiendas as $key => $value) {


            array_push($series, array($value["Agente"], (float)$value["Totales"]));
        }

        $respuesta = [
            "etiquetas" => $etiquetas,
            "series" => $series,

        ];
        echo json_encode($respuesta);
    }
}
