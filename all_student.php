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
        <h1>Manage Students</h1>

        <?php
        include 'connection.php';
        $sql_query = "SELECT `student_name`, `class_name`, `roll_no` FROM `students`";
        
        $output = mysqli_query($con,$sql_query);

        $cc1  = mysqli_num_rows($output);

        if ($cc1 > 0) {
            echo "<table>
             <tr>
             <th>Name </th>
             <th>Roll Number </th>
             <th>Class </th>
             </tr>";

             while($row = mysqli_fetch_array($output))
               {
                 echo "<tr>";
                 echo "<td>" . $row['student_name'] . "</td>";
                 echo "<td>" . $row['roll_no'] . "</td>";
                 echo "<td>" . $row['class_name'] . "</td>";
                 echo "</tr>";
               }

             echo "</table>";
         } else {
             echo "No Students found";
         }

        ?>
        <input type = "button"  value = "Go to Dashboard" class = "btn" onClick="document.location.href='home.php'" >
    </div>
</body>
</html>

