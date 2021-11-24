<?php
class ControllerAdmon
{
    static public function ctrPasswordEncrypt($pwd, $accion)
    {
        $encrypt = "AES-256-CBC";
        $secretKey = 'AA74CDCC2BBRT935136HH7B63C27';
        $secretIv = '5fgf5HJ5g27';
        $key = hash('sha256', $secretKey);
        $iv = substr(hash('sha256', $secretIv), 0, 16);
        if ($accion === 'encrypt') {
            $output = openssl_encrypt($pwd, $encrypt, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($accion === 'decrypt') {
            $output = openssl_decrypt(base64_decode($pwd), $encrypt, $key, 0, $iv);
        }
        return $output;
    }
    public function ctrAccesoUser()
    {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            if (
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"]) &&
                $_POST["password"]
            ) {

                $encriptar = $this->ctrPasswordEncrypt($_POST["password"], 'encrypt');

                $tabla = "administradores";
                $item = "email";
                $valor = $_POST["email"];

                $respuesta = ModelAdmon::mdlMostrarAdministradores($tabla, $item, $valor);

                if ($respuesta["activo"] == 0) {

                    echo '<script>
                    Swal.fire({
                       icon: "error",
                       title: "¡Por el momento te encuentras inactivo, comunicate con el administrador...!",
                       confirmButtonText: "Cerrar"
                     })

                </script>';
                } else {

                    if (isset($_POST["accion"])) {
                        switch ($_POST["accion"]) {
                            case '1':
                                $modulo = "Ventas";
                                $dashboard = "dashboard2";
                                break;
                            case '2':
                                $modulo = "Inventarios";
                                $dashboard = "dashboardInventarios";
                                break;
                        }
                        if ($respuesta["email"] == $_POST["email"] && $respuesta["password"] == $encriptar) {

                            $_SESSION["validarSesionBackend"] = "ok";
                            $_SESSION["id"] = $respuesta["id"];
                            $_SESSION["nombre"] = $respuesta["nombre"];
                            $_SESSION["foto"] = $respuesta["foto"];
                            $_SESSION["email"] = $respuesta["email"];
                            $_SESSION["grupo"] = $respuesta["grupo"];
                            $_SESSION["perfil"] = $respuesta["perfil"];
                            $_SESSION["modulo"] == $modulo;

                            $datos = array(
                                "usuario" => $_SESSION['nombre'],
                                "perfil" => $_SESSION['perfil'],
                                "accion" => $_SESSION['nombre'] . " ha iniciado sesión en el módulo " . " " . $modulo,
                                "idAccion" => 1
                            );

                            $respuesta = ModelAdmon::mdlRegistroBitacora("bitacora", $datos);

                            echo '<script>
                           
                             window.location = "' . $dashboard . '";
                             /*window.location = "dashboard";*/
 
                         </script>';
                        } else {

                            echo '<script>
                     Swal.fire({
                        icon: "error",
                        title: "¡Datos de acceso incorrectos, vuelve a intentarlo...!",
						confirmButtonText: "Cerrar"
                      })
 
                 </script>';
                        }
                    } else {
                        echo '<script>
                     Swal.fire({
                        icon: "error",
                        title: "¡No se eligio algún módulo!",
						confirmButtonText: "Cerrar"
                      })
 
                 </script>';
                    }
                }
            }
        }
    }
    static public function ctrListarCentroTrabajo($tabla)
    {

        $respuesta =  ModelAdmon::mdlListarCentroTrabajo($tabla);

        return $respuesta;
    }
    static public function ctrListarCanalComercial($tabla)
    {

        $respuesta = ModelAdmon::mdlListarCanalComercial($tabla);

        return $respuesta;
    }

    static public function ctrObtenerDetalleCompra($empresa, $idDocumento)
    {

        $respuesta = ModelAdmon::mdlObtenerDetalleCompra($empresa, $idDocumento);

        return $respuesta;
    }
    static public function ctrRegistroConcepto($empresa, $datos)
    {

        $respuesta = ModelAdmon::mdlRegistroConcepto($empresa, $datos);

        return $respuesta;
    }
    static public function ctrDetallesConcepto($empresa, $id)
    {

        $respuesta = ModelAdmon::mdlDetallesConcepto($empresa, $id);

        return $respuesta;
    }
    static public function ctrActualizarConcepto($empresa, $datos)
    {

        $respuesta = ModelAdmon::mdlActualizarConcepto($empresa, $datos);

        return $respuesta;
    }
    static public function ctrEliminarConcepto($empresa, $id)
    {

        $respuesta = ModelAdmon::mdlEliminarConcepto($empresa, $id);

        return $respuesta;
    }
    static public function ctrListarUsuarios($item, $valor)
    {
        $tabla = "administradores";

        $respuesta = ModelAdmon::mdlListarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }
    static public function ctrCreacionUsuarioAdmin($tabla, $datos)
    {

        $respuesta = ModelAdmon::mdlCreacionUsuarioAdmin($tabla, $datos);

        return $respuesta;
    }
    static public function ctrActualizacionUsuarioAdmin($tabla, $datos)
    {

        $respuesta = ModelAdmon::mdlActualizacionUsuarioAdmin($tabla, $datos);

        return $respuesta;
    }
    static public function ctrEliminarUsuarioAdmin($item, $valor)
    {
        $tabla = "administradores";

        $respuesta = ModelAdmon::mdlEliminarUsuarioAdmin($tabla, $item, $valor);

        return $respuesta;
    }
    static public function ctrActualizacionPasswordUsuarioAdmin($tabla, $datos)
    {

        $respuesta = ModelAdmon::mdlActualizacionPasswordUsuarioAdmin($tabla, $datos);

        return $respuesta;
    }
}
