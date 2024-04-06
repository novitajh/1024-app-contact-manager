<?php
include 'models.php';

// Membuat objek Contacts
$contacts = new Contacts();

// Mengambil data kontak dari database
$result = $contacts->selectContacts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard - Contact Manager</title>
<link rel="stylesheet" href="style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h2>Akun</h2>
    <ul>
      <li><a href="#" class="active">Dashboard</a></li>
      <li><a href="#">Kontak</a></li>
      <li><a href="#">Grup Kontak</a></li>
      <li><a href="#">Pengaturan</a></li>
      <li><a href="#" id="logout-btn">Logout</a></li> <!-- Tambahkan id="logout-btn" -->
    </ul>
  </div>

  <!-- Content -->
  <div class="content">
    <div class="header">
      <h1>Contacts Manager Dashboard</h1>
      <a href="#" class="add-btn">Tambah Kontak</a>
    </div>
    <table id="contact-table">
      <thead>
        <tr>
          <th>ID Contact</th>
          <th>No HP</th>
          <th>Owner</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>Tanggal Lahir</th>
          <th>Jenis Kelamin</th>
          <th>Perusahaan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
      <?php
      // Periksa apakah ada data yang ditemukan
      if (mysqli_num_rows($result) > 0) {
          // Loop untuk menampilkan setiap baris data
          while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row["id_contact"] . "</td>";
              echo "<td>" . $row["no_hp"] . "</td>";
              echo "<td>" . $row["owner"] . "</td>";
              echo "<td>" . $row["email"] . "</td>";
              echo "<td>" . $row["alamat"] . "</td>";
              echo "<td>" . $row["tanggal_lahir"] . "</td>";
              echo "<td>" . $row["jenis_kelamin"] . "</td>";
              echo "<td>" . $row["perusahaan"] . "</td>";
              echo "<td>
                        <button class='edit-btn'>Edit</button>
                        <button class='delete-btn'>Delete</button>
                    </td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='9'>Tidak ada data</td></tr>";
      }
      ?>
      </tbody>
    </table>
  </div>

  <div id="myModal" class="modal">
    <div class="modal-content">
      <form id="contact-form">
        <label for="contact-email">Email:</label>
        <input type="email" id="contact-email" name="contact-email" required>
        
        <label for="contact-address">Alamat:</label>
        <input type="text" id="contact-address" name="contact-address" required>
        
        <label for="contact-dob">Tanggal Lahir:</label>
        <input type="date" id="contact-dob" name="contact-dob" required>
        
        <label for="contact-gender">Jenis Kelamin:</label>
        <select id="contact-gender" name="contact-gender" required>
          <option value="Perempuan">Perempuan</option>
          <option value="Laki-laki">Laki-laki</option>
        </select>
        
        <label for="contact-company">Perusahaan:</label>
        <input type="text" id="contact-company" name="contact-company" required>
        
        <button type="submit" id="save-contact-btn">Simpan</button>
        <button type="button" class="cancel-btn">Batal</button>
      </form>
    </div>
  </div>

  <script src="script.js"></script>
  <script>
    document.getElementById('logout-btn').addEventListener('click', function() {
      // Redirect to login page
      window.location.href = 'login.html';
    });
  </script>
</body>
</html>
