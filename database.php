<?php
class Contacts {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "contacts";
    private $conn;

    public function __construct() {
        // Membuat koneksi
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database);

        // Memeriksa koneksi
        if (!$this->conn) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }
    }

    // Fungsi untuk menampilkan semua kontak
    public function selectContacts() {
        $sql = "SELECT * FROM contact";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    // Fungsi untuk menambahkan kontak baru
    public function insertContact($no_hp, $owner, $email, $alamat, $tanggal_lahir, $jenis_kelamin, $perusahaan) {
        $sql = "INSERT INTO contact (no_hp, owner, email, alamat, tanggal_lahir, jenis_kelamin, perusahaan) VALUES ('$no_hp', '$owner', '$email', '$alamat', '$tanggal_lahir', '$jenis_kelamin', '$perusahaan')";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    // Fungsi untuk menghapus kontak berdasarkan ID
    public function deleteContact($id_contact) {
        $sql = "DELETE FROM contact WHERE id_contact = '$id_contact'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    // Fungsi untuk mengedit kontak berdasarkan ID
    public function updateContact($id_contact, $no_hp, $owner, $email, $alamat, $tanggal_lahir, $jenis_kelamin, $perusahaan) {
        $sql = "UPDATE contact SET no_hp='$no_hp', owner='$owner', email='$email', alamat='$alamat', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', perusahaan='$perusahaan' WHERE id_contact='$id_contact'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function __destruct() {
        // Menutup koneksi
        mysqli_close($this->conn);
    }

    // Fungsi untuk mengambil data kontak berdasarkan ID
    public function getContactById($id_contact) {
        $sql = "SELECT * FROM contact WHERE id_contact = '$id_contact'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }
    }

}
?>
