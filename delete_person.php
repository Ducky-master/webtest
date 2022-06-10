<?php
session_start(); // important function to allow session variables
$connectionServerName = "localhost:3306";
$connectionUsername = "admin123";
$connectionPassword = "Password123";
$conn = new PDO("mysql:host=$connectionServerName;dbname=accounts", $connectionUsername, $connectionPassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//include 'checklogin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
    body{
        font-family:tahoma;
        background-color:#eee;

    }
    input[type=submit] {
        font-size:110%;
        background-color:green;
        color:white;
        border-radius: 4px;
    }
    select {
        width: 100%;
        padding: 16px 20px;
        border: none;
        border-radius: 4px;
        background-color: #fff;
        font-size:110%;
        margin:5px 0 5px 0;
        border:1px solid #333;
        }
</style>
</head>
<body>
    <?php

        //database connection variables
        //include 'dbconnect.php';

        try {

                $id = $_GET['id']; //the ID of the person we want to edit from the URL

                $sql = $conn->prepare("DELETE FROM reporttable WHERE id = :id");
                $sql -> bindParam(':id', $id);

                $sql -> execute(); //execute the statement

                header("Location: edits.php");
                exit();
            }
        catch(PDOException $e)
            {
            echo $e->getMessage(); //If we are not successful in connecting or running the query we will see an error
            }
        ?>


</body>
</html>
