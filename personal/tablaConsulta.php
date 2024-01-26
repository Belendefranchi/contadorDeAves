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

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno){
	//die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> 
		//mysqli_connect_error());
}

/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$queryContador1L1=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=1 and ID=1 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
$queryContador2L1=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=1 and ID=2 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");

///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 1 //////////////////////////
if (isset($queryContador1L1)){
	echo '<table class="table fs-3" style="font-size:20px;">
					<tr class="table-active">
						<th>Fecha y Hora</th>
						<th>Lote</th>
						<th>Contador</th>
						<th>Aves Contadas</th>
					</tr>';
	while ($row = $queryContador1L1->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
	while ($row = $queryContador2L1->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$queryContador1L2=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=2 and ID=1 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
$queryContador2L2=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=2 and ID=2 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");

///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 2 //////////////////////////
if (isset($queryContador1L2)){
	echo '<tr class="table-active">
						<th>Fecha y Hora</th>
						<th>Lote</th>
						<th>Contador</th>
						<th>Aves Contadas</th>
					</tr>';
	while ($row = $queryContador1L2->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
	while ($row = $queryContador2L2->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
}

/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$queryContador1L3=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=3 and ID=1 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
$queryContador2L3=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=3 and ID=2 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");

///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 3 //////////////////////////
if (isset($queryContador1L3)){
	echo '<tr class="table-active">
						<th>Fecha y Hora</th>
						<th>Lote</th>
						<th>Contador</th>
						<th>Aves Contadas</th>
					</tr>';
	while ($row = $queryContador1L3->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
	while ($row = $queryContador2L3->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
}
	
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$queryContador1L4=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=4 and ID=1 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
$queryContador2L4=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=4 and ID=2 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");

///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 4 //////////////////////////
if (isset($queryContador1L4)){
	echo '<tr class="table-active">
						<th>Fecha y Hora</th>
						<th>Lote</th>
						<th>Contador</th>
						<th>Aves Contadas</th>
					</tr>';
	while ($row = $queryContador1L4->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
	while ($row = $queryContador2L4->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
}

/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$queryContador1L5=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=5 and ID=1 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
$queryContador2L5=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=5 and ID=2 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");

///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 5 //////////////////////////
if (isset($queryContador1L5)){
	echo '<tr class="table-active">
						<th>Fecha y Hora</th>
						<th>Lote</th>
						<th>Contador</th>
						<th>Aves Contadas</th>
					</tr>';
	while ($row = $queryContador1L5->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
	while ($row = $queryContador2L5->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
}

/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$queryContador1L6=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=6 and ID=1 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
$queryContador2L6=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=6 and ID=2 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");

///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 6 //////////////////////////
if (isset($queryContador1L6)){
	echo '<tr class="table-active">
						<th>Fecha y Hora</th>
						<th>Lote</th>
						<th>Contador</th>
						<th>Aves Contadas</th>
					</tr>';
	while ($row = $queryContador1L6->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
	while ($row = $queryContador2L6->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
}

/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$queryContador1L7=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=7 and ID=1 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
$queryContador2L7=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=7 and ID=2 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");

///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 7 //////////////////////////
if (isset($queryContador1L7)){
	echo '<tr class="table-active">
						<th>Fecha y Hora</th>
						<th>Lote</th>
						<th>Contador</th>
						<th>Aves Contadas</th>
					</tr>';
	while ($row = $queryContador1L7->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
	while ($row = $queryContador2L7->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
}

/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$queryContador1L8=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=8 and ID=1 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
$queryContador2L8=$conexion->query("SELECT tiempo, lote, ID, valor FROM valores WHERE lote=8 and ID=2 and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");

///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 8 //////////////////////////
if (isset($queryContador1L8)){
	echo '<tr class="table-active">
						<th>Fecha y Hora</th>
						<th>Lote</th>
						<th>Contador</th>
						<th>Aves Contadas</th>
					</tr>';
	while ($row = $queryContador1L8->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
	while ($row = $queryContador2L8->fetch_array(MYSQLI_BOTH)){
		echo'<tr>
					<td>'.$row['tiempo'].'</td>
					<td>'.$row['lote'].'</td>
					<td>'.$row['ID'].'</td>
					<td class="fw-bold">'.$row['valor'].'</td>
				</tr>';
	}
}
echo '</table>';

?>	
<a href= http://e13/ >Ir a contador</a> | 
<a href= http://e13/ayuda.php >Ayuda</a>





