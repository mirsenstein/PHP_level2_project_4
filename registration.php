<?php include 'includes/db.php';
// require('db.php');
// If form submitted, insert values into the database.
if (isset($_POST['submit'])){
        
 $username = $_POST['username'];
 $password = $_POST['password'];
 $names =    $_POST['names'];
    
    $query = "INSERT into `users` (username, password, names)  VALUES ('$username', '".md5($password)."', '$names')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
                <h3>You are registered successfully.</h3>
                <br/>Click here to <a href='login_page.php'>Login</a></div>";
        }
}else{ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <link rel="stylesheet" href="styles/style.css" />
</head>

<body>

    <div class="form">
    <h1>Registration</h1>
        <form name="registration" action="" method="post">
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="text" name="names" placeholder="Names" required />
            <input type="submit" name="submit" value="Register" />
        </form>
    </div>
<?php
}
?>
</body>
</html>