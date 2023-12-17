<?php
    require('Modelo/Conexion.php');
    $cone = new Conexion();
    $usuarios = $cone->obtenerUsuario();

    require('Vista/ver_usuarios.php');
?>
