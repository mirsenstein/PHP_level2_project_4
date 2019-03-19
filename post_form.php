<?php include 'includes/header.php';
// session_start();

if (!empty($_SESSION['username'])) {
	if(isset($_POST['submit'])) {
		if(isset($_FILES)){
			$target_dir = "uploads/";
			$target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
			$upload_ok = 1;
			$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			
			$check = getimagesize($_FILES["file_to_upload"]["tmp_name"]);
			    // var_dump($check);

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
				&& $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
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
					$post_text 	= $_POST['post_text'];

					$date_time = date('Y-m-d h:i:s');

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
		} else {
			$user_id 	= $_SESSION['user_id'];
			$post_text 	= $_POST['post_text'];

			$date_time = date('Y-m-d h:i:s');

		   	$post_create_query = "INSERT INTO posts (user_id, post_text, date_time)";
			$post_create_query .= " VALUES ('" .  $user_id . "', '" . $post_text . "', '" . $date_time . "')";

			$result = mysqli_query($con, $post_create_query);

			if ($result) {
			// echo "The file ". $file . " has been uploaded.";
		    header('Location: index.php');
			}

		}
	}
} else {
	echo "You have to be loged-in to post!";
}