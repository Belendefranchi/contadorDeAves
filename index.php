<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
	<title>Inciar Sesion</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-1.12.4-jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
</head>
<body style="background:#1B1464">
	<?php
	require 'DBconect.php';
	session_start();
	if (isset($_SESSION["admin_login"]))	//Condicion admin
	{
		header("location: admin/admin_portada.php");
	}
	if (isset($_SESSION["personal_login"]))	//Condicion personal
	{
		header("location: personal/personal_portada.php");
	}
	if (isset($_SESSION["usuarios_login"]))	//Condicion Usuarios
	{
		header("location: usuarios/usuarios_portada.php");
	}

	if (isset($_REQUEST['btn_login'])) {
		$username		= $_REQUEST["txt_username"];	//textbox nombre "txt_username"
		$password	= $_REQUEST["txt_password"];	//textbox nombre "txt_password"
		

		if (empty($username)) {
			$errorMsg[] = "Por favor ingrese username";	//Revisar username
		} else if (empty($password)) {
			$errorMsg[] = "Por favor ingrese Password";	//Revisar password vacio
			//Revisar rol vacio
		} else if ($username and $password) {
			try {
				$select_stmt = $db->prepare("SELECT username,password,role FROM mainlogin
										WHERE
										username=:uusername AND password=:upassword");
				$select_stmt->bindParam(":uusername", $username);
				$select_stmt->bindParam(":upassword", $password);
				$select_stmt->execute();	//execute query

				while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)) {
					$dbusername	= $row["username"];
					$dbpassword	= $row["password"];
					$dbrole		= $row["role"];
				}
				if ($username != null and $password != null and $role = !null) {
					if ($select_stmt->rowCount() > 0) {
						if ($username == $dbusername and $password == $dbpassword and $role == $dbrole) {
							switch ($dbrole)		//inicio de sesión de usuario base de roles
							{
								case "admin":
									$_SESSION["admin_login"] = $username;
									$loginMsg = "Admin: Inicio sesión con éxito";
									header("refresh:1;admin/admin_portada.php");
									break;

								case "personal";
									$_SESSION["personal_login"] = $username;
									$loginMsg = "¡Inicio sesión con éxito!";
									header("refresh:1;personal/personal_portada.php");
									break;

								case "usuarios":
									$_SESSION["usuarios_login"] = $username;
									$loginMsg = "¡Inicio sesión con éxito!";
									header("refresh:1;usuarios/usuarios_portada.php");
									break;

								default:
									$errorMsg[] = "Correo electrónico, contraseña o rol incorrectos";
							}
						} else {
							$errorMsg[] = "Correo electrónico, contraseña o rol incorrectos";
						}
					} else {
						$errorMsg[] = "Correo electrónico,contraseña o rol incorrectos";
					}
				} else {
					$errorMsg[] = "correo electrónico o contraseña o rol incorrectos";
				}
			} catch (PDOException $e) {
				$e->getMessage();
			}
		} else {
			$errorMsg[] = "correo electrónico o contraseña o rol incorrectos";
		}
	}

	?>

	<center>

		<div class="container">

			<div class="abs-center" id="map_section">

				<div class="col-6">

					<?php
					if (isset($errorMsg)) {
						foreach ($errorMsg as $error) {
					?>
							<div class="alert alert-danger">
								<strong><?php echo $error; ?></strong>
							</div>
						<?php
						}
					}
					if (isset($loginMsg)) {
						?>
						<div class="alert alert-success">
							<strong>ÉXITO ! <?php echo $loginMsg; ?></strong>
						</div>
					<?php
					}
					?>

					<div class="form-floating justify-content-md-center">
					
						<h2 style="color: white">Iniciar sesión</h2>
						<form class="form-row" method="post" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" name="txt_username" class="form-control" placeholder="Ingrese usuario" />
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<input type="password" name="txt_password" class="form-control" placeholder="Ingrese contraseña" />
									</div>
								</div>
								<div class="form-group">

									<div class="col-sm-12">
										
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										-
										<center><input type="submit" name="btn_login" class="btn btn-outline-light" value="Iniciar Sesion"></center>
									</div>
								</div>
								
								</div>
								
						</form>
					</div>
	</center>
	<!--Cierra div login-->
	</div>
	</div>
	</div>
</body>
<footer class="text-center">
<div class="col-sm-12">
										<h5 style="color: white">¿No tenes una cuenta?</h5> <a href="registro.php">
											<p class="text-info" style="color: white">Crear cuenta</p>
										</a>
									</div>
	<img class="img-fluid" src="/img/2.png" style="width:290px !important; height:50px !important" alt="">
	
</footer>

</html>