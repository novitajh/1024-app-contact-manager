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

        $sql = "ALTER TABLE contact_list MODIFY COLUMN id_contact INT AUTO_INCREMENT";
        
    }

        // Fungsi untuk mengambil data kontak berdasarkan ID
    public function getContactById($id_contact) {
        $sql = "SELECT * FROM contact_list WHERE id_contact = '$id_contact'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return false;
        }
    }

    // Fungsi untuk menampilkan semua kontak
    public function selectContacts() {
        $sql = "SELECT * FROM contact_list";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    // Fungsi untuk menambahkan kontak baru
    public function insertContact($no_hp, $owner, $email, $alamat, $tanggal_lahir, $jenis_kelamin, $perusahaan) {
        $sql = "INSERT INTO contact_list (no_hp, owner, email, alamat, tanggal_lahir, jenis_kelamin, perusahaan) VALUES ('$no_hp', '$owner', '$email', '$alamat', '$tanggal_lahir', '$jenis_kelamin', '$perusahaan')";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    // Fungsi untuk menghapus kontak berdasarkan ID
    public function deleteContact($id_contact) {
        $sql = "DELETE FROM contact_list WHERE id_contact = '$id_contact'";
        $result = mysqli_query($this->conn, $sql);

        // Periksa apakah penghapusan berhasil
        if ($result) {
            // Jika berhasil, atur ulang ID kontak
            $resetIdSql = "ALTER TABLE contact_list AUTO_INCREMENT = 1";
            mysqli_query($this->conn, $resetIdSql);
        }

        return $result;
    }

    // Fungsi untuk mengedit kontak berdasarkan ID
    public function updateContact($id_contact, $no_hp, $owner, $email, $alamat, $tanggal_lahir, $jenis_kelamin, $perusahaan) {
        $sql = "UPDATE contact_list SET no_hp='$no_hp', owner='$owner', email='$email', alamat='$alamat', tanggal_lahir='$tanggal_lahir', jenis_kelamin='$jenis_kelamin', perusahaan='$perusahaan' WHERE id_contact='$id_contact'";
        $result = mysqli_query($this->conn, $sql);
        return $result;
    }

    public function __destruct() {
        // Menutup koneksi
        mysqli_close($this->conn);
    }



}
?>
