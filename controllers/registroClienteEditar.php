<?php

$id_usuario = $_POST['id_usuario'];
$nombre  = trim($_POST['rNombre']);
$apellidos  = trim($_POST['rApellidos']);
$run  = trim($_POST['rRun']);
$correo  = trim($_POST['rCorreo']);
$direccion  = trim($_POST['rDireccion']);

$datos = array('id_usuario' => $id_usuario, 'nombre' => $nombre, 'apellidos' => $apellidos, 'run' => $run, 'correo' => $correo, 'direccion' => $direccion);

include '../models/clase.php';

echo editarClientes($datos);