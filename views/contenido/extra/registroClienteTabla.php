<table class="table table-striped table-bordered" id="myTabla">

    <thead>
        <tr>
            <th class="text-center">N°</th>
            <th class="text-center">Nombre y Apellidos</th>
            <th class="text-center">Run</th>
            <th class="text-center">Email</th>
            <th class="text-center">Dirección</th>
            <th class="text-center">Opciones</th>
        </tr>
    </thead>

    <tbody>

        <?php
    $nro=0;
    include '../../../models/clase.php';

$datos = verClientes();
    while ($ver = mysqli_fetch_array($datos)) { 
        $nro++; $id=$ver[0];
    ?>
        <tr>
            <td> <?php echo $nro; ?> </td>
            <td> <?php echo $ver[1]; ?> </td>
            <td class="text-center"> <?php echo $ver[2];?> </td>
            <td> <?php echo $ver[3];?> </td>
            <td> <?php echo $ver[4];?> </td>
            <td class="text-center">
                <span class="btn btn-success btn-sm" onClick="verMas('<?php echo $id; ?>')" data-toggle="modal" data-target="#m_verMas">
                    <span class="icon-zoom-in"></span>
                </span>

                <span class="btn btn-danger btn-sm" onClick="borrar('<?php echo $id; ?>')">
                    <span class="icon-bin"></span>
                </span>
            </td>
        </tr>

        <?php } mysqli_free_result($datos); ?>

    </tbody>

</table>