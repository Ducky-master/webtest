<h1> All errors</h1>

<?php
session_start(); // important function to allow session variables
$connectionServerName = "localhost:3306";
$connectionUsername = "admin123";
$connectionPassword = "Password123";
$connection = new PDO("mysql:host=$connectionServerName;dbname=accounts", $connectionUsername, $connectionPassword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<form>
  <label for="search">Search:</label><br>
  <input type="text" id="search" name="search">
  <input type="submit" formaction="./search.php" value="Submit">
</form>

<?php
error_reporting(E_ERROR | E_PARSE);
$search = $_GET["search"];
echo "<table style='border: solid 1px black;'>";
 echo "<tr><th>username</th><th>Fault Name</th><th>Fault Description</th><th>Fault Location</th></tr>";

 try {
     $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //Selecting multiple rows from a MySQL database using the PDO::query function.
     $sql = ("SELECT user, faultname, faultdesc, faultlocation FROM reporttable WHERE user LIKE '%$search%' || faultname LIKE '%$search%' || faultdesc LIKE '%$search%' || faultlocation LIKE '%$search%' ");

     //For each result that we return, loop through the result and perform the echo statements.
     //$row is an array with the fields for each record returned from the SELECT
         foreach($connection->query($sql, PDO::FETCH_ASSOC) as $row){
             echo '<tr>';
             echo '<td>'. $row['user'] . '</td>';
             echo '<td>'. $row['faultname'] . '</td>';
             echo '<td>'. $row['faultdesc'] . '</td>';
             echo '<td>'. $row['faultlocation'] . '</td>';

             //using echo command to include a links to edit or delete, passing the ID across on the URL
             echo '</tr>';
         }

     }
 catch(PDOException $e)
     {
     echo $sql . "<br>" . $e->getMessage(); //If we are not successful we will see an error
     }
?>
<form>
  <input type="submit" formaction="./adminUser.php" value="Back">
</form>
