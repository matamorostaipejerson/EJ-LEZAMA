<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['validaciondeenvio'] == 'si') {
        include('../Modelo/Conexion.php');
        $numid = $_POST['numid'];
        $nombre = $_POST['nombres'];
        $apep = $_POST['apellidos'];
        $celular = $_POST['celular'];
        $tdocumento = '20001'; //tipo defecto 20001 es el DNI no se considera extranjeros
        $ndocumento = $_POST['ndocumento'];
        $sexo = $_POST['sexo'];
        $nacimiento = $_POST['nacimiento'];
        $fotourl = 'mirutaafoto'; //la direccion de su foto POR IMPLEMENTAR...
        $mail = $_POST['mail'];
        $estado = '1'; //1 activo - 0 desactivado desde bd
        $observaciones = 'Bueno'; //Bueno malo

        // Insertamos un nuevo personal a la base de datos CONSIDERAMOS QUE TODO PERSONAL TIENE USUARIO
        $sql = "INSERT INTO `personal`(`id_personal`, `per_nombre`, `per_apepaterno`, `per_celular`, `id_docidentidad`,`per_numdocumento`,`per_sexo`,`per_fechnacimiento`,`per_fotourl`,`per_email`,`per_estado`,`per_observaciones`) 
                VALUES ('$numid','$nombre','$apep','$celular','$tdocumento','$ndocumento','$sexo','$nacimiento','$fotourl','$mail','$estado','$observaciones')";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_affected_rows($conn) > 0) {
            $nusuario = $_POST['usuario'];
            $ncontrasena = $_POST['contrasena'];
            $ntipousuario = $_POST['tipousuario'];

            $nntipousuario = '10001'; // Valor predeterminado

            if ($ntipousuario == "A") {
                $nntipousuario = '10001';
            } elseif ($ntipousuario == "S") {
                $nntipousuario = '10002';
            }

            // Insertamos un nuevo usuario a la base de datos
            $sql1 = "INSERT INTO `usuario`(`usu_codigo`, `usu_password`, `usu_estado`, `id_perfilusuario`, `id_personal`) 
                     VALUES ('$nusuario','$ncontrasena','1','$nntipousuario','$numid')";
            $result1 = mysqli_query($conn, $sql1);

            if ($result1 && mysqli_affected_rows($conn) > 0) {
                echo "Registrado correctamente";
                header('location:Perfil.php?varretorna=retorna');
            } else {
                echo "Error al insertar usuario en la base de datos.";
            }
        } else {
            echo "Error al insertar personal en la base de datos.";
        }
    }
} else {
    echo 'Se está invocando esta página erróneamente.';
}
?>
