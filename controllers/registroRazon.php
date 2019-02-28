<?php

$nombre = mb_strtoupper(trim($_POST['razon']));

include '../models/clase.php';

echo $insert = cargarRazon($nombre);