<!doctype html>
<html>
  <head>
    <title>100% secure</title>
  </head>
  <body>
    <?php
      define('DB_NAME', 'sqlInject');
      define('DB_USER', 'root');
      define('DB_PASSWORD', 'faskunji');
      define('DB_HOST', '127.0.0.1');
      define('DB_TABLE', 'users');

      // Connect to db
      $conn = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);

      //Choose db
      mysql_select_db(DB_NAME);

      $id = $_GET['id'];

      $sql = "SELECT name,id,surname FROM users WHERE id='$id'";
      echo $sql;

      $user = mysql_query($sql, $conn);
      
      // display user
      while($row = mysql_fetch_array($user, MYSQL_ASSOC)) {
        echo "id: " . $row["id"]. " - Name: <a href='user.php?id=" . $row["id"] . "'>" . $row["name"] . "</a> Surname: " . $row["surname"] . "<br>";
      }

      // Close the connection
      mysql_close($conn);
    ?>
  </body>
</html>