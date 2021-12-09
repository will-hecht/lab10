<html>
  <head>
    <title>View User Posts</title>
  </head>
  <body>
    <form method = "post" action = "DeletePost.php">
      <?php
          echo "<table border = '1'><th>Post</th><th>Author</th><th>Delete?</th>";
          $mysqli = new mysqli("mysql.eecs.ku.edu", "w444h404", "", "w444h404");
          $query = "SELECT * FROM Posts";
          $result = $mysqli->query($query);
          while($row = $result->fetch_assoc()) {
            $content = $row["content"];
            $author = $row["author_id"];
			$postnumber = $row["post_id"];
            echo "<tr><td>$content</td><td>$author</td><td><input type = 'checkbox' id='$postnumber' name = '$postnumber' value='$postnumber'</td></tr>";
          }
          $result->free();
          $mysqli->close();
          echo "</table>";
        ?>
      <input type = "submit" value = "Submit"></input>
    </form>
  </body>
</html>
