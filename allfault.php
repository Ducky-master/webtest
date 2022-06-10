<?php
session_start();
$connectionServerName = "localhost:3306";
$connectionUsername = "admin123";
$connectionPassword = "Password123";
$connection = new PDO("mysql:host=$connectionServerName;dbname=accounts", $connectionUsername, $connectionPassword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<style >
body{
    font-family:tahoma;
</style>
<body>
<h1> All errors</h1>
<form>
  <input type="submit" formaction="./rank.php" value="Back">
</form>
<table>
<tr>
    <tr><th>ID</th><th>Fault name</th><th>Fault description</th><th>Fault location</th><th>Username</th><th>Time</th><th>Fault status</th><th>Job Completion</th>
</tr>
<?php

try {
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //Selecting multiple rows from a MySQL database using the PDO::query function.
    $sql = "SELECT * FROM reporttable ORDER BY id DESC LIMIT 50";

    //For each result that we return, loop through the result and perform the echo statements.
    //$row is an array with the fields for each record returned from the SELECT
        foreach($connection->query($sql, PDO::FETCH_ASSOC) as $row){
            echo '<tr>';
            echo '<td>'. $row['id'] . '</td>';
            echo '<td>'. $row['faultname'] . '</td>';
            echo '<td>'. $row['faultdesc'] . '</td>';
            echo '<td>'. $row['faultlocation'] . '</td>';
            echo '<td>'. $row['user'] . '</td>';
            echo '<td>'. $row['time'] . '</td>';
            echo '<td>'. $row['faultstatus'] . '</td>';
            echo '<td>'. $row['jobcomp'] . '</td>';



            //using echo command to include a links to edit or delete, passing the ID across on the URL
          echo '</tr>';
        }

    }
    catch(PDOException $e) {

    }
?>
</body>
