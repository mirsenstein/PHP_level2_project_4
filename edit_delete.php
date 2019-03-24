<?php include 'includes/header.php';

if (!empty($_SESSION['username'])) {

	$user_id = $_SESSION['user_id'];
	$post_id = $_GET['id'];

	$read_query = "SELECT p.post_id, p.post_text, p.user_id, p.image, u.names, p.date_time, p.likes_num FROM `posts` AS p JOIN users as u ON u.user_id=p.user_id WHERE p.post_id=" . $post_id;
	$post_result = mysqli_query($con, $read_query);
	?>
	<div class="row">
		<div class="text-center">
		    <?php if(mysqli_num_rows($post_result) > 0){ ?>
		      	<?php while($row = mysqli_fetch_assoc($post_result)){ ?>
		      		<?php if($user_id==$row['user_id']){?>	
		      			<form method="post" enctype="multipart/form-data" action="">
			        		<input class="form-control" name="post_text" type="text" value="<?= $row['post_text'] ?>" >
			        		<input class="btn btn-primary btn-xl text-uppercase col-md-2" name="submit" type="submit" value="Edit">
			        	</form>
			        	<a class="btn btn-danger col-md-2" href="delete.php?id=<?=$row['post_id']?>">Delete</a>
			    	<?php }?>
		      	<?php } ?>  
		    <?php } ?> 
		</div> 
	</div>
	<?php 
	if(isset($_POST['submit'])){
		if(strlen($_POST['post_text'])!=0){
			$post_text 	= mysqli_real_escape_string($con, $_POST['post_text']);
			
			$post_update_query = "UPDATE `posts` SET `post_text`='$post_text' WHERE `post_id`=$post_id";

			$result_update = mysqli_query($con, $post_update_query);
			if($result_update){
				header('Location: index.php');
			} else {
				echo mysqli_error($con);
				echo "Please, try again later!";
			}
		}else{
			header("location:errors.php?msg=empty_post_edit");
		}	
	}
}

