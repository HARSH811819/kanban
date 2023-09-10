<?php
    echo'
    <!-- Log out Modal -->

    <!-- Modal -->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="logoutLabel">Log Out</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        Are you sure You Want to logout
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <form action="PHP/logout.php" method="POST">

                <button type="submit" class="btn btn-primary">yes</button>
            </form>
        </div>
        </div>
    </div>
    </div>

<!-- Sign Up Modal -->

<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="signupmodalabel">Sign Up</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="PHP/signup.php" method="post">
         
            <div class="form-group">
                <label for="recipient-name" class="col-form-label">Name</label>
                <input type="text" name="name" class="form-control" id="recipient-name">
            </div>

            <div class="form-group">
                <label for="recipient-phNo" class="col-form-label">Ph. No.</label>
                <input type="number" name="phNo" class="form-control" id="recipient-phNo">
            </div>

            <div class="form-group">
                <label for="recipient-password" class="col-form-label">Password</label>
                <input type="password" name="password" class="form-control" id="recipient-password">
            </div>
            <button type="submit" class="btn btn-primary">Sign Up</button>
            
            </form>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        </div>
        </div>
    </div>
</div>


<!-- Login Modal -->

<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="loginmodalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="loginmodalLabel">Log In</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="PHP/login.php" method="post">
     
                <div class="form-group">
                    <label for="recipient-phNo" class="col-form-label">Ph. No.</label>
                    <input type="tel" name="phNo" class="form-control" id="recipient-phNo" maxlength="10" minlength="10">
                </div>

                <div class="form-group">
                    <label for="recipient-password" class="col-form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="recipient-password">
                </div>
        
                <button type="submit" class="btn btn-primary">Log In</button>
            </form>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        </div>
        </div>
    </div>
</div>';

echo 
'
<!--Add Employee Modal -->
<div class="modal fade" id="addemployeeModal" tabindex="-1" role="dialog" aria-labelledby="addemployeeModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Members</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
            <div class="modal-body">
                    <form action="PHP/addemployee.php" method="post">
                        
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Name</span>
                            </div>
                            <input type="text" name="name" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">user ID</span>
                            </div>
                            <input type="text" name="empID" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">user ID</span>
                            </div>
                            <input type="password" name="password" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <button type="submit"  class="btn btn-primary">Add</button>
                </form>
                <br>
                <hr>
                <br>';
                        $get_emp = "SELECT * FROM `employees` WHERE `admn_key` = '$userkey'";
                        $run_emp = mysqli_query($con,$get_emp);
                        while($row = mysqli_fetch_assoc($run_emp)){
                          //  echo $row['emp_name']."<br>";
                            echo'
                                

                                    <div class="employee">
                                        <div class="empname">
                                            <h5>'.$row["emp_name"].'</h5>
                                        </div>
                                        <div class="empinfo">
                                            <h6>Projects</h6>
                                            <div class="projectbadge">
                                                '.$row["emp_task"].'
                                            </div>
                                        </div>
                                    </div>                                 

                            ';
                        } 

              
    echo '
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </div>
        </div>
        </div>
    ';
?>