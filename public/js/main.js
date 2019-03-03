$(document).ready(function() {

    // cargar tabla de clientes
    $("#clienteTabla").load('views/contenido/extra/registroClienteTabla.php');
    // cargar tabla de mascotas
    $("#mascotasTabla").load('views/contenido/extra/registroMascotaTabla.php');

    /*Inicio de la Sección de Clientes en ready*/

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

    // Guardar cambios despues de editar
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
                    $("#guardar").hide();
                    alertify.success('Registro actualizado con éxito');
                }else{
                    alertify.error('No se pudo actualizar el registro');
                }
            }
        });
        
    });

    /*Fin de la Sección de Clientes en ready*/

/*------------------------------------------------------------------------------------------------------------*/
    
    /*Inicio de la Sección de Mascotas en ready*/

    // Función que carga dinamicamente las razas de las especies en registro de mascota
    $("#especie").change(function() {

        $("#especie option:selected").each(function() {
            especie = $(this).val();
            $.get("controllers/selectRaza.php", {
                id_especie: especie
            }, function(data) {
                $("#raza").html(data);
            });
        });

    });

    // Ocultar botón de guardar edición de mascota
    $("#guardarEdicionMascota").hide();

    // Al editar mascota
    $("#editarMascota").click(function(e) {

        $("#guardarEdicionMascota").show();
        $("#rMicrochip,#rNacimiento,#rNombre,#rEspecie,#rRaza,#rSexo,#rEsterilizado,#rColor,#rPatron,#rPropietario").attr("disabled", false);
        e.preventDefault();

    });

    // Convertir letras en mayuscula al escribir el microchip
    $('#micro,#rMicrochip').keyup(function() {
        this.value = (this.value + '').toUpperCase(); // Mayusculas
    });

    //Función que carga dinamicamente las razas de las especies en editar de mascota
    $("#rEspecie").change(function() {

        $("#rEspecie option:selected").each(function() {
            especie = $(this).val();
            $.get("controllers/selectRaza.php", {
                id_especie: especie
            }, function(data) {
                $("#rRaza").html(data);
            });
        });

    });

    // Guardar datos despues de editar la mascota
    $("#guardarEdicionMascota").click(function (e) {

        $.ajax({
            type: "post",
            url: "controllers/registroMascotaEditar.php",
            data: $("#frmEditMascota").serialize(),
            success: function (r) {
                if (r == 1) {
                    $("#verMascotas").modal('hide');
                    $("#guardarEdicionMascota").hide();
                    $("#mascotasTabla").load('views/contenido/extra/registroMascotaTabla.php');
                    alertify.success('Datos actualizados corectamente');
                } else {
                    alertify.error('No se pudieron actualizar los datos');
                }
            }
        });
        e.preventDefault();
        
    });

    // Registrar mascota
    $("#btn-registrarMascota").on("click", function(e){
        e.preventDefault();
        var formData = new FormData(document.getElementById("frmRegistroMascota"));
        $.ajax({
            url: "controllers/registroMascota.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(r){
                if(r == 1){
                    $("#registroMascotaModal").modal('hide');
                    $("#mascotasTabla").load('views/contenido/extra/registroMascotaTabla.php');
                    alertify.success("Registrado con éxito");
                }else if(r == 2){
                    alertify.message("Lo siento, el código de la mascota que intentas ingresar ya se encuentra registrado");
                }else if(r == 3){
                    alertify.error('No se pudo cargar el calidad del responsable, tipo de archivo no admitido o excede el peso maximo permitido (2 MB).');
                }else if(r == 4){
                    alertify.error('No se pudo cargar el certificado, tipo de archivo no admitido o excede el peso maximo permitido (2 MB).');
                }else{
                    alertify.error('Debes llenar todos los campos');
                }
            }
        });
    });

    /*Fin de la Sección de Mascotas en ready*/

}); //Fin de la function ready


/*--------------------------------Clientes---------------------------------------------*/

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

// Borrar registro
function borrar(id) {

    alertify.confirm('Eliminar registro', '¿Seguro que deseas eliminar este registro?', function(){ 
    
        $.get("controllers/registroClienteBorrar.php", {id_cliente : id}, function (r) {

            if(r == 1){

                $("#clienteTabla").load('views/contenido/extra/registroClienteTabla.php');
                alertify.success("Registro eliminado con éxito");

            }else{
                alertify.error("No se pudo eliminar el registro");
            }

        });

    }, function(){});

}

/*--------------------------------Clientes---------------------------------------------*/

/*--------------------------------Mascotas---------------------------------------------*/

function verMascota(id) {
    $.getJSON("controllers/verMasMascotas.php", { mascota: id }, function(r) {

        $("#id_mascota").val(r.idMascota);
        $("#rMicrochip").val(r.Microchip).attr("disabled", true);
        $("#rNombre").val(r.Nombre).attr("disabled", true);
        $("#rEspecie").val(r.idEspecie).attr("disabled", true);
        $("#rRaza").val(r.Raza).attr("disabled", true);
        $("#rSexo").val(r.Sexo).attr("disabled", true);
        $("#rEsterilizado").val(r.Esterilizado).attr("disabled", true);
        $("#rNacimiento").val(r.Nacimiento).attr("disabled", true);
        $("#rColor").val(r.Color).attr("disabled", true);
        $("#rPatron").val(r.Patron).attr("disabled", true);
        $("#rPropietario").val(r.Propietario).attr("disabled", true);
        $("#rUsuario").html('Usuario: ' + r.Usuario);
        $("#rFechaRegistro").html('Fecha de registro: ' + r.FechaRegistro);
        $("#rCertificado").attr('href', r.Certificado);
        $("#rCalidad").attr('href', r.Calidad);

    });
}

function borrarMascota(id){

    alertify.confirm('Eliminar registro', '¿Seguro que deseas eliminar este registro?', function(){ 
    
    $.get("controllers/registroMascotaBorrar.php", {id_mascota : id}, function (r) {

        if(r == 1){

            $("#mascotasTabla").load('views/contenido/extra/registroMascotaTabla.php');
            alertify.success("Mascota eliminada con éxito");

        }else{

            alertify.error("No se pudo eliminar el registro");
            
        }

    });

}, function(){});

}

/*--------------------------------Mascotas---------------------------------------------*/