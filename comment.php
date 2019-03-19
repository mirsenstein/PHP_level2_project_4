<?php include 'includes/header.php';
// session_start();

if (!empty($_SESSION['username'])) {


	$post_id = $_GET['id'];

	$read_query = "SELECT p.post_text, p.image, u.names, p.date_time, p.likes_num FROM `posts` AS p JOIN users as u ON u.user_id=p.user_id WHERE p.post_id=" . $post_id;
	$post_result = mysqli_query($con, $read_query);
	?>
	<div class="row">
	     <?php if(mysqli_num_rows($post_result) > 0){ ?>
	      <?php while($row = mysqli_fetch_assoc($post_result)){ ?>
	        <div class="text-center bg-info post-item">
	        	<div><?= $row['post_text'] ?></div>
	          <img class="img-fluid" src="uploads/<?= $row['image'] ?>" alt="">
	          <div class="post-caption">
	            <h4><?= $row['names'] ?></h4>
	            <h6><?= $row['date_time'] ?></h6>
	          </div>
	          	<?php 
				$comments_query = "SELECT c.comment, u.names, c.user_id, c.post_id FROM `comments`AS c JOIN users AS u ON u.user_id=c.user_id WHERE c.post_id=" . $post_id;
				$comment_result = mysqli_query($con, $comments_query); ?>
				<?php if(mysqli_num_rows($comment_result) > 0){ ?>
					<?php while($row_com = mysqli_fetch_assoc($comment_result)){ ?>
						<h6><?= $row_com['names'] ?> said: "<?= $row_com['comment'] ?>"</h6>
					<?php } ?>
				<?php } ?>
	        </div> 
	      <?php } ?>  
	    <?php } ?>  
	</div>

	<form action="" method="post">
	   	<input class="form-control" name="post_comment" type="text" placeholder="Your comment *" >
	  	<input class="btn btn-primary btn-xl text-uppercase" name="submit" type="submit" value="Comment">
	</form>

	<?php
	if(isset($_POST['submit'])){
		$post_comment = 	$_POST['post_comment'];
		$user_id 	= $_SESSION['user_id'];

		$comment_q = "INSERT INTO comments(post_id, user_id, comment) VALUES ('$post_id', '$user_id', '$post_comment')";

		$result = mysqli_query($con, $comment_q);

		if($result){
			header('Location: index.php');
		} else {
			echo mysqli_error($con);
		}
	} else {
			
	}
}else{
	echo "You have to login to comment!";
};