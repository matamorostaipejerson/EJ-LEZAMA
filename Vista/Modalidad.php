<?php include '../Modelo/Conexion.php'; ?>

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
    &nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary" onclick="cerrar();">Volver</button> 
	<div class="container">
        <button class="btn btn-primary my-5"><a href="Modalidad_agrega.php" class="text-light">Añadir Expediente</a>
        </button>
        <button class="btn btn-secondary"><a href="#" class="text-light">Historial Usuario</a>
        <!-- <button class="btn btn-secondary"><a href="Modalidad_historial.php" class="text-light">Historial Usuario</a> -->
        </button>
        <img src="img/expediente1.png"/>

        <table class="table">
        <thead>
            <tr>
            <th scope="col">Expediente</th>
            <th scope="col">DNI</th>
            <th scope="col">Nombre Cliente</th>
            <th scope="col">Estado Expediente</th>
            <th scope="col">Pago Expediente</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM `expediente`";
                $result = mysqli_query($conn,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){    
                        $id= $row['idExpediente'];
                        $dni= $row['dniCliente'];
                        $nombre= $row['nomCliente'];
                        $estado= $row['estadoExpediente'];
                        $pago= $row['pagoExpediente'];  
                        echo '<tr>
                        <th scope="row">'.$id.'</th>
                        <td>'.$dni.'</td>
                        <td>'.$nombre.'</td>
                        <td>'.$estado.'</td>
                        <td>'.$pago.'</td>
                        <td>
                            <button class="btn btn-primary"><a href="Modalidad_actualiza.php?updateid='.$id.'" class="text-light">Actualizar</a></button>
                            <button class="btn btn-danger"><a href="Modalidad_elimina.php?deleteid='.$id.'" class="text-light">Borrar</a></button>
                        </td>
                        </tr>'; 
                    }                
                }
            ?>
        </tbody>
        </table> 
    </div> 
<script language="javascript" type="text/javascript"> 
    function cerrar() { 
        window.history.go(-1); //vuelve atrás
        return false;
    } 
</script>   
</body>
</html>