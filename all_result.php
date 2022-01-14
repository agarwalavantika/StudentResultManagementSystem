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
    <div class = "table-box">
        <h1>Manage Students</h1>

        <?php
        include 'connection.php';
        $sql_query = "SELECT `id`, `student_name`, `class_name`, `roll_no`, `physics`, `chemistry`, `maths`, `computer`, `english`, `total_marks`, `percentage` FROM `result`";
        
        $output = mysqli_query($con,$sql_query);

        $cc1  = mysqli_num_rows($output);

        if ($cc1 > 0) {
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

             while($row = mysqli_fetch_array($output))
               {
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

