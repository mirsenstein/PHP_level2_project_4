<?php include 'includes/header.php';

if (!empty($_SESSION['username'])) {?>
	    <div class="row">
			<div class="text-center">
				<form method="post" enctype="multipart/form-data" action="" id="long_text">
		          	<div class="row">
		            	<div class="col-md-8">
		              		<div class="form-group">
		                		<textarea class="form-control" form="long_text" name="post_text" placeholder="Your text*"></textarea>                 
		              		</div>
		            	</div>
		            </div>
		            <div class="col-md-5">
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

	<?php if(isset($_POST['submit'])) {
		if((strlen($_POST['post_text'])!=0)||($_FILES["file_to_upload"]["size"]!=0)){
			// var_dump($_FILES["file_to_upload"]);
			// die;
			if ($_FILES["file_to_upload"]["size"] != 0) {

				$target_dir = "uploads/";
				$target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
				$upload_ok = 1;
				$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
				
				$check = getimagesize($_FILES["file_to_upload"]["tmp_name"]);
				    // var_dump($check);
				list($width, $height) = getimagesize($_FILES["file_to_upload"]["tmp_name"]);

				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$upload_ok = 1;
				} else {
					echo "File is not an image.";
					$upload_ok = 0;
				}

			    // Check if file already exists
				if (file_exists($target_file)) {
					echo "Sorry, file already exists.";
					$upload_ok = 0;
				} 
			  	// Check file size
				if ($_FILES["file_to_upload"]["size"] > 500000) {
					echo "Sorry, your file is too large.";
					$upload_ok = 0;
				} 
			  	
			  	// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" 
					&& $imageFileType != "jpeg") {
					echo "Sorry, only JPG, JPEG & PNG files are allowed.";
					$upload_ok = 0;
				} 

			 	// Check if $upload_ok is set to 0 by an error
				if ($upload_ok == 0) {
					echo "Sorry, your file was not uploaded.";
			  		// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file)) {
						$file 		= basename( $_FILES["file_to_upload"]["name"]);
						$user_id 	= $_SESSION['user_id'];
						$post_text 	= mysqli_real_escape_string($con, $_POST['post_text']);

						$date_time = date('Y-m-d H:i:s');

			   			 //save the file name in DB
						$post_create_query = "INSERT INTO posts (user_id, image, post_text, date_time)";
						$post_create_query .= " VALUES ('" .  $user_id . "', '" . $file . "', '" . $post_text . "', '" . $date_time . "')";

						$result = mysqli_query($con, $post_create_query);

						if ($result) {
							// echo "The file ". $file . " has been uploaded.";
			     			header('Location: index.php');
						}

					} else {
						echo "Sorry, there was an error uploading your file.";
			     		// header('Location: index.php');

					}
				}
				// End of Check if $upload_ok is set to 0 by an error

			} else {
				$user_id 	= $_SESSION['user_id'];
				$post_text 	= mysqli_real_escape_string($con, $_POST['post_text']);

				$date_time = date('Y-m-d H:i:s');

			   	$post_create_query = "INSERT INTO posts (user_id, post_text, date_time)";
				$post_create_query .= " VALUES ('" .  $user_id . "', '" . $post_text . "', '" . $date_time . "')";

				$result = mysqli_query($con, $post_create_query);

				if ($result) {
			    header('Location: index.php');
				}
			}
		} else {
			header("location:errors.php?msg=empty_post");
		}//check if there is something to post
	}
	
} else {
	echo "You have to be loged-in to post!";
}

