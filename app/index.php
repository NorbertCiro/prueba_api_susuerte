<?php
// Incluye la conexión a la base de datos desde config/database.php
require_once 'config/database.php';

// Consumir la API externa
require_once 'config/consume_api.php';

// Incluye el controlador
require_once 'controllers/UserController.php';

// Verificar si se solicitó eliminar un usuario
if (isset($_GET['delete_id'])) {
    $id = intval($_GET['delete_id']);
    $controller = new UserController();
    $controller->deleteUser($id);
    exit();  // Detener la ejecución del script después de eliminar
}


// Instancia el controlador para cargar el home
$controller = new UserController();
$controller->index();

// Consumir la API externa
// $data = json_decode($response, true);

// // Iterar sobre los datos y preparar la consulta SQL
// foreach ($data as $user) {
//     // Preparar la consulta SQL para insertar datos
//     $stmt = $conn->prepare("
//         INSERT INTO users (id, name, username, email, address_city, phone, website, company_name, company_bs)
//         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
//         ON DUPLICATE KEY UPDATE 
//             name = VALUES(name),
//             username = VALUES(username),
//             email = VALUES(email),
//             address_city = VALUES(address_city),
//             phone = VALUES(phone),
//             website = VALUES(website),
//             company_name = VALUES(company_name),
//             company_bs = VALUES(company_bs)
//     ");

//     // Extraer datos del usuario
//     $address = $user['address'];
//     $company = $user['company'];

//     // Bind parameters y ejecutar la consulta
//     $stmt->bind_param(
//         'issssssss',
//         $user['id'],
//         $user['name'],
//         $user['username'],
//         $user['email'],
//         $address['city'], // Ahora se trata como cadena (string)
//         $user['phone'],
//         $user['website'],
//         $company['name'],
//         $company['bs']
//     );

//     // Ejecutar la consulta
//     if (!$stmt->execute()) {
//         echo "Error al insertar el usuario: " . $stmt->error;
//     }
// }

// // Cerrar la conexión
// $conn->close();
// echo 'Datos almacenados correctamente';

