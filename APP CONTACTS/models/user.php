<?php

include_once 'config/conn.php';

class UserModel {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "contacts";
    private $conn;

    public function __construct() {
        // Membuat koneksi
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        // Memeriksa koneksi
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
        else{
            echo "Koneksi Berhasil";
        }
    }

    public function createUser($name, $telephone, $email, $username, $password) {
        // Hash password sebelum disimpan ke database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Persiapkan statement SQL
        $sql = "INSERT INTO user (name, telephone, email, username, password)
                VALUES (?, ?, ?, ?, ?)";
        
        // Persiapkan dan jalankan prepared statement
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $telephone, $email, $username, $hashedPassword);
        
        // Eksekusi query
        if ($stmt->execute()) {
            return true; // Registrasi berhasil
        } else {
            return false; // Registrasi gagal
        }
    }
    
    

    public function validateUser($username, $password)
    {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }
}
?>
