<?php
    error_reporting(0); //ocultamos advertencias
    if(isset($_POST['submit'])){
        $nomarchivo =$_POST['nomarchivo'];        
        unlink("../Archivos/".$nomarchivo);       
    }
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <script src="js/bootstrap.min.js"></script>	
    <link href="css/estilos.css" rel="stylesheet" /> 
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <title>Envio de documentos</title>
    <style type="text/css">
        *{ font-family:Segoe, "Segoe UI", "DejaVu Sans", "Trebuchet MS", Verdana, sans-serif}
        .main{ margin:auto; border:1px solid #7C7A7A; width:40%; text-align:left; padding:30px; background:#e7d4c0}
        input[type=submit]{ background:#6ca16e; width:100%;
            padding:5px 15px; 
            background:#ccc; 
            cursor:pointer;
            font-size:16px;
        }
    </style>
</head>

<body style="background-image: url('img/fondo_duotono.jpg')">
    &nbsp;&nbsp;&nbsp;
    <button type="button" class="btn btn-primary" onclick="cerrar();">Volver</button> 
    <div class="main">
    <h4>Enviar un Documento</h4>
    <br>
    <form enctype="multipart/form-data" action="../Controlador/carga.php" method="POST">
        <input type="hidden" name="MAX_FILE_SIZE" value="5120000" />
    <p><input name="subir_archivo" type="file" /></p>
    <p> <input type="submit" value="Enviar Archivo" /></p>
    </form>
    </div>
    <hr>
    <form  action="" method="post" >   
                <div class="form-group" id="user-group">                                  
                    <label><b>Escribir Archivo a Borrar:</b></label>
                    <input style="width:300px;" class="form-control" type="text" name="nomarchivo" maxlenght="100" placeholder="Ingrese su nombre de archivo a borrar">
                </div>
                <button type="submit" class="btn btn-primary" name="submit" value="eliminar">Eliminar Archivo</button>
    </form>
    <hr>
    <label>
        <b>LISTAR DE ARCHIVOS/DOCUMENTOS SUBIDOS</b>
    </label>
    <ul> 
            <?php 
            $directorio = "../Archivos";
            $ficheros = scandir($directorio); 
            foreach ($ficheros as $key => $fichero) {
                if ($fichero != "." && $fichero != "..") { 
                    $rutaCompleta = $directorio . '/' . $fichero; 
                    if (is_file($rutaCompleta)) {
                    ?>
                        <li>
                            <img width="10px" height="10px" src="img/file.png">
                            <?php echo $fichero; ?>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li>
                            <img width="10px" height="10px" src="img/folder.png">
                            <?php echo $fichero; ?>
                        </li>
                    <?php
                    }
                }
            }
            ?>
    </ul>
<script language="javascript" type="text/javascript"> 
    function cerrar() { 
        window.history.go(-1); //vuelve atrás
        return false;
    } 
</script> 
</body>
</html>