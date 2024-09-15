<?php
// config/database.php

$servername = "db";
$username = "root";
$password = "root";
$dbname = "prueba_api_susuerte";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} 
// else {
//     echo "Conexión exitosa a la base de datos";
// }


