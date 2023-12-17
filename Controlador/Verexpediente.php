<?php
    require('../Modelo/Conexion.php');     
    $sql = "SELECT * FROM `expediente`"; 
    $result = mysqli_query($conn,$sql);   
?>