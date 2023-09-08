$(document).ready(function () {
    idX = $("#escuela_id_consulta").val();
    var miurl = "/listado-escuelas";

    $.ajax({
        url: miurl
    }).done(function (resul) {
        if (resul != null) {
            $("#escuela_id").empty();
            for (let i = 0; i < resul.length; i++) {
                if (resul[i].id == idX) {
                    $("#escuela_id").append("<option value='" + resul[i].id + "' selected>" + resul[i].nombre + "</option>");
                } else {
                    $("#escuela_id").append("<option value='" + resul[i].id + "'>" + resul[i].nombre + "</option>");
                }
            }
        }
    }).fail(function () {
        alert("Error desconocido");
    })
    
    if ($('#error-message').length) {
        setTimeout(function () {
            $('#error-message').addClass('hidden');
        }, 5000);
    }
});