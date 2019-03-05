<div class="card-header">
    Reporte mascotas
</div>

<div class="card-body">

    <!-- Agregar aqui el contenido -->

    <hr>

    <!-- <a href="reporte" target="_blank" class="btn btn-primary" id="pdf">PDF</a> -->

    <label>Tipo de busqueda:</label>
    <select id="seleccion">
        <option value="1">Normal</option>
        <option value="2">Por fecha</option>
    </select>

    <div id="normal">
        <input type="text" name="buscar" id="buscar" placeholder="Buscar...">
    </div>

    <div id="fecha">
        <label>Desde:</label>
        <input type="date" class="" name="desde" id="desde">
        <label>Hasta:</label>
        <input type="date" class="" name="hasta" id="hasta">
    </div>

    <hr>

    <section id="tabla_resultado">
        <!-- AQUI SE DESPLEGARA NUESTRA TABLA DE CONSULTA -->
    </section>

    <!-- Hasta aqui el contenido -->
</div>

<script>

$(document).ready(function() {

    function obtener_registros(valorBusqueda) {
        $.ajax({
                url: 'controllers/consulta.php',
                type: 'POST',
                dataType: 'html',
                data: { mascota: valorBusqueda },
            })

            .done(function(resultado) {
                $("#tabla_resultado").html(resultado);
            })
    }

    $("#buscar").on('keyup', function() {
        var valorBusqueda = $(this).val();
        if (valorBusqueda != "") {
            obtener_registros(valorBusqueda);
        } else {
            obtener_registros();
        }
    });


    $("#fecha").hide();

    $("#seleccion").change(function() {

        $("#seleccion option:selected").each(function() {

            seleccion = $(this).val();

            if (seleccion == 1) {
                $("#normal").show();
                $("#fecha").hide();
            } else {
                $("#normal").hide();
                $("#fecha").show();
            }

        });

    });


}); // Fin funcion ready
</script>