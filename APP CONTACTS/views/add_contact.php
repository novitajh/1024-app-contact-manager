<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <form action="../controller/ContactController.php?action=insertContact" method="POST">
    <div class="container">
    <h2>Tambah Kontak Baru</h2>
        <label for="no_hp">No HP:</label>
        <input type="text" id="no_hp" name="no_hp" required><br>

        <label for="owner">Owner:</label>
        <input type="text" id="owner" name="owner" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" required><br>

        <label for="tanggal_lahir">Tanggal Lahir:</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select><br>

        <label for="perusahaan">Perusahaan:</label>
        <input type="text" id="perusahaan" name="perusahaan" required><br>

        <button type="submit">Simpan</button>
    </form>
</div>
</body>
</html>
