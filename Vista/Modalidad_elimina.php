<?php
    include('../Modelo/Conexion.php');
    if(isset($_GET['deleteid'])){
        $id =$_GET['deleteid'];        

        $sql="DELETE FROM `expediente` WHERE idExpediente = $id";

        $result=mysqli_query($conn,$sql);
        if($result){
            header('location:Modalidad.php');
        }else{
            die(mysqli_error($conn));
        }
    }
?>