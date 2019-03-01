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

    <?php include 'extra/registroClienteModal.php'; //Cargar Modal ?>

    <!-- Hasta aqui el contenido -->
</div>

<script>
$(document).ready(function() {

    // registrar clientes
    $('#btn-guardarCliente').click(function (e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: "controllers/registroCliente.php",
            data: $("#formRegistroCliente").serialize(),
            success: function (r) {
                if(r == 1){
                    $("#clienteTabla").load('views/contenido/extra/registroClienteTabla.php');
                    $("#formRegistroCliente")[0].reset();
                    $("#exampleModal").modal('hide');
                    alertify.success('Cliente registrado correctamente');
                }else if(r == 2){
                    alertify.error('No se pudo insertar el registro');
                }else{
                    alertify.warning('Formulario incompleto');
                }
            }
        });

    });

    
    // cargar tabla de dueños
    $("#clienteTabla").load('views/contenido/extra/registroClienteTabla.php');

    // Colocar en mayusculas y quitar numeros
    $('#nombre,#apellido,#rNombre,#rApellidos').keyup(function() {
        this.value = (this.value + '').toUpperCase(); // Mayusculas
        this.value = (this.value + '').replace(/[^A-Z-Á-É-Í-Ó-Ú]/g, ' '); // Sin numeros
    });

    // Colocar en mayusculas
    $('#direccion,#rDireccion').keyup(function() {
        this.value = (this.value + '').toUpperCase(); // Mayusculas
    });

    // Ocultar botón guardar al abrir modal de editar
    $("#guardar").hide();


    // Mostrar botón guardar y activar inputs al presionar editar
    $("#editar").click(function (e) {

        $("#guardar").show();
        $("#rNombre,#rApellidos,#rRun,#rCorreo,#rDireccion").attr("disabled" , false);
        e.preventDefault();
        
    });

    $("#guardar").click(function (e) {

        e.preventDefault();
        $.ajax({
            type: "post",
            url: "controllers/registroClienteEditar.php",
            data: $("#formEdit").serialize(),
            success: function (r) {
                if(r == 1){
                    $("#clienteTabla").load('views/contenido/extra/registroClienteTabla.php');
                    $("#m_verMas").modal('hide');
                    alertify.success('Registro actualizado con éxito');
                }else{
                    alertify.error('No se pudo actualizar el registro');
                }
            }
        });
        
    });


}); // fin Ready

// Cargar información en los inputs al abrir modal de editar
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