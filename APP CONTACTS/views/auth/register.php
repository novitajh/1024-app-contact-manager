<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register</title>
<link rel="stylesheet" href="../../style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
  <div class="form-container">
  <form id="login-form" action="../../controller/AuthController.php?action=register" method="post">
        <h2>Register</h2>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="telephone">Telephone:</label>
        <input type="tel" id="telephone" name="telephone" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Register</button>
        <p class="message">Sudah punya akun? <a href="login.php">Login</a></p>
      </form>
      <div class="d-flex justify-content-between">
                        <a href="<?=BASEURL?>">Home</a>
                        <a href="<?= urlpath('login'); ?>">Login</a>
      </div>
    </div>
  </div>
</body>
</html>
