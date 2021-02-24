<?php  
include_once "db_connection.php";
?>

<?php
session_start();

$_SESSION["loginstatus"]="";

if (isset($_POST["login"])) {
    
    $email = $_POST["email"];
    $pass  = $_POST["password"];

    if (!empty($email) && !empty($pass)) 
    {
     $useremail = mysqli_escape_string($conn, $email);  
     $userpass  = mysqli_escape_string($conn, $pass);

     $q1 = "SELECT * FROM admin WHERE email = '".$useremail."' and password = '".$userpass."'";

     $res = mysqli_query($conn,$q1);
     $count = mysqli_num_rows($res);
    
     
     if ($count>0) {
        $rows = mysqli_fetch_assoc($res);

        $_SESSION["ROLE"] = $rows["role"];
        $_SESSION["IS_LOGIN"] = "yes";
        if ($rows["role"] == 1) {
            header("location:index2.php");
            die();
        }elseif ($rows["role"] == 2) {
            header("location:base.php");
            die();
        }else{
            header("location:index2.php");
            die();
        }

        // print_r($rows);
        // die();

     }else{
        echo "Invalid Creditantials";
     }

     
     // if ($rows) 
     //    {
     //      if (!empty($_POST["remember"])) {
     //          setcookie("email",$useremail, time() + 3600 );
     //          setcookie("password",$userpass, time() + 3600 );
     //          $_SESSION["email"] = $useremail;
     //          $_SESSION["password"] = $userpass;
     //      }
     //      else
     //      {
     //        if (isset($_COOKIE["email"])) {
     //            setcookie("email","", time() -3600);
     //        }
     //        if (isset($_COOKIE["password"])) {
     //            setcookie("password","", time() -3600);
     //        }

     //      }
          
     //  }else{
     //    $message = "Invalid Creditantials";
     //    echo $message;
     //  }

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
        <title>login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">


                                        <form method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" placeholder="Enter email address" name="email" 
                                                value=" <?php if(isset($_COOKIE["email"])) {echo $_COOKIE["email"];} ?>"/>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" placeholder="Enter password" name="password" />
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox">
                                                    <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" name="remember" />
                                                    <label class="custom-control-label" for="rememberPasswordCheck">Remember password</label>
                                                </div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.php">Forgot Password?</a>
                                                <input type="submit" class="btn btn-primary" name="login" value="login">
                                            </div>
                                        </form>


                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>


