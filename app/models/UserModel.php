<?php

class UserModel {
    private $conn;

    // Constructor que inicializa la conexión de la base de datos
    public function __construct() {
        // Utiliza la conexión global que ya debería estar configurada en config/database.php
        if (isset($GLOBALS['conn'])) {
            $this->conn = $GLOBALS['conn'];
        } else {
            die('Error: No se pudo establecer la conexión con la base de datos.');
        }
    }

    // Método para obtener todos los usuarios
    public function getUsers() {
        $query = 'SELECT * FROM users';
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    // Método para obtener un usuario por su ID
    public function getUserById($id) {
        $query = 'SELECT * FROM users WHERE id = ?';
        $stmt = $this->conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Método para agregar un nuevo usuario
    public function addUser($data) {
        $query = 'INSERT INTO users (name, username, email, address_city, phone, website, company_name, company_bs)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            'ssssssss',
            $data['name'],
            $data['username'],
            $data['email'],
            $data['address_city'],
            $data['phone'],
            $data['website'],
            $data['company_name'],
            $data['company_bs']
        );
        return $stmt->execute();
    }

    // Método para actualizar un usuario existente
    public function updateUser($id, $data) {
        $query = 'UPDATE users SET 
                    name = ?, 
                    username = ?, 
                    email = ?, 
                    address_city = ?, 
                    phone = ?, 
                    website = ?, 
                    company_name = ?, 
                    company_bs = ? 
                  WHERE id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param(
            'ssssssssi',
            $data['name'],
            $data['username'],
            $data['email'],
            $data['address_city'],
            $data['phone'],
            $data['website'],
            $data['company_name'],
            $data['company_bs'],
            $id
        );
        return $stmt->execute();
    }

    // Método para eliminar un usuario
    public function deleteUser($id) {
        $query = 'DELETE FROM users WHERE id = ?';
        $stmt = $this->conn->prepare($query);

        if ($stmt) {
            $stmt->bind_param('i', $id);
            return $stmt->execute(); // Retorna true en caso de éxito
        } else {
            return false;
        }
    }
}
