<?php
    echo"this is Add Employee file <br>";

    require "connection.php";
    session_start();
   
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
        $login = true;
        $userkey = $_SESSION['user_key'];

    
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $name = $_POST['name'];
            $ID = $_POST['empID'];
            
            
            $password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
            echo $name."<br>";
            echo $ID."<br>";
            echo $password_hash."<br>";
            $insert = "INSERT INTO `employees` (`emp_key`, `admn_key`, `emp_name`, `emp_ID`, `emp_password`,`emp_task`) VALUES (NULL, '$userkey', '$name', '$ID', '$password_hash','0');";
            $run = mysqli_query($con,$insert);
            if($run){
                echo"Employee added <br>";
                header("location: ../index.php");
                
            }else{
                echo"Employee not added <br>";
                
            }
        }else{
            echo"Somethisn went wrong <br>";
            
        }
    }else{
        echo "please login";
    }

?>