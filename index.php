<?php include 'includes/header.php';
// session_start();

if (!empty($_SESSION['username'])) {
 // echo $_SESSION['username'];
 $user_id 	= $_SESSION['user_id'];
};


$read_query = "SELECT p.post_id,p.user_id, p.post_text, p.image, u.names, p.date_time, p.likes_num FROM `posts` AS p JOIN users as u ON u.user_id=p.user_id WHERE 1 ORDER BY p.post_id DESC";
$post_result = mysqli_query($con, $read_query);

?>

<section>
	<div class="container">
		<div class="row">
     		<?php if(mysqli_num_rows($post_result) > 0){ ?>
      		<?php while($row = mysqli_fetch_assoc($post_result)){ ?>
        	<div class="text-center">
        		<div class="panel panel-primary">
	        		<div  class="panel-heading">
	            		<h4><?= $row['names'] ?></h4>
	            		<h6><?= $row['date_time'] ?></h6>
	          		</div>
	          		<div class="panel-body">
	          			<div><?= $row['post_text'] ?></div>
	          			<img class="img-fluid" src="uploads/<?= $row['image'] ?>" alt="">
	          		</div>
	          		<div class="well well-sm">
						<div>
							<?php 
							$likes_query = "SELECT * FROM likes WHERE post_id=" . $row['post_id'];
							$likes_result = mysqli_query($con, $likes_query);
							$num_rows = mysqli_num_rows($likes_result);

							if (!empty($_SESSION['username'])){
							$user_likes_query = "SELECT * FROM likes WHERE post_id=" . $row['post_id'] . " AND user_id=" . $user_id;
							$user_likes_result = mysqli_query($con, $user_likes_query);
							$user_likes_rows = mysqli_num_rows($user_likes_result);
							
								if ($user_likes_rows > 0){ ?>
									<span class="likes"><?php echo "$num_rows likes"; ?></span>
									<a role="button" href="unlikes.php?id=<?=$row['post_id']?>"><img class="unlike_button" src="img/unlike.png" /></a>
								<?php }else { ?>
									<span class="likes"><?php echo "$num_rows likes"; ?></span>
									<a role="button" href="likes.php?id=<?=$row['post_id']?>"><img class="like_button" src="img/like.png" /></a>
								<?php }
							} else {?>
									<?php echo "$num_rows likes"; 
							}?>
							<?php 
							$comments_query = "SELECT c.comment, u.names, c.user_id, c.post_id FROM `comments`AS c JOIN users AS u ON u.user_id=c.user_id WHERE c.post_id=" . $row['post_id'];
							$comment_result = mysqli_query($con, $comments_query); ?>
							<?php if(mysqli_num_rows($comment_result) > 0){ ?>
								<?php while($row_com = mysqli_fetch_assoc($comment_result)){ ?>
									<h6><?= $row_com['names'] ?> said: "<?= $row_com['comment'] ?>"</h6>
								<?php } ?>
							<?php } ?>
				          	<?php if(!empty($_SESSION['username'])){?>
				    			<a class="btn btn-default" href="comment.php?id=<?=$row['post_id']?>">Comment</a>
					    		<?php if($user_id==$row['user_id']){?>	
					    			<a class="btn btn-warning" href="edit_delete.php?id=<?=$row['post_id']?>">Edit/Delete</a>
								<?php }?>
							<?php }?>
						
			          	</div>
			        </div>
	          	</div>
        	</div> 
      				<?php } ?>  
    				<?php } ?>  
  		</div>
  			<div class="top">
				<a href="#top"><img class="imgtop" src="img/top.png"></a>
			</div>
	</div>
</section>


<?php include 'includes/footer.php'; ?>