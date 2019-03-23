<?php include 'includes/db.php'; 
date_default_timezone_set ('Europe/Sofia');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Basic Facebook</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="styles/style.css">
  <link rel="stylesheet" href="styles/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Dancing Script' rel='stylesheet'>
</head>

<body>
  <a name="top" href=""></a>
  <nav class="navbar navbar-primary">
    <div class="container-fluid">
      <div class="nav navbar-nav">
        <a href="index.php"><img class="logo" src="img/bf_logo.png"/></a>
      </div>
      <div>
        <ul class="nav navbar-nav">
          <?php
          session_start();
          if (empty($_SESSION['username'])) {?>
            <li class="active"><a href="login_page.php">Login <span class="sr-only">(current)</span></a></li>
            <li class="active"><a href="registration.php">Register</a></li>
          <?php }else{ ?>
            <li class="fa fa-user userblock"><?php echo $_SESSION['username'];?></li>
            <li class="active"><a href="post_form.php">Create new post</a></li>
            <li class="active"><a href="logout_page.php">Logout</a></li>
          <?php };
          ?>
        </ul>
      </div>
      <img class="afterlogo" src="img/afterlogo.png"/>
    </div>
  </nav>