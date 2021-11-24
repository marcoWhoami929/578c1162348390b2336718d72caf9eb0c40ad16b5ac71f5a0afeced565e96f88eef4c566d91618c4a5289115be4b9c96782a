<?php
error_reporting(0);
require_once "../controllers/admon.controller.php";
require_once "../models/admon.model.php";

class TablaUsuarios
{

    /*=============================================
  	MOSTRAR LA TABLA
  	=============================================*/

    public function mostrarTablas()
    {

        $item = null;
        $valor = null;

        $usuarios = ControllerAdmon::ctrListarUsuarios($item, $valor);


        $datosJson = '{
		 
	 	"data": [ ';

        for ($i = 0; $i < count($usuarios); $i++) {

            /*=============================================
  			REVISAR ESTADO
  			=============================================*/


            if ($usuarios[$i]["activo"] == 1) {
                $estado = 0;

                $estado = "<button class='btn btn-success btn-xs btnActivar' idUsuario='" . $usuarios[$i]["id"] . "' estado='" . $estado . "'>Activado</button>";
            } else {

                $estado = 1;

                $estado = "<button class='btn btn-danger btn-xs btnActivar' idUsuario='" . $usuarios[$i]["id"] . "' estado='" . $estado . "'>Desactivado</button>";
            }
            $acciones = "<button class='btn btn-info btn-xs' onclick='obtenerDatosUsuario(" . $usuarios[$i]['id'] . ")'><i class='fa fa-edit'></i> </button><button class='btn btn-danger btn-xs' onclick='eliminarUsuario(" . $usuarios[$i]['id'] . ")'><i class='fa fa-trash'></i> </button>";

            /*=============================================
			DEVOLVER DATOS JSON
			=============================================*/

            $datosJson     .= '[
				      "' . ($i + 1) . '",
				      "' . $usuarios[$i]["nombre"] . '",
				      "' . $usuarios[$i]["email"] . '",
				      "' . $usuarios[$i]["grupo"] . '",
				      "' . $usuarios[$i]["perfil"] . '",
				      "' . $usuarios[$i]["fecha"] . '",
                      "' . $estado . '",
				      "' . $acciones . '"
				    ],';
        }

        $datosJson = substr($datosJson, 0, -1);

        $datosJson .=  ']
			  
		}';

        echo $datosJson;
    }
}

/*=============================================
ACTIVAR TABLA
=============================================*/
$activar = new TablaUsuarios();
$activar->mostrarTablas();
