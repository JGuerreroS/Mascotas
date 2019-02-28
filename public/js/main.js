$(document).ready(function() {

    // DataTables
    $('#myTabla').DataTable({
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
        }
    });

    // Guardar categoria de los productos
    $('#saveCategoria').click(function () { 

        var cat = $("#categoria").val();
        
        $.getJSON("./models/categoria.php", { Categoria : cat }, function (r) {

            if(r == 1){

                alertify.success("Categoria cargada con éxito.");
                setTimeout(function(){
                    window.location.reload(1);
                 }, 2000);

            }else{

                alertify.error('Error al cargar');

            }

        });

        return false;

    });

    // Guardar productos
    $('#saveNewProducto').click(function () { 

        var datos = $("#frmNewProducto").serialize();

        $.getJSON("./models/productos.php", datos, function (r) {

            if(r == 1){

                alertify.success("Nuevo producto cargado con éxito.");
                setTimeout(function(){
                    window.location.reload(1);
                 }, 2000);

            }else{

                alertify.error('Error al cargar');

            }

        });

        return false;

    });

    
    // Editar producto
    function editarProducto(id){ //al pulsa el boton + se envia al servidor el valor id para que devuelva los demás datos del registro
        $.getJSON("../controller/funciones.php", { Id : id }, procesarDatos);
    }

    //función que recibe los datos del servidor
    function procesarDatos(r){ //r es respuesta o datos devueltos de funciones.php
        $("#rCedula").html("Cédula: " + r.Cedula);
        $("#rNombre").html("Nombres y apellidos: " + r.Nombre);
        $("#rRol").html("Rol: " + r.Rol);
        $("#rEstatus").html("Estatus: " + r.Estatus);
        $("#rDependencia").html("Dependencia: " + r.Dependencia);
        $("#rFecha").html("Fecha de registro: " + r.Fecha);
    }

}); //Fin de la function ready
