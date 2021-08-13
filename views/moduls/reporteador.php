<?php

require_once "../../controllers/reporteador_controller.php";
require_once "../../models/db_connect_pinturas.php";
require_once "../../models/db_connect_flex.php";
require_once "../../models/db_connect_torres.php";

require_once "../../clases/ultimosCostosPinturas.php";
require_once "../../clases/ultimosCostosFlex.php";
require_once "../../clases/ultimosCostosTorres.php";
class loadReports
{

    public $empresa;
    public $query;
    public $año;
    public function reportUltimosCostos()
    {
        $empresa = $this->empresa;
        $query = $this->query;
        $año = $this->año;

        $obtenerReporte = new ControllerReports();
        $obtenerReporte->ctrDescargarReporteUltimosCostos($empresa, $query, $año);
    }
}

if (isset($_GET["reporteUltimosCostos"])) {
    $reporte = new loadReports();
    $reporte->empresa = $_GET["reporteUltimosCostos"];
    $reporte->query = $_GET["query"];
    $reporte->año = $_GET["año"];
    $reporte->reportUltimosCostos();
}
