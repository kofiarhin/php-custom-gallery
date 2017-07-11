<?php 

	include "header.php";

 ?>


<?php 



	if(isset($_GET['id'])) {

		$id = $_GET['id'];
		//query database

		$sql = "SELECT photo FROM photos WHERE id='$id'";
		$result = $conn->query($sql);
		$check = $result->num_rows;

		if($check > 0) {
			echo "<div class='view'>";
			while($row = $result->fetch_assoc()) {

					$image = $row['photo'];

					echo "<img src='uploads/".$image."'><br>";

					echo "<a href='index.php'>Back</a>";

					echo "<a href='includes/delete.inc.php?image=$image&id=$id'>Delete</a>";

			}

			echo "</div>";

		}

	}

 ?>