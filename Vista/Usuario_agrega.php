<?php 
    error_reporting(0); //ocultamos advertencias
    $usuario =  $_GET["var3"]; 
    $clave = $_GET["var4"];    
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
    <title>SISTEMA INTEGRAL JPCL - REGISTRO DE USUARIOS</title>  
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>	
    <script src="https://kit.fontawesome.com/047316aeb8.js" crossorigin="anonymous"></script>
    <link href="css/estilos.css" rel="stylesheet" /> 
</head>
<body style="background-image: url('img/fondo_duotono.jpg')">
	<div class="container my-5">
    <b><u>DATOS DEL NUEVO USUARIO:</b></u>
        <form  action="addUsuario.php" method="post" >   
            <div class="form-group" id="user-group">
            <i class="fas fa-user"></i>                    
                <label>N° Usuario (su 5 primeros digitos de dni) </label>
                <input class="form-control" type="text" name="numid" maxlenght="5" placeholder="Ingrese tu num usuario">
            </div>         
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                               
                <label>Nombres</label>
                <input class="form-control" type="text" name="nombres" maxlenght="50" placeholder="Ingrese tu nombre">
            </div>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                               
                <label>Apellidos</label>
                <input class="form-control" type="text" name="apellidos" maxlenght="50" placeholder="Ingrese tus apellidos">
            </div>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                               
                <label>Celular</label>
                <input class="form-control" type="text" name="celular" maxlenght="10" placeholder="Ingrese tu número de celular">
            </div>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                               
                <label>Número de DNI</label>
                <input class="form-control" type="text" name="ndocumento" maxlenght="14" placeholder="Ingrese tu número de DNI">
            </div>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                               
                <label>Sexo (Masculino/Femenino)</label>
                <input class="form-control" type="text" name="sexo" maxlenght="20" placeholder="Ingrese tu sexo: Masculino / Femenino">
            </div>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                               
                <label>Ingrese fecha de nacimiento (AAAA-MM-DD)</label>
                <input class="form-control" type="text" name="nacimiento" maxlenght="10" placeholder="Ingrese tu fecha de nacimiento según formato">
            </div>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                               
                <label>Ingrese mail del usuario</label>
                <input class="form-control" type="text" name="mail" maxlenght="100" placeholder="Ingrese tu mail">
            </div>
            <b><u>DETALLES DE ACCESO DE USUARIO:</b></u>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                               
                <label>Nombre de usuario:</label>
                <input class="form-control" type="text" name="usuario" maxlenght="10" placeholder="Ingrese su nombre de usuario máximo 10 dígitos">
            </div>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                               
                <label>Contraseña</label>
                <input class="form-control" type="text" name="contrasena" maxlenght="10" placeholder="Ingrese su contraseña máximo 10 dígitos">
            </div>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                               
                <label>Ingrese su tipo de usuario(<b>A:Administrador/Abogado -- S:Secretaria</b>)</label>
                <input class="form-control" type="text" name="tipousuario" maxlenght="1" placeholder="Ingrese sólo A o S">
                <input type="hidden" name="validaciondeenvio" value="si" />                
            </div>
            <button type="submit" class="btn btn-success" name="submit" value="nuevousuario">Registrar</button>            
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