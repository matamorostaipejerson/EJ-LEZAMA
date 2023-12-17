<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='lib/fullcalendar.min.css' rel='stylesheet' />
<link href='lib/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='lib/moment.min.js'></script>
<script src='lib/jquery.min.js'></script>
<script src='lib/fullcalendar.min.js'></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" ></script>
 
<script>
        $(document).ready(function () {
            $('#micalendarioweb').fullCalendar({
                header: {
                          left: 'today, prev,next,Miboton',
                          center: 'title',
                          right: 'month,basicWeek,basicDay,agendaWeek, agendaDay'
                        },                
                dayClick:function(date,jsEvent,view){ 
                          $('#txtFecha').val(date.format());                          
                          $("#ModalEventos").modal();
                        },               
                    
                events:'http://localhost/MVC_Web/Modelo/eventos.php',
                    
                eventClick:function(calEvent,jsEvent,view){
                      $('#tituloEvento').html(calEvent.title);
                      $('#descripcionEvento').html(calEvent.descripcion);
                      $("#exampleModal").modal();
                }  
            });
        }); 
</script>
 
<style> 
  body {
    margin: 40px 10px;
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  } 
  #calendar {
    max-width: 900px;
    margin: 0 auto;
  } 
</style>
</head>
<body>
 
<div id='micalendarioweb'></div>
<!--
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento">Agregar Titulo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="descripcionEvento"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success">Agregar</button>
        <button type="button" class="btn btn-success">Modificar</button>
        <button type="button" class="btn btn-danger">Modificar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>        
      </div>
    </div>
  </div>
</div>
-->
<!-- Modificar, eliminar, agregar -->
<div class="modal fade" id="ModalEventos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento">Agregar Titulo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="descripcionEvento"></div>

        Fecha: <input type="text" id="txtFecha" name="txtFecha" /><br>
        Título: <input type="text" id="txtTitulo" /><br>
        Hora: <input type="text" id="txtHora" value="10:30" /><br>
        Descripción: <textarea id="txtDescripcion" rows="3" ></textarea><br>
        Color: <input type="color" value="#ff0000" id="txtColor" /><br>


      </div>
      <div class="modal-footer">
        <button type="button" id="btnAgregar" class="btn btn-success">Agregar</button>
        <button type="button" class="btn btn-success">Modificar</button>
        <button type="button" class="btn btn-danger">Modificar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>        
      </div>
    </div>
  </div>
</div>
<script>
    $("#btnAgregar").click(function(){      
    var NuevoEvento={
      title:$('#txtTitulo').val(),
      descripcion:$('#txtDescripcion').val(),
      color:$('#txtColor').val(),
      start:$('#txtFecha').val()+" "+$('#txtHora').val(),  
      textColor:"#ffffff"    
    };
    $('#micalendarioweb').fullCalendar('renderEvent',NuevoEvento);        
    $("#ModalEventos").modal("toggle");
  });
</script>
</body>
</html>