<?php
session_start();
require_once "../controllers/admon.controller.php";
require_once "../models/admon.model.php";
class AjaxAdmon
{

    public $idDocumento;
    public $empresa;
    public $nombreAgente;
    public $centroTrabajo;
    public $canalComercial;
    public $idConcepto;
    public $empresaConcepto;
    public $idConceptoEdit;
    public $nombreAgenteEdit;
    public $centroTrabajoEdit;
    public $canalComercialEdit;
    public $empresaEdit;
    public $idConceptoDelete;
    public $empresaConceptoDelete;
    public $activarId;
    public $estadoUsuario;
    public $nombreUsuario;
    public $emailUsuario;
    public $grupoUsuario;
    public $perfilUsuario;
    public $accionUser;
    public $idUsuario;
    public $passwordUsuario;
    public $idAccion;
    public $accionBitacora;
    public function mostrarDetalleCompra()
    {
        $id = $this->idDocumento;
        $empresaSelected = $this->empresa;
        $respuesta = ControllerAdmon::ctrObtenerDetalleCompra($empresaSelected, $id);
        echo json_encode($respuesta);
    }

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

    public function detalleConcepto()
    {
        $empresa = $this->empresaConcepto;

        $id = $this->idConcepto;

        $respuesta = ControllerAdmon::ctrDetallesConcepto($empresa, $id);

        echo json_encode($respuesta);
    }

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

    public function eliminarConcepto()
    {
        $empresa = $this->empresaConceptoDelete;

        $id = $this->idConceptoDelete;

        $respuesta = ControllerAdmon::ctrEliminarConcepto($empresa, $id);

        echo json_encode($respuesta);
    }

    public function actualizarUsuario()
    {
        $tabla = "administradores";
        $item = "activo";
        $valor = $this->estadoUsuario;

        $item2 = "id";
        $valor2 = $this->activarId;

        $respuesta = ModelAdmon::mdlActualizarEstadoUsuario($tabla, $item, $valor, $item2, $valor2);

        echo $respuesta;
    }
    public function creacionUsuarioAdmin()
    {

        $tabla = "administradores";
        $password = controllerAdmon::ctrPasswordEncrypt("user123", "encrypt");
        $datos = array(
            "nombre" => $this->nombreUsuario,
            "email" => $this->emailUsuario,
            "password" => $password,
            "foto" => "views/images/user2.png",
            "grupo" => $this->grupoUsuario,
            "perfil" => $this->perfilUsuario,

        );

        $respuesta = ControllerAdmon::ctrCreacionUsuarioAdmin($tabla, $datos);

        echo json_encode($respuesta);
    }
    public function obtenerDatosUsuarioAdmin()
    {
        $item = "id";
        $valor = $this->idUsuario;

        $respuesta = ControllerAdmon::ctrListarUsuarios($item, $valor);

        echo json_encode($respuesta);
    }
    public function actualizacionUsuarioAdmin()
    {

        $tabla = "administradores";

        $datos = array(
            "idUsuario" => $this->idUsuario,
            "nombre" => $this->nombreUsuario,
            "grupo" => $this->grupoUsuario,
            "perfil" => $this->perfilUsuario

        );

        $respuesta = ControllerAdmon::ctrActualizacionUsuarioAdmin($tabla, $datos);

        echo json_encode($respuesta);
    }
    public function eliminarUsuarioAdmin()
    {
        $item = "id";
        $valor = $this->idUsuario;

        $respuesta = ControllerAdmon::ctrEliminarUsuarioAdmin($item, $valor);

        echo json_encode($respuesta);
    }
    public function actualizacionPasswordUsuarioAdmin()
    {

        $tabla = "administradores";
        $password = $this->passwordUsuario;
        $passwordNew = ControllerAdmon::ctrPasswordEncrypt($password, 'encrypt');

        $datos = array(
            "idUsuario" => $this->idUsuario,
            "password" => $passwordNew
        );

        $respuesta = ControllerAdmon::ctrActualizacionPasswordUsuarioAdmin($tabla, $datos);

        echo json_encode($respuesta);
    }
    public function generarEventoBitacora()
    {
        $datos = array(
            "usuario" => $_SESSION['nombre'],
            "perfil" => $_SESSION['perfil'],
            "accion" => $_SESSION['nombre'] . " " . $this->accionBitacora,
            "idAccion" => $this->idAccion
        );

        $respuesta = ModelAdmon::mdlRegistroBitacora("bitacora", $datos);

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
if (isset($_POST["activarId"])) {
    $activar = new AjaxAdmon();
    $activar->activarId = $_POST["activarId"];
    $activar->estadoUsuario = $_POST["estadoUsuario"];
    $activar->actualizarUsuario();
}
if (isset($_POST["idUsuario"])) {
    $obtenerDatos = new AjaxAdmon();
    $obtenerDatos->idUsuario = $_POST["idUsuario"];
    $obtenerDatos->obtenerDatosUsuarioAdmin();
}
if (isset($_POST["accionUser"])) {

    $userCreate =  new AjaxAdmon();
    $userCreate->nombreUsuario = $_POST["nombreUsuario"];
    $userCreate->emailUsuario = $_POST["emailUsuario"];
    $userCreate->grupoUsuario = $_POST["grupoUsuario"];
    $userCreate->perfilUsuario = $_POST["perfilUsuario"];
    $userCreate->accionUser = $_POST["accionUser"];
    $userCreate->creacionUsuarioAdmin();
}
if (isset($_POST["idUsuarioEdit"])) {

    $userEdit =  new AjaxAdmon();
    $userEdit->idUsuario = $_POST["idUsuarioEdit"];
    $userEdit->nombreUsuario = $_POST["nombreUsuario"];
    $userEdit->grupoUsuario = $_POST["grupoUsuario"];
    $userEdit->perfilUsuario = $_POST["perfilUsuario"];
    $userEdit->actualizacionUsuarioAdmin();
}
if (isset($_POST["idUsuarioDelete"])) {
    $userDelete = new AjaxAdmon();
    $userDelete->idUsuario = $_POST["idUsuarioDelete"];
    $userDelete->eliminarUsuarioAdmin();
}
if (isset($_POST["passwordUsuario"])) {
    $userUpdate = new AjaxAdmon();
    $userUpdate->idUsuario = $_POST["idUsuarioUpdate"];
    $userUpdate->passwordUsuario = $_POST["passwordUsuario"];
    $userUpdate->actualizacionPasswordUsuarioAdmin();
}
if (isset($_POST["idAccion"])) {
    $eventoBitacora = new AjaxAdmon();
    $eventoBitacora->idAccion = $_POST["idAccion"];
    $eventoBitacora->accionBitacora = $_POST["accionBitacora"];
    $eventoBitacora->generarEventoBitacora();
}
