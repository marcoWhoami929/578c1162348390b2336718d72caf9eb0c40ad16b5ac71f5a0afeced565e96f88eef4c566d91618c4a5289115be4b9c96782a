<?php

$datos = array(
	"usuario" => $_SESSION['nombre'],
	"perfil" => $_SESSION['perfil'],
	"accion" => $_SESSION['nombre'] . " ha finalizado sesión",
	"idAccion" => 2
);
$logout = new ModelAdmon();
$logout->mdlRegistroBitacora("bitacora", $datos);

session_unset();
session_destroy();

echo '<script>

window.location= "login";

</script>';
