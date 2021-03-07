<?php 
session_start();
include_once "db_connection.php";
include_once "function.php";



$id = $_GET['id'];
$all_dep=all_dep($conn,"SELECT * FROM department_table WHERE id = '$id'");


if (isset($_POST['update'])) {

    $department = $_POST["department"];
    $error=validate_dep($conn);

   if(sizeOf($error) <= 0){
   	
       	$update_dep = mysqli_query($conn,"UPDATE department_table SET department = '".$_POST["department"]."' WHERE id = '$id' ");
        if ($update_dep) {
            echo "<script>alert('department updated successfully')</script>";
        }else{
        	echo "<script>alert('failed to update')</script>";
        }
    }else{
        echo $error[]="Error".mysqli_error($conn);
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
                        <h1 class="mt-4" style="text-align: center;">Update Department</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">UPDATE DEPARTMENT</li>
                        </ol>

                        <div class="container" style="margin-top: -40px;">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Department</h3></div>
                                        <div class="card-body">
                                            <form method="POST">
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="small mb-1" for="inputFirstName">Department Name</label>
                                                            <input class="form-control py-3" id="inputFirstName" type="text" placeholder="Enter Department Name" name="department" value="<?php echo $all_dep['department'];?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="submit" name="update" value="Add Department" class="btn btn-primary btn-block">
                                                
                                            </form>

                                            <?php if(isset($error) && sizeof($error) >0){?>

                                            	<div class="error">
                                            		<?php foreach($error as $error_msg){ ?>
                                            			<?php echo $error_msg; ?>
                                            		<?php }?>
                                            	</div>
                                            <?php } ?>


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

