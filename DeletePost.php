<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "w444h404", "", "w444h404");

	if($mysqli->connect_errno) {
		printf("Connection failed: %s\n", $mysqli->connect_error);
		exit();
	}
	printf("Connection succeeded. <br>");

	echo "<br>";

	$query = "SELECT * FROM Posts";
	$deletion = "DELETE FROM Posts WHERE post_id IN (";
	$posts = "These posts were deleted: ";
	$flag = 0;
	
	$result = $mysqli->query($query);
	while($row = $result->fetch_assoc()) {
		$postnumber = $row["post_id"];
		if($_POST["$postnumber"]==$postnumber) {
			if($flag == 1) {
				$deletion = $deletion . ", ";
				$posts = $posts . ", ";
			}
			$flag = 1;
			$posts = $posts . "$postnumber";
			$deletion = $deletion . "'$postnumber'";
		}
	}
	$result->free();
	$deletion = $deletion . ")";
	
	if($mysqli->query($deletion)) {
		echo "Posts successfully deleted";
		echo "<br>";
		echo $posts;
		exit();
	}
	if($mysqli->errno) {
	  printf("Post failed to be deleted");
	  exit();
	}
	
	$mysqli->close();
?>
