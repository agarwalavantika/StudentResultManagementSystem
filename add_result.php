<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="head">
        <a>Student Result Management  Panel</a>
    </div>
    

    <form class = "form-box" action="" method="POST">
        <h1>Add Result</h1>
        <br>
        <div class="select-box">
        <?php
            include('connection.php');
            
            
            $studentname=mysqli_query($con,"SELECT `class_name` FROM `students`");
            echo '<select class= "select-option" name="classname">';
            echo '<option selected disabled>Select Class name</option>';
            while($row = mysqli_fetch_array($studentname)){
                $displayname=$row['class_name'];
                echo '<option value="'.$displayname.'">'.$displayname.'</option>';
            }
            echo'</select>';
            echo "<br>";
            echo "<br>";
            $studentname=mysqli_query($con,"SELECT `roll_no` FROM `students`");
            echo '<select class= "select-option" name="rollno">';
            echo '<option selected disabled>Select Roll Number</option>';
            while($row = mysqli_fetch_array($studentname)){
                $displayname=$row['roll_no'];
                echo '<option value="'.$displayname.'">'.$displayname.'</option>';
            }
            echo'</select>';
            echo "<br>";
            echo "<br>";
            
            $studentname=mysqli_query($con,"SELECT `student_name` FROM `students`");
            echo '<select class= "select-option" name="studentname">';
            echo '<option selected disabled>Select Student name</option>';
            while($row = mysqli_fetch_array($studentname)){
                $displayname=$row['student_name'];
                echo '<option value="'.$displayname.'">'.$displayname.'</option>';
            }
            echo'</select>';
            ?><br>
            </div>
            <input class = "text-box" type="text" name="physics" placeholder = "Enter Physics Marks" required>
            <br>
            <input class = "text-box" type="text" name="chemistry" placeholder = "Enter Chemistry Marks" required>
            <br>
            <input class = "text-box" type="text" name="maths" placeholder = "Enter Maths Marks" required>
            <br>
            <input class = "text-box" type="text" name="computer" placeholder = "Enter Computer Marks" required>
            <br>
            <input class = "text-box" type="text" name="english" placeholder = "Enter English Marks" required>
            <br>
      <input class = "btn" type="submit" name = "submit" value="Add Result">
      <input type = "button"  value = "Go to Dashboard" class = "btn" onClick="document.location.href='home.php'" >
    </form>
</body>
</html>
<?php

include 'connection.php';

if (isset($_POST['submit'])) {
    $studentname = $_POST['studentname'];
    $classname = $_POST['classname'];
    $rollno = $_POST['rollno'];
    $physics = $_POST['physics'];
    $chemistry = $_POST['chemistry'];
    $maths = $_POST['maths'];
    $computer = $_POST['computer'];
    $english = $_POST['english'];

    $totalmarks = $physics+$chemistry+$maths+$computer+$english;
    $percentage = $totalmarks/5;

    $sql_query = "INSERT INTO `result`(`student_name`, `class_name`, `roll_no`, `physics`, `chemistry`, `maths`, `computer`, `english`, `total_marks`, `percentage`) VALUES ('$studentname','$classname','$rollno','$physics','$chemistry','$maths','$computer','$english','$totalmarks','$percentage')";
    $result = mysqli_query($con,$sql_query);

    if ($result) {
        ?>
        <script>alert("Result Added Successfully")</script>
        <?php
    }else {
        ?>
        <script>alert("Something went wrong")</script>
        <?php
    }
}

?>