<?php
class Contacts {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "contacts";
    private $conn;

    public function __construct() {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        if (!$this->conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    }

    public function selectContacts() {
        $sql = "SELECT * FROM contact";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    
    public function insertContact($no_hp, $owner, $email, $alamat, $tanggal_lahir, $jenis_kelamin, $perusahaan) {
        $sql = "INSERT INTO contact (no_hp, owner, email, alamat, tanggal_lahir, jenis_kelamin, perusahaan) VALUES ('$no_hp', '$owner', '$email', '$alamat', '$tanggal_lahir', '$jenis_kelamin', '$perusahaan')";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    
    public function deleteContact($id_contact) {
        $sql = "DELETE FROM contact WHERE id_contact = '$id_contact'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }
    
    public function updateContact($id_contact, $no_hp, $owner, $email, $alamat, $tanggal_lahir, $jenis_kelamin, $perusahaan) {
        $sql = "UPDATE contact SET no_hp='$no_hp', owner='$owner', email='$email', alamat='$alamat', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', perusahaan='$perusahaan' WHERE id_contact='$id_contact'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function __destruct() {
        // Menutup koneksi
        mysqli_close($this->conn);
    }
}
?>
