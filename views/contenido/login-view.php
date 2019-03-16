<!doctype html>
<html lang="es">

<head>
    <title>Inicio de sesión</title>
    <!-- Icono de la pestaña de la página -->
    <link rel="icon" type="image/png" href="<?php echo SERVERURL; ?>public/img/mascota.ico">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>public/css/estilos_login.css">

    <!-- Jquery -->
    <script src="<?php echo SERVERURL; ?>public/lib/jquery.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="loginBox"><br>
                        <img src="public/img/2.png" class="img-responsive">

                        <div id="aviso" style="background-color: red; color: white; font-size: 16px; font-weight: bold; border-radius: 4px;">Error de usuario o contraseña</div>

                        <form id="formLogin" method="post">

                            <label style="margin-right: 300px;">Usuario</label>
                            <input type="email" class="form-control" name="user" placeholder="Usuario" required>
                            <hr>
                            <label style="margin-right: 300px;">Contraseña</label>
                            <input type="password" class="form-control" name="password" placeholder="Contraseña"
                                required>
                            <hr>

                            <button type="submit" class="btn btn-success btn-block" id="iniciar">Iniciar sesión</button>
                            <br>
                        </form>

                    </div><!-- /.loginBox -->
                </div><!-- /.card -->
            </div><!-- /.col -->
        </div>
        <!--/.row-->
    </div><!-- /.container -->
    <script>
    $(document).ready(function() {

		$("#aviso").hide();

        $("#iniciar").click(function() {

            $.ajax({
                type: "post",
                url: "./controllers/check-login.php",
                data: $("#formLogin").serialize(),
                success: function(r) {
                    if (r == 2) {

						$("#aviso").fadeIn();
						$('#aviso').fadeOut(3000);

                    } else {

                        window.location.href = "inicio";
						
                    }
                }
            }); //ajax
            return false;

        }); //click
    }); // ready
    </script>
</body>

</html>