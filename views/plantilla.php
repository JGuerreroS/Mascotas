<?php

    require_once './controllers/vistasControlador.php';

    $vt = new vistasControlador();

    $vistasR = $vt->obtener_vistas_controlador();

    if($vistasR == 'login'):
        require_once './views/contenido/login-view.php';
    else:

?>

<?php
    session_start();
    include 'layout/header.php';
?>

<?php require_once $vistasR; ?>

</div> <!-- Cierre del Div Container, abierto en Header.php, antes del menú -->



        <div class="card-footer text-muted text-center">
            Municipalidad Graneros © <?php echo date('Y')."."?>
        </div>

    </div> <!-- Fin de la tarjeta-->

    <?php endif; ?>
    
</body>
</html>