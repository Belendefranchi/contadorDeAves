<html lang="es">

<?php

$fp = fsockopen("192.168.1.100", 80, $errno, $errstr, 1);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    $out = "GET / ?value=05";
    
    $out .= "Connection: Close\r\n\r\n";
    fwrite($fp, $out);
    while (!feof($fp)) {
        echo fgets($fp, 128);
    }
    fclose($fp);
}
?>

<?php
define('BOT_TOKEN', '1769767090:AAHE7N89rHRnvFOWUCGsMnE8GeU1LGLEV74');
define('CHAT_ID', '-550093573'); //672907249 //-550093573
define('APi_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
enviar_telegram( "Contador reiniciado!");
//----------

function enviar_telegram($msj) {
    $queryArray = [
        'chat_id' => CHAT_ID,
        'text' => $msj,
    ];
    $url = 'https://api.telegram.org/bot'.BOT_TOKEN.'/sendMEssage?'
    .http_build_query($queryArray);
    $result = file_get_contents($url);
}
?> 


<META HTTP-EQUIV="REFRESH" CONTENT="1;URL=http://E13/">


<head>
<!-- Required meta tags -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    
</head>

<body style="background:#1B1464">
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<div class="text-center">
<div class="spinner-border" style="color: white; width: 3rem; height: 3rem;" role="status">
  <span class="visually-hidden">Loading...</span>
</div>
<h1 style="color:white">Reinciando contador.... </h1>
</div>



</body>
</html>