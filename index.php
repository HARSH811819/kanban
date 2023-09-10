<?php
    require'PHP/connection.php';
    session_start();
    $login = false;
    $admin_name = NULL;
    $userkey = NULL;
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true){
        $login = true;
        $admin_name = $_SESSION['username'];
        $userkey = $_SESSION['user_key'];
    }
  //  echo $login."<br>";
    //echo $admin_name."<br>";
    echo $userkey."<br>";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boot strap CDN link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  

    <!-- Font Awsom Link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Kanhan Board</title>
    <style>
        
        *{
            padding: 0px;
            margin: 0px;
        }

        /* CSS for navbar */
        .navbar{
            height: 70px;
            /* border: 1px solid black; */
            background-color: rgb(138, 192, 246);
            display: flex;
            justify-content: space-around;
            align-items: center;
            position: sticky;
            top: 0px;
        }
        .logoBox{
            
            background-color: rgb(156, 185, 217);
            /* border: 1px solid black; */
            width: 30%;
            max-width: 400px;
            height: 60px;
            border-radius: 0px 0px 15px 15px;
        }
        .linkBox{
            background-color: rgb(156, 185, 217);
            /* border: 1px solid black; */
            width: 50%;
            max-width: 640px;
            height: 60px;
            border-radius: 0px 0px 15px 15px;
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        .linkBox a{
            text-decoration: none;
            color: rgb(11, 33, 130);
            font-weight: 700;
            margin: 0px 5px 0px 5px ;
        }
        .entrybtn{
            width: 70px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0);
            border: none;
            font-weight: 700;

        }
        .entrybtn:hover{
            border: 1px solid gray;
            border-radius: 5px;
        }
        .sidenav{
            height: 100vh;
            width: 0px;
            position: fixed;
            z-index: 1;
            border: 1px solid black;
            background-color: aqua;
            transition: width 1s;
            
        }
        .sideLinkBox{
            height: 70%;
            width: 80%;
            overflow: hidden;
            
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            border: 1px solid black;
            margin: auto;

        }
        .sideLinkBox a{
            text-decoration: none;
            font-weight: 600;
            margin: 10px;
        }
        .sidenavbtn{
            width: 50px;
            height: 50px;
            border: none;
            background-color: rgba(255, 255, 255, 0);
            display: none;
        }
        

      

        @media screen and (max-width:950px) {
            body{
                /* background-color: aquamarine; */
            }
            .linkBox{
                background-color: rgb(156, 185, 217);
                /* border: 1px solid black; */
                width: 50%;
                height: 60px;
                border-radius: 0px 0px 15px 15px;
                display: none;
                justify-content: space-around;
                align-items: center;
            }
            .sidenavbtn{
                width: 50px;
                height: 50px;
                border: none;
                background-color: rgba(255, 255, 255, 0);
                display: block;
                justify-self:flex-end;
             }
        }

        .addtaskbtn{
            width: 150px;
            height: 40px;
            margin: 10px;
            position: fixed;
            bottom: 10px;
            right: 10px;
            border-radius: 0px 20px 0px 20px;
            font-weight: 900;
            border: 2px solid rgb(4, 4, 138);
            color: blue;
        }
        .addemployeebtn{
            padding: 5px;
            border: 4px solid rgb(138, 192, 246);
            border-radius: 0px 0px 10px 10px;
            position: fixed;
            top: 70px;
            left: 10px;
            font-weight: 700;
            background-color: rgb(168, 204, 232);
        }
        .addemployeebtn:hover{
           background-color: rgb(185, 185, 185);
        }
        .employee{
            width: 80%;
            min-height: 30px;
            /* border: 1px solid gray; */
            /* background-color: aquamarine; */
            border-radius: 5px;
            margin: 10px auto 10px auto;
            display: flex;
            
        }
        .empname{
            width: 40%;
            min-height: 30px;
            border: 3px solid rgb(255, 0, 0);
            border-radius: 10px 0px 0px 10px;
            padding-left: 5px;
            background-color: rgb(255, 238, 0);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .empinfo{
            border: 1px solid rgb(168, 126, 0);
            width: 60%;
            min-height: 30px;
            border-radius: 0px 10px 10px 0px;
            background-color: rgb(158 215 247);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .projectbadge{
            min-width: 25px;
           min-height: 25px;
            border: 2px solid rgb(226, 0, 0);
            background-color: gainsboro;
            border-radius: 10px;
            margin: 0px 5px 0px 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 400;
            font-size: 20px;
            color: brown;
            
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }
      
        .taskbtnbox{
            height: 40px;
            width: 100%;
            padding: 0px 5px 0px 5px;
            margin: 10px auto 10px auto;
            display: flex !important;
            justify-content: space-between !important;
            
        }
        .tasksubmitbtn{
            height: 40px;
            width: fit-content;
            padding: 3px;
            border: 2px solid green;
            border-radius: 4px;
            background-color: rgba(255, 255, 255, 0);
          
        }
    
        #employeeList{
            height: 40px;
            width: 100px;
            border: 2px solid black;
            border-radius: 5px;
            font-weight: 500;
        }
        #employeeList option{
            font-weight: 500;
            color: blue;
        }
        
          /* Css for main container  */
          .maincontainer{
            height: 800px;
            width: 80vw;
            max-width: 1200px;
            border: 1 px solid black;
            background-color: rgb(214, 214, 214);
            /* margin-top: 50px; */
            margin: 50px auto 0px auto;
            /* padding: 10x; */
            padding-top: 10px;
        }
       
        .taskbadgebox{
            width: 220px;
            height: 330px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin-left: 15px;
            margin-right: 15px;
          
        }
        .taskbadge{
            width: 200px;
            height: 300px;
            /* border: 1px solid black; */
            display: flex;
            flex-direction: column;
            justify-content: center;
            margin: 10px 10px 10px 10px;
            border-radius: 10px;
            box-shadow: 1px 4px 8px 2px;
        }
        .taskheader{
            height: 15%;
            width: 100%;
            
            border-radius: 10px 10px 0px 0px;
            display:flex;
            justify-content: center;
            align-items: center;
            background-color: rgb(224, 148, 6);
            
        }
        .taskbody{
            height: 65%;
            width: 100%;
            /* border: 1px solid black; */
            background-color: antiquewhite;
            overflow-y: scroll;
            
        }
        .taskfooter{
            height: 20%;
            width: 100%;
            /* border: 1px solid black; */
            border-radius: 0px 0px 10px 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: gray;
        }


    </style>
