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
}
