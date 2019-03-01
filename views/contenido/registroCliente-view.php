<div class="card-header">
    Clientes
</div>

<div class="card-body">

    <!-- Agregar aqui el contenido -->

    <!-- Button del modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <span class="icon-user-plus"></span> Registrar cliente
    </button>

    <hr>

    <div id="clienteTabla"></div>

    <?php

    include 'extra/registroClienteModal.php'; //Cargar Modal
?>

    <!-- Hasta aqui el contenido -->
</div>

<script>
$(document).ready(function() {

    // cargar tabla de dueños
    $("#clienteTabla").load('views/contenido/extra/registroClienteTabla.php');

    $('#nombre,#apellido,#rNombre,#rApellidos').keyup(function() {
        this.value = (this.value + '').toUpperCase(); // Mayusculas
        this.value = (this.value + '').replace(/[^A-Z-Á-É-Í-Ó-Ú]/g, ' '); // Sin numeros
    });

    $('#direccion,#rDireccion').keyup(function() {
        this.value = (this.value + '').toUpperCase(); // Mayusculas
    });

    $("#guardar").hide();

    $("#editar").click(function (e) {

        $("#guardar").show();
        $("#rNombre,#rApellidos,#rRun,#rCorreo,#rDireccion").attr("disabled" , false);
        e.preventDefault();
        
    });


}); // fin Ready

function verMas(id) {

    $.getJSON("controllers/registroClienteVerMas.php", { id_cliente: id }, function(r) {

        $("#id_usuario").val(r.Id);
        $("#rNombre").val(r.Nombre).attr("disabled" , true);
        $("#rApellidos").val(r.Apellidos).attr("disabled" , true);
        $("#rRun").val(r.Run).attr("disabled" , true);
        $("#rCorreo").val(r.Mail).attr("disabled" , true);
        $("#rDireccion").val(r.Direccion).attr("disabled" , true);
        $("#rUsuario").html('Registrado por: ' + r.Usuario);
        $("#rFecha").html('Fecha de registro: ' + r.Fecha);


    });

}

function borrar(id) {

    alertify.confirm('Eliminar registro', '¿Seguro que deseas eliminar este registro?', function(){ 
    
        $.get("controllers/registroClienteBorrar.php", {id_cliente : id}, function (r) {

            if(r == 1){

                alertify.success("Registro eliminado con éxito");
                setTimeout("location.reload()", 2000);

            }else{
                alertify.error("No se pudo eliminar el registro");
            }

        });

    }
        , function(){

        });

}
    
</script>