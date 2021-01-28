<?php
    // iot.php
    // Importamos la configuración
    require("connect.php");
    // Leemos los valores que nos llegan por GET
     $temperatura = mysqli_real_escape_string($con, $_GET['temperatura']);
     $humedad = mysqli_real_escape_string($con, $_GET['humedad']);
    // Esta es la instrucción para insertar los valores
    $query = "INSERT INTO datos (temperatura,humedad) 
    VALUES('".$temperatura."','".$humedad."')";
    // Ejecutamos la instrucción
    mysqli_query($con, $query);
    mysqli_close($con);
    
?>