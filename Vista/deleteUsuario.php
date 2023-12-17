<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['validaciondeenvio'] == 'si') {
        include('../Modelo/Conexion.php');  
            $idUsuarioEliminar =$_SESSION["idUsuarioLogueado"];
            echo "sesion: ".$idUsuarioEliminar;
            $sql="DELETE FROM 'personal' WHERE 'id_personal' = $idUsuarioEliminar";
            
            $result=mysqli_query($conn,$sql);
            if($result){
                echo("Usuario eliminado correctamente de Personal!!!");
                // header('location:Perfil.php');
            }else{
                die(mysqli_error($conn));
            }
            //Eliminamos tambien de la tabla usuario para que no pueda acceder al sistema
            $sql1="DELETE FROM 'usuario' WHERE 'id_personal' = $idUsuarioEliminar";
            
            $result1=mysqli_query($conn,$sql1);
            if($result1){
                echo("Usuario eliminado correctamente de Usuario!!!");
                // header('location:Perfil.php');
            }else{
                die(mysqli_error($conn));
            }
    }else{
        echo 'Se esta invocando esta página erroneamente.';
    }
}
?>