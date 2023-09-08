$(document).ready(function () {
    var tamanoMinimo = 200;

    $("#logotipo").on("change", function () {
        if (this.files && this.files[0]) {
            imagenCargada(this.files[0]);
        }
    });

    function imagenCargada(imgCargada) {
        var img = new Image();
        img.src = URL.createObjectURL(imgCargada);

        img.onload = function () {
            var anchoImagen = this.width;
            var altoImagen = this.height;

            if (anchoImagen > tamanoMinimo && altoImagen > tamanoMinimo) {
                $("#msgImagen").hide();
            } else {
                $("#msgImagen").show();
                $("#msgImagen").html("<div class='alert alert-danger'>La imagen seleccionada debe poseer un alto y un ancho superior a 200 pixeles</div>");
                $("#logotipo").val("");
            }
        };
    }
});