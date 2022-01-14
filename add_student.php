<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="head">
        <a>Student Result Management  Panel</a>
    </div>
    

    <form class = "form-box" action="" method="POST">
        <h1>Add Students</h1>
      <input class = "text-box" type="text" name="studentname" placeholder = "Enter Student Name" required>
      <br>
      <input class = "text-box" type="text" name="rollno" placeholder = "Enter Roll Number" required>
      <br>
      <?php
            include('connection.php');
            
            $class_result=mysqli_query($con,"SELECT `class_name` FROM `class`");
                echo '<select class= "select-option" name="classname">';
                echo '<option selected disabled>Select Class</option>';
            while($row = mysqli_fetch_array($class_result)){
                $display=$row['class_name'];
                echo '<option value="'.$display.'">'.$display.'</option>';
            }
            echo'</select>'
        ?><br>
      <input class = "btn" type="submit" name = "submit" value="Add Class">
      <input type = "button"  value = "Go to Dashboard" class = "btn" onClick="document.location.href='home.php'" >
    </form>
</body>
</html>
<?php

include 'connection.php';

if (isset($_POST['submit'])) {
    $studentname = $_POST['studentname'];
    $rollno = $_POST['rollno'];
    $classname = $_POST['classname'];

    $sql_query = "INSERT INTO `students`(`student_name`, `class_name`, `roll_no`) VALUES ('$studentname','$classname','$rollno')";
    $result = mysqli_query($con,$sql_query);

    if ($result) {
        ?>
        <script>alert("Student Added Successfully")</script>
        <?php
    }else {
        ?>
        <script>alert("Something went wrong")</script>
        <?php
    }
}

?>