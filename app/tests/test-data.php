<?php
// Incluir la configuración de la base de datos
require_once 'app/config/database.php';

// Consulta para obtener datos de la tabla 'users'
$query = 'SELECT * FROM users LIMIT 1';
$result = $GLOBALS['conn']->query($query);

if ($result) {
    $data = $result->fetch_assoc();
    if ($data) {
        echo "Datos encontrados en la base de datos: <br>";
        echo "ID: " . htmlspecialchars($data['id']) . "<br>";
        echo "Nombre: " . htmlspecialchars($data['name']) . "<br>";
        echo "Username: " . htmlspecialchars($data['username']) . "<br>";
        echo "Email: " . htmlspecialchars($data['email']) . "<br>";
        // Puedes agregar más campos aquí si es necesario
    } else {
        echo "No se encontraron datos en la base de datos.";
    }
} else {
    echo "Error en la consulta: " . $GLOBALS['conn']->error;
}

