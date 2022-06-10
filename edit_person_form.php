<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit a person</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <form action="edit_person.php" method="post">
        <p>Fault name</p>
        <input type="text" name= "faultname" value="<?php echo $faultname;?>">
        <p>Fault description</p>
        <input type="text" name= "faultdesc" value="<?php echo $faultdesc;?>">
        <p>Fault location</p>
        <input type="text" name= "faultlocation" value="<?php echo $faultlocation;?>">
        <p>User</p>
        <input type="text" name= "user" value="<?php echo $user;?>">
        <p>Time</p>
        <input type="text" name= "time" value="<?php echo $time;?>">
        <p>Fault status</p>
        <input type="text" name= "faultstatus" value="<?php echo $faultstatus;?>">
        <p>Job completion status</p>
        <input type="text" name= "jobcomp" value="<?php echo $jobcomp;?>">
        <input type="hidden" name= "id" value="<?php echo $id;?>">
        <br> <br>
        <input type="submit" value="update">

    </form>
</body>
</html>
