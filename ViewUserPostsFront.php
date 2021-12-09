<html>
  <head>
    <title>View User Posts</title>
  </head>
  <body>
    <form method = "post" action = "ViewUserPosts.php">
      <?php
		  echo "<p>Select User</p>";
          echo "<select name = users>";
          $mysqli = new mysqli("mysql.eecs.ku.edu", "w444h404", "", "w444h404");
          $query = "SELECT * FROM Users LIMIT 0 , 30";
          $result = $mysqli->query($query);
          while($row = $result->fetch_assoc()) {
            $username = $row["user_id"];
            echo "<option value=$username>$username</option>";
          }
          $result->free();
          $mysqli->close();
          echo "</select>";
       ?>
	   <br>
      <input type = "submit" value = "Submit"></input>
    </form>
  </body>
</html>
