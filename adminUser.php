<?php
session_start();
$username = $_SESSION["username"];
?>

<style>

  a.button {

      padding:5px;
      background-color:#eee;
      color:black;
      border-radius:3px;
      margin-top:3px;
      display:block;
      width:130px;
      text-decoration:none;
  }
  </style>
  <?php
  echo '<td><a href="adminReport.php" class="button">Report a fault</a></td><br>';
  echo '<td><a href="allfault.php" class="button">View all faults</a></td><br>';
  echo '<td><a href="search.php" class="button">Search for faults</a></td><br>';
  echo '<td><a href="edits.php" class="button">Edit/ Delete faults</a></td><br>';
  //echo '<td><a href="delete.php" class="button">Delete Faults</a></td><br>';
  echo '<td><a href="logout.php" class="button">Logout</a></td><br>';
