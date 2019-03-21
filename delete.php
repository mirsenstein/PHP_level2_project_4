<?php 
include 'includes/header.php';
$id = $_GET['id'];

$delete_q = "DELETE FROM `posts` WHERE `post_id`=$id";

$result = mysqli_query($con, $delete_q);

if($result){
	header('Location: index.php');
} else {
	echo mysqli_error($con);
	echo "Please, try again later!";
}
include 'includes/footer.php';