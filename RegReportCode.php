<?php
session_start();
$rank = $_SESSION["rank"];
$today = date("Y-m-d H:i:s");
$username = $_SESSION["username"];
$connectionServerName = "localhost:3306";
$connectionUsername = "admin123";
$connectionPassword = "Password123";
$connection = new PDO("mysql:host=$connectionServerName;dbname=accounts", $connectionUsername, $connectionPassword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$faultName = $_GET["faultName"];
$faultDesc = $_GET["faultDesc"];
$faultLocation = $_GET["faultLocation"];
$faultstatus = "submited";
$jobcomp = "open";

if (empty($faultName) || empty($faultDesc) || empty($faultLocation)) {
  header("Location: adminReport.php?submit=empty");
  exit();
}  else {
    $insert = "INSERT INTO reporttable (faultname, faultdesc, faultlocation, user, time, faultstatus, jobcomp) VALUES ('$faultName', '$faultDesc', '$faultLocation', '$username', '$today', '$faultstatus', '$jobcomp');";
    try{
        $submit = $connection->query($insert)->fetch();
        header("Location: reportRank.php");
        exit();
    }catch(Exception $e){
        echo "Error";
        return;
    }
}

 ?>
