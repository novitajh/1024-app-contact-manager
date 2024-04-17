<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kontak - Contact Manager</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Tambah Kontak Baru</h2>
        <form action="insert_contact.php" method="POST">
            <label for="no_hp">No HP:</label>
            <input type="text" id="no_hp" name="no_hp" required>

            <label for="owner">Owner:</label>
            <input type="text" id="owner" name="owner" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required>

            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Perempuan">Perempuan</option>
                <option value="Laki-laki">Laki-laki</option>
            </select>

            <label for="perusahaan">Perusahaan:</label>
            <input type="text" id="perusahaan" name="perusahaan" required>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
