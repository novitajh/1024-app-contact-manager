<?php
include 'database.php';

// Ambil data dari formulir
$no_hp = $_POST['no_hp'];
$owner = $_POST['owner'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$perusahaan = $_POST['perusahaan'];

// Membuat objek Contacts
$contacts = new Contacts();

// Insert data ke database
$result = $contacts->insertContact($no_hp, $owner, $email, $alamat, $tanggal_lahir, $jenis_kelamin, $perusahaan);

// Cek apakah berhasil diinsert atau tidak
if ($result) {
    echo "Data berhasil ditambahkan.";
    // Redirect to dashboard
    echo "<script>window.location.href = 'dashboard.php';</script>";
} else {
    echo "Gagal menambahkan data.";
}
?>
