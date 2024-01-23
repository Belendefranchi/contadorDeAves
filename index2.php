<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title>Login</title>
		
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery-1.12.4-jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<style type="text/css">
	.login-form {
		width: 340px;	
    	margin: 20px auto;
	}
    .login-form form {
    	margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
</head>
	<body style="background:#1B1464">
<?php


$host="localhost";
$usuario="root";
$contraseña="";
$base="sensores";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> 
		mysqli_connect_error());
}

$username = $_POST['txt_email'];
$password = $_POST['txt_password'];
$sql = "SELECT u.id, r.name AS role, password FROM users u INNER JOIN roles r ON r.id = u.role_id WHERE username = '$username';";
// Conectar a la base de datos
// ejecutar la consulta
// $result contiene el resultado de la consulta
if (password_verify($result['password'], password_hash($password, PASSWORD_BCRYPT))) {
   $startingPage = [
      'admin' => 'admin_home.php',
      'user' => 'user_home.php',
   ];
   $nextPage = array_key_exists($result['role'], $startingPage) ? $startinPage['role'] : 'user_home.php';
   if (array_key_exists($result['role'], $startingPage)) {
      $nextPage = $startinPage[$result['role']];
   } else {
      $nextPage = $startinPage['user'];
      error_log('There is no starting page for role '.$result['role']);
   }
   session_start();
   $_SESSION['user_id'] = $result['id'];
   $_SESSION['role'] = $result['role'];
   header('Location: '.$nextPage);
} else {
   header('Location: login.html');
}


?>

<div class="login-form">
<center> <h2 style="color: white">Iniciar sesión</h2> </center>
<form method="post" class="form-horizontal">
  <div class="form-group">
  <label class="col-sm-6 text-left">Email</label>
  <div class="col-sm-12">
  <input type="text" name="txt_email" class="form-control" placeholder="Ingrese email" />
  </div>
  </div>
      
  <div class="form-group">
  <label class="col-sm-6 text-left">Password</label>
  <div class="col-sm-12">
  <input type="password" name="txt_password" class="form-control" placeholder="Ingrese passoword" />
  </div>
  </div>
      
  <div class="form-group">
      
      <div class="col-sm-12">
      <select class="form-control" name="txt_role">
          <option value="" selected="selected"> - selecccionar rol - </option>
          <!--option value="admin">Admin</option-->
          <option value="personal">Gestión</option>
          <option value="usuarios">Usuarios</option>
      </select>
      </div>
  </div>
  
  <div class="form-group">
  <div class="col-sm-12">
  <center><input type="submit" name="btn_login" class="btn btn-primary" value="Iniciar Sesion"></center>
  </div>
  </div>
  
  <div class="form-group">
  <div class="col-sm-12">
  ¿No tienes una cuenta? <a href="registro.php"><p class="text-info">Registrar Cuenta</p></a>		
  </div>
  </div>
      
</form>
</div>
<!--Cierra div login-->
		</div>
		
	</div>
			
	</div>
										
	</body>
	<footer class="text-center" >
	<img class="img-fluid" src="/img/2.png" style="width:290px !important; height:50px !important" alt="" >
	<p class="lead" style="color: white"> Contador de aves </p>
	</footer>
</html>