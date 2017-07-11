<?php 

	include "header.php";

 ?>


	<?php 

		$url = $_SERVER['REQUEST_URI'];

		if(strpos($url, 'uploadsuccess')) {

			echo "<div class='feedback'>Picture Uploaded</div>";
		}

		elseif(strpos($url, 'uploaderror')) {

			echo "There was a problem uploadint the picture please try again";
		}

		elseif(strpos($url, 'errorfiletype')) {

			echo "<div class='feedback'>Please upload a jpg, jpeg or png file</div>";
		}

		elseif(strpos($url, 'deletesuccess')) {

			echo "<div class='feedback'>Picture Deleted</div>";
		}

	 ?>

	<form action='includes/upload.inc.php' method='post' enctype='multipart/form-data'>
		

		<input type='file' name='file'>
		<button type='submit' name='upload_submit'>upload</button>
	</form>


	<?php 

		//get all the pictures

		$sql = "SELECT * FROM photos ORDER BY date DESC";
		$result = $conn->query($sql);

		$check = $result->num_rows;

		if($check > 0) {

			while($row = $result->fetch_assoc()) {

				$datas[] = $row;

			}


			echo "<div class='container'>";

					foreach ($datas as $data) {
						$id = $data['id'];
						$date = $data['date'];
						$image = $data['photo'];

						echo "<a class='photo_unit' href='view.php?id=$id' style='background-image: url(uploads/".$image.")'>";

						echo "</a>";
						//echo "<img src='uploads/".$image."'>";
					}

			echo "</div>";
		} else {

			echo "<div class='feedback'>There are no pictures in your gallery<div>";
		}

	 ?>

</body>
</html>