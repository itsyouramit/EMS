<?php
session_start();
include_once "db_connection.php";
include_once "function.php";

$q3 = "SELECT * FROM department_table";
$q4 = mysqli_query($conn,$q3);
$data = mysqli_fetch_assoc($q4);
$count1 = mysqli_num_rows($q4);

$q5 = "SELECT * FROM department_role_table";
$q6 = mysqli_query($conn,$q5);
$count2 = mysqli_num_rows($q6);



if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $first_name     =   $_POST["first_name"];
    $last_name      =   $_POST["last_name"];
    $joining_date   =   $_POST["joining_date"];
    $emp_id         =   $_POST["emp_id"];
    $dob            =   $_POST["dob"];
    $department     =   $_POST["department"];
    $role           =   $_POST["role"];
    $email          =   $_POST["email"];
    $password1      =   $_POST["password1"];
    $password2      =   $_POST["password2"];  
         
    
    $pwd = password_hash($password1, PASSWORD_BCRYPT);
    $cpwd = password_hash($password2, PASSWORD_BCRYPT); 
    
    
    $error = validate_emp($conn);

        
        if(sizeOf($error)<=0)
        {
            
        $q1 = "INSERT INTO `employee_table` (`first_name`, `last_name`, `joining_date`, `emp_id`, `dob`, `department`, `role`, `email`, `password1`, `password2`) 
        VALUES ('$first_name','$last_name','$joining_date','$emp_id','$dob','$department','$role','$email','$pwd','$cpwd')";
        $q2 = mysqli_query($conn, $q1);
            
        if($q2){
            echo '<script>alert ("Data Inserted sucessfully")</script>';
        }else{
            echo '<script>alert ("failed to register")</script>';
            }   
            
        } 
        else{
            $error[]="Error".mysqli_error($conn);
        }    
    }           
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>WizeBrain Family</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>

    <body class="sb-nav-fixed">
        <!-- navigation bar -->
        <?php include "navbar.php"; ?>
        
        <div id="layoutSidenav">
           <?php include "leftsidenav.php"; ?>  

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                       <!--  <h1 class="mt-4">Add Employee</h1> -->

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-3">

                                    <?php if(isset($error) && sizeOf($error)>0){ ?>
                                    <div class="error"> 
                                    <?php foreach($error as $error_message){ 
                                    echo $error_message."<br>";
                                    } ?>

                                    </div>
                                    <?php } ?>


                                    <div class="card-header"><h3 class="text-center font-weight-light my-2">Add New Employee</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                        <input class="form-control py-2" id="inputFirstName" type="text" placeholder="Enter first name" name="first_name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                                        <input class="form-control py-2" id="inputLastName" type="text" placeholder="Enter last name" name="last_name" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Date of joining</label>
                                                        <input class="form-control py-2" id="inputFirstName" type="Date" placeholder="Enter first name" name="joining_date" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Employee ID</label>
                                                        <input class="form-control py-2" id="inputLastName" type="text" placeholder="Employee ID" name="emp_id" />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Date of Birth</label>
                                                        <input class="form-control py-2" id="inputFirstName" type="Date" placeholder="Enter first name" name="dob" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Department</label>
                                                        <select name="department" class="form-control py-2">
                                            

                                                            <option value="">Select Department</option>
                                                            <?php 
                                                            for ($i=1; $i<=$count1 ; $i++) {  
                                                                $data1 = mysqli_fetch_assoc($q4);
                                                                ?>
                                                                <option value="<?php echo $data1["id"];?>"><?php echo $data1["department"];?></option>

                                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Role</label>
                                                        <select name="role"  class="form-control py-2">
                                                            <option value="">Select Role</option>
                                                            <?php 
                                                            for ($j=1; $j<=$count2 ; $j++) {  
                                                                $data2 = mysqli_fetch_assoc($q6);
                                                                ?>
                                                                <option value="<?php echo $data2["id"];?>"><?php echo $data2["role"];?></option>

                                                                <?php } ?>

                                                        </select>
                                                    </div>
                                                </div>    

                                            </div>

                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-2" id="inputEmailAddress" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-2" id="inputPassword" type="password" placeholder="Enter password" name="password1" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-2" id="inputConfirmPassword" type="password" placeholder="Confirm password" name="password2" />
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" name="submit" value="Add Employee" class="btn btn-primary btn-block">
                                           
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                        
                    </div>
                </main>
                <!-- footer start  -->
                <?php include "footer.php"; ?> 

            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>        
    </body>
</html>
