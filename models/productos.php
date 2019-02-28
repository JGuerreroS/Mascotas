<?php

    require_once '../core/conexion.php';
            
    $categoria = $_GET['id_categoria'];

    $producto = strtoupper(trim($_GET['producto']));

    $precio = $_GET['precio'];
 
    $sql = "insert into productos (id_categoria, producto, precio) values ($categoria, '$producto', $precio)";
    
    echo mysqli_query($conn,$sql);