<html lang="es">
    <head>
	<script>    
    /////Url limpia
	if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }

</script>       
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
       <title>REPORTES</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
		<link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
		<script src="/js/jquery.min.js"></script>

		
<script src="/js/sweetalert.min.js"></script>


	</head>		
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="http://192.168.1.113"> 
    <img src="/temperatura/3.png" alt="" width="31" height="30">
     </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://192.168.1.113/temperatura">Temperaturas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://192.168.1.113/">Contador de aves</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="http://192.168.1.113/calidad">Calidad</a>
        </li>
      </ul>
      <span class="navbar-text">
        Intranet
      </span>
    </div>
  </div>
</nav>	
	<body>
	
	
		 <!-- Option 1: Bootstrap Bundle with Popper -->
		 <script src="/js/bootstrap.bundle.min.js"></script>
		<header>
		
     	<div style="height:310px !important; background:#1B1464" class="col-auto p-5 text-center">

     	<h1 style="color:white">
			REPORTES
             </h1>
			
			<!––BOTONES––>

<form class="row g-3" action="reportes.php" method="GET">
  <input type='button' class="btn btn-outline-light" value='Exportar a PDF' onclick='salir3()'> 
  </form>

<form class="row g-3" action="reportes.php" method="get">
<input type="date" name="fechas" step="1" id="fechas" min="2021-10-01" max="2022-12-01" >
<input type="submit" class="btn btn-outline-light" value="Buscar fecha"/>
</form>
<a href="http://192.168.1.113/" class="btn btn-outline-light">Volver</a>
		</div>
<?php		

$fecha = $_GET["fechas"] ?? null;

?>

<script type="text/javascript">
var fecha = '<?php echo $fecha;?>'
</script>

<script type="text/javascript">

////////////////// exporta pdf ////////////////////////////////////
function salir3(){
	swal("¿Qué reporte desea exportar a PDF?", {
		icon: "info",
  buttons: {
    cancel: "Cancelar",
    catch: {
      text: "Reporte Completo",
      value: "catch",
    },
	Simple: {
      text: "Reporte Simple",
      value: "Simple",
    },
  },
})
.then((value) => {
  switch (value) {
 
    case "Simple":
		
		window.open('http://192.168.1.113/crea_pdf_simple_reportes.php?fechas=<?php echo $fecha;?>');
      break;
 
    case "catch":
		var fecha = '<?php echo $fecha;?>'
		window.open('http://192.168.1.113/crea_pdf_reportes.php?fechas=<?php echo $fecha;?>');
      break;
 
    default:
      swal("Exportación a PDF cancelada.");
	  
  }
});	
}
  </script>
		<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
$host="localhost";
$usuario="root";
$contraseña="";
$base="sensores";
$conexion= new mysqli($host, $usuario, $contraseña, $base);

///////////////////////// CAMBIA LOTE A 1 ////////////////////////////
           
		  
		  $fecha = $_GET["fechas"] ?? null;

////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$resAlumnos=$conexion->query ("SELECT * FROM valores WHERE (lote = 1) and (DATE(fecha) = '$fecha') ORDER by tiempo DESC limit 0,1");
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



				////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$resAlumnos=$conexion->query ("SELECT * FROM valores WHERE (lote = 2) and (DATE(fecha) = '$fecha') ORDER by tiempo DESC limit 0,1");
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

				////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$resAlumnos=$conexion->query ("SELECT * FROM valores WHERE (lote = 3) and (DATE(fecha) = '$fecha') ORDER by tiempo DESC limit 0,1");
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


				////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////
$resAlumnos=$conexion->query ("SELECT * FROM valores WHERE (lote = 4) and (DATE(fecha) = '$fecha') ORDER by tiempo DESC limit 0,1");
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




?>
			
		</div>
		</header>
		<div class="col-auto p-5 text-center">
		<section
		id="miTabla">
		<div class="text-center">

	</body>
	<a href= http://e13/ >Ir a contador</a>
	<footer class="text-center" >
	
	<img class="img-fluid" src="/img/1.png" style="width:90px !important; height:60px !important" alt="" >
	<p class="lead"> Reportes V1.65 </p>
	</footer> 
</html>