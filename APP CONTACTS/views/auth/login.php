<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="stylesheet" href="../../style.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="form-container">
      <form id="login-form" action="../../controller/AuthController.php?action=login" method="post">
        <h2>Login</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
        <p class="message">Belum punya akun? <a href="register.php">Register</a></p>
      </form>
      <div class="d-flex justify-content-between">
                        <a href="<?=BASEURL?>">Home</a>
                        <a href="<?=urlpath('register');?>">Register</a>
      </div>
    </div>
  </div>
</body>
</html>
