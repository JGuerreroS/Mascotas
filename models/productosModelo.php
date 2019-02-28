<?php

class ProductosModelo{

    function obtenerProductosModelo(){

        require_once './core/conexion.php';

        $sql = "SELECT id, categoria, producto, precio FROM productos p inner join categorias c on (p.id_categoria = c.id_categoria)";

        $result = mysqli_query($conn,$sql);

        return $result;

    }

    function selectCategoriaModelo(){

        include './core/conexion.php';
        
        $sql = "select id_categoria, categoria from categorias";

        $result = mysqli_query($conn,$sql);

        return $result;

    }




} //Fin de la clase