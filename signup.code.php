<?php

session_start();
$connectionServerName = "localhost:3306";
$connectionUsername = "admin123";
$connectionPassword = "Password123";
$connection = new PDO("mysql:host=$connectionServerName;dbname=accounts", $connectionUsername, $connectionPassword);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$username = $_GET["username"];
$email = $_GET["email"];
$password = $_GET["password"];
$rpassword = $_GET["rpassword"];
$rank = "regular";

if (empty($username) || empty($email) || empty($password) || empty($rpassword)) {
  header("Location: signup.php?error=empty");
  exit();
} else {
  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: signup.php?error=invalid");
    exit();
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      header("Location: signup.php?error=einvalid");
      exit();
    } else {
      $taken = "SELECT * FROM acountTable WHERE username='$username' OR email='$email'";

      try{
          $result = $connection->query($taken)->fetch();
      }catch(Exception $e){
          echo "thair was an error:(.","$e";
          return;
      }

      if (!empty($result)) {
        header("Location: signup.php?error=taken");
        exit();
      } else {
        if ($password !== $rpassword) {
          header("Location: signup.php?error=diffrent");
          exit();
        } else {
          $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
          $insert = "INSERT INTO acountTable (username, email, passcode, rank) VALUES ('$username', '$email', '$hashedpwd', '$rank');";

            try{
                $submit = $connection->query($insert)->fetch();
            }catch(Exception $e){
                echo "Error";
                return;
            }
          }
            header("Location: index.php");
            exit();

      }

    }
  }
}
