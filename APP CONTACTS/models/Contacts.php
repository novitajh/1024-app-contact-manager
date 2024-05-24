<?php
include_once '../config/conn.php';

class Contact {
    public static function insert($data) {
        global $conn;
        $inserted_at = date('Y-m-d H:i:s', strtotime('now'));
        $sql = "INSERT INTO contacts (phone_number, owner, inserted_at, user_fk, city_fk) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssii', $data['phone_number'], $data['owner'], $inserted_at, $data['user_fk'], $data['city_fk']);
        return $stmt->execute();
    }

    public static function update($data) {
        global $conn;
        $updated_at = date('Y-m-d H:i:s', strtotime('now'));
        $sql = "UPDATE contacts SET phone_number = ?, owner = ?, updated_at = ?, city_fk = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssii', $data['phone_number'], $data['owner'], $updated_at, $data['city_fk'], $data['id']);
        return $stmt->execute();
    }

    public static function delete($id) {
        global $conn;
        $deleted_at = date('Y-m-d H:i:s', strtotime('now'));
        $sql = "UPDATE contacts SET deleted_at = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('si', $deleted_at, $id);
        return $stmt->execute();
    }

    public static function select($id='') {
        global $conn;
        $sql = "SELECT * FROM contacts WHERE deleted_at IS NULL";
        if ($id != '') {
            $sql .= " AND id = $id";
        }
        $result = $conn->query($sql);
        $rows = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }
        $result->free();
        return $rows;
    }
    public static function rawQuery($query) {
        global $conn;
        $result = $conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
