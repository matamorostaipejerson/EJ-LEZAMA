<?php
    include('../Modelo/Conexion.php');
    error_reporting(0); //ocultamos advertencias
    $id_proceso =  $_GET["idproceso"]; 

    if(isset($_POST['submit'])){
        $numexp =$_POST['numexp'];
        $dni=$_POST['dni'];
        $name=$_POST['name'];
        $estado=$_POST['estado'];
        $pago=$_POST['pago'];

        $sql="INSERT INTO `expediente`(`idExpediente`, `dniCliente`, `nomCliente`, `estadoExpediente`, `pagoExpediente`, `idproceso`, `diaAudiencia`) 
        VALUES ('$numexp','$dni','$name','$estado','$pago','$id_proceso',NOW())";

        $result=mysqli_query($conn,$sql);
        if($result){
            //echo("Registrado correctamente");
            header('location:Modalidad.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>SISTEMA INTEGRAL JPCL - PROCESO PENAL DE EXPEDIENTES</title> 
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">   
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>	
    <script src="https://kit.fontawesome.com/047316aeb8.js" crossorigin="anonymous"></script>
    <link href="css/estilos.css" rel="stylesheet" /> 
</head>
<body style="background-image: url('img/fondo_duotono.jpg')">

	<div class="container my-5">
    <span style="text-align:center;font-family:Impact;"><h2>PROCESO CIVIL</h2></span>
        <form  action="" method="post" >   
            <div class="form-group" id="user-group">
            <i class="fas fa-user"></i> <!-- <i class="fa-solid fa-circle-info"></i> -->                       
                <label>N° Exp</label>
                <input class="form-control" type="text" name="numexp" maxlenght="4" placeholder="Ingrese tu num expediente, formato: XXXX">
            </div>         
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                               
                <label>DNI</label>
                <input class="form-control" type="text" name="dni" maxlenght="8" placeholder="Ingrese tu dni: 12345678">
            </div>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                                
                <label>Nombre de Procesado</label>
                <input class="form-control" type="text" name="name" maxlenght="75" placeholder="Ingrese tu nombre">
            </div>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                                
                <label>Estado de Exp.</label>
                <input class="form-control" type="text" name="estado" maxlenght="25" placeholder="Ingrese tu estado expediente (Proceso/Culminado)">
            </div>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                                
                <label>Pago de expediente</label>
                <input class="form-control" type="text" name="pago" maxlenght="25" placeholder="Ingrese tu pago(Pendiente/Cancelado)">
            </div>

            <button type="submit" class="btn btn-primary" name="submit" value="expediente">Enviar</button>
            &nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-primary" onclick="cerrar();">Cancelar</button>                      
        </form>  
    </div> 
<script language="javascript" type="text/javascript"> 
    function cerrar() { 
        window.history.go(-1); //vuelve atrás
        return false;
    } 
</script>
</body>
</html>