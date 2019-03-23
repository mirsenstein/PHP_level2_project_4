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

if ($_GET['msg']==='empty_registration'){
	echo "<div style='border: 2px solid #2B1D67; font-family: Arial Narrow, Arial, sans-serif; text-align: center; padding: 5px 5px;'>
		Nice try! But you will have to fill in all the forms in order to register!
		</br><a href='registration.php'>Try again..</a>
		</div>";
}