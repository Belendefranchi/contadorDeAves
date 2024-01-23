<?php
    // iot.php
    // Importamos la configuración
    require("config.php");
    // Leemos los valores que nos llegan por GET
    //$valor2 = $_GET['valor2'];
    $valor = mysqli_real_escape_string($con, $_GET['valor'],);
    $valor2 = mysqli_real_escape_string($con, $_GET['valor2'],);
    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO temperatura(temp, humedad) VALUES('".$valor."', '".$valor2."')";
   // $query2 = "INSERT INTO temperatura(humedad) VALUES('".$valor2."')";
    // Ejecutamos la instrucción
    mysqli_query($con, $query);
   // mysqli_query($con, $query2);
    mysqli_close($con);
    echo "$valor";
    echo "-";
    echo "$valor2";
?>