<?php
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        session_start();
        session_unset();
        session_destroy();
        echo"session loged out";
        header("location: ../index.php");
    }else{
        echo"Something went wrong";
    }

?>