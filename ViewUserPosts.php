<?php
$username = $_POST["users"];
$mysqli = new mysqli("mysql.eecs.ku.edu", "w444h404", "", "w444h404");

if($mysqli->connect_errno) {
  printf("Connection failed: %s\n", $mysqli->connect_error);
  exit();
}
printf("Connection succeeded. <br>");

echo "<br>";

$query = "SELECT * FROM Posts WHERE author_id = '$username'";

echo "<table border = '1'><tr><th colspan = 2>Posts from $username</th></tr><tr><th>Post Number</th><th>Content</th></tr>";
$result = $mysqli->query($query);
while($row = $result->fetch_assoc()) {
  $post = $row["content"];
  $postnumber = $row["post_id"];
  echo "<tr><td>$postnumber</td><td>$post</td></tr>";
}
echo "</table>";
$result->free();

$mysqli->close();
?>
