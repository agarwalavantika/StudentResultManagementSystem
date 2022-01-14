<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Class</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="head">
        <a>Student Result Management  Panel</a>
    </div>
    

    <form class = "form-box" action="" method="POST">
        <h1>Add Classes</h1>
      <input class = "text-box" type="text" name="classid" placeholder = "Enter Class ID" required>
      <br>
      <input class = "text-box" type="text" name="classname" placeholder = "Enter Class Name" required>
      <br>
      <input class = "btn" type="submit" name = "submit" value="Add Class">
      <input type = "button"  value = "Go to Dashboard" class = "btn" onClick="document.location.href='home.php'" >
    </form>
</body>
</html>
<?php

include 'connection.php';

if (isset($_POST['submit'])) {
    $classid = $_POST['classid'];
    $classname = $_POST['classname'];

    $sql_query = "INSERT INTO `class`(`class_id`, `class_name`) VALUES ('$classid', '$classname') ";
    $result = mysqli_query($con,$sql_query);

    if ($result) {
        ?>
        <script>alert("Class Added Successfully")</script>
        <?php
    }else {
        ?>
        <script>alert("Something went wrong")</script>
        <?php
    }
}

?>