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
				<a>Contador de aves</a>
			</div>
		</nav>
	</header>
	<main>
	<div style="background:#1B1464" class="d-flex flex-column col-auto p-5 text-center">
			<h2 style="color:white" class="mb-4">Cambio de lote</h2>
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
		</div>	
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
	</main>
	<footer class="text-center">
		<p>Contador de aves v2.5.1</p>
		<!-- v1.0.0 versión original por Matías Leiva -->
		<!-- v1.0.1 versión modificada por Belén De Franchi | deshabilito reportes que no funcionan -->
		<!-- v1.1.1 deshabilito dato de patente que no es relevante -->
		<!-- v1.2.1 agrego opción para más contadores | uso nueva variable contador pobtenida por GET desde iot -->
		<!-- v1.3.1 agrego botones para cambio de lote del 1 al 4 -->
		<!-- v2.3.1 cambio lógica con variables únicas a modelo escalable para sumar contadores y lotes, usando arrays para los lotes y los contadores, con foreachs anidados-->
		<!-- v2.4.1 logro que los encabezados de la tabla solo se muestren si hay información disponible del lote y del día actual, agrego leyenda para mostrar si no ha inciado el conteo del día.-->
		<!-- v2.5.1 agrego página específica para cambio de lote -->
		<video width="100" height="100" src="./media/loop.mp4" loop autoplay></video>
	</footer>
</body>
</html>