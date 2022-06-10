<?php

session_start();
$username = $_GET["username"];
$password = $_GET["password"];
$connectionServerName = "localhost:3306";
$connectionUsername = "admin123";
$connectionPassword = "Password123";
$connection = new PDO("mysql:host=$connectionServerName;dbname=accounts", $connectionUsername, $connectionPassword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$checkDataCommand = "SELECT * FROM acountTable WHERE username='$username' AND passcode='$password'";

try{

    $queryResult = $connection->query($checkDataCommand)->fetch();

}catch(Exception $e){

    echo "Username or Password are wrong:(.","$e";
    return;

}

if($queryResult == null){

  header("Location: index.php?login=empty");
  exit();
}

$_SESSION["username"] = $username;
$_SESSION["password"] = $password;
$_SESSION["rank"] = $queryResult[4];

if($_SESSION["rank"] == "regular"){

  header("Location: RegUser.php?username='$username'");
  exit();

}elseif($_SESSION["rank"] == "admin"){

  header("Location: adminUser.php");
  exit();

}else{

    echo "Invalid Session Variable (Rank)";
    return;
}

?>
