<?php 
	
	include "dbh.php";

	if(isset($_POST['upload_submit'])) {

		$date = date('Y-m-d H:i:s');

		$file = $_FILES['file'];

		var_dump($file);
		$file_tmp_name = $file['tmp_name'];
		$file_size = $file['size'];
		$file_error = $file['error'];
		$file_name = $file['name'];

		$file_ext = explode('.', $file_name);

		$file_act_ext = strtolower(end($file_ext));

		$allowed = array('jpg', 'jpeg', 'png');

		//error handlers

		if(!in_array($file_act_ext, $allowed)) {

			header("Location: ../index.php?errorfiletype");
		}

		if(!$file_error == 0) {

			echo "There was a problem uploading the file";
			exit();
		}

		if(!$file_size > 100000) {

			echo "File size too huge";
			exit();
		}

		
		//if upload the file

		$file_new_name = uniqid('', true).".".$file_act_ext;
		$file_destination = "../uploads/".$file_new_name;

		move_uploaded_file($file_tmp_name, $file_destination);

		//query database with datas

		$sql = "INSERT INTO photos (photo, date) VALUES ('$file_new_name', '$date')";
		$result = $conn->query($sql);

		if($result) {

			header("Location: ../index.php?uploadsuccess");
		} else {

			header("Location: ../index.php?uploaderror");
		}

	}

 ?>