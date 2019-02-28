<?php

    require_once '../core/conexion.php';
            
    $dato = strtoupper(trim($_GET['Categoria']));
    
    $sql = "insert into categorias (categoria) values ('$dato')";
    
    echo mysqli_query($conn,$sql);