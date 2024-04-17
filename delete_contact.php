<?php
// Include file models.php untuk mengakses kelas Contacts
include 'database.php';

// Periksa apakah parameter ID kontak telah diterima dari permintaan HTTP GET
if(isset($_GET['id'])){
    // Mendapatkan ID kontak dari permintaan HTTP GET
    $id_contact = $_GET['id'];
    
    // Membuat objek Contacts
    $contacts = new Contacts();

    // Menghapus kontak dari database berdasarkan ID
    $result = $contacts->deleteContact($id_contact);

    // Periksa apakah penghapusan berhasil
    if ($result) {
        // Jika berhasil, kirimkan respons dengan pesan sukses
        echo "Kontak berhasil dihapus.";
        
        // Redirect to dashboard
        echo "<script>window.location.href = 'dashboard.php';</script>";
    } else {
        // Jika gagal, kirimkan respons dengan pesan gagal
        echo "Gagal menghapus kontak.";
    }
} else {
    // Jika parameter ID tidak diterima, kirimkan respons dengan pesan error
    echo "ID kontak tidak ditemukan.";
}
?>
