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
    public $nombreAgente;
    public $centroTrabajo;
    public $canalComercial;
    public function registroConcepto()
    {
        $empresa = $this->empresa;

        $datos = array(
            "agente" => $this->nombreAgente,
            "centroTrabajo" => $this->centroTrabajo,
            "canalComercial" => $this->canalComercial
        );

        $respuesta = ControllerAdmon::ctrRegistroConcepto($empresa, $datos);
        echo json_encode($respuesta);
    }
    public $idConcepto;
    public $empresaConcepto;
    public function detalleConcepto()
    {
        $empresa = $this->empresaConcepto;

        $id = $this->idConcepto;

        $respuesta = ControllerAdmon::ctrDetallesConcepto($empresa, $id);

        echo json_encode($respuesta);
    }
    public $idConceptoEdit;
    public $nombreAgenteEdit;
    public $centroTrabajoEdit;
    public $canalComercialEdit;
    public $empresaEdit;
    public function actualizacionConcepto()
    {
        $empresa = $this->empresaEdit;

        $datos = array(
            "id" => $this->idConceptoEdit,
            "agente" => $this->nombreAgenteEdit,
            "centroTrabajo" => $this->centroTrabajoEdit,
            "canalComercial" => $this->canalComercialEdit
        );

        $respuesta = ControllerAdmon::ctrActualizarConcepto($empresa, $datos);

        echo json_encode($respuesta);
    }
    public $idConceptoDelete;
    public $empresaConceptoDelete;
    public function eliminarConcepto()
    {
        $empresa = $this->empresaConceptoDelete;

        $id = $this->idConceptoDelete;

        $respuesta = ControllerAdmon::ctrEliminarConcepto($empresa, $id);

        echo json_encode($respuesta);
    }
}
if (isset($_POST["idDocumento"])) {
    $detalleCompra = new AjaxAdmon();
    $detalleCompra->idDocumento = $_POST["idDocumento"];
    $detalleCompra->empresa = $_POST["empresa"];
    $detalleCompra->mostrarDetalleCompra();
}
if (isset($_POST["nombreAgente"])) {
    $registroConcepto = new AjaxAdmon();
    $registroConcepto->nombreAgente = $_POST["nombreAgente"];
    $registroConcepto->centroTrabajo = $_POST["centroTrabajo"];
    $registroConcepto->canalComercial = $_POST["canalComercial"];
    $registroConcepto->empresa = $_POST["empresa"];
    $registroConcepto->registroConcepto();
}
if (isset($_POST["idConcepto"])) {
    $datosConcepto = new AjaxAdmon();
    $datosConcepto->idConcepto = $_POST["idConcepto"];
    $datosConcepto->empresaConcepto = $_POST["empresaConcepto"];
    $datosConcepto->detalleConcepto();
}
if (isset($_POST["idConceptoEdit"])) {
    $actualizacionConcepto = new AjaxAdmon();
    $actualizacionConcepto->idConceptoEdit = $_POST["idConceptoEdit"];
    $actualizacionConcepto->nombreAgenteEdit = $_POST["nombreAgenteEdit"];
    $actualizacionConcepto->centroTrabajoEdit = $_POST["centroTrabajoEdit"];
    $actualizacionConcepto->canalComercialEdit = $_POST["canalComercialEdit"];
    $actualizacionConcepto->empresaEdit = $_POST["empresaEdit"];
    $actualizacionConcepto->actualizacionConcepto();
}
if (isset($_POST["idConceptoDelete"])) {
    $eliminarConcepto = new AjaxAdmon();
    $eliminarConcepto->idConceptoDelete = $_POST["idConceptoDelete"];
    $eliminarConcepto->empresaConceptoDelete = $_POST["empresaConceptoDelete"];
    $eliminarConcepto->eliminarConcepto();
}
