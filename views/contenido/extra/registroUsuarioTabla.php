<?php
include 'models/clase.php';
$datos = verUsuarios();
?>

<table class="table table-striped table-bordered" id="myTabla">

        <thead>
            <tr>
                <th class="text-center">N°</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Usuario</th>
                <th class="text-center">Fecha de registro</th>
                <th class="text-center">Opciones</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $nro=0;
            while($ver = mysqli_fetch_array($datos)){ $nro++;
        ?>
            <tr>
                <td> <?php echo $nro; ?> </td>
                <td> <?php echo $ver[1]; ?> </td>
                <td> <?php echo $ver[2]; ?> </td>
                <td> <?php echo $ver[3]; ?> </td>
                <td class="text-center">
                <span class="btn btn-success btn-sm" onClick="verMas('<?php echo $ver[0]; ?>')" data-toggle="modal" data-target="#verUsuarios">
                    <span class="icon-zoom-in" title="Ver más"></span>
                </span>

                <span class="btn btn-danger btn-sm" onClick="borrar('<?php echo $ver[0]; ?>')">
                    <span class="icon-bin"></span>
                </span>
            </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
        
    </table>