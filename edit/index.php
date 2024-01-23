<?php include("dbconect.php");?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Editar registros en linea usando HTML5 jQuery, PHP & MYSQL</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
$(function(){
  //Mensaje
    var message_status = $("#status");
    $("td[contenteditable=true]").blur(function(){
        var rownumber = $(this).attr("id");
        var value = $(this).text();
        $.post('proceso.php' , rownumber + "=" + value, function(data){
            if(data != '')
      {
        message_status.show();
        message_status.html(data);
        //hide the message
        setTimeout(function(){message_status.html("REGISTRO ACTUALIZADO CORRECTAMENTE");},2000);
      } else {
        //message_status().html = data;
      }
        });
    });
});
</script>
<style>
#status { padding:10px; background:#88C4FF; color:#000; font-weight:bold; font-size:12px; margin-bottom:10px; display:none; width:90%; }
</style>
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
<div class="container">

<h3>Administracion de Usuarios</h3>
<p>Tabla editable, haga click en el valor a editar y luego de modificarlo haga click en un lugar vacio.</p>
<p>Roles: personal=gestion. usuarios=usuario. admin=admin.</p>
</div>
<div class="container">

<?php
$sql = "SELECT * FROM `mainlogin`";
$consulta = mysqli_query($con, $sql);
if($consulta->num_rows === 0) {
  echo "No hay resultados <br><br><br>";
} else {
?>

<div class="row">
<div id="status"></div>      
<table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">username</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Role</th>
      </tr>
    </thead>
    <tbody>
<?php

while($rowedit = mysqli_fetch_array($consulta)){
$rownumber = $rowedit["id"];
$nom = $rowedit["username"];
$ape = $rowedit["email"];
$ciu = $rowedit["password"];
$cel = $rowedit["role"];
?>
<tr>
  <td scope="row"><?php echo $rownumber; ?></td>
  <td id="username:<?php echo $rownumber; ?>" contenteditable="true"><?php echo $nom; ?></td>
  <td id="email:<?php echo $rownumber; ?>" contenteditable="true"><?php echo $ape; ?></td>
  <td id="password:<?php echo $rownumber; ?>" contenteditable="true"><?php echo $ciu; ?></td>
  <td id="role:<?php echo $rownumber; ?>" contenteditable="true"><?php echo $cel; ?></td>
</tr>
<?php
}
?>    
    </tbody>
 </table>
</div>
<?php }?>
</div>
</body>
</center>

</html>