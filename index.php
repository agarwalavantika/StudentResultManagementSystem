<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="head">
        <a>Student Result Management  Panel</a>
    </div> 
    <form class = "form-box" action="" method="POST">
    <h1>Admin Login</h1>  
      <input class = "text-box" type="text" name="username" placeholder = "Enter Username" required>
      <br>
      <input class = "text-box" type="password" name="password" placeholder = "Enter Password" required>
      <br>
      <input class = "btn" type="submit" name = "submit" value="Login">
    </form>

    <form class = "form-box" action="result.php" method="GET">
        <h1>Check Result</h1>  
        <?php
    include 'connection.php';
    
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
    echo '<br>
    <input class = "btn" type="submit" name = "submit" value="Check Result">';

    ?>
      
    </form>
</body>
</html>

<?php
session_start();

    include 'connection.php';

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username_search = "select * from login where username = '$username' ";
        $query = mysqli_query($con,$username_search);

        $username_count = mysqli_num_rows($query);

        if ($username_count) {
            $username_pass = mysqli_fetch_assoc($query);
            $user_pass = $username_pass['password'];

            if ($user_pass == $password) {
                ?> <script>
                    alert("Login Success")
                    </script> <?php
                    ?>
                    <script>location.replace("home.php")</script>
                    <?php
                    $_SESSION['username'] = $username_pass['username'];
            }else {
                ?> <script>
                alert("Password Incorrect")
            </script> <?php
            }
        }else {
            ?> <script>
            alert("Username Incorrect")
        </script> <?php
        }
    }
?>
