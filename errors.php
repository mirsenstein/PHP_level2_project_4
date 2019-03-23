<?php 
if ($_GET['msg']==='empty_post'){
	echo "<div style='border: 2px solid #2B1D67; font-family: Arial Narrow, Arial, sans-serif; text-align: center; padding: 5px 5px;'>Are you trying to post your thoughts?!?!?!
		</br><a href='post_form.php'>Try again..</a>
		</div>";
}

if ($_GET['msg']==='empty_comment'){
	echo "<div style='border: 2px solid #2B1D67; font-family: Arial Narrow, Arial, sans-serif; text-align: center; padding: 5px 5px;'>Are you trying to post your thoughts?!?!?!
		</br><a href='./'>Try again..</a>
		</div>";
}

if ($_GET['msg']==='empty_registration'){
	echo "<div style='border: 2px solid #2B1D67; font-family: Arial Narrow, Arial, sans-serif; text-align: center; padding: 5px 5px;'>You have to fill in all the forms in order to register!
		</br><a href='registration.php'>Try again..</a>
		</div>";
}