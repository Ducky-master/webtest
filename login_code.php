<?php
 // important function to allow session variables
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <?php



        try {
            if($_SERVER['REQUEST_METHOD'] == 'POST') //has the user submitted the form
            {
                $connectionServerName = "localhost:3306";
                $connectionUsername = "admin123";
                $connectionPassword = "Password123";
                $username = $_POST['username'];
                $password = $_POST['password'];
                $conn = new PDO("mysql:host=$connectionServerName;dbname=accounts", $connectionUsername, $connectionPassword);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $checkDataCommand = "SELECT * FROM acountTable WHERE username='$username'";
                try{

                    foreach($conn->query($checkDataCommand, PDO::FETCH_ASSOC) as $row){}


                }catch(Exception $e){

                  header("Location: index.php?error=wrong");
                  exit();

                }

                if (empty($username) || empty($password)) {
                  header("Location: index.php?error=empty");
                  exit();
                }

                if (empty($row)) {
                  header("Location: index.php?error=wrong");
                  exit();
                }

                //if($row == null){
                  //header("Location: index.php?error=empty");
                  //exit();
                //}

                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                $_SESSION["rank"] = $row['rank'];

                if($_SESSION["rank"] == "regular"){
                  $hash = $row['passcode'];
                  if (password_verify($password, $hash)){
                    header("Location: RegUser.php?username='$username'");
                    exit();
                  } else {
                    header("Location: index.php?error=wrong");
                    exit();
                  }


                }elseif($_SESSION["rank"] == "admin"){
                    $hash = $row['passcode'];
                    if (password_verify($password, $hash)){
                      header("Location: adminUser.php?username='$username'");
                      exit();
                    } else {
                      header("Location: index.php?error=wrong");
                      exit();
                    }

                }else{

                    echo "Invalid Session Variable (Rank)";
                    return;
                }
              }
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();  //If we are not successful in connecting or running the query we will see an error
            }

        ?>


</body>
</html>
