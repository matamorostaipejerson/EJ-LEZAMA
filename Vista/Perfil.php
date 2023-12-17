<?php 
    error_reporting(0); //ocultamos advertencias
    $usuario =  $_GET["var1"]; 
    $clave = $_GET["var2"];
    $miretorno = $_GET["varretorna"];
    if($usuario==null && $clave==null && $miretorno!="retorna"){
            echo '<script language="javascript">alert("ERROR!!!");</script>';
            header('location:error.php'); 
    }elseif(!($usuario = 'abogado' && $clave = 'admin')){
            header('location:secretaria.php');
    }else{
        echo 'Autenticado...';         
    }  
?>

<!DOCTYPE html>
<html>
<head>
    <title>SISTEMA INTEGRAL JPCL - PERFIL</title> 
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>	
    <script src="https://kit.fontawesome.com/047316aeb8.js" crossorigin="anonymous"></script>
    <link href="css/estilos.css" rel="stylesheet" /> 
</head>
<body style="background-image: url('img/fondo_duotono.jpg')">
	<div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-12 user-img">                    
                    <img src="img/usuario1.png" class="img-fluid" alt="Responsive image">
                </div>
                <form  action="../Modelo/Modelo.php" method="post" name="signin-form" class="col-12"> 
                            <i class="fas fa-user"></i>
                            <label for="exampleInputEmail1">USUARIO ACTUAL</label>                               
                            <br>                            
                            <i class="fas fa-info-circle"></i>                           
                            
                            <?php 
                                echo $_GET["var1"]; 
                            ?> &nbsp;
                            <?php 
                                session_start();
                                echo $_SESSION["nombreUsuario"];                            
                            ?>
                            <br>
                            <button class="btn btn-primary my-5"><a href="Usuario_agrega.php?var3=abogado&var4=admin" class="text-light">Agregar Usu.</a></button>
                            <button class="btn btn-danger"><a href="Usuario_elimina.php?var5=abogado&var6=admin" class="text-light">Eliminar Usu.</a></button>                                                       
                            <button type="button" class="btn btn-link" onclick="cerrar();">Cancelar</button>  
                            <br>                                                   
                </form>                
            </div>
        </div>
    </div>    
</div>

<script language="javascript" type="text/javascript"> 
function cerrar() { 
   window.open('','_parent',''); 
   window.close();
} 
</script>

</body>
</html>