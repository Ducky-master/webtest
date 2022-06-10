
  <main>

    <form>

            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username">

            <br><br>

            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email">

            <br><br>

            <label for="password">Password:</label><br>
            <input type="text" id="password" name="password">

            <br><br>

            <label for="rpassword">Password-Repeat:</label><br>
            <input type="text" id="rpassword" name="rpassword"><br><br>

            <input type="submit" formaction="./signup.code.php" value="Submit">
            <input type="submit" formaction="./index.php" value="back">

    </form>

  </main>
<?php
error_reporting(E_ERROR | E_PARSE);
$error = $_GET["error"];
if ($error == "empty") {
    echo "you left a box empty <br>";
}
if ($error == "invalid") {
    echo "you can only use a-z, A-Z, 1-9 in the username box <br>";
}
if ($error == "einvalid") {
    echo "the email you have entered is invalid <br>";
}
if ($error == "taken") {
    echo "the username you have inputed is taken <br>";
}
if ($error == "einvalid") {
    echo "the two passwords you have entered are diffrent <br>";
}
 ?>
