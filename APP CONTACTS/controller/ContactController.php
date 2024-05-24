<?php
include_once '../models/Contact.php';

class ContactController {
    public function handleRequest() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_contact'])) {
            $id_contact = $_POST['id_contact'];
            $contact = $this->getContactById($id_contact);
            if ($contact) {
                $this->updateData();
            } else {
                echo "Data kontak tidak ditemukan.";
            }
        } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
            $this->insertData();
        } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
            // No action required for GET method
        } else {
            echo "Akses tidak sah.";
        }
    }

    private function insertData() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }

        $post = array_map('htmlspecialchars', $_POST);
        $contact = Contact::insert([
            'phone_number' => $post['phone_number'], 
            'owner' => $post['owner'],
            'user_fk' => $_SESSION['user']['id'],
            'city_fk' => $post['city']
        ]);

        if ($contact) {
            echo "Data berhasil ditambahkan.";
            echo "<script>window.location.href = '../views/dashboard.php';</script>";
        } else {
            echo "Gagal menambahkan data.";
        }
    }

    public function getContactById($id_contact) {
        return Contact::select($id_contact);
    }

    private function updateData() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }

        $post = array_map('htmlspecialchars', $_POST);
        $contact = Contact::update([
            'id' => $post['id_contact'],
            'phone_number' => $post['phone_number'],
            'owner' => $post['owner'],
            'city_fk' => $post['city']
        ]);

        if ($contact) {
            header("Location: ../views/dashboard.php");
            exit();
        } else {
            echo "Gagal mengupdate data.";
        }
    }

    public function deleteContactController() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }

        if (isset($_GET['id'])) {
            $id_contact = $_GET['id'];
            $result = Contact::delete($id_contact);
            header("Location: ../views/dashboard.php");
            exit();
        } else {
            echo "Invalid request: Contact ID is missing.";
        }
    }

    static function api() {
        $url = 'https://api.coinlore.net/api/tickers/';
        $json = file_get_contents($url);
        $data = json_decode($json, true);
        if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
            echo "Error decoding JSON: " . json_last_error_msg();
        } else {
            var_dump($data['data'][0]['id']);
        }
    }
    private static function checkAuth() {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASEURL.'login?auth=false');
            exit;
        }
    }
}
?>
