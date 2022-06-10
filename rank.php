<?php
session_start();
if($_SESSION["rank"] == "regular"){ 

  header("Location: RegUser.php");
  exit();

}elseif($_SESSION["rank"] == "admin"){

  header("Location: adminUser.php");
  exit();

}else{

    echo "Invalid Session Variable (Rank)";
    return;

}
