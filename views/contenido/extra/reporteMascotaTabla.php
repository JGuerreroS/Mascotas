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