<?php
include '../Modelo/Conexion.php';
error_reporting(0);
$flag = 0;
if (isset($_POST['submit'])) {
    $dni = $_POST['usernameDni'];
    $eleccion = $_POST['misprocesos'];
    $flag = 1;

    // Obtener el nombre del cliente según el DNI
    $sql_nombre = "SELECT nomCliente FROM expediente WHERE dniCliente = $dni LIMIT 1";
    $result_nombre = mysqli_query($conn, $sql_nombre);
    if ($result_nombre && mysqli_num_rows($result_nombre) > 0) {
        $row_nombre = mysqli_fetch_assoc($result_nombre);
        $nombre = $row_nombre['nomCliente'];
    }

    // Mapear los idProceso a los nombres de proceso correspondientes
    $idProcesoNombres = array(
        11 => "Civil",
        12 => "Laboral",
        13 => "Penal"
    );
    $tipoProceso = isset($idProcesoNombres[$eleccion]) ? $idProcesoNombres[$eleccion] : "Desconocido";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SISTEMA INTEGRAL JPCL - GESTION DE REPORTES</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/047316aeb8.js" crossorigin="anonymous"></script>
    <link href="css/estilos.css" rel="stylesheet" />
</head>

<body style="background-image: url('img/fondo_duotono.jpg')">
<div class="container">
    <button class="btn btn-primary my-5" type="submit" name="submit" value="Buscar" onclick="redirigirAbogado()">Volver</button>

    <script>
        function redirigirAbogado() {
            window.location.href = "abogado.php";
        }
    </script>
    <h3 style="text-align: center;">INFORMACIÓN DE REPORTES</h3>
    <form action="" method="post">
        <div class="form-group" id="user-group">
            <i class="fas fa-sticky-note"></i>
            <label for="exampleInputEmail1">DNI:</label>
            <input class="form-control" type="text" name="usernameDni" id="usernameDni" placeholder="Ingrese su DNI">
        </div>
        <br>
        <div class="form-group" id="contrasena-group">
            <i class="fas fa-server"></i>
            <label for="exampleInputPassword1">Proceso:</label>
        </div>
        <div>
            <select name="misprocesos" id="misprocesos" class="form-select">
                <option value="0" selected="true" disabled="disabled">Selecciona procesos</option>
                <option value="11">Civil</option>
                <option value="12">Laboral</option>
                <option value="13">Penal</option>
                <option value="4">Todos</option>
            </select>
        </div>
        <button class="btn btn-primary my-5" type="submit" name="submit" value="Buscar">Buscar
        </button>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Reportes</th>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Estado</th>
            <th scope="col">Pago</th>
            <th scope="col">Audiencias</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($flag == 1) {
            $cuenta = 1;
            if ($eleccion == 4) {
                $sql = "SELECT expediente.*, proceso.nomProceso 
                        FROM expediente 
                        INNER JOIN proceso ON expediente.idProceso = proceso.idProceso";
            } else {
                $sql = "SELECT * FROM expediente WHERE dniCliente = $dni AND nomCliente = '$nombre' AND idProceso = $eleccion";
            }
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $estado = $row['estadoExpediente'];
                    $pago = $row['pagoExpediente'];
                    $fechaAudiencia = $row['diaAudiencia'];
                    $nomCliente = $row['nomCliente'];
                    $dniCliente = $row['dniCliente'];
                    $tipoProceso = isset($row['nomProceso']) ? $row['nomProceso'] : "Desconocido";
                    ?>
                    <tr>
                        <th scope="row"><?php echo $cuenta; ?></th>
                        <td><?php echo $dniCliente; ?></td>
                        <td><?php echo $nomCliente; ?></td>
                        <td><?php echo $estado; ?></td>
                        <td><?php echo $pago; ?></td>
                        <td><?php echo $fechaAudiencia; ?></td>
                    </tr>
                    <?php
                    $cuenta++;
                }
            }
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
