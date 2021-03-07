<?php
session_start();
include_once "db_connection.php";

    $q1 = "SELECT * FROM department_table";
    $q2 = mysqli_query($conn,$q1);
   
    $row = mysqli_num_rows($q2);

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
                        <h1 class="mt-4" style="text-align: center;">All Departments</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Departments List</li>
                        </ol>


                        <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">Serial No.</th>
                              <th scope="col">Departments</th>
                              <th scope="col">Update</th>
                              <th scope="col">Delete</th>
                            </tr>
                          </thead>
                          <tbody>
                        
                            <?php 
                            $count = 1;
                            for ($i=1; $i<=$row ; $i++) { 
                                $result = mysqli_fetch_assoc($q2); 

                            ?> 
                            <tr>
                              <th scope="row"><?php echo $count ?></th>
                              <th scope="row"><?php echo $result["department"]?></th>
                              <th>
                                  <a type="button" class="btn btn-primary" href=update_dep.php?id=<?php echo $result['id'];?>>Update</a>
                              </th>
                              <th>
                                  <a type="button" class="btn btn-danger" href=delete_dep.php?id=<?php echo $result['id'];?>>Update</a>
                              </th>                              
                            </tr>
                            <?php 
                            $count++;
                                } 
                            ?>

                          </tbody>
                        </table>

  
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
