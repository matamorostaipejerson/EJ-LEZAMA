<?php 
    error_reporting(0); //ocultamos advertencias
    $usuario =  $_GET["var5"]; 
    $clave = $_GET["var6"];    
    if($usuario==null && $clave==null){
            echo '<script language="javascript">alert("ERROR!!!");</script>';
            header('location:error.php'); 
    }elseif(!($usuario = 'abogado' && $clave = 'admin')){
            header('location:secretaria.php');
    }else{
        echo 'Autenticado...';         
    }  
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>SISTEMA INTEGRAL JPCL - ELIMINA USUARIOS</title>    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>	
    <script src="https://kit.fontawesome.com/047316aeb8.js" crossorigin="anonymous"></script>
    <link href="css/estilos.css" rel="stylesheet" /> 
</head>
<body style="background-image: url('img/fondo_duotono.jpg')">
	<div class="container my-5">
        <form  action="deleteUsuario.php" method="post" >   
            <div class="form-group" id="user-group">
            <i class="fas fa-user"></i>                    
                <label>¿Desea <b>eliminar</b> realmente este usuario?</label>
                <?php
                    session_start();
                    echo $_SESSION["idUsuarioLogueado"];
                    echo " de nombre ";
                    echo $_SESSION["nombreUsuario"];
                ?>                
            </div>
            <input type="hidden" name="validaciondeenvio" value="si" />
            <button type="submit" class="btn btn-danger" name="submit" value="eliminausuario">Eliminar</button>                                  
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