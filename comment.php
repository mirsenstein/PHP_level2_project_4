<?php include 'includes/header.php';

if (!empty($_SESSION['username'])) {


	$post_id = $_GET['id'];

	$read_query = "SELECT p.post_text, p.image, u.names, p.date_time, p.likes_num FROM `posts` AS p JOIN users as u ON u.user_id=p.user_id WHERE p.post_id=" . $post_id;
	$post_result = mysqli_query($con, $read_query);
	?>
	<div class="container">
		<div class="row justify-content-md-center">
		    <?php if(mysqli_num_rows($post_result) > 0){ ?>
	      		<?php while($row = mysqli_fetch_assoc($post_result)){ ?>
		        	<div class="text-center col-md-9">
		        		<div class="panel panel-primary">
				        		<div  class="panel-heading">
				            		<h4><?= $row['names'] ?></h4>
				            		<h6><?= $row['date_time'] ?></h6>
				          		</div>
				          		<div class="panel-body">
				          			<div><?= $row['post_text'] ?></div>
				          			<img class="img-fluid" src="uploads/<?= $row['image'] ?>" alt="">
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
			        </div> 
		      	<?php } ?>  
		    <?php } ?>  
		</div>

		<form class="well well-md col-md-9" action="" method="post">
		   	<input class="form-control" name="post_comment" type="text" placeholder="Your comment *" >
		  	<input class="btn btn-primary btn-xl text-uppercase" name="submit" type="submit" value="Comment">
		</form>

		<?php
		if(isset($_POST['submit'])){
			if((strlen($_POST['post_text'])!=0){
				$post_comment = mysqli_real_escape_string($con, $_POST['post_comment']);
				$user_id 	  = $_SESSION['user_id'];

				$comment_q = "INSERT INTO comments(post_id, user_id, comment) VALUES ('$post_id', '$user_id', '$post_comment')";

				$result = mysqli_query($con, $comment_q);

				if($result){
					header('Location: index.php');
				} else {
					echo mysqli_error($con);
				}
			} else {
				header("location:errors.php?msg=empty_post");
			}
		} else {
				
		} ?>
	</div>	
<?php }else{
	echo "You have to login to comment!";
};
include 'includes/footer.php';
