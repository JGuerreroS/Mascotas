<?php

if( isset($_POST['nombre']) && 
    isset($_POST['email']) &&
    isset($_POST['pass1']) &&
    isset($_POST['privilegio'])){

    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $clave = $_POST['pass1'];
    $privilegio = $_POST['privilegio'];

    include '../core/conexion.php';
    $checkCiv = "SELECT * FROM users WHERE Usuario = '$_POST[email]'";
    $result = mysqli_query($conn,$checkCiv);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        
        echo "<script>
                    alert('El usuario ya se encuentra registrado');
                    window.location='../registroUsuarios';
                </script>";

        mysqli_close($conn);

    }else{

        mysqli_close($conn);

        session_start();

        $datos = array(
            'nombre' => $nombre,
            'email' => $email,
            'clave' => $clave,
            'usuario' => $_SESSION['usuario'],
            'privilegio' => $privilegio
        );

        include '../models/clase.php';

        echo $insert = registroUsuario($datos);

    }

}else{

    header('Location: ../registroUsuarios');

}