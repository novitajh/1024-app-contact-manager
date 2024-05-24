<?php

include_once '../config/conn.php';

class User {
    static function login($data=[]) {
        extract($data);
        global $conn;

       
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            $hashedPassword = $user['password'];
            if (password_verify($password, $hashedPassword)) {
                unset($user['password']); 
                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    static function register($data=[]) {
        extract($data);
        global $conn;
        
        $inserted_at = date('Y-m-d H:i:s');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, telephone, email, username, password, inserted_at) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql); 
        $stmt->bind_param('ssssss', $name, $telephone, $email, $username, $hashedPassword, $inserted_at);
        $stmt->execute();

        return $stmt->affected_rows > 0;
    }

    static function getPassword($username) { 
        global $conn;
        $sql = "SELECT password FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            return $result->fetch_assoc()['password']; 
        } else {
            return false;
        }
    }

    static function update($data=[]) { 
    }

    static function delete($id='') {   
    }
}
?>
