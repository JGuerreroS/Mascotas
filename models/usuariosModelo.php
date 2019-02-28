<?php

class UsuariosModelo{

    function obtenerUsuariosModelo(){

        require_once './core/conexion.php';

        $sql = "select * from users";

        $result = mysqli_query($conn,$sql);

        return $result;

    }


}