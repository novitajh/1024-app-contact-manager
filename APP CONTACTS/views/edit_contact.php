<?php
include_once '../controller/ContactController.php';

// Mendapatkan ID kontak dari URL
$id_contact = $_GET['id'];

// Membuat objek ContactController
$contactController = new ContactController();

// Mendapatkan data kontak berdasarkan ID
$contact = $contactController->getContactById($id_contact);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kontak - Contact Manager</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Edit Kontak</h2>
        <form action="../controller/ContactController.php?action=updateData" method="POST">
        <input type="hidden" name="id_contact" value="<?php echo $contact['id_contact']; ?>">
            
            <label for="no_hp">No HP:</label>
            <input type="text" id="no_hp" name="no_hp" value="<?php echo $contact['no_hp']; ?>" required>

            <label for="owner">Owner:</label>
            <input type="text" id="owner" name="owner" value="<?php echo $contact['owner']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $contact['email']; ?>" required>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="<?php echo $contact['alamat']; ?>" required>

            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $contact['tanggal_lahir']; ?>" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Perempuan" <?php if($contact['jenis_kelamin'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
                <option value="Laki-laki" <?php if($contact['jenis_kelamin'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
            </select>

            <label for="perusahaan">Perusahaan:</label>
            <input type="text" id="perusahaan" name="perusahaan" value="<?php echo $contact['perusahaan']; ?>" required>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
