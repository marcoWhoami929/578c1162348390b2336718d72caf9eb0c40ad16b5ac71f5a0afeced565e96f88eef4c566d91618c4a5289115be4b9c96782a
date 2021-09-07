<?php

require_once "../../controllers/reporteador_controller.php";
require_once "../../models/db_connect_pinturas.php";
require_once "../../models/db_connect_flex.php";
require_once "../../models/db_connect_torres.php";

require_once "../../clases/ultimosCostosPinturas.php";
require_once "../../clases/ultimosCostosFlex.php";
require_once "../../clases/ultimosCostosTorres.php";
require_once "../../clases/detalleVentasDiario.php";
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
    public $estatus;
    public $anio;
    public $semana;
    public $agente;
    public $canal;
    public $per_page;
    public $page;
    public $productos;
    public $clientes;
    public $vista;
    public function reporteVentas()
    {
        $semana = $this->semana;
        if ($semana == "") {
            $week = date("W");
        } else {
            $week = $semana;
        }


        $database = new detalleVentasDiario();
        //Recibir variables enviadas
        $query = $this->clientes;
        $año = $this->anio;
        $estatus = $this->estatus;
        $agente = $this->agente;
        $per_page = $this->per_page;
        $page = $this->page;
        $productos = $this->productos;
        $canal = $this->canal;
        $tables = "dbo.admDocumentos";
        $campos = "*";
        $vista = $this->vista;
        //Variables de paginación
        $page = (isset($page) && !empty($page)) ? $page : 1;
        $offset = ($page - 1) * $per_page;
        $search = array("query" => $query, "producto" => $productos, "año" => $año, "estatus" => $estatus, "agente" => $agente, "canal" => $canal, "semana" => $week, "per_page" => $per_page, "offset" => $offset, "vista" => $vista);
        //consulta principal para recuperar los datos
        $obtenerReporteVentas = new ControllerReports();
        $obtenerReporteVentas->ctrDescargarReporteVentasDiario($tables, $campos, $search);
    }
}

if (isset($_GET["reporteUltimosCostos"])) {
    $reporte = new loadReports();
    $reporte->empresa = $_GET["reporteUltimosCostos"];
    $reporte->query = $_GET["query"];
    $reporte->año = $_GET["año"];
    $reporte->reportUltimosCostos();
}
if (isset($_GET["reporteVentas"])) {
    $reporteVentas = new loadReports();
    $reporteVentas->estatus = $_GET["estatus"];
    $reporteVentas->anio = $_GET["año"];
    $reporteVentas->semana = $_GET["semana"];
    $reporteVentas->agente = $_GET["agente"];
    $reporteVentas->canal = $_GET["canal"];
    $reporteVentas->per_page = $_GET["per_page"];
    $reporteVentas->page = $_GET["page"];
    $reporteVentas->productos = $_GET["productos"];
    $reporteVentas->clientes = $_GET["clientes"];
    $reporteVentas->vista = $_GET["vista"];
    $reporteVentas->reporteVentas();
}
