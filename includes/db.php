<?php 

$con = mysqli_connect('localhost', 'root', '', 'basic_fb');

if(!$con){
	die("Connection failed:" . mysqli_connect_error());
} else {
	// echo '<h1>Connected successfully!</h1>';
}

