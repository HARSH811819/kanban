<?php
    require "PHP/connection.php";
   
    $empkey = 5;
                $get_emp = "SELECT * FROM `employees` WHERE `emp_key` = '$empkey'";
                $run_emp = mysqli_query($con,$get_emp);
                if($run_emp){
                    $emp_row = mysqli_fetch_assoc($run_emp);
                    echo $emp_row['emp_name'];
                    // echo "run";
                }else{
                    echo"not run";
                }

?>