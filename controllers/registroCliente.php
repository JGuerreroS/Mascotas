<?php

if( isset($_POST['nombre']) && 
    isset($_POST['apellido']) && 
    isset($_POST['run']) && 
    isset($_POST['email']) &&
    isset($_POST['direccion'])){

    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $run = trim($_POST['run']);
    $email = trim($_POST['email']);
    $direccion = trim($_POST['direccion']);

    session_start();

    $datos = array(
        'nombre' => $nombre,
        'apellido' => $apellido,
        'run' => $run,
        'email' => $email,
        'direccion' => $direccion,
        'usuario' => $_SESSION['usuario']
    );

    include '../models/clase.php';

    echo $insert = cargarClientes($datos);

}else{

    echo 3;

}