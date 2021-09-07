<?php
require_once "../models/admon.model.php";
$ventas = new ModelAmdon();
if (isset($_GET["ventas"])) {
    if ($_GET["ventas"] == "semanal") {
        $ventasDiarias = $ventas->mdlTotalVentasDiarias();
        $ventasDiariasTiendas = $ventas->mdlTotalVentasDiariasDesglose();

        $canales = array();
        $tiendas = array();
        $canal = array('FLOTILLAS', 'MAYOREO', 'RUTAS', 'TIENDAS');
        foreach ($ventasDiarias as $key => $value) {

            array_push($canales, array($value["canalComercial"] => (float)$value["Totales"]));
        }


        foreach ($ventasDiariasTiendas as $key => $value2) {


            array_push($tiendas, array($value2["Agente"] => (float)$value2["Totales"]));
        }

        $respuesta = [
            "canales" => $canales,
            "tiendas" => $tiendas,

        ];
        echo json_encode($respuesta);
    }
}
