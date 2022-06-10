<h1> All errors</h1>

<?php
session_start();
$servername = "localhost:3306";
$username = "admin123";
$password = "Password123";
$dbname = "accounts";
$susername = $_SESSION["username"];

echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>Fault Name</th><th>Fault Description</th><th>Fault Location</th></tr>";

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
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT faultname, faultdesc, faultlocation FROM reporttable WHERE user='$susername'");
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
?>
<form>
  <input type="submit" formaction="./RegUser.php" value="Back">
</form>
