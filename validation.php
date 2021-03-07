

<!DOCTYPE html>
<html lang="en">
<head>
  <title>PHP Form Validation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--bootstrap4 library linked-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <!--custom style-->
  <style type="text/css">
   .registration-form{
      background: #f7f7f7;
      padding: 20px;
      border: 1px solid orange;
      margin: 50px 0px;
    }
    .err-msg{
      color:red;
    }
    .registration-form form{
      border: 1px solid #e8e8e8;
      padding: 10px;
      background: #f3f3f3;
    }
  </style>
</head>
<body>

<div class="container-fluid">
 <div class="row">
   <div class="col-sm-4">
   </div>
   <div class="col-sm-4">
    
    <!--====registration form====-->
    <div class="registration-form">
      <h4 class="text-center">Create a New Account</h4>
      
<p class="text-success text-center"><?php echo $valid; ?></p> <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">


        <!--//first name//-->
        <div class="form-group">
           <label for="email">First Name</label>
               
<input type="text" class="form-control" placeholder="Enter First Name" name="first_name" value="<?php echo $set_firstName;?>">

           <p class="err-msg">
    
<?php if($fnameErr!=1){ echo $fnameErr; }?>

           </p>
        </div>

        <!--//Last name//-->
        <div class="form-group">
            <label for="email">Last Name</label>
                
<input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" value="<?php echo $set_lastName;?>">

            <p class="err-msg"> 
    
<?php if($lnameErr!=1){ echo $lnameErr; } ?>

            </p>
        </div>
        
        <!--// Email//-->
        <div class="form-group">
            <label for="email">Email:</label>
                
<input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $set_email;?>">

            <p class="err-msg">
    
<?php if($emailErr!=1){ echo $emailErr; } ?>

            </p>
        </div>
        
        <!--//Password//-->
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control"  placeholder="Enter password" name="password">
            <p class="err-msg">
                
<?php if($passErr!=1){ echo $passErr; } ?>

            </p>
        </div>

        <!--//Confirm Password//-->
        <div class="form-group">
            <label for="pwd">Confirm Password:</label>
            
                
            <input type="password" class="form-control" placeholder="Enter Confirm password" name="cpassword">
            <p class="err-msg">
                
<?php if($cpassErr!=1){ echo $cpassErr; } ?>

            </p>
        </div>
    
        <button type="submit" class="btn btn-danger" value="Register" name="register">Register Now</button>
      </form>
    </div>
   </div>
   <div class="col-sm-4">
   </div>
 </div>
  
</div>

</body>
</html>





 <?php

// by default, error messages are empty
$valid=$fnameErr=$lnameErr=$emailErr=$passErr=$cpassErr='';

// by default,set input values are empty
$set_firstName=$set_lastName=$set_email='';    
 extract($_POST);

if(isset($_POST['register']))
{
   
   //input fields are Validated with regular expression
   $validName="/^[a-zA-Z ]*$/";
   $validEmail="/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
   $uppercasePassword = "/(?=.*?[A-Z])/";
   $lowercasePassword = "/(?=.*?[a-z])/";
   $digitPassword = "/(?=.*?[0-9])/";
   $spacesPassword = "/^$|\s+/";
   $symbolPassword = "/(?=.*?[#?!@$%^&*-])/";
   $minEightPassword = "/.{8,}/";

 //  First Name Validation
if(empty($first_name)){
   $fnameErr="First Name is Required"; 
}
else if (!preg_match($validName,$first_name)) {
   $fnameErr="Digits are not allowed";
}else{
   $fnameErr=true;
}

//  Last Name Validation
if(empty($last_name)){
   $lnameErr="Last Name is Required"; 
}
else if (!preg_match($validName,$last_name)) {
   $lnameErr="Digits are not allowed";
}
else{
   $lnameErr=true;
}

//Email Address Validation
if(empty($email)){
  $emailErr="Email is Required"; 
}
else if (!preg_match($validEmail,$email)) {
  $emailErr="Invalid Email Address";
}
else{
  $emailErr=true;
}
    
// password validation 
if(empty($password)){
  $passErr="Password is Required"; 
} 
elseif (!preg_match($uppercasePassword,$password) || !preg_match($lowercasePassword,$password) || !preg_match($digitPassword,$password) || !preg_match($symbolPassword,$password) || !preg_match($minEightPassword,$password) || preg_match($spacesPassword,$password)) {
  $passErr="Password must be at least one uppercase letter, lowercase letter, digit, a special character with no spaces and minimum 8 length";
}
else{
   $passErr=true;
}

// form validation for confirm password
if($cpassword!=$password){
   $cpassErr="Confirm Password doest Matched";
}
else{
   $cpassErr=true;
}

// check all fields are valid or not
if($fnameErr==1 && $lnameErr==1 && $emailErr==1 && $passErr==1 && $cpassErr==1)
{
   $valid="All fields are validated successfully";


   
   //legal input values
   $firstName= legal_input($first_name);
   $lastName=  legal_input($first_name);
   $email=     legal_input($email);
   $password=  legal_input($password);

   // here you can write Sql Query to insert user data into database table
}else{
     // set input values is empty until input field is invalid
    $set_firstName=$first_name;
    $set_lastName= $last_name;
    $set_email=    $email;
}

}


// convert illegal input value to ligal value formate
function legal_input($value) {
  $value = trim($value);
  $value = stripslashes($value);
  $value = htmlspecialchars($value);
  return $value;
}
?>
