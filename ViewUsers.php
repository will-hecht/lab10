<?php
	$mysqli = new mysqli("mysql.eecs.ku.edu", "w444h404", "", "w444h404");

	if($mysqli->connect_errno) {
		printf("Connection failed: %s\n", $mysqli->connect_error);
		exit();
	}
	printf("Connection succeeded. <br>");

	echo "<br>";

	$query = "SELECT * FROM Users";

	echo "<table border = '1'><tr><th>Users</th></tr>";

	$result = $mysqli->query($query);
	while($row = $result->fetch_assoc()) {
		$username = $row[user_id];
		echo "<tr><td>$username</td></tr>";
	}
	$result->free();
	echo "</table>";

	$mysqli->close();
?>
