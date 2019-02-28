<div class="card-header">
    Otros parámetros
</div>

<div class="card-body">

<!-- Agregar aqui el contenido -->

<!-- Button del modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#otrosRazonModal">
    Registrar razón de tenencia
</button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#otrosObtencionModal">
    Registrar modo de obtención
</button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#otrosColorModal">
    Registrar colores
</button>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#otrosPatronModal">
    Registrar patron
</button>

<hr>

<?php
    include 'extra/otrosTabla.php'; //Cargar Tabla
    include 'extra/otrosModal.php'; //Cargar Modal
?>

<!-- Hasta aqui el contenido -->
</div>

    