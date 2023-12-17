<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>SECRETARIA</title>
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <!--Estilos de BootStrap para mejora de apariencia-->
  <link href="css/bootstrap.min.css" rel="stylesheet" />
  <script src="js/bootstrap.min.js"></script>
  <script src="js/scripts.js"></script>
  <!--Fin de importación-->
  <script src="https://kit.fontawesome.com/047316aeb8.js" crossorigin="anonymous"></script>
  <link href="css/secretaria.css" rel="stylesheet" />

  <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet"
    id="bootstrap-css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!-- PARA EL CALENDARIO-->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">

  <link href='lib/fullcalendar.min.css' rel='stylesheet' />
  <link href='lib/fullcalendar.print.min.css' rel='stylesheet' media='print' />
  <script src='lib/moment.min.js'></script>
  <script src='lib/jquery.min.js'></script>
  <script src='lib/fullcalendar.min.js'></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
  <script src="js/abogado.js"></script>


</head>

<body>
  <header>
    <div class="row">
      <div class="col-sm"></div>
      <div class="col-sm">
        <p class="titulo1" style="margin-top: 25px; font-size: 23px;margin-left:-60px;   color: white;;">ESTUDIO JURÍDICO LEZAMA - SECRETARIA</p>
      </div>
      <div class="col-sm">
        <i class="fas fa-user"></i>&nbsp;
        <a target="_blank" style="color: white;" href="Perfil.php?var1=secretaria&var2=admin">PERFIL SECRETARIA</a>
      </div>
    </div>
  </header>
  <section class="contenido">
    <div id="contenedor">
      <div class="left-section">
        <img class="abogado" src="img/secretaria.png">
        <ul class="navegador">
          <li><a href="#">Inicio</a></li>
          <li class="dropdown">
            <a href="#" class="modalidad-btn">Modalidad</a>
            <div class="dropdown-content">
              <a href="Modalidad_c.php">Proceso Civil</a>
              <a href="Modalidad_p.php">Proceso Penal</a>
              <a href="Modalidad_l.php">Proceso Laboral</a>
            </div>
          </li>
          <!--<li><a href="../index.php">Cerrar Sesión</a></li>-->
          <li><a href="#" onclick="cerrarSesion();">Cerrar Sesión</a></li>

            <script>
            function cerrarSesion() {
                if (confirm("¿Estás seguro de que deseas cerrar sesión?")) {
                window.location.href = "../index.php";
                }
            }
            </script>
        </ul>
      </div>
      <div class="right-section">
        <div style="width: 100%; max-width: 78.5%; background-color: #dde1e5;">
          <div id='micalendarioweb'></div>
        </div>
        <div class="modal fade"
          style="background-color: #86aac1; flex-direction: column; margin: auto; align-items: center; justify-content: center; text-align: center; width: 50%; height: 80%; margin-top: 200px; margin-left: 340px;"
          id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header" style="background-color: #cccccc;">
                <h5 class="modal-title" id="tituloEvento"><b>Agregar Expediente Programado</b></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table style="border: 10px;">
                  <tr>
                    <td style="text-align: right;" width="150px"><b>Id:</b>&nbsp;&nbsp;</td>
                    <td><input type="text" id="txtID"></td>
                  </tr>
                  <tr>
                    <td style="text-align: right;"><b>Fecha:</b>&nbsp;&nbsp;</td>
                    <td><input style="font-weight: bold;" type="text" id="txtFecha" name="txtFecha" />
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align: right;"><b>Título:</b>&nbsp;&nbsp;</td>
                    <td><input type="text" id="txtTitulo" /></td>
                  </tr>
                  <tr>
                    <td style="text-align: right;"><b>Hora:</b>&nbsp;&nbsp;</td>
                    <td><input type="text" id="txtHora" value="10:30" /></td>
                  </tr>
                  <tr>
                    <td style="text-align: right;"><b>Descripción:</b>&nbsp;&nbsp;</td>
                    <td><textarea id="txtDescripcion" rows="3"></textarea></td>
                  </tr>
                  <tr>
                    <td style="text-align: right;"><b>Color:</b>&nbsp;&nbsp;</td>
                    <td><input type="color" value="#00ff00" id="txtColor" /></td>
                  </tr>
                  <tr>
                    <td style="text-align: right;"><b>Tipo de proceso (Penal-Civil-Laboral):</b>&nbsp;&nbsp;</td>
                    <td><input type="text" id="txtTipoproceso" /></td>
                  </tr>
                </table>
              </div>
              <div class="modal-footer">
                <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
                <button type="button" id="btnModificar" class="btn btn-warning">Modificar</button>
                <button type="button" id="btnEliminar" class="btn btn-danger">Eliminar</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="js/abogado.js"></script>

</body>

</html>