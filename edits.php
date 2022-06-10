<?php
session_start(); // important function to allow session variables
$connectionServerName = "localhost:3306";
$connectionUsername = "admin123";
$connectionPassword = "Password123";
$connection = new PDO("mysql:host=$connectionServerName;dbname=accounts", $connectionUsername, $connectionPassword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//include 'checklogin.php'; //commented out for demo purposes

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
<style>
    body{
        font-family:tahoma;


    }
    a.button {

        padding:5px;
        background-color:green;
        color:white;
        border-radius:3px;
        margin-top:3px;
        display:block;
        width:130px;
        text-decoration:none;

    }
    a.back {

        padding:5px;
        background-color:#eee;
        color:black;
        border-radius:3px;
        margin-top:3px;
        display:block;
        width:130px;
        text-decoration:none;
    }
    a.dbutton {

        padding:5px;
        background-color:red;
        color:white;
        border-radius:3px;
        margin-top:3px;
        display:block;
        width:130px;
        text-decoration:none;
    }
</style>
</head>
 <?php echo '<td><a href="adminUser.php" class="back">Back</a></td>'; ?>
<body>
    <table>
        <tr>
            <tr><th>ID</th><th>Fault name</th><th>Fault description</th><th>Fault location</th><th>Username</th><th>Time</th><th>Fault status</th><th>Job Completion</th><th>Edit</th><th>Delete</th>
        </tr>
    <?php
        //database connection variables
       //include 'dbconnect.php';

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
                    echo '<td><a href="edit_person.php?id='.$row['id'].'" class="button">Edit this person</a></td>';
                    echo '<td><a href="delete_person.php?id='.$row['id'].'" class="dbutton" onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete this person</a></td>';
                    echo '</tr>';
                }

            }
        catch(PDOException $e)
            {
            echo $sql . "<br>" . $e->getMessage(); //If we are not successful we will see an error
            }
        ?>


</body>
</html>
