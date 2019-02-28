    <div class="card-header">
        Usuarios
    </div>

    <div class="card-body">

        <!-- Agregar aqui el contenido -->

        <!-- Button del modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <span class="icon-user-plus"></span> Registrar Usuario
        </button>

        <hr>

        <?php
        include 'extra/registroUsuarioTabla.php'; //Cargar Tabla
        include 'extra/registroUsuarioModal.php'; //Cargar Modal
    ?>

        <!-- Hasta aqui el contenido -->
    </div>

    <script>
$(document).ready(function() {
    // función para comprobar la contraseña
    var pass1 = $('[name=pass1]');
    var pass2 = $('[name=pass2]');
    var confirmacion = "Las contraseñas coinciden!";
    var longitud = "La contraseña debe estar formada entre 6-10 carácteres";
    var negacion = "No coinciden las contraseñas";
    var vacio = "La contraseña no puede estar vacía";
    //oculto por defecto el elemento span
    var span = $('<span></span>').insertAfter(pass2);
    span.hide();
    //función que comprueba las dos contraseñas
    function coincidePassword() {

        var valor1 = pass1.val();
        var valor2 = pass2.val();
        //muestro el span
        span.show().removeClass();
        //condiciones dentro de la función
        if (valor1 != valor2) {
            span.text(negacion);
            $("#pass1,#pass2").addClass('is-invalid');
            $('#enviar').attr("disabled", true);
        }
        if (valor1.length == 0 || valor1 == "") {
            span.text(vacio);
            $("#pass1").addClass('is-invalid');
            $('#enviar').attr("disabled", true);
        }
        if (valor1.length < 6 || valor1.length > 10) {
            span.text(longitud).addClass('negacion');
            $("#pass1").addClass('is-invalid');
            $('#enviar').attr("disabled", true);
        }
        if (valor1.length != 0 && valor1 == valor2 && valor1.length > 5 && valor1.length < 11) {
            span.text(confirmacion);
            $("#pass1,#pass2").removeClass('is-invalid');
            $("#pass1,#pass2").addClass('is-valid');
            $('#enviar').attr("disabled", false);
        }

    }
    //ejecuto la función al soltar la tecla
    pass2.keyup(function() {
        coincidePassword();
    });

    // función para las mayusculas
    $('#nombre,#vNombre').keyup(function() {
        this.value = (this.value + '').toUpperCase(); // Mayusculas
        this.value = (this.value + '').replace(/[^A-Z-Á-É-Í-Ó-Ú]/g, ' '); // Sin numeros
    });

    $("#guardar").hide();

    $("#editar").click(function(e) {

        $("#guardar").show();
        $("#vNombre,#vUsuario,#vNivel,#vFecha").attr('disabled', false);
        e.preventDefault();

    });

}); // ready

function verMas(id) {
    $.getJSON("controllers/registroUsuarioVerMas.php", {
        usuario: id
    }, function(r) {

        $("#vNombre").val(r.Nombre).attr('disabled', true);
        $("#vUsuario").val(r.Usuario).attr('disabled', true);
        $("#vNivel").val(r.Nivel).attr('disabled', true);
        $("#id_usuario").val(r.IdUsuario);
        $("#vFecha").html('Fecha de registro: ' + r.Fecha);

    });
}

function borrar(id) {

    alertify.confirm('Eliminar registro', '¿Seguro que deseas eliminar este registro?', function() {

        $.get("controllers/registroUsuarioBorrar.php", { id_usuario: id }, function(r) {

            if (r == 1) {

                alertify.success("Usuario eliminado con éxito");
                setTimeout("location.reload()", 2000);

            } else {
                alertify.error("No se pudo eliminar el registro");
            }

        });

    }, function() {

    });

}
    </script>