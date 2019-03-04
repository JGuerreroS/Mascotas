<div class="card-header">
    Reporte mascotas
</div>

<div class="card-body">

    <!-- Agregar aqui el contenido -->

    <hr>

    <a href="reporte" target="_blank" class="btn btn-primary" id="pdf">PDF</a>

<?php
include 'models/clase.php';
$datos = verMascotas();
?>

<table class="table table-striped table-bordered" id="example">

    <thead>
        <tr>
            <th class="text-center">N°</th>
            <th class="text-center">Microchip</th>
            <th class="text-center">Nombre</th>
            <th class="text-center">Especie</th>
            <th class="text-center">Raza</th>
            <th class="text-center">Fecha de registro</th>
        </tr>
    </thead>

    <tbody>

    <?php
    $nro=0;
    while ($ver = mysqli_fetch_array($datos)) { 
        $nro++;
    ?>
        <tr>
            <td> <?php echo $nro;?> </td>
            <td class="text-center"> <?php echo $ver[1];?> </td>
            <td> <?php echo $ver[2];?> </td>
            <td> <?php echo $ver[3];?> </td>
            <td> <?php echo $ver[4];?> </td>
            <td class="text-center"> <?php echo str_replace('-', '/', date('d-m-Y', strtotime($ver[9]))); ?> </td>
        </tr>

    <?php } mysqli_free_result($datos); ?>

    </tbody>
    
</table>

    <!-- Hasta aqui el contenido -->
</div>

<script>
$(document).ready(function() {

    $('#example').DataTable( {
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

}); // Fin funcion ready

</script>