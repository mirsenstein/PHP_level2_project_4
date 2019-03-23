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

    } else {
        echo "<div style='border: 2px solid #2B1D67; font-family: Arial Narrow, Arial, sans-serif; text-align: center; padding: 5px 5px;'>
            <h3>Login unsuccesfull! Try again?</h3>
            <a href='login_page.php'>Login</a></div>";
    }
}else{
    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Login</title>
            <link rel="stylesheet" href="styles/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="styles/style1.css" />
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        </head>
        <body>
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
            <div class="main">
                <div class="container">
                    <center>
                        <div class="middle">
                            <div id="login">
                                <form name="registration" action="" method="post">
                                    <fieldset class="clearfix">
                                        <h1 class="form-signin-heading text-muted colorsignin">Sign In</h1>
                                        <p><span class="fa fa-user"></span><input type="text" name="username" placeholder="Username" required /></p>
                                        <p><span class="fa fa-lock"></span><input type="password" name="password" placeholder="Password" required /></p>
                                        <p><input type="submit" name="submit" value="Sign In"></p>
                                        <div>
                                            <p class="registbtn"><a href="registration.php">Register</a></p>
                                        </div>
                                    </fieldset>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                            <div><img class="basic_facebook" src="img/basic_facebook1.png" alt="Basic Facebook"/>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </body>
    </html>
<?php 
} ?>