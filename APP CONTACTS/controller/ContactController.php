<?php
include '../models/Contacts.php';

class ContactController {
    public function handleRequest() {
        // Jika metode request adalah POST dan ID kontak tersedia
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_contact'])) {
            // Mendapatkan ID kontak dari data POST
            $id_contact = $_POST['id_contact'];
    
            // Mendapatkan data kontak berdasarkan ID
            $contact = $this->getContactById($id_contact);
    
            // Jika data kontak ditemukan
            if ($contact) {
                // Panggil metode updateData()
                $this->updateData($contact);
            } else {
                echo "Data kontak tidak ditemukan.";
            }
        } 
        // Jika metode request adalah POST
        elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Panggil metode insertData()
            $this->insertData();
        } 
        // Jika metode request adalah GET
        elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Tidak perlu melakukan apapun karena halaman edit akan ditampilkan
            // Formulir edit akan mengirim data melalui metode POST
        } 
        // Jika metode request tidak valid
        else {
            echo "Akses tidak sah.";
        }
    }

    private function insertData() {
        extract($_POST); // Ekstrak data dari formulir menjadi variabel terpisah

        // Membuat objek Contacts
        $contacts = new Contacts();

        // Insert data ke database
        $result = $contacts->insertContact($no_hp, $owner, $email, $alamat, $tanggal_lahir, $jenis_kelamin, $perusahaan);

        // Cek apakah berhasil diinsert atau tidak
        if ($result) {
            echo "Data berhasil ditambahkan.";
            // Redirect to dashboard
            echo "<script>window.location.href = '../views/dashboard.php';</script>";
        } else {
            echo "Gagal menambahkan data.";
        }
    }
    public function getContactById($id_contact) {
        // Membuat objek Contacts
        $contacts = new Contacts();
    
        // Mendapatkan data kontak berdasarkan ID
        return $contacts->getContactById($id_contact);
    }
    

    private function updateData() {
        extract($_POST); // Ekstrak data dari formulir menjadi variabel terpisah

        // Membuat objek Contacts
        $contacts = new Contacts();

        // Update data ke database
        $result = $contacts->updateContact($id_contact, $no_hp, $owner, $email, $alamat, $tanggal_lahir, $jenis_kelamin, $perusahaan);

        // Cek apakah berhasil diupdate atau tidak
        if ($result) {
            // Jika berhasil, redirect ke dashboard
            header("Location: ../views/dashboard.php");
            exit();
        } else {
            // Jika gagal, tampilkan pesan error
            echo "Gagal mengupdate data.";
        }
    }

    public function redirectToDelete($id) {
        // Check if the 'id' parameter exists in the URL
        if(isset($id)) {
            // Get the contact ID from the URL
            $id_contact = $id;

            // Create an instance of Contacts
            $contacts = new Contacts();

            // Call the deleteContact method to delete the contact
            $result = $contacts->deleteContact($id_contact);

            // Redirect back to the dashboard or any other appropriate page
            header("Location: ../views/dashboard.php");
            exit();
        } else {
            // Redirect to an error page or handle the situation appropriately
            echo "Invalid request: Contact ID is missing.";
        }
    }
    
    public function deleteContactController() {
        // Check if the 'action' parameter exists and is set to 'delete' in the URL
        if(isset($_GET['action']) && $_GET['action'] === 'delete') {
            // Check if the 'id' parameter exists in the URL
            if(isset($_GET['id'])) {
                // Get the contact ID from the URL
                $id_contact = $_GET['id'];
    
                // Create an instance of Contacts
                $contacts = new Contacts();
    
                // Call the deleteContact method to delete the contact
                $result = $contacts->deleteContact($id_contact);
    
                // Redirect back to the dashboard
                header("Location: ../views/dashboard.php");
                exit();
            } else {
                // Redirect to an error page or handle the situation appropriately
                echo "Invalid request: Contact ID is missing.";
            }
        }
    }
}

// Membuat objek dari ContactController
$contactController = new ContactController();

// Handle request
if(isset($_GET['id'])) {
    // Jika ada parameter 'id', panggil method deleteContactController
    $contactController->deleteContactController();
} else {
    // Jika tidak, panggil method handleRequest untuk menangani request lainnya
    $contactController->handleRequest();
}
?>
