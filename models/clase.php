<?php

    function cargarClientes($datos){

        include '../core/conexion.php';

        $sql = "insert into clientes (nombre, apellidos, run, email, direccion, id_usuario, fecha_registro) values ('$datos[nombre]', '$datos[apellido]', '$datos[run]', '$datos[email]', '$datos[direccion]', $datos[usuario], '$fecha')";

        $result = mysqli_query($conn, $sql);

        return $msg = "<script>
                            alert('Registro realizado con éxito');
                            window.location='../registroCliente';
                        </script>";

    }

    function editarClientes($datos){

        include '../core/conexion.php';

        $sql = "UPDATE clientes SET nombre='$datos[nombre]', apellidos='$datos[apellidos]', run='$datos[run]', email='$datos[correo]', direccion='$datos[direccion]' where id=$datos[id_usuario]";

        $result = mysqli_query($conn, $sql);

        return $msg = "<script>
                        alert('Cliente actualizado con éxito');
                        window.location='../registroCliente';
                    </script>";

    }

    function editarUsuarios($datos){

        include '../core/conexion.php';

        $sql = "UPDATE users SET Name='$datos[nombre]', Usuario='$datos[correo]', nivel='$datos[nivel]' where Id=$datos[id_usuario]";

        $result = mysqli_query($conn, $sql);

        return $msg = "<script>
                        alert('Usuario actualizado con éxito');
                        window.location='../registroUsuarios';
                    </script>";

    }

    function editarMascotas($datos){

        include '../core/conexion.php';

        $sql = "UPDATE mascota SET microchip='$datos[microchip]', nombre='$datos[nombre]', id_especie=$datos[especie], id_raza=$datos[raza], sexo=$datos[sexo], fecha_nacimiento='$datos[nacimiento]', id_color=$datos[color], esterilizado=$datos[esterilizado], id_propietario=$datos[patron] where id_mascota=$datos[id_mascota]";

        if (mysqli_query($conn, $sql)) {
            return 1;
        } else {
            return 2;
        }
    
    }

    function borrarClientes($id_cliente){

        include '../core/conexion.php';

        $sql = "DELETE FROM clientes WHERE id = $id_cliente";

        return $result = mysqli_query($conn, $sql);

    }

    function borrarUsuario($id_usuario){

        include '../core/conexion.php';

        $sql = "DELETE FROM users WHERE Id = $id_usuario";

        return $result = mysqli_query($conn, $sql);

    }
    
    function borrarMascotas($id_mascota){

        include '../core/conexion.php';

        $sql = "DELETE FROM mascota WHERE id_mascota = $id_mascota";

        return $result = mysqli_query($conn, $sql);

    }

    function verClientes(){

        include '../../../core/conexion.php';

        $sql = "SELECT id, CONCAT(nombre, ' ', apellidos) as patron, run, email, direccion FROM clientes";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function registroEspecie($especie){

        include '../core/conexion.php';

        $sql = "insert into especies (nombre) values ('$especie')";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function registroRaza($datos){

        include '../core/conexion.php';

        $sql = "insert into razas (id_especie, nombre) values ($datos[especie], '$datos[raza]')";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function verAnimales(){

        include 'core/conexion.php';

        $sql = "SELECT e.nombre, r.nombre FROM razas r inner join especies e on (r.id_especie = e.id)";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function verRazon(){

        include 'core/conexion.php';

        $sql = "SELECT id_razon, razon FROM razon";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function verObtencion(){

        include 'core/conexion.php';

        $sql = "SELECT id_obtencion, obtencion FROM obtencion";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function verColores(){

        include 'core/conexion.php';

        $sql = "SELECT id_color, color FROM colores";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function verPatron(){

        include 'core/conexion.php';

        $sql = "SELECT id_patron, patron FROM patron_color";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function cargarRazon($nombre){

        include '../core/conexion.php';

        $sql = "insert into razon (razon) values ('$nombre')";

        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);

        return $msg = "<script>
                            alert('Razón registrada correctamente');
                            window.location='../otros';
                        </script>";

    }

    function cargarObtencion($obtencion){

        include '../core/conexion.php';

        $sql = "insert into obtencion (obtencion) values ('$obtencion')";

        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);

        return $msg = "<script>
                            alert('Método registrado correctamente');
                            window.location='../otros';
                        </script>";

    }

    function cargarColor($color){

        include '../core/conexion.php';

        $sql = "INSERT INTO colores (color) values ('$color')";

        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);

        return $msg = "<script>
                            alert('Color registrado correctamente');
                            window.location='../otros';
                        </script>";

    }

    function cargarPatron($patron){

        include '../core/conexion.php';

        $sql = "INSERT INTO patron_color (patron) values ('$patron')";

        $result = mysqli_query($conn, $sql);

        mysqli_close($conn);

        return $msg = "<script>
                            alert('Patron registrado correctamente');
                            window.location='../otros';
                        </script>";

    }

    function registrarMascota($datos){

        include '../core/conexion.php';

        $verificar = "select * from mascota where microchip='$datos[micro]'";
        $resVerificar = mysqli_query($conn,$verificar);
        $totalVerificar = mysqli_num_rows($resVerificar);
        if($totalVerificar == 0){

            $sql = "insert into mascota (microchip, nombre, id_especie, id_raza, sexo, fecha_nacimiento, id_color, id_patron_color, esterilizado, id_propietario, id_obtencion, id_razon, certificado, calidad, id_usuario, fecha_registro) values ('$datos[micro]','$datos[nombre]', $datos[especie], $datos[raza], $datos[sexo], '$datos[nacimiento]', $datos[color], $datos[patron], $datos[opcion], $datos[dueno], $datos[modo], $datos[razon], '$datos[certificado]', '$datos[calidad]', $datos[usuario], '$fecha')";

            $result = mysqli_query($conn,$sql);

            mysqli_close($conn);

            return $msg = "<script>
                            alert('Mascota registrada con éxito');
                            window.location='../registroMascota';
                        </script>";
        
        }else{

            return $msg = "<script>
                                alert('Lo siento, el código de la mascota que intentas ingresar ya se encuentra registrado');
                                window.location='../registroMascota';
                            </script>";
        
        }

    }

    function verMascotas(){

        include 'core/conexion.php';

        $sql = "SELECT id_mascota, microchip, m.nombre, e.nombre as especie, r.nombre as raza, sexo, fecha_nacimiento, color, cl.nombre as patron, m.fecha_registro FROM mascota m
        INNER JOIN especies e ON (m.id_especie = e.id)
        INNER JOIN razas r ON (m.id_raza = r.id)
        INNER JOIN colores c ON (m.id_color = c.id_color)
        INNER JOIN clientes cl ON (m.id_propietario = cl.id)";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function verUsuarios(){

        include 'core/conexion.php';

        $sql = "SELECT Id, Name, Usuario, fecha_registro FROM users";

        $result = mysqli_query($conn, $sql);

        return $result;

    }

    function registroUsuario($datos){

        include '../core/conexion.php';

        $passHash = password_hash($datos['clave'], PASSWORD_DEFAULT);

        $sql = "insert into users (Name, Usuario, Password, nivel, id_usuario, fecha_registro) values ('$datos[nombre]', '$datos[email]', '$passHash', $datos[privilegio], $datos[usuario], '$fecha')";

        $result = mysqli_query($conn, $sql);

        return $msg = "<script>
                            alert('Usuario registro con éxito');
                            window.location='../registroUsuarios';
                        </script>";

    }