<?php

include './models/productosModelo.php';

class ProductosControlador extends ProductosModelo{

    function obtenerProductosControlador(){

        $productos = new ProductosModelo();

        return $productos->obtenerProductosModelo();
        
    }

    function selectCategoriaControlador(){

        $selectCategoria = new ProductosModelo();

        return $selectCategoria->selectCategoriaModelo();

    }
    

}