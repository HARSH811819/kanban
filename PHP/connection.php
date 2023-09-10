<?php
    $servername = "localhost";
    $username = "root";
    $password="";
    $database ="kanban";
    
    
    $con = mysqli_connect($servername,$username,$password,$database);

    if($con){
        echo"connected<br>";
    }else{
        echo"Not connected<br>";
        
    }
?>