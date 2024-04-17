<?php
include 'database.php';

// Ambil data dari formulir
$id_contact = $_POST['id_contact'];
$no_hp = $_POST['no_hp'];
$owner = $_POST['owner'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$tanggal_lahir = $_POST['tanggal_lahir'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$perusahaan = $_POST['perusahaan'];

// Membuat objek Contacts
$contacts = new Contacts();

// Update data ke database
$result = $contacts->updateContact($id_contact, $no_hp, $owner, $email, $alamat, $tanggal_lahir, $jenis_kelamin, $perusahaan);

// Cek apakah berhasil diupdate atau tidak
if ($result) {
    echo "Data berhasil diupdate.";
    // Redirect to dashboard
    echo "<script>window.location.href = 'dashboard.php';</script>";
} else {
    echo "Gagal mengupdate data.";
}
?>
