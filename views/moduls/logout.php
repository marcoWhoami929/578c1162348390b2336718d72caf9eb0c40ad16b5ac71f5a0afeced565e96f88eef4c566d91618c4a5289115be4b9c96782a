<?php
$tabla = "bitacora";

$datos = array("usuario" => $_SESSION['nombre'],
	"perfil" => $_SESSION['perfil'],
	"accion" => 'Salió del Sistema');

$logout = new ModelAmdon();
$logout -> mdlRegistroBitacora($tabla, $datos);

session_unset();
session_destroy();

echo '<script>

window.location= "login";

</script>';