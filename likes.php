<?php include 'includes/header.php';
// session_start();

if (!empty($_SESSION['username'])) {
	$user_id = $_SESSION['user_id'];
	$post_id = $_GET['id'];
	$like_query =  "INSERT INTO likes (post_id, user_id) VALUES ('$post_id', '$user_id')";
	$q_result = mysqli_query($con, $like_query);

	if ($q_result){
		header('Location: index.php');
	} else {
		echo "Nope!";
	}
}