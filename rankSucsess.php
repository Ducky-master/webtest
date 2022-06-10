<?php
session_start();
if($_SESSION["rank"] == "regular"){

  header("Location: RegReport.php?submit=sucsess");
  exit();

}elseif($_SESSION["rank"] == "admin"){

  header("Location: adminReport.php?submit=sucsess");
  exit();

}else{

    echo "Invalid Session Variable (Rank)";
    return; 

}
