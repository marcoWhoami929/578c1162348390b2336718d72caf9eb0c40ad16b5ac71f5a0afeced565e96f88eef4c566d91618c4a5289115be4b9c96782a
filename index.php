<?php
require_once "controllers/template_controller.php";
require_once "controllers/admon_controller.php";
require_once "controllers/reporteador_controller.php";


require_once "models/admon.model.php";
require_once "models/db_connect_param.php";


require_once "clases/ultimosCostosPinturas.php";
require_once "clases/ultimosCostosFlex.php";
require_once "clases/ultimosCostosTorres.php";

$template = new ControllerTemplate();
$template->template();
