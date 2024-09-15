<?php
// Incluye la conexión a la base de datos desde config/database.php
require_once 'config/database.php';

// Consumir la API externa
$apiUrl = 'https://jsonplaceholder.typicode.com/users';
$response = file_get_contents($apiUrl);

if ($response === FALSE) {
    die('Error al consumir la API');
}

$data = json_decode($response, true);

// Iterar sobre los datos y preparar la consulta SQL
foreach ($data as $user) {
    // Preparar la consulta SQL para insertar datos
    $stmt = $conn->prepare("
        INSERT INTO users (id, name, username, email, address_street, address_suite, address_city, address_zipcode, address_lat, address_lng, phone, website, company_name, company_catchPhrase, company_bs)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE 
            name = VALUES(name),
            username = VALUES(username),
            email = VALUES(email),
            address_street = VALUES(address_street),
            address_suite = VALUES(address_suite),
            address_city = VALUES(address_city),
            address_zipcode = VALUES(address_zipcode),
            address_lat = VALUES(address_lat),
            address_lng = VALUES(address_lng),
            phone = VALUES(phone),
            website = VALUES(website),
            company_name = VALUES(company_name),
            company_catchPhrase = VALUES(company_catchPhrase),
            company_bs = VALUES(company_bs)
    ");

    // Extraer datos del usuario
    $address = $user['address'];
    $company = $user['company'];

    // Bind parameters y ejecutar la consulta
    $stmt->bind_param(
        'issssssssssssss',
        $user['id'],
        $user['name'],
        $user['username'],
        $user['email'],
        $address['street'],
        $address['suite'],
        $address['city'],
        $address['zipcode'],
        $address['geo']['lat'], // Ahora se trata como cadena (string)
        $address['geo']['lng'], // Ahora se trata como cadena (string)
        $user['phone'],
        $user['website'],
        $company['name'],
        $company['catchPhrase'],
        $company['bs']
    );

    // Ejecutar la consulta
    if (!$stmt->execute()) {
        echo "Error al insertar el usuario: " . $stmt->error;
    }
}

// Cerrar la conexión
$conn->close();
echo 'Datos almacenados correctamente';
