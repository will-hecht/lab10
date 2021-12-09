<?php
  $username = addslashes($_POST["userId"]);
  $mysqli = new mysqli("mysql.eecs.ku.edu", "w444h404", "", "w444h404");

  if($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    exit();
  }
  printf("Connection succeeded. <br>");

  $insert = "INSERT INTO Users (user_id) VALUES ('$username')";

  if($username == "") {
	  exit();
  }

  if($mysqli->query($insert)); {
	  printf("User successfully added");
	  exit();
  }
  if($mysqli->errno) {
	  printf("User failed to be added");
	  exit();
  }

  $mysqli->close();
?>