</head>
<body onresize="resize()"> 
    
    <nav class="navbar">
        <div class="logoBox">
            <h2>Logo</h2>
        </div>
        <div class="linkBox" id="linkBox">
            <div>
                <a href="http://" target="_blank" >Home</a>
                <a href="http://" target="_blank" >About</a>
            </div>
                
            <?php
            if($login){
                echo'
                    <a href="http://" target="_blank" >Backlog</a>
                    <a href="http://" target="_blank" >ToDo</a>
                    <a href="http://" target="_blank" >Completed</a>

                    <button type="button" class="loginbtn entrybtn" data-toggle="modal" data-target="#logout" >Log Out</button>
                    
                    ';
                }else{
                    echo'
                        <div>
                            <button type="button" class="loginbtn entrybtn" data-toggle="modal" data-target="#loginmodal" data-whatever="@mdo" >Log In</button>
                            <button type="button" class="signupbtn entrybtn" data-toggle="modal" data-target="#signupmodal" data-whatever="@mdo" >Sign Up</button>
                        </div>
                    ';
                }
            ?>
        </div>
        
        <button type="button" class="sidenavbtn" id="sidenavbtn">
            <i id="sidenavbtnicon" class="fa fa-bars" style="font-size:36px"></i>
        </button>
        
    </nav>
    <!-- Side Navbar -->
    <div id="sidenav" class="sidenav">
        <div class="sideLinkBox" id="sideLinkBox">
            <a href="http://" target="_blank" >Home</a>
            <a href="http://" target="_blank" >About</a>
            <a href="http://" target="_blank" >Backlog</a>
            <a href="http://" target="_blank" >ToDo</a>
            <a href="http://" target="_blank" >Completed</a>
            
            <button type="button" class="loginbtn entrybtn" data-toggle="modal" data-target="#loginmodal" data-whatever="@mdo" >Log In</button>
            <button type="button" class="signupbtn entrybtn" data-toggle="modal" data-target="#signupmodal" data-whatever="@mdo" >Sign Up</button>
            
        </div>
    </div>

    <!-- Add Employee button -->

    <?php
        if($login){
            echo'
            <button type="button" class="addemployeebtn" id="addemployeebtn" data-toggle="modal" data-target="#addemployeeModal">Add Employee</button>
            ';
        }
    ?>

   <?php
   //importing all modals login signup and logout   
     require"modal.php";
   ?>

    <!-- Main container in which all components will be shown in this container -->
    <div class="maincontainer">


        <?php
            $get_emp = "SELECT * FROM `tasks` WHERE `admin_key` = '$userkey'";
            $run_emp = mysqli_query($con,$get_emp);
            while($row = mysqli_fetch_assoc($run_emp)){
            //  echo $row['emp_name']."<br>";
                $empkey = $row["emp_key"];
                $get_emp = "SELECT * FROM `employees` WHERE `emp_key` = '$empkey'";
                $run_emp = mysqli_query($con,$get_emp);
                $emp_row = mysqli_fetch_assoc($run_emp);
                echo $emp_row['emp_name'];
               

                echo$row["task_name"].'<br>
                <div class="taskbadgebox">
                    <div class="taskbadge">
                        <div class="taskheader">
                            <h4 style="margin: 0px;">'.$row["task_name"].'</h4>
                        </div>
                        <div class="taskbody">
                            <p style="margin: 5px;">
                            
                            </p>
                        </div>
                        <div class="taskfooter">
                        <button type="button" class="btn btn-success">
                        <span class="badge bg-secondary">4</span>
                        </button>
                        </div>
                    </div>     
                    <div class="progress border border-success">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>   
                </div>

                ';
            }
        ?>



    </div>

    

    <!-- Add task button -->

    <?php
    if($login){
        echo'
        <button type="button" class="addtaskbtn" data-toggle="modal" data-target="#addtask" data-whatever="@mdo" >Add Task</button>
        ';
    }
    ?>

    <?php
        echo '
          <!-- add task modal -->
            <div class="modal fade" id="addtask" tabindex="-1" role="dialog" aria-labelledby="addtaskLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addtaskLabel">Log In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="PHP/addtask.php" method="post">
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Task Name :</label>
                                <input type="text" name="task_name" class="form-control" id="recipient-name">
                            </div>
                            <div class="mb-3">
                                <label for="message-text"  class="col-form-label">Description</label>
                                <textarea name="description" class="form-control" id="message-text"></textarea>
                                </div>
                            
                                <label for="recipient-name" class="col-form-label">Deadline :</label> 
                                <input type="date" name="deadline" class="form-control" id="recipient-name">
                                <div class="taskbtnbox">
                                
                                        <select name="emplist" id="employeeList">';
                                            
                                        $get_emp = "SELECT * FROM `employees` WHERE `admn_key` = '$userkey'";
                                        $run_emp = mysqli_query($con,$get_emp);
                                        while($row = mysqli_fetch_assoc($run_emp)){
                                          //  echo $row['emp_name']."<br>";
                                            echo$row["emp_key"].'
                                            
                                            <option value="'.$row["emp_key"].'">'.$row["emp_name"].' '. $row["emp_key"].'</option>
                
                                            ';
                                        } 
                                        

                                    echo'        
                                        </select>

                                        
                                        <button type="submit" class="tasksubmitbtn">Assign Task</button>

                                </div>                    
                    
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    </div>
                    </div>
                </div>
            </div>
        
        ';
    
    ?>
  
    

</body>

    <script>

        let issidenav = 0;
        document.getElementById("sidenavbtn").addEventListener("click", (e)=>{
            
            let sidenav = document.getElementById("sidenav");
            let sidenavbtnicon = document.getElementById("sidenavbtnicon");
            if(!issidenav){
                console.log("opended");
                issidenav = 1;
                sidenav.style.width = "100vw";
                sidenavbtnicon.className = "fa fa-close"
                console.log(sidenavbtn);
                
                
            }else{
                
                console.log("closed");
                issidenav = 0;
                sidenav.style.width = "0px";
                sidenavbtnicon.className = "fa fa-bars"
            }
        })

        
        function resize(){
            let w = window.outerWidth;
            let sidenav = document.getElementById("sidenav");
            let sidenavbtn = document.getElementById("sidenavbtn");
            let sidenavbtnicon = document.getElementById("sidenavbtnicon");
            if(w > 950){
                sidenav.style.width = "0px";
                sidenavbtn.style.display = "none";
            }else{
                sidenavbtn.style.display = "block";
                sidenavbtnicon.className = "fa fa-bars"
                issidenav = 0;
            }
         
        }


    </script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>



