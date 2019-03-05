<?php

$cliente = ($_GET['id_cliente'] ? $_GET['id_cliente'] : $_GET['id_cliente']);

$sql = "SELECT c.id, nombre, apellidos, run, email, direccion, Name, c.fecha_registro FROM clientes c
INNER JOIN users u ON (c.id_usuario = u.Id) WHERE c.id = $cliente";

include '../core/conexion.php';

$result = mysqli_query($conn, $sql);

$datos = new stdClass();

while ($ver = mysqli_fetch_array($result)){

    $datos->Id=$ver[0];
    $datos->Nombre=$ver[1];
    $datos->Apellidos=$ver[2];
    $datos->Run=$ver[3];
    $datos->Mail=$ver[4];
    $datos->Direccion=$ver[5];
    $datos->Usuario=$ver[6];
    $datos->Fecha=str_replace('-', '/', date('d-m-Y', strtotime($ver[7])));


}

echo json_encode($datos);