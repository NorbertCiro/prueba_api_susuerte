<?php
// Configuración de la base de datos
$host = 'db'; // Cambia esto según tu entorno
$db = 'root'; // Nombre base de datos
$user = 'root'; // usuario de base de datos
$password = 'prueba_api_susuerte'; // contraseña de base de datos

// Crear la conexión
$conn = new mysqli($host, $user, $password, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Verificar si los datos ya están almacenados
$result = $conn->query("SELECT COUNT(*) as total FROM users");
$row = $result->fetch_assoc();

if ($row['total'] == 0) {
    // Consumir la API externa
    $apiUrl = 'https://jsonplaceholder.typicode.com/users';
    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    // Iterar sobre los datos y preparar la consulta SQL
    foreach ($data as $user) {
        // Preparar la consulta SQL para insertar datos
        $stmt = $conn->prepare("
            INSERT INTO users (id, name, username, email, address_city, phone, website, company_name, company_bs)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE 
                name = VALUES(name),
                username = VALUES(username),
                email = VALUES(email),
                address_city = VALUES(address_city),
                phone = VALUES(phone),
                website = VALUES(website),
                company_name = VALUES(company_name),
                company_bs = VALUES(company_bs)
        ");

        // Extraer datos del usuario
        $address = $user['address'];
        $company = $user['company'];

        // Vincular parámetros y ejecutar la consulta
        $stmt->bind_param(
            'issssssss',
            $user['id'],
            $user['name'],
            $user['username'],
            $user['email'],
            $address['city'],
            $user['phone'],
            $user['website'],
            $company['name'],
            $company['bs']
        );

        // Ejecutar la consulta
        if (!$stmt->execute()) {
            echo "Error al insertar el usuario: " . $stmt->error;
        }
    }

    echo "Datos almacenados correctamente.";
} else {
    echo "Los datos ya están almacenados.";
}

// Cerrar la conexión
$conn->close();

