
$(document).ready(function () {
    $('#micalendarioweb').fullCalendar({
        header: {
            left: 'today, prev,next',
            center: 'title',
            right: 'month,basicDay,agendaWeek, agendaDay'
        },
        dayClick: function (date, jsEvent, view) {
            $('#txtFecha').val(date.format());
            $("#ModalEventos").modal();
        },

        events: 'http://localhost/MVC_Web/Modelo/eventos.php',

        eventClick: function (calEvent, jsEvent, view) {

            //H2
            $('#tituloEvento').html(calEvent.title);

            //Mostrar en inputs                        
            $('#txtID').val(calEvent.id);
            $('#txtDescripcion').val(calEvent.descripcion);
            $('#txtTitulo').val(calEvent.title);
            $('#txtColor').val(calEvent.color);
            FechaHora = calEvent.start._i.split(" ");
            $('#txtFecha').val(FechaHora[0]);
            $('#txtHora').val(FechaHora[1]);

            $('#ModalEventos').modal();

            //   $('#descripcionEvento').html(calEvent.descripcion);
            //   $("#exampleModal").modal();
        }
    });
}); 
/*     */

var NuevoEvento;
$("#btnAgregar").click(function () {
    RecolectarDatosGUI();
    EnviarInformacion('agregar', NuevoEvento);
});

$("#btnEliminar").click(function () {
    RecolectarDatosGUI();
    EnviarInformacion('eliminar', NuevoEvento);
});

$("#btnModificar").click(function () {
    RecolectarDatosGUI();
    EnviarInformacion('modificar', NuevoEvento);
});

function RecolectarDatosGUI() {
    NuevoEvento = {
        id: $('#txtID').val(),
        title: $('#txtTitulo').val(),
        descripcion: $('#txtDescripcion').val(),
        color: $('#txtColor').val(),
        start: $('#txtFecha').val() + " " + $('#txtHora').val(),
        end: $('#txtFecha').val() + " " + $('#txtHora').val(),
        textColor: "#ffffff",
        tipoproceso: $('#txtTipoproceso').val()
    };
}

function EnviarInformacion(accion, objEvento) {
    $.ajax({
        type: 'POST',
        url: '../Modelo/eventos.php?accion=' + accion,
        data: objEvento,
        success: function (msg) {
            if (msg) {
                $('#micalendarioweb').fullCalendar('refetchEvents');
                $("#ModalEventos").modal("toggle");
            }
        },
        error: function () {
            alert("Hay un error...");
        }
    });
}

  
