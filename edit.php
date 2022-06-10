<?php
session_start();
$connectionServerName = "localhost:3306";
$connectionUsername = "admin123";
$connectionPassword = "Password123";
$connection = new PDO("mysql:host=$connectionServerName;dbname=accounts", $connectionUsername, $connectionPassword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
error_reporting(E_ERROR | E_PARSE);
?>
<form>
  <label for="id">ID of error you would like to edit:</label><br>
  <input type="text" id="id" name="id"><br>

  <label for="faultname">Fault name:</label><br>
  <input type="text" id="faultname" name="faultname"><br>

  <label for="faultdesc">Fault description:</label><br>
  <input type="text" id="faultdesc" name="faultdesc"><br>

  <label for="faultlocation">Fault location:</label><br>
  <input type="text" id="faultlocation" name="faultlocation"><br>

  <label for="user">username:</label><br>
  <input type="text" id="user" name="user"><br>

  <label for="faultstatus">Fault Status:</label><br>
  <input type="text" id="faultstatus" name="faultstatus"><br>

  <label for="jobcomp">Job Complation:</label><br>
  <input type="text" id="jobcomp" name="jobcomp"><br> <br>

  <input type="submit" class="button" name="insert" value="insert" />
</form>

<?php

$id = $_GET["id"];
$faultname = $_GET["faultname"];
$faultdesc = $_GET["faultdesc"];
$faultlocation = $_GET["faultlocation"];
$username = $_GET["user"];
$faultstatus = $_GET["faultstatus"];
$jobcomp = $_GET["jobcomp"];


      if ($id != null){
        if ($faultname != null) {
          $faultnamesubmit = "UPDATE reporttable SET faultname = '$faultname' WHERE reporttable.id = '$id'";

          try{
              $result = $connection->query($faultnamesubmit)->fetch();
          }catch(Exception $e){
              echo "Trypass error for faultname:(.","$e";
              return;
            }
        }
        if ($faultdesc != null) {
          $faultdescsubmit = "UPDATE reporttable SET faultdesc = '$faultdesc' WHERE reporttable.id = '$id'";

          try{
              $result = $connection->query($faultdescsubmit)->fetch();
          }catch(Exception $e){
              echo "Trypass error for faultdesc:(.","$e";
              return;
            }
        }
        if ($faultlocation != null) {
          $faultlocationsubmit = "UPDATE reporttable SET faultlocation = '$faultlocation' WHERE reporttable.id = '$id'";

          try{
              $result = $connection->query($faultlocationsubmit)->fetch();
          }catch(Exception $e){
              echo "Trypass error for faultlocation:(.","$e";
              return;
            }
        }
        if ($username != null) {
          $usernamesubmit = "UPDATE reporttable SET user = '$username' WHERE reporttable.id = '$id'";

          try{
              $result = $connection->query($usernamesubmit)->fetch();
          }catch(Exception $e){
              echo "Trypass error for username:(.","$e";
              return;
            }
        }
        if ($faultstatus != null) {
          $faultstatussubmit = "UPDATE reporttable SET faultstatus = '$faultstatus' WHERE reporttable.id = '$id'";

          try{
              $result = $connection->query($faultstatussubmit)->fetch();
          }catch(Exception $e){
              echo "Trypass error for faultstatus:(.","$e";
              return;
            }
        }
        if ($jobcomp != null) {
          $jobcompsubmit = "UPDATE reporttable SET jobcomp = '$jobcomp' WHERE reporttable.id = '$id'";

          try{
              $result = $connection->query($jobcompsubmit)->fetch();
          }catch(Exception $e){
              echo "Trypass error for jobcomp:(.","$e";
              return;
            }
        }
      }

 ?>
 <form>
   <input type="submit" formaction="./adminUser.php" value="Back">
 </form>

 <?php

 echo "<table style='border: solid 1px black;'>";
  echo "<tr><th>ID</th><th>Fault name</th><th>Fault description</th><th>Fault description</th><th>Username</th><th>Time</th><th>Fault status</th><th>Job Completion</th></tr>";

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
     $stmt = $connection->prepare("SELECT * FROM reporttable");
     $stmt->execute();


     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

     foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
         echo $v;
     }
 }
 catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
 }
 $connection = null;
 echo "</table>";
 ?>
