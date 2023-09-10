<?php
    require "connection.php";

    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){   
        $userkey = $_SESSION['user_key'];
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $taskname = $_POST['task_name'];
            $description = $_POST['description'];
            $deadline = $_POST['deadline'];
            $asignto = $_POST['emplist'];

            $currentDate = date('Y-m-d');
            echo $taskname."<br> ";
            echo $description." <br>";
            echo $deadline . " <br>";
            echo $asignto . " <br>"; 
            echo $currentDate . " <br>"; 

            $insert = "INSERT INTO `tasks` (`task_key`, `task_name`, `admin_key`, `description`, `issue_date`, `deadline`, `status`, `emp_key`) VALUES (NULL, '$taskname', '$userkey', '$description', '$currentDate', '$deadline', '0', '$asignto')";
            $run = mysqli_query($con,$insert);
            if($run){
                echo"task added <br>";
                header("location:../index.php");
            }else{
                echo"not added <br>";
                
            }
        }else{
            echo "Something went wrong"; 

        }

    }else{
        echo "Please login to assign task"; 
    }

?>