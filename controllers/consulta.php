<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
$host = 'localhost';
$basededatos = 'mascotas';
$usuario = 'root';
$contraseña = '';

$conexion = new mysqli($host, $usuario,$contraseña, $basededatos);
if ($conexion -> connect_errno){

	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());

}

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT microchip, m.nombre, e.nombre, r.nombre, CONCAT(cl.run, ' ' , cl.nombre, ' ', cl.apellidos) as propietario, m.fecha_registro FROM mascota m 
INNER JOIN especies e ON (m.id_especie = e.id)
INNER JOIN razas r ON (m.id_raza = r.id)
INNER JOIN clientes cl ON (m.id_propietario = cl.id)";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['mascota'])){
	$q=$conexion->real_escape_string($_POST['mascota']);
	$query="SELECT microchip, m.nombre, e.nombre, r.nombre, CONCAT(cl.run, ' ' , cl.nombre, ' ', cl.apellidos) as propietario, m.fecha_registro FROM mascota m
	INNER JOIN especies e ON (m.id_especie = e.id)
	INNER JOIN razas r ON (m.id_raza = r.id)
	INNER JOIN clientes cl ON (m.id_propietario = cl.id) WHERE 
		microchip LIKE '%".$q."%' OR m.nombre LIKE '%".$q."%' OR e.nombre LIKE '%".$q."%' OR r.nombre LIKE '%".$q."%' OR cl.run LIKE '%".$q."%' OR cl.nombre LIKE '%".$q."%' OR apellidos LIKE '%".$q."%' OR m.fecha_registro LIKE '%".$q."%'";
}

$buscarMascotas=$conexion->query($query);
if ($buscarMascotas->num_rows > 0){
	$tabla.= 
	'<table class="table table-bordered">
		<tr class="bg-primary">
			<th class=text-center>N°</th>
			<th class=text-center>Microchip</th>
			<th class=text-center>Nombre</th>
			<th class=text-center>Especie</th>
			<th class=text-center>Raza</th>
			<th class=text-center>Propietario</th>
			<th class=text-center>Fecha de registro</th>
		</tr>';
	$nro=0;
	while($ver = $buscarMascotas->fetch_array()){ $nro++;
		$tabla.=
		'<tr>
			<td>'.$nro.'</td>
			<td>'.$ver[0].'</td>
			<td>'.$ver[1].'</td>
			<td>'.$ver[2].'</td>
			<td>'.$ver[3].'</td>
			<td>'.$ver[4].'</td>
			<td>'.$ver[5].'</td>
		 </tr>
		';
	}

	$tabla.='</table>';
}else{

	$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";

}

echo $tabla;
?>