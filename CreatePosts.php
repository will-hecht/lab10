<?php	
	$username = addslashes($_POST["userId"]);
	$content = addslashes($_POST["content"]);
	$mysqli = new mysqli("mysql.eecs.ku.edu", "w444h404", "", "w444h404");

	if($mysqli->connect_errno) {
		printf("Connection failed: %s\n", $mysqli->connect_error);
		exit();
	}
    printf("Connection succeeded. <br>");

	
	if($_POST["content"] == "") {
			exit();
	}

	$insert = "INSERT INTO Posts (content, author_id) VALUES ('$content', '$username')";


	if($mysqli->query($insert)) {
		printf("Post successfully added");
		exit();
	}
	if($mysqli->errno) {
	  printf("Post failed to be added");
	  exit();
  }

	$mysqli->close();
?>
