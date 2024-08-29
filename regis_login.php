<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="img_gundam/GUNDAM HOBBY SHOP.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="assets/css/new_style.css">
  <title>Gundam Hobby Shop.store</title>
</head>
<body>
    <video autoplay muted loop >
        <source src="VDO/Gundam2.mp4" type="video/mp4">
      </video>
        <div class="wrapper">
    <div class="form-wrapper sign-in">
    <form action="login_db.php" method="post">
        <h2>Login</h2>
        <div class="input-group">
        <input type="email" name="email" required>
          <label for="">Username</label>
        </div>
        <div class="input-group">
          <input type="password" name="password" required>
          <label for="">Password</label>
        </div>
       <br>
       <button type="submit" name="submit">Login</button>
        <div class="signUp-link">
          <p>Don't have an account? <a href="#" class="signUpBtn-link">Register</a></p>
        </div>
      </form>
    </div>

    <div class="form-wrapper sign-up">
      <form action="register_db.php" method="post">
        <h2>Sign Up</h2>
        <div class="input-group">
          <input type="text" name="firstname" required>
          <label for="">Username</label>
        </div>
        <div class="input-group">
          <input type="text" name="tel" required>
          <label for="">Tel</label>
        </div>
        <div class="input-group">
          <input type="email" name="email" required>
          <label for="">Email</label>
        </div>
        <div class="input-group">
          <input type="password" name="password" required>
          <label for="">Password</label>
        </div>
        <button type="submit" name="submit">Register</button>
        <div class="signUp-link">
          <p>Already have an account? <a href="#" class="signInBtn-link">Login</a></p>
        </div>
      </form>
    </div>
  </div>

 
  <script src="assets/js/script_test.js"></script>
</body>
</html>