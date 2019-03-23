<?php include 'includes/db.php';
// require('db.php');
// If form submitted, insert values into the database.
if (isset($_POST['submit'])){
    if((strlen($_POST['username'])!=0)&&(strlen($_POST['password'])!=0)&&(strlen($_POST['names'])!=0)){
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $names    = mysqli_real_escape_string($con, $_POST['names']);
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $names    = stripcslashes($names);
        $password = password_hash($password, PASSWORD_DEFAULT);       

        
        $query = "INSERT into `users` (username, password, names)  VALUES ('$username', '". $password ."', '$names')";
            $result = mysqli_query($con,$query);
            if($result){
                echo "<div style='border: 2px solid #2B1D67; font-family: Arial Narrow, Arial, sans-serif; text-align: center; padding: 5px 5px;'>
                    <h3>You are registered successfully!</h3>
                    <br/>Click here to <a href='login_page.php'>Login</a>
                    </div>";
            }
    } else {
        header("location:errors.php?msg=empty_registration");
    }
}else{ ?>

    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Registration</title>
            <link rel="stylesheet" href="styles/style.css" />
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
                                <fieldset class="clearfix">
                                    <h1 class="form-signin-heading text-muted colorsignin">Registration</h1>
                                    <form name="registration" action="" method="post">
                                        <p><span class="fa fa-user"></span><input type="text" name="username" placeholder="Username" required /></p>
                                        <p><span class="fa fa-lock"></span><input type="password" name="password" placeholder="Password" required /></p>
                                        <p><span class="fa fa-child"></span><input type="text" name="names" placeholder="Names" required /></p>
                                        <span><input type="submit" name="submit" value="Sign up" /></span>
                                    </form>
                                </fieldset>
                            </div>
                            <div><img class="basic_facebook" src="img/basic_facebook1.png" alt="Basic Facebook"/>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        <?php
        }
        ?>
    </body>
    </html>