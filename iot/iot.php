<?php
    // iot.php
    // Importamos la configuración
    require("config.php");
    // Leemos los valores que nos llegan por GET
   $valor = $_GET['valor'];
   $contador = $_GET['contador'];
    //contador 1, cuenta patas
   if ($contador = 1){
        $valor = Math.ceil($valor / 2);  
   };

    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO valores(valor, ID) VALUES('$valor', '$contador')";
    // Ejecutamos la instrucción
    mysqli_query($con, $query);
    mysqli_close($con);
    echo "$valor";
 
?>