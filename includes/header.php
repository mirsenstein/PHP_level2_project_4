<?php include 'includes/db.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <title>Basic Facebook</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="styles/style.css"> -->
  <link rel="stylesheet" href="styles/bootstrap.min.css">
</head>

<body>

  <div class="navigation">
   <?php
  session_start();
   if (empty($_SESSION['username'])) {?>
    <div class="button_login">
      <a href="login_page.php">Login</a>
    </div>
      <div class="button_register">
      <a href="registration.php">Register</a>
    </div>
    <?php }else{ ?>
      <div class="button_logout">
      <a href="logout_page.php">Logout</a>
    </div>

   <?php };
    ?>
  </div>
</body>
</html>