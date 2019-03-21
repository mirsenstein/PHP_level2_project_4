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
		<?php if(!empty($_SESSION['username'])){?>
	    <div class="row">
			<div class="col-md-auto">
				<form method="post" enctype="multipart/form-data" action="post_form.php">
		          	<div class="row">
		            	<div class="col-md-9">
		              		<div class="form-group">
		                		<input class="form-control" name="post_text" type="text" placeholder="Your Text *" >                  
		              		</div>
		            	</div>
		            </div>
		            <div class="col-md-3">
		            	<div style="position:relative;">
		            		<a class='btn btn-primary' href='javascript:;'>
		                		<input type="file" id="input-file" name="file_to_upload" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
		                	</a>
		                	&nbsp;
		                	<span class='label label-info' id="upload-file-info"></span>
		            	</div>
		            </div>
		            <div class="col-md-2 text-center">               
		            	<input class="btn btn-primary" name="submit" type="submit" value="Post">
		            </div>
		     	</form>
		    </div>
		</div>
		<?php }?>
    	<div class="row">
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
	          		<div class="well well-sm">
						<div>
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
							<?php 
							$likes_query = "SELECT * FROM likes WHERE post_id=" . $row['post_id'];
							$likes_result = mysqli_query($con, $likes_query);
							$num_rows = mysqli_num_rows($likes_result);

							if (!empty($_SESSION['username'])){
							$user_likes_query = "SELECT * FROM likes WHERE post_id=" . $row['post_id'] . " AND user_id=" . $user_id;
							$user_likes_result = mysqli_query($con, $user_likes_query);
							$user_likes_rows = mysqli_num_rows($user_likes_result);
							
								if ($user_likes_rows > 0){ ?>
									<a class="btn btn-danger" role="button" href="unlikes.php?id=<?=$row['post_id']?>">UNLIKE</a>
									<?php echo "$num_rows likes"; ?>
								<?php }else { ?>
									<a class="btn btn-primary" role="button" href="likes.php?id=<?=$row['post_id']?>">LIKE</a>
									<?php echo "$num_rows likes"; ?>
								<?php }
							} else {?>
									<?php echo "$num_rows likes"; 
								}?>
			          	</div>
			        </div>
	          	</div>
        	</div> 
      				<?php } ?>  
    				<?php } ?>  
  		</div>
	</div>
</section>


<?php include 'includes/footer.php'; ?>