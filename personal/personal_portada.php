<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CONTADOR</title>
	<meta charset="utf-8">
	<link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>

	<?php
	session_start();

	if (!isset($_SESSION['personal_login'])) {
		header("location: ../index.php");
	}
	if (isset($_SESSION['admin_login'])) {
		header("location: ../admin/admin_portada.php");
	}
	if (isset($_SESSION['usuarios_login'])) {
		header("location: ../usuarios/usuarios_portada.php");
	}
	?>
	<script>
		/////Url limpia
		if (typeof window.history.pushState == 'function') {
			window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
		}
	</script>
	<script type="text/javascript">
		function tiempoReal() {
			var tabla = $.ajax({
				url: 'tablaConsulta.php',
				dataType: 'text',
				async: false
			}).responseText;

			document.getElementById("miTabla").innerHTML = tabla;
		}
		setInterval(tiempoReal, 1000);
	</script>
	<script src="/js/sweetalert.min.js"></script>
</head>
<center>
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
	  <a href="../cerrar_sesion.php"><button class="btn btn-dark"></span> Cerrar Sesion</button></a>
      <span class="navbar-text">
       
      </span>
    </div>
  </div>
</nav>
<body>
	<header>
		<div style="height:370px !important; background:#1B1464" class="col-auto p-5 text-center">
			<h2 style="color:white">
				CONTADOR DE AVES
			</h2>
				<form class="row g-3" action="personal_portada.php" method="get">
					<div class="col">
					<input type="text" maxlength="1" id="campo1" name="campo1" class="form-control" placeholder="Ingrese lote" aria-label="Lote" aria-describedby="basic-addon1" required>
					</div>
					<div class="col">
					<input type="text" id="patente" name="patente" class="form-control" placeholder="Ingrese patente transporte" aria-label="Lote" aria-describedby="basic-addon1" required>
					</div>
					<input type="submit" class="btn btn-outline-light" value="Cambiar LOTE + PATENTE" />
					<input type='button' id="patente" name="patente" class="btn btn-outline-light" value='Reiniciar CONTADOR' onclick='salir()'>
					<input type='button' class="btn btn-outline-light" value='Exportar a PDF'  onclick='salir3()'  > 
					<a href="http://e13/reportes.php" class="btn btn-outline-light">Reportes HISTORICOS</a>

					<!--<p class="fw-bold"> Aves por minuto: 0 </p> --> 
					<?php
					extract($_GET);
					if (empty($_GET)) {
					} else {
						define('BOT_TOKEN', '5959493740:AAFuuDegEPADWw_NDpjUCLbkfCDm7RxX0XI');
						define('CHAT_ID', '-880202066'); //672907249 //-550093573
						define('APi_URL', 'https://api.telegram.org/bot' . BOT_TOKEN . '/');
						enviar_telegram("lote cambiado a: $campo1 y patente: $patente");
					}
					function enviar_telegram($msj)
					{
						$queryArray = [
							'chat_id' => CHAT_ID,
							'text' => $msj,
						];
						$url = 'https://api.telegram.org/bot' . BOT_TOKEN . '/sendMEssage?'
							. http_build_query($queryArray);
						$result = file_get_contents($url);
					}
					?>
					<script type="text/javascript">
						function salir() {
							swal("¿Esta seguro?", "Esto pone el contador en cero. Solo usar luego de cambiar lote.", {

									icon: "warning",
									buttons: {
										cancel: "Cancelar",
										catch: {
											text: "Sí, Reiniciar contador",
											value: "Simple",
										},

									},
								})
								.then((value) => {
									switch (value) {
										case "Simple":
											window.location = "http://192.168.1.100/?value=5";
											swal("Contador Reiniciado!", "En unos segundos la pagina se actualizará...", "success");
											break;
										default:
											swal("Cancelado.");
									}
								});
						}
					</script>
					<script type="text/javascript">
						////////////////// aviso de borra todo ////////////////////////////////////
						function salir2() {
							var respuesta = confirm("¿Estas seguro? ESTO BORRA TODOS LOS REGISTROS DE HOY Y NO SE PUEDE RECUPERAR.");
							if (respuesta == true)
								window.location = "personal_portada.php?id=2&idborrar=2";
						}
					</script>
					<script type="text/javascript">
						////////////////// exporta pdf ////////////////////////////////////
						function salir3() {
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
											window.open('http://192.168.1.113/crea_pdf_simple.php');
											break;
										case "catch":
											window.open('http://192.168.1.113/crea_pdf.php');
											break;
										default:
											file_get_contents('https://api.telegram.org/bot1769767090:AAHE7N89rHRnvFOWUCGsMnE8GeU1LGLEV74/sendMessage?chat_id=-550093573&text=hola');
											swal("Exportación a PDF cancelada.");
									}
								});
						}
					</script>
					<?php
					///////////////////////////// DATO INVALIDO ////////////////////////////////////
					extract($_GET);

					if (@$campo1 > 8) {
						echo '<script type="text/javascript">
			swal("Lote invalido", "Solo puede ingresar lotes del 1 al 8.", "error");
			</script>';
					}
					if (@$campo1 < 0) {
						echo '<script type="text/javascript">
				swal("Lote invalido", "Solo puede ingresar lotes del 1 al 8.", "error");
				
				</script>';
					}
					////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
					$host = "localhost";
					$usuario = "root";
					$contraseña = "";
					$base = "sensores";
					$conexion = new mysqli($host, $usuario, $contraseña, $base);
					if ($conexion->connect_errno) {
						die("Fallo la conexion:");
					}
					///////////////////////// CAMBIA LOTE A 1 ////////////////////////////
					extract($_GET);
					if (@$campo1 == 1) {

						$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 1";
						$resborrar = mysqli_query($conexion, $sqlborrar);
						$patente = strtoupper($patente);

						$sqlborrar = "ALTER TABLE valores ALTER COLUMN patente SET DEFAULT '$patente' ";
						$resborrar = mysqli_query($conexion, $sqlborrar);
						echo '<script type="text/javascript">
           swal("Lote + patente cambiado correctamente REINICIAR CONTADOR", "R", "success");
            </script>';
					}
					///////////////////////// CAMBIA LOTE A 2 ////////////////////////////
					extract($_GET);
					if (@$campo1 == 2) {
						echo '<script type="text/javascript">
			swal("Lote cambiado correctamente REINICIAR CONTADOR", "", "success");
			</script>';
						$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 2";
						$resborrar = mysqli_query($conexion, $sqlborrar);
						$patente = strtoupper($patente);
						$sqlborrar = "ALTER TABLE valores ALTER COLUMN patente SET DEFAULT '$patente' ";
						$resborrar = mysqli_query($conexion, $sqlborrar);
					}
					///////////////////////// CAMBIA LOTE A 3 ////////////////////////////
					extract($_GET);
					if (@$campo1 == 3) {
						echo '<script type="text/javascript">
			swal("Lote cambiado correctamente REINICIAR CONTADOR", "", "success");
			</script>';
						$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 3";
						$resborrar = mysqli_query($conexion, $sqlborrar);
						$patente = strtoupper($patente);
						$sqlborrar = "ALTER TABLE valores ALTER COLUMN patente SET DEFAULT '$patente' ";
						$resborrar = mysqli_query($conexion, $sqlborrar);
					}
					///////////////////////// CAMBIA LOTE A 4 ////////////////////////////
					extract($_GET);
					if (@$campo1 == 4) {
						echo '<script type="text/javascript">
			swal("Lote cambiado correctamente REINICIAR CONTADOR", " " , "success");
			</script>';
						$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 4";
						$resborrar = mysqli_query($conexion, $sqlborrar);
						$patente = strtoupper($patente);
						$sqlborrar = "ALTER TABLE valores ALTER COLUMN patente SET DEFAULT '$patente' ";
						$resborrar = mysqli_query($conexion, $sqlborrar);
					}
					///////////////////////// CAMBIA LOTE A 5 ////////////////////////////
					extract($_GET);
					if (@$campo1 == 5) {
						echo '<script type="text/javascript">
			swal("Lote cambiado correctamente REINICIAR CONTADOR", "", "success");
			</script>';
						$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 5";
						$resborrar = mysqli_query($conexion, $sqlborrar);
						$patente = strtoupper($patente);
						$sqlborrar = "ALTER TABLE valores ALTER COLUMN patente SET DEFAULT '$patente' ";
						$resborrar = mysqli_query($conexion, $sqlborrar);
					}
					///////////////////////// CAMBIA LOTE A 6 ////////////////////////////
					extract($_GET);
					if (@$campo1 == 6) {
						echo '<script type="text/javascript">
			
			swal("Lote cambiado correctamente REINICIAR CONTADOR", "", "success");
			
			</script>';

						$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 6";
						$resborrar = mysqli_query($conexion, $sqlborrar);
						$patente = strtoupper($patente);
						$sqlborrar = "ALTER TABLE valores ALTER COLUMN patente SET DEFAULT '$patente' ";
						$resborrar = mysqli_query($conexion, $sqlborrar);
					}
					///////////////////////// CAMBIA LOTE A 7 ////////////////////////////
					extract($_GET);
					if (@$campo1 == 7) {
						echo '<script type="text/javascript">
			
			swal("Lote cambiado correctamente REINICIAR CONTADOR", "", "success");
			
			</script>';

						$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 7";
						$resborrar = mysqli_query($conexion, $sqlborrar);
						$patente = strtoupper($patente);
						$sqlborrar = "ALTER TABLE valores ALTER COLUMN patente SET DEFAULT '$patente' ";
						$resborrar = mysqli_query($conexion, $sqlborrar);
					}
					///////////////////////// CAMBIA LOTE A 8 ////////////////////////////
					extract($_GET);
					if (@$campo1 == 8) {
						echo '<script type="text/javascript">
			swal("Lote cambiado correctamente REINICIAR CONTADOR", "", "success");
			</script>';
						$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 8";
						$resborrar = mysqli_query($conexion, $sqlborrar);
						$patente = strtoupper($patente);
						$sqlborrar = "ALTER TABLE valores ALTER COLUMN patente SET DEFAULT '$patente' ";
						$resborrar = mysqli_query($conexion, $sqlborrar);
					}
					?>
					<?php
					////////////////// BORRA TODO ///////////////////////
					extract($_GET);
					if (@$idborrar == 2) {
						echo '<script type="text/javascript">
           alert("Se borraron todos los registros de la base");
           window.location.href="personal_portada.php";
           </script>';
						$sqlborrar = "DELETE FROM valores WHERE id=0";
						$resborrar = mysqli_query($conexion, $sqlborrar);
					}
					?>
		</div>
	</header>
	<div class="col-auto p-5 text-center">
	
		<section id="miTabla">
			<div class="text-center">

				<div class="spinner-border" style="color: #1B1464; width: 3rem; height: 3rem;" role="status">
					<span class="visually-hidden" style="color:#1B1464">Loading...</span>
				</div>
				<h1 style="color:#1B1464">Actualizando valores...</h1>
			</div>
		</section>
	</div>
</body>
<footer class="text-center">
	<!-- <img class="img-fluid" src="/img/1.png" style="width:90px !important; height:60px !important" alt=""> -->
	<video width="100" height="100" src="./media/loop.mp4" controls loop autoplay></video>
</footer>

</center>

</html>