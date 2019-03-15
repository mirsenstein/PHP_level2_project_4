<?php include 'includes/header.php';
// session_start();

if (!empty($_SESSION['username'])) {
 echo $_SESSION['username'];
};