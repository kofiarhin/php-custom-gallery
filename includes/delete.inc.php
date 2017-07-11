<?php 

	include "../includes/dbh.php";

	if(isset($_GET['image'])) {

		$image = $_GET['image'];
		$file_full_path = "../uploads/".$image;
		$id = $_GET['id'];

		echo $file_full_path."<br>";
		echo $id."<br>";
		echo $image;

		//delete from database

		$sql = "DELETE FROM photos WHERE id='$id'";
		$result = $conn->query($sql);

		if(file_exists($file_full_path)) {

			if(!unlink($file_full_path)) {

				header("Location: ../index.php?deleteerror");
			} else {

				header("Location: ../index.php?deletesuccess");
			}
		} else {

			header('Location: ../index.php?errorexist');
		}


		


		
	}
 ?>