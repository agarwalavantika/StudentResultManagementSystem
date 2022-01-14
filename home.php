<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>

<?php
include 'connection.php';



?>


<body>
    <div class="head">
        <a>Student Result Management  Panel</a>
    </div>
    <div class = "form-box">
        <h1>Dashboard</h1>
        <div class = "select-box">
            <input type = "button" name = "addclass" value = "Add Class" class = "btn" onClick="document.location.href='add_classes.php'">
            <input type = "button" name = "addstudent" value = "Add Student" class = "btn" onClick="document.location.href='add_student.php'">
            <input type = "button" name = "addresult" value = "Add Result" class = "btn" onClick="document.location.href='add_result.php'" >
        </div>
        <div class = "select-box">
            <input type = "button"  value = "Manage Student" class = "btn" onClick="document.location.href='all_student.php'">
            <input type = "button" value = "Manage Class" class = "btn" onClick="document.location.href='all_classes.php'">
            <input type = "button"  value = "Manage Result" class = "btn" onClick="document.location.href='all_result.php'" >
        </div>
        <?php
        $no_of_classes=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) FROM `class`"));
        $no_of_students=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) FROM `students`"));
        $no_of_result=mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(*) FROM `result`"));
        $nn = 5;
        echo '<div class = deatil-box> <br> 
        
        <a class = "form-text">Number of classes: '.$no_of_classes[0].' </a><br>
        <a class = "form-text">Number of students: '.$no_of_students[0].'</a><br>
        <a class = "form-text">Number of result: '.$no_of_result[0].'</a><br> 
        
        </div>';
        ?>
        <input type = "button"  value = "Logout" class = "btn" onClick="document.location.href='index.php'" >
    </div>
</body>
</html>

