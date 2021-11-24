<?php
require_once "../models/admon.model.php";
$ventas = new ModelAdmon();
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
    if ($_GET["grafico"] == "grafico2") {
        $ventasYearToDay = $ventas->mdlVentasYearToDay();
        $series2020 = array();
        $series2021 = array();
        foreach ($ventasYearToDay as $key => $value) {
            array_push($series2020, array($value["canalComercial"], (float)$value["2020"]));
            array_push($series2021, array($value["canalComercial"], (float)$value["2021"]));
        }
        $respuesta = [
            "ventas1" => $series2021,
            "ventas2" => $series2020,


        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "grafico3") {
        $ventasYearToWeek = $ventas->mdlVentasYearToWeek();
        $series1 = array();
        $series2 = array();
        $ventas1 = array();
        $week = date('W');
        $year = 2020;
        for ($day = 1; $day < 7; $day++) {

            $dia = date('d', strtotime($year . "W" . ($week) . $day));
            $mes = date('m', strtotime($year . "W" . ($week) . $day));
            $año = date('Y', strtotime($year . "W" . ($week) . $day));
            $fecha = $año . "-" . (int)$mes . "-" . (int)$dia;
            array_push($series1, $fecha);
        }
        for ($i = 2; $i < 8; $i++) {

            $dia2 = date('d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
            $mes2 = date('m', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
            $año2 = date('Y', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
            $fecha2 = $año2 . "-" . (int)$mes2 . "-" . (int)$dia2;
            array_push($series2, $fecha2);
        }
        $fechas = [$series1[0], $series2[0], $series1[1], $series2[1], $series1[2], $series2[2], $series1[3], $series2[3], $series1[4], $series2[4], $series1[5], $series2[5]];
        foreach ($ventasYearToWeek as $key => $value) {
            array_push($ventas1, array("name" => $value["canalComercial"], "data" => array((float)$value[$series1[0]], (float)$value[$series2[0]], (float)$value[$series1[1]], (float)$value[$series2[1]], (float)$value[$series1[2]], (float)$value[$series2[2]], (float)$value[$series1[3]], (float)$value[$series2[3]], (float)$value[$series1[4]], (float)$value[$series2[4]], (float)$value[$series1[5]], (float)$value[$series2[5]])));
        }

        $respuesta = [
            "fechas" => $fechas,
            "ventas" => $ventas1,



        ];
        echo json_encode($respuesta);
    }
    if ($_GET["grafico"] == "grafico4") {
        $ventasYearToWeek = $ventas->mdlVentasYearToMonth();

        $ventas1 = array();
        foreach ($ventasYearToWeek as $key => $value) {
            array_push($ventas1, array("name" => $value["canalComercial"], "data" => array((float)$value['2020-1'], (float)$value['2021-1'], (float)$value['2020-2'], (float)$value['2021-2'], (float)$value['2020-3'], (float)$value['2021-3'], (float)$value['2020-4'], (float)$value['2021-4'], (float)$value['2020-5'], (float)$value['2021-5'], (float)$value['2020-6'], (float)$value['2021-6'], (float)$value['2020-7'], (float)$value['2021-7'], (float)$value['2020-8'], (float)$value['2021-8'], (float)$value['2020-9'], (float)$value['2021-9'], (float)$value['2020-10'], (float)$value['2021-10'], (float)$value['2020-11'], (float)$value['2021-11'], (float)$value['2020-12'], (float)$value['2021-12'])));
        }

        $respuesta = [
            "ventas" => $ventas1,
        ];
        echo json_encode($respuesta);
    }
}
