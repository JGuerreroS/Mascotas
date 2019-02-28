<?php

$id_usuario  = $_GET['id_usuario'];

include '../models/clase.php';

echo borrarUsuario($id_usuario);