<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>Oops!</title>
            <link rel="stylesheet" href="styles/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="styles/style1.css" />
            <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
            <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        </head>
        <body>


<?php 
if ($_GET['msg']==='empty_post'){
	echo "<div style='border: 2px solid #2B1D67; font-family: Arial Narrow, Arial, sans-serif; text-align: center; padding: 5px 5px;'>
		Are you trying to post your thoughts?! Sorry, our thoughts reader is out of order at the moment! You will have to type your post!
		</br><a href='post_form.php'>Go do that..,</a>
		</div>";
}

if ($_GET['msg']==='empty_comment'){
	echo "<div style='border: 2px solid #2B1D67; font-family: Arial Narrow, Arial, sans-serif; text-align: center; padding: 5px 5px;'>
			Are you trying to post your thoughts?! Sorry, our thoughts reader is out of order at the moment! You will have to type your comment!
		</br><a href='./'>Try again...</a>
		</div>";
}

if ($_GET['msg']==='empty_registration'){ ?>
            <div class="main">
                <div class="container">
                    <center>
                        <div class="middle">
                            <div id="login">
                                <form name="registration" action="" method="post">
                                    <fieldset class="clearfix">
                                        <div id="error">
                                        	<p>Nice try! But you will have to fill in all the forms in order to register!</p>
	                        				<a href='registration.php'>Try again..</a>
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
<?php }