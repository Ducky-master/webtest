<h1>Report a fault </h1>
<h2> fill every box delow</h2>

<?php
session_start();
$rank = $_SESSION["rank"];
error_reporting(E_ERROR | E_PARSE);
$username = $_SESSION["username"];
$submit = $_GET["submit"];
if ($submit == "sucsess") {
  echo "sucsess";
}
if ($submit == "empty") {
  echo "you left a box empty";
}
 ?>

<main>
  <form>
    <label for="faultName">Fault Name:</label><br>
    <input type="text" id="faultName" name="faultName">

    <br><br>
    <label for="faultDesc">Fault Description:</label><br>
    <input type="text" id="faultDesc" name="faultDesc">

    <br><br>
    <label for="faultLocation">Fault Location:</label><br>
    <input type="text" id="faultLocation" name="faultLocation">

    <br><br>
    <input type="submit" formaction="./RegReportCode.php" value="Submit">
    <input type="submit" formaction="./adminUser.php" value="Back">
  </form>
</main>
