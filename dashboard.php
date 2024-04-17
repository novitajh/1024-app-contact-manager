<?php
include 'database.php';

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
      <a href="add_contact.php" class="add-btn">Tambah Kontak</a>
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
                        <button class='edit-btn' onclick='editContact(" . $row['id_contact'] . ")'>Edit</button>
                        <button class='delete-btn' onclick='deleteContact(" . $row['id_contact'] . ")'>Delete</button>
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

  <script src="script.js"></script>
  <script>
    document.getElementById('logout-btn').addEventListener('click', function() {
      // Redirect to login page
      window.location.href = 'login.html';
    });

    function editContact(id) {
      // Redirect to edit_contact.php with contact ID as parameter
      window.location.href = 'edit_contact.php?id=' + id;
    }

    function deleteContact(id) {
      // Confirmation dialog
      if (confirm('Apakah Anda yakin ingin menghapus kontak ini?')) {
        // Send request to delete_contact.php with contact ID as parameter
        window.location.href = 'delete_contact.php?id=' + id;
      }
    }
  </script>
</body>
</html>
