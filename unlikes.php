<?php 
include 'includes/header.php';
$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$delete_q = "DELETE FROM likes WHERE `post_id`=$id AND `user_id`=$user_id";

$result = mysqli_query($con, $delete_q);

if($result){
	header('Location: index.php');
} else {
	echo mysqli_error($con);
}
include 'includes/footer.php';