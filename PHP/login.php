<?php
    echo"This is login php file<br>";
    require'connection.php';
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        echo"This is post method<br>";
        $phNo = $_POST['phNo'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `admin` WHERE `contactNo` = '$phNo'";
        $run = mysqli_query($con,$sql);
        $num = mysqli_num_rows($run);

        if($num == 1){
            echo"1";

            $row = mysqli_fetch_assoc($run);    // get the row of this user from data base
            $hash = $row['password']; //get password hash
            if(password_verify($password, $hash)){
                echo $hash."<br>";
                echo"password match";

                session_start();//starting session
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['name'];
                $_SESSION['user_key'] = $row['admin_key'];
                header("location: ../index.php");//to switch page after login

            }else{
                echo"password not match";
                
            }

        }else{
            echo"Not a user 0";
            
        }
        

      
    }else{
        echo"Something went wrong";
    }
?>