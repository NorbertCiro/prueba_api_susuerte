<?php
// consume_api.php
$apiUrl = 'https://jsonplaceholder.typicode.com/users';
$response = file_get_contents($apiUrl);

if ($response === FALSE) {
    die('Error al consumir la API');
}

$data = json_decode($response, true);

// Mostrar datos para verificar
echo '<pre>';
print_r($data);
echo '</pre>';
