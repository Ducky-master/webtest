<h1> All errors</h1>

<?php
$servername = "localhost:3306";
$username = "admin123";
$password = "Password123";
$dbname = "accounts";

  echo "<table style='border: solid 1px white;'>";
  echo "<tr><th>Fault Name</th><th>Fault Description</th><th>Fault Location</th><th>Fault Status</th><th>Job Completion</th></tr>";
  
class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }
    function current() {
        return "<td style='width: 150px; border: 1px solid white;'>" . parent::current(). "</td>";
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
    $stmt = $conn->prepare("SELECT faultname, faultdesc, faultlocation, faultstatus, jobcomp FROM reporttable");
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
  <input type="submit" formaction="./rank.php" value="Back">
</form>
