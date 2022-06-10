<?php
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username) || empty($password)) {
  header("Location: index.php?feald=empty");
  exit();
}
else {
  $connectionServerName = "localhost:3306";
  $connectionUsername = "admin123";
  $connectionPassword = "Password123";
  $conn = new PDO("mysql:host=$connectionServerName;dbname=accounts", $connectionUsername, $connectionPassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM acountTable WHERE username=?;";
  $stmt = mysql_stmt_init($conn);
  if (mysql_stmt_prepare($stmt, $sql)){
    header("Location: index.php?error=sqlerror");
    exit();
  }
  else {
    mysql_stmt_bind_param($stmt, "ss", $username, $password);
    mysql_stmt_execute($stmt);
    $result = mysql_stmt_get_result($stmt);
    if ($row = mysql_fetch_assoc($result)) {
      $pwdCheck = password_verify($password, $row['password']);
      if($pwdCheck == false) {
        header("Location: index.php?error=wrong,passowrd");
        exit();
      }
      else if($pwdCheck == true){
          echo "yesssss";
      }
    }
    else {
      header("Location: index.php?error=nouser");
      exit();
    }
  }
}
