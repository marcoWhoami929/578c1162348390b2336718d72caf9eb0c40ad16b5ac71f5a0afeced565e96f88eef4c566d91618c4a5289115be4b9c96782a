<?php
require_once "../controllers/admon_controller.php";
require_once "../models/admon.model.php";
class AjaxAdmon
{

    public $idDocumento;
    public $empresa;
    public function mostrarDetalleCompra()
    {
        $id = $this->idDocumento;
        $empresaSelected = $this->empresa;
        $respuesta = ControllerAdmon::ctrObtenerDetalleCompra($empresaSelected, $id);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["idDocumento"])) {
    $detalleCompra = new AjaxAdmon();
    $detalleCompra->idDocumento = $_POST["idDocumento"];
    $detalleCompra->empresa = $_POST["empresa"];
    $detalleCompra->mostrarDetalleCompra();
}
