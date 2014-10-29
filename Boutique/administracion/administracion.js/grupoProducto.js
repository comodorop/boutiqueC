$(document).ready(function () {
    $("#btnGuardarGrupo").click(function () {
        var nombreGrupo = $("#txtnombreGrupo").val().toUpperCase();
        if (nombreGrupo == "") {
            alertify.error("Se requiere una Talla");
        }
        else {
            var info = "nombreTalla=" + nombreGrupo;

            $.get('guardarTalla.php', info, function (status) {
                if (status == 0) {
                    $("#selectGrupo").load("mostrarTallas.php", function () {
                        $("#selectGrupo").selectpicker('refresh');
                    });
                    alertify.success("Se guardo el grupo exitosamente");
                    $("#txtnombreGrupo").val("");
                }
                else {
                    alertify.error(status);
                }
            });
        }
    });


    $("#btnGuardarTipo").click(function () {
        var nombreGrupo = $("#txtnombreGrupoTipo").val().toUpperCase();
        if (nombreGrupo == "") {
            alertify.error("Todos los campos son obligatorios");
        }
        else {
            var info = "nombreGrupo=" + nombreGrupo;
            $.get('guardarGrupo.php', info, function (status) {
                if (status == 0) {
                    $("#tipoProducto").load("mostrarGrupos.php", function () {
                        $("#tipoProducto").selectpicker('refresh');
                    });
                    alertify.success("Se guardo el grupo exitosamente");
                    $("#txtnombreGrupoTipo").val("");
                }
                if (status == 999) {
                    $("#tipoProducto").load("mostrarGrupos.php", function () {
                        $("#tipoProducto").selectpicker('refresh');
                    });
                    $("#txtnombreGrupoTipo").val("");
                    alertify.error("Ya existe eleste grupo");
                }

            });
        }
    });





});
