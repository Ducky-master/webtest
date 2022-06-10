<form>
  <label for="id">ID of error you would like to delete:</label><br>
  <input type="text" id="id" name="id"><br><br>

  <input type="submit" class="button" name="delete" value="delete" /><br><br>

  <input type="submit" formaction="./adminUser.php" value="Back">
</form>
<?php
error_reporting(E_ERROR | E_PARSE);
$id = $_GET["id"];

session_start();
$connectionServerName = "localhost:3306";
$connectionUsername = "admin123";
$connectionPassword = "Password123";
$connection = new PDO("mysql:host=$connectionServerName;dbname=accounts", $connectionUsername, $connectionPassword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($id != null) {
  $iddelete = "DELETE FROM reporttable WHERE id = '$id'";

  try{
      $result = $connection->query($iddelete)->fetch();
  }catch(Exception $e){
      echo "Username or Password are wrong:(.","$e";
      return;
    }
}


echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>ID</th><th>Fault name</th><th>Fault description</th><th>Fault description</th><th>Username</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }
    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

try {
    $stmt = $connection->prepare("SELECT id, faultname, faultdesc, faultlocation, user FROM reporttable");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
