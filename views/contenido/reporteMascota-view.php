<div class="card-header">
    Reporte mascotas
</div>

<div class="card-body">

    <!-- Agregar aqui el contenido -->

    <hr>

    <?php
	include 'extra/reporteMascotaTabla.php'; //Cargar Tabla
?>

    <!-- Hasta aqui el contenido -->
</div>

<script>
$(document).ready(function() {

    var table = $('#example').DataTable( {
            language: {
				"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
				},
				"oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
            },
            lengthChange: false,
            buttons: [{
                extend: 'pdfHtml5',
                download: 'open'
            }]
        });
    
        table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );

    //Función que carga dinamicamente las razas de las especies en registro de mascota
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

    $('#nombre,#rNombre').keyup(function() {
        this.value = (this.value + '').toUpperCase(); // Mayusculas
        this.value = (this.value + '').replace(/[^A-Z-Á-É-Í-Ó-Ú]/g, ' '); // Sin numeros
    });

    $('#micro').keyup(function() {
        this.value = (this.value + '').toUpperCase(); // Mayusculas
    });

    $("#guardar").hide();

    $("#editar").click(function(e) {

        $("#guardar").show();
        $("#rMicrochip,#rNacimiento,#rNombre,#rEspecie,#rRaza,#rSexo,#rEsterilizado,#rColor,#rPatron,#rPropietario").attr("disabled", false);
        e.preventDefault();

    });

    $("#guardar").click(function (e) {

        $.ajax({
            type: "post",
            url: "controllers/registroMascotaEditar.php",
            data: $("#frmEditMascota").serialize(),
            success: function (r) {
                if (r == 1) {
                    alertify.success('Datos actualizados corectamente');
                    setTimeout("location.reload()", 2000);
                } else {
                    alertify.error('No se pudieron actualizar los datos');
                }
            }
        });
        e.preventDefault();
        
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

}); // Fin funcion ready


function verMas(id) {
    $.getJSON("controllers/verMasMascotas.php", {
        mascota: id
    }, function(r) {

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

function borrar(id){

    alertify.confirm('Eliminar registro', '¿Seguro que deseas eliminar este registro?', function(){ 
    
    $.get("controllers/registroMascotaBorrar.php", {id_mascota : id}, function (r) {

        if(r == 1){

            alertify.success("Mascota eliminada con éxito");
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