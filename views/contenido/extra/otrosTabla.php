<?php
include 'models/clase.php';
$razon = verRazon();
$obtencion = verObtencion();
$colores = verColores();
$patron = verPatron();
?>

<div class="row">

    <div class="col-sm-3">

        <table class="table table-striped table-bordered" id="">

            <thead>
                <tr>
                    <th class="text-center">N°</th>
                    <th class="text-center">Razón de tenencia</th>
                </tr>
            </thead>

            <tbody>

                <?php

                    while ($ver = mysqli_fetch_array($razon)) { 

                ?>
                <tr>
                    <td> <?php echo $ver[0];?> </td>
                    <td> <?php echo $ver[1];?> </td>

                </tr>

                <?php } mysqli_free_result($razon); ?>

            </tbody>

        </table>

    </div>

    <div class="col-sm-3">
    
        <table class="table table-striped table-bordered" id="">

            <thead>
                <tr>
                    <th class="text-center">N°</th>
                    <th class="text-center">Método de obtención</th>
                </tr>
            </thead>

            <tbody>

                <?php

                    while ($fila = mysqli_fetch_array($obtencion)) { 

                ?>

                <tr>
                    <td> <?php echo $fila[0];?> </td>
                    <td> <?php echo $fila[1];?> </td>

                </tr>

                <?php } mysqli_free_result($obtencion); ?>

            </tbody>

        </table>

    </div>

    <div class="col-sm-3">
    
        <table class="table table-striped table-bordered" id="">

            <thead>
                <tr>
                    <th class="text-center">N°</th>
                    <th class="text-center">Colores</th>
                </tr>
            </thead>

            <tbody>

                <?php

                    while ($fila = mysqli_fetch_array($colores)) { 

                ?>

                <tr>
                    <td> <?php echo $fila[0];?> </td>
                    <td> <?php echo $fila[1];?> </td>

                </tr>

                <?php } mysqli_free_result($colores); ?>

            </tbody>

        </table>

    </div>

    <div class="col-sm-3">
    
        <table class="table table-striped table-bordered" id="">

            <thead>
                <tr>
                    <th class="text-center">N°</th>
                    <th class="text-center">Patron</th>
                </tr>
            </thead>

            <tbody>

                <?php

                    while ($fila = mysqli_fetch_array($patron)) { 

                ?>

                <tr>
                    <td> <?php echo $fila[0];?> </td>
                    <td> <?php echo $fila[1];?> </td>

                </tr>

                <?php } mysqli_free_result($patron); ?>

            </tbody>

        </table>

    </div>

</div>

