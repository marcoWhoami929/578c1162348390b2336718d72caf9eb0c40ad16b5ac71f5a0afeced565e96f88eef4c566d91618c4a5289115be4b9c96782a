<?php
class ControllerAdmon
{

    public function ctrAccesoUser()
    {
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            if (
                preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"]) &&
                preg_match('/^[a-zA-Z0-9]+$/', $_POST["password"])
            ) {

                $encriptar = crypt($_POST["password"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "administradores";
                $item = "email";
                $valor = $_POST["email"];

                $respuesta = ModelAmdon::mdlMostrarAdministradores($tabla, $item, $valor);

                if ($respuesta["email"] == $_POST["email"] && $respuesta["password"] == $encriptar) {

                    $_SESSION["validarSesionBackend"] = "ok";
                    $_SESSION["id"] = $respuesta["id"];
                    $_SESSION["nombre"] = $respuesta["nombre"];
                    $_SESSION["foto"] = $respuesta["foto"];
                    $_SESSION["email"] = $respuesta["email"];
                    $_SESSION["grupo"] = $respuesta["grupo"];
                    $_SESSION["perfil"] = $respuesta["perfil"];

                    $tabla = "bitacora";

                    $datos = array(
                        "usuario" => $_SESSION['nombre'],
                        "perfil" => $_SESSION['perfil'],
                        "accion" => 'Acceso al Sistema'
                    );

                    $respuesta = ModelAmdon::mdlRegistroBitacora($tabla, $datos);

                    echo '<script>
                             window.location = "ultimosCostos";
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
            }
        }
    }
    static public function ctrListarCentroTrabajo($tabla)
    {

        $respuesta =  ModelAmdon::mdlListarCentroTrabajo($tabla);

        return $respuesta;
    }
    static public function ctrListarCanalComercial($tabla)
    {

        $respuesta = ModelAmdon::mdlListarCanalComercial($tabla);

        return $respuesta;
    }
    static public function ctrObtenerDetalleCompra($empresa, $idDocumento)
    {

        $respuesta = ModelAmdon::mdlObtenerDetalleCompra($empresa, $idDocumento);

        return $respuesta;
    }
}
