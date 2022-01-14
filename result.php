<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="head">
        <a>Student Result Management  Panel</a>
    </div>
    <div class = "table-box">
        

        <?php
        include 'connection.php';
        $class = $_GET['classname'];
        $rollno = $_GET['rollno'];

        $result = mysqli_query($con,"SELECT `student_name`, `physics`, `chemistry`, `maths`, `computer`, `english`, `total_marks`, `percentage` FROM `result` WHERE 'roll_no' = '$rollno' and 'class_name' = '$class' ");

        $search = "select * from result where roll_no = '$rollno' ";
        $query = mysqli_query($con,$search);
    
        $row = mysqli_fetch_assoc($query);
            $name = $row['student_name'];
            echo "<h1>$name`s Result</h1>";

            echo "<table>
            <tr>
            <th>Name </th>
            <th>Class </th>
            <th>Roll Number </th>
            <th>Phyics </th>
            <th>Chemistry </th>
            <th>Maths </th>
            <th>Computer </th>
            <th>English </th>
            <th>Total Marks </th>
            <th>Percentage </th>
            </tr>";
            echo "<tr>";
                 echo "<td>" . $row['student_name'] . "</td>";
                 echo "<td>" . $row['class_name'] . "</td>";
                 echo "<td>" . $row['roll_no'] . "</td>";
                 echo "<td>" . $row['physics'] . "</td>";
                 echo "<td>" . $row['chemistry'] . "</td>";
                 echo "<td>" . $row['maths'] . "</td>";
                 echo "<td>" . $row['computer'] . "</td>";
                 echo "<td>" . $row['english'] . "</td>";
                 echo "<td>" . $row['total_marks'] . "</td>";
                 echo "<td>" . $row['percentage'] . "</td>";
                 echo "</tr>";

             echo "</table>";
             ?>
        <input type = "button"  value = "Go to Dashboard" class = "btn" onClick="document.location.href='index.php'" >
    </div>
</body>
</html>
