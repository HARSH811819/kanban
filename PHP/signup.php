<?php
    echo"this is signup php file<br>";
    require'connection.php';


    if($_SERVER["REQUEST_METHOD"]=="POST"){
        echo"This is post method<br>";
        $username = $_POST['name'];
        $phNo = $_POST['phNo'];
        $password = $_POST['password'];

        $password_hash = password_hash($password,PASSWORD_DEFAULT);
        $insert = "INSERT INTO `admin` (`admin_key`, `name`, `contactNo`, `password`) VALUES (NULL, '$username', '$phNo', '$password_hash')";
        $run = mysqli_query($con,$insert);

        if($run){
            echo"data inserted";

            $sql = "SELECT * FROM `admin` WHERE `contactNo` = '$phNo'";
            $run = mysqli_query($con,$sql);
            $row = mysqli_fetch_assoc($run);    // get the row of this user from data base

            session_start();//starting session
              $_SESSION['loggedin'] = true;
              $_SESSION['username'] = $username;
              $_SESSION['user_key'] = $row['admin_key'];
              header("location: ../index.php");//to switch page after login
        }else{
            echo"Not inserted";

        }


    }else{
        echo"Something went wrong <br>";
    }
?>