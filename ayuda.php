<!DOCTYPE html>
<html>
<head>
<title>Mensajes</title>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
       <title>CONTADOR</title>
		<meta charset="utf-8">
        <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>


        <script>    
    /////Url limpia
	if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
</script> 

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
<div style="height:370px !important; background:#1B1464" class="col-auto p-5 text-center">

<h1 style="color:white">
			CENTRO DE AYUDA
             </h1>

          
<div class="col-auto p-5 text-center">
<form class="row g-3" action="ayuda.php" method="get">
<h5 style="color:white">
			Envianos tu mensaje detallando el problema.
             </h5>
<div class="col">
  
    <input type="text" class="form-control" id="mensaje" name="mensaje" placeholder="Mensaje" required>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required>
    <button type="submit" class="btn btn-outline-light">Enviar</button>
    <a href="http://192.168.1.113/" class="btn btn-outline-light">Volver</a>

    </div>
   
    </div>

    </div>

    

</body>

<?php

extract($_GET); 
if (empty($_GET)) {
    echo "";
}else{
$ip = $_SERVER['REMOTE_ADDR'];

define('BOT_TOKEN', '1769767090:AAHE7N89rHRnvFOWUCGsMnE8GeU1LGLEV74');
define('CHAT_ID', '-550093573'); //672907249 //-550093573
define('APi_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
enviar_telegram("Mensaje de $nombre: $mensaje. Enviado desde: $ip");
//----------
}
function enviar_telegram($msj) {
    $queryArray = [
        'chat_id' => CHAT_ID,
        'text' => $msj,
    ];
    $url = 'https://api.telegram.org/bot'.BOT_TOKEN.'/sendMEssage?'
    .http_build_query($queryArray);
    $result = file_get_contents($url);
    echo "Mensaje enviado correctamente";
}

?> 
