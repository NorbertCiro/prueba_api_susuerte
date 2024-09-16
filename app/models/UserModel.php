<?php
class UserModel {
    private $conn;

    public function __construct() {
        // Asume que ya tienes la conexión en config/database.php
        $this->conn = $GLOBALS['conn'];
    }

    public function getUsers() {
        $query = 'SELECT * FROM users';
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserById($id) {
        $query = 'SELECT * FROM users WHERE id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function addUser($name, $email) {
        $query = 'INSERT INTO users (name, email) VALUES (?, ?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss', $name, $email);
        return $stmt->execute();
    }

    public function updateUser($id, $name, $email) {
        $query = 'UPDATE users SET name = ?, email = ? WHERE id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssi', $name, $email, $id);
        return $stmt->execute();
    }

    public function deleteUser($id) {
        $query = 'DELETE FROM users WHERE id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    // Otros métodos para actualizar, eliminar, etc
}
