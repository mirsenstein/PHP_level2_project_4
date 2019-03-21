<?php include 'includes/db.php'; 

if (isset($_POST['submit'])) {
    

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    // $password = password_hash($password, PASSWORD_DEFAULT);

    $login_query = "SELECT * FROM users WHERE username='$username'";

    $result = mysqli_query($con, $login_query);

    $row = mysqli_fetch_array($result);

    if ($row['username'] == $username && password_verify($password, $row['password'])) {
        echo "Welcome, " . $row['names'];
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['names'] = $row['names'];
        $_SESSION['user_id'] = $row['user_id'];

        header('Location: index.php');
        }else {
            echo "Login unsuccesfull! Try again? ";
            echo '<a href="login_page.php">Login</a>';
    }
}else{
    ?>
    <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Login</title>
            <link rel="stylesheet" href="styles/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="styles/style.css" />

        </head>

        <body>

            <div class="form">
                <h1>Login</h1>
                <form name="registration" action="" method="post">
                    <input type="text" name="username" placeholder="Username" required />
                    <input type="password" name="password" placeholder="Password" required />
                    <input type="submit" name="submit" value="Login" />
                </form>
            </div>
            <div>
                <a href="registration.php">Register</a>
            </div>

        </body>
        </html>
<?php 
} ?>