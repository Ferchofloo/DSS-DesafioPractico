<?php
class Database {
    public static function connect() {
        $conn = new mysqli("localhost", "root", "", "biblioteca");
        if ($conn->connect_error) {
            die("Error: " . $conn->connect_error);
        }
        return $conn;
    }
}
?>
