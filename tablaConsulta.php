<?php
////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
$host="192.168.1.113";
$usuario="root";
$contraseña="";
$base="sensores";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	
}

/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$resAlumnos=$conexion->query("SELECT * FROM valores WHERE (lote = 1) and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 1 //////////////////////////////
echo '<table class="table table-striped table-hover" style="font-size:20px;">

				<tr class="active">
				  <th>Fecha y Hora</th>
					<th>Aves Contadas</th>
					<th>Lote</th> 
					<th>Patente</th>
				</tr>';
			
				while ($filaAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
								<td>'.$filaAlumnos['tiempo'].'</td>
								<td>'.$filaAlumnos['valor'].'</td>
								<td>'.$filaAlumnos['lote'].'</td>
								<td>'.$filaAlumnos['patente'].'</td>
							</tr>';
				}
				echo '</table>';

$resAlumnos=$conexion->query("SELECT * FROM valores WHERE (lote = 2) and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 2 //////////////////////////////
echo '<table class="table table-striped table-hover" style="font-size:20px;">

				<tr class="active">

				<th>Fecha y Hora</th>
				<th>Aves Contadas</th>
				<th>Lote</th> 
				<th>Patente</th> 

				</tr>';
  
				while ($filaAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
					<td>'.$filaAlumnos['tiempo'].'</td>
					<td>'.$filaAlumnos['valor'].'</td>
					<td>'.$filaAlumnos['lote'].'</td>
					<td>'.$filaAlumnos['patente'].'</td>
						 </tr>';
				}
				echo '</table>';

$resAlumnos=$conexion->query("SELECT * FROM valores WHERE(lote = 3) and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 3 //////////////////////////////
echo '<table class="table table-striped table-hover" style="font-size:20px;">


				<tr class="active">
				<th>Fecha y Hora</th>
				<th>Aves Contadas</th>
				<th>Lote</th> 
				<th>Patente</th>
					
				</tr>';
			
				while ($filaAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
					<td>'.$filaAlumnos['tiempo'].'</td>
					<td>'.$filaAlumnos['valor'].'</td>
					<td>'.$filaAlumnos['lote'].'</td>
					<td>'.$filaAlumnos['patente'].'</td>
					
						 </tr>';
				}
				echo '</table>';


				$resAlumnos=$conexion->query("SELECT * FROM valores WHERE (lote = 4) and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 3 //////////////////////////////
echo '<table class="table table-striped table-hover" style="font-size:20px;">


				<tr class="active">
				<th>Fecha y Hora</th>
				<th>Aves Contadas</th>
				<th>Lote</th> 
				<th>Patente</th>
				</tr>';
			
				while ($filaAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
					<td>'.$filaAlumnos['tiempo'].'</td>
					<td>'.$filaAlumnos['valor'].'</td>
					<td>'.$filaAlumnos['lote'].'</td>
					<td>'.$filaAlumnos['patente'].'</td>
					
						 </tr>';
				}
				echo '</table>';


				$resAlumnos=$conexion->query("SELECT * FROM valores WHERE(lote = 5) and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 3 //////////////////////////////
echo '<table class="table table-striped table-hover" style="font-size:20px;">


				<tr class="active">
				<th>Fecha y Hora</th>
				<th>Aves Contadas</th>
				<th>Lote</th> 
				<th>Patente</th>
					
				</tr>';
			
				while ($filaAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
					<td>'.$filaAlumnos['tiempo'].'</td>
					<td>'.$filaAlumnos['valor'].'</td>
					<td>'.$filaAlumnos['lote'].'</td>
					<td>'.$filaAlumnos['patente'].'</td>
					
						 </tr>';
				}
				echo '</table>';


$resAlumnos=$conexion->query("SELECT * FROM valores WHERE (lote = 6) and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 3 //////////////////////////////
echo '<table class="table table-striped table-hover" style="font-size:20px;">

				
	<tr class="active">
	<th>Fecha y Hora</th>
	<th>Aves Contadas</th>
	<th>Lote</th> 
	<th>Patente</th>
									
	</tr>';
							
		while ($filaAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
			{
			 echo'<tr>
				<td>'.$filaAlumnos['tiempo'].'</td>
				<td>'.$filaAlumnos['valor'].'</td>
				<td>'.$filaAlumnos['lote'].'</td>
				<td>'.$filaAlumnos['patente'].'</td>
									
				 </tr>';
					}
				echo '</table>';


$resAlumnos=$conexion->query("SELECT * FROM valores WHERE (lote = 7) and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 3 //////////////////////////////
echo '<table class="table table-striped table-hover" style="font-size:20px;">

								
					<tr class="active">
					<th>Fecha y Hora</th>
					<th>Aves Contadas</th>
					<th>Lote</th> 
					<th>Patente</th>
													
					</tr>';
											
					while ($filaAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
												{
													echo'<tr>
													<td>'.$filaAlumnos['tiempo'].'</td>
													<td>'.$filaAlumnos['valor'].'</td>
													<td>'.$filaAlumnos['lote'].'</td>
													<td>'.$filaAlumnos['patente'].'</td>
													
														 </tr>';
												}
												echo '</table>';


$resAlumnos=$conexion->query("SELECT * FROM valores WHERE(lote = 8) and (DATE(tiempo) = DATE(NOW())) ORDER by tiempo DESC limit 0,1");
///TABLA DONDE SE DESPLIEGAN LOS REGISTROS LOTE 3 //////////////////////////////
echo '<table class="table table-striped table-hover" style="font-size:20px;">


				<tr class="active">
				<th>Fecha y Hora</th>
				<th>Aves Contadas</th>
				<th>Lote</th> 
				<th>Patente</th>
					
				</tr>';
			
				while ($filaAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{
					echo'<tr>
					<td>'.$filaAlumnos['tiempo'].'</td>
					<td>'.$filaAlumnos['valor'].'</td>
					<td>'.$filaAlumnos['lote'].'</td>
					<td>'.$filaAlumnos['patente'].'</td>
					
						 </tr>';
				}
				echo '</table>';

				?>	





				

