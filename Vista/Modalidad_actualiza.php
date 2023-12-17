<?php
    include('../Modelo/Conexion.php');
    $id=$_GET['updateid'];
    if(isset($_POST['submit'])){
        $numexp =$_POST['numexp'];
        $dni=$_POST['dni'];
        $name=$_POST['name'];
        $estado=$_POST['estado'];
        $pago=$_POST['pago'];

        $sql="UPDATE `expediente` 
        SET `dniCliente`='$dni',`nomCliente`='$name',`estadoExpediente`='$estado',`pagoExpediente`='$pago'
        WHERE `idExpediente`='$id'";

        $result=mysqli_query($conn,$sql);
        if($result){
            //echo("Actualizado correctamente");
            header('location:Modalidad.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>SISTEMA INTEGRAL JPCL - PROCESO PENAL DE EXPEDIENTES - ACTUALIZA</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />    
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>	
    <script src="https://kit.fontawesome.com/047316aeb8.js" crossorigin="anonymous"></script>
    <link href="css/estilos.css" rel="stylesheet" /> 
</head>
<body style="background-image: url('img/fondo_duotono.jpg')">
	<div class="container my-5">
        <form  action="" method="post" >   
            <div class="form-group" id="user-group">
            <i class="fas fa-user"></i> <!-- <i class="fa-solid fa-circle-info"></i> -->                       
                <label>N° Exp</label>
                <input class="form-control" type="text" name="numexp" maxlenght="4"  value=<?php echo $id; ?> readonly>                
            </div>         
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                               
                <label>DNI</label>
                <input class="form-control" type="text" name="dni" maxlenght="8" placeholder="Ingrese tu dni">
            </div>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                                
                <label>Nombre de usuario</label>
                <input class="form-control" type="text" name="name" maxlenght="75" placeholder="Ingrese tu nombre">
            </div>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                                
                <label>Estado de Exp.</label>
                <input class="form-control" type="text" name="estado" maxlenght="25" placeholder="Ingrese tu estado proceso/otro">
            </div>
            <div class="form-group" id="user-group">
                <i class="fas fa-user"></i>                                
                <label>Pago de expediente</label>
                <input class="form-control" type="text" name="pago" maxlenght="25" placeholder="Ingrese tu pago pendiente/cancelado">
            </div>

            <button type="submit" class="btn btn-primary" name="submit" value="expediente">Actualizar</button>
            &nbsp;&nbsp;&nbsp;
            <button type="button" class="btn btn-primary" onclick="cerrar();">Cancelar</button>                    
        </form> 
        <script language="javascript" type="text/javascript"> 
    function cerrar() { 
        window.history.go(-1); //vuelve atrás
        return false;
    } 
</script>
    </div> 
</body>
</html>