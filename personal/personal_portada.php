<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>CONTADOR</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/sweetalert.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/sweetalert.min.js"></script>
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
	<script src="/js/sweetalert.min.js"></script>
</head>
<body>
	<header>
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
				<a href="../cerrar_sesion.php"><button class="btn btn-secondary">Cerrar Sesion</button></a>
			</div>
		</nav>
		<div style="background:#1B1464" class="d-flex flex-column col-auto p-5 text-center">
			<h2 style="color:white" class="mb-4">CONTADOR DE AVES</h2>
			<div class="container text-center">
				<div class="row justify-content-center p-3">
					<form class="col-1 p-0">
						<input type="hidden" id="lote" name="lote" value="1">
						<input type="submit" class="btn btn-outline-light" value="Lote 1">
					</form>
					<form class="col-1 p-0">
						<input type="hidden" id="lote" name="lote" value="2">
						<input type="submit" class="btn btn-outline-light" value="Lote 2">
					</form>
					<form class="col-1 p-0">
						<input type="hidden" id="lote" name="lote" value="3">
						<input type="submit" class="btn btn-outline-light" value="Lote 3">
					</form>
					<form class="col-1 p-0">
						<input type="hidden" id="lote" name="lote" value="4">
						<input type="submit" class="btn btn-outline-light" value="Lote 4">
					</form>
				</div>
				<div class="row justify-content-center">
					<form class="col-4 d-flex gap-3">
						<input type="text" id="lote" name="lote" class="form-control" placeholder="Ingrese lote" required>
						<input type="submit" class="btn btn-outline-light" value="Cambiar LOTE">
					</form>
					</div>
	<!-- 					<div class="col">
							<input type="text" id="patente" name="patente" class="form-control" placeholder="Ingrese patente transporte" aria-label="Lote" aria-describedby="basic-addon1" required>
						</div> -->
	<!-- 					<input type='button' id="patente" name="patente" class="btn btn-outline-light" value='Reiniciar CONTADOR' onclick='salir()'>
						<input type='button' class="btn btn-outline-light" value='Exportar a PDF'  onclick='salir3()'> 
			<a href="http://e13/reportes.php" class="btn btn-outline-light">Reportes HISTORICOS</a> -->
			</div>
		</div>	
	</header>
	<main>
		<?php
		extract($_GET);
		if (empty($_GET)) {
		} else {
			define('BOT_TOKEN', '5959493740:AAFuuDegEPADWw_NDpjUCLbkfCDm7RxX0XI');
			define('CHAT_ID', '-880202066');
			define('APi_URL', 'https://api.telegram.org/bot' . BOT_TOKEN . '/');
			enviar_telegram("lote cambiado a: $lote");
		}
		function enviar_telegram($msj){
			$queryArray = [
				'chat_id' => CHAT_ID,
				'text' => $msj,
			];
			$url = 'https://api.telegram.org/bot' . BOT_TOKEN . '/sendMEssage?'
				. http_build_query($queryArray);
			$result = file_get_contents($url);
		}
		?>
<!-- 					<script type="text/javascript">
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
				</script> -->
<!-- 					<script type="text/javascript">
					////////////////// aviso de borra todo ////////////////////////////////////
					function salir2() {
						var respuesta = confirm("¿Estas seguro? ESTO BORRA TODOS LOS REGISTROS DE HOY Y NO SE PUEDE RECUPERAR.");
						if (respuesta == true)
							window.location = "personal_portada.php?id=2&idborrar=2";
					}
				</script> -->
<!-- 					<script type="text/javascript">
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
				</script> -->
				<?php
				///////////////////////////// DATO INVALIDO ////////////////////////////////////
				extract($_GET);

				if (@$lote > 8) {
					echo '<script type="text/javascript">
									swal("Lote invalido", "Solo puede ingresar lotes del 1 al 8.", "error");
								</script>';
				}
				if (@$lote < 0) {
					echo '<script type="text/javascript">
									swal("Lote invalido", "Solo puede ingresar lotes del 1 al 8.", "error");
								</script>';
				}
				
				////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////
				$host = "intranet";
				$usuario = "root";
				$contraseña = "";
				$base = "sensores";
				$conexion = new mysqli($host, $usuario, $contraseña, $base);
				if ($conexion->connect_errno) {
					die("Fallo la conexion:");
				}

				///////////////////////// CAMBIA LOTE A 1 ////////////////////////////
				extract($_GET);
				if (@$lote == 1) {
					echo '<script type="text/javascript">
										alert("Lote cambiado correctamente");
								</script>';
					$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 1";
					$resborrar = mysqli_query($conexion, $sqlborrar);
				}

				///////////////////////// CAMBIA LOTE A 2 ////////////////////////////
				extract($_GET);
				if (@$lote == 2) {
					echo '<script type="text/javascript">
									swal("Lote cambiado correctamente, "Lote 2", "success")
								</script>';
					$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 2";
					$resborrar = mysqli_query($conexion, $sqlborrar);
				}

				///////////////////////// CAMBIA LOTE A 3 ////////////////////////////
				extract($_GET);
				if (@$lote == 3) {
					echo '<script type="text/javascript">
									swal("Lote cambiado correctamente, "R", "success");
								</script>';
					$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 3";
					$resborrar = mysqli_query($conexion, $sqlborrar);
				}

				///////////////////////// CAMBIA LOTE A 4 ////////////////////////////
				extract($_GET);
				if (@$lote == 4) {
					echo '<script type="text/javascript">
									swal("Lote cambiado correctamente, "R", "success");
								</script>';
					$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 4";
					$resborrar = mysqli_query($conexion, $sqlborrar);
				}

				///////////////////////// CAMBIA LOTE A 5 ////////////////////////////
				extract($_GET);
				if (@$lote == 5) {
					echo '<script type="text/javascript">
									swal("Lote cambiado correctamente, "R", "success");
								</script>';
					$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 5";
					$resborrar = mysqli_query($conexion, $sqlborrar);
				}

				///////////////////////// CAMBIA LOTE A 6 ////////////////////////////
				extract($_GET);
				if (@$lote == 6) {
					echo '<script type="text/javascript">
									swal("Lote cambiado correctamente, "R", "success");
								</script>';
					$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 6";
					$resborrar = mysqli_query($conexion, $sqlborrar);
				}

				///////////////////////// CAMBIA LOTE A 7 ////////////////////////////
				extract($_GET);
				if (@$lote == 7) {
					echo '<script type="text/javascript">
									swal("Lote cambiado correctamente, "R", "success");
								</script>';
					$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 7";
					$resborrar = mysqli_query($conexion, $sqlborrar);
				}

				///////////////////////// CAMBIA LOTE A 8 ////////////////////////////
				extract($_GET);
				if (@$lote == 8) {
					echo '<script type="text/javascript">
									swal("Lote cambiado correctamente, "R", "success");
								</script>';
					$sqlborrar = "ALTER TABLE valores ALTER COLUMN lote SET DEFAULT 8";
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
		<script type="text/javascript">
			function tiempoReal() {
				var tabla = $.ajax({
					url: 'tablaConsulta.php',
					dataType: 'text',
					async: false
				}).responseText;

				document.getElementById("miTabla").innerHTML = tabla;
			}
			setInterval(tiempoReal, 5000);
		</script>
	</main>
	<footer class="text-center">
		<p>Contador de aves v2.3.1</p>
		<!-- v1.0.0 versión original por Matías Leiva -->
		<!-- v1.0.1 versión modificada por Belén De Franchi | deshabilito reportes que no funcionan -->
		<!-- v1.1.1 deshabilito dato de patente que no es relevante -->
		<!-- v1.2.1 agrego opción para más contadores | uso nueva variable contador pobtenida por GET desde iot -->
		<!-- v1.3.1 agrego botones para cambio de lote del 1 al 4 -->
		<!-- v2.3.1 cambio lógica con variables únicas a modelo escalable para sumar contadores y lotes, usando arrays foreachs anidados-->
		<video width="100" height="100" src="./media/loop.mp4" controls loop autoplay></video>
	</footer>
</body>
</html>