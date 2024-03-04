<!DOCTYPE html>
<html lang="es">

<head>
   
	<link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="table-responsive">
<?php
////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
$host="localhost";
$usuario="root";
$contraseña="";
$base="sensores";

$conexion = new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno){
	//die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> 
		//mysqli_connect_error());
}

$contador = array(1, 2, 3);
$lote = array(1, 2, 3, 4, 5, 6, 7, 8);

$stmt = $conexion->prepare("SELECT fecha FROM valores WHERE (DATE(tiempo) = DATE(NOW()))");

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {

	foreach ($lote as $l) {

		$stmt = $conexion->prepare("SELECT lote FROM valores WHERE lote=? and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
		$stmt->bind_param("i", $l);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {

			echo '<table class="table fs-3" style="font-size:20px;">
			<tr class="table-active">
				<th>Fecha y Hora</th>
				<th>Lote</th>
				<th>Contador</th>
				<th>Aves Contadas</th>
			</tr>';

			foreach ($contador as $c) {

				$stmt = $conexion->prepare("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=? and ID=? and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
				$stmt->bind_param("ii", $l, $c);
				$stmt->execute();
				$result = $stmt->get_result();

				if ($result->num_rows > 0) {
					while ($row = $result->fetch_array(MYSQLI_BOTH)){
						echo'<tr>
									<td>'.$row['tiempo'].'</td>
									<td>'.$row['lote'].'</td>
									<td>'.$row['ID'].'</td>
									<td class="fw-bold">'.$row['valor'].'</td>
								</tr>';
					}
				}
			}
		}
	}
} else {
	echo '<h2 class="mb-5">No se ha iniciado el conteo</h2>';
}

echo '</table>';

?>	
<a href= http://e13/ >Ir a contador</a> | 
<a href= http://e13/ayuda.php >Ayuda</a>





