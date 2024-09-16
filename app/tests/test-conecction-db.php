<?php
// Incluir la configuración de la base de datos
require_once 'app/config/database.php';

try {
    // Verificar la conexión
    if ($GLOBALS['conn']->ping()) {
        echo "Conexión a la base de datos exitosa.";
    } else {
        echo "Error en la conexión a la base de datos.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

