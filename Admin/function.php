<?php 
include_once "db_connection.php";

function AllDepartment($conn,$query){  
	 
	$result = mysqli_query ($conn,$query);
	$count = 0;
	   $data = array();
	   while ( $row = mysqli_fetch_array($result)){
	       $data[$count] = $row;
		$count++;
	   }
	   return $data;	
}

function all_dep($conn,$query){
	$q2 = mysqli_query($conn,$query);
	$res = mysqli_fetch_assoc($q2);
	return $res;
}

function all_role($conn,$query){
	$q2 = mysqli_query($conn,$query);
	$res = mysqli_fetch_assoc($q2);
	return $res;
}


function emp_count($conn){
  $q2 = mysqli_query($conn,"SELECT * FROM employee_table");
  $res = mysqli_num_rows($q2);
  return $res;
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  if($data!=''){
      
  }
  return $data;
}


function validate_dep($conn){

	$department  = $_POST['department'];
	$error=[];

    if(empty($_POST['department'])){
        $error[]="Department Is Required";
        
    }elseif ($sql = "SELECT * FROM department_table WHERE department ='$department'") {
        $result =mysqli_query ($conn,$sql);  
        if(mysqli_num_rows($result)> 0){
           $error[]= 'Department already Exist';   
        } else{
            $department = test_input($_POST["department"]);

            if (!preg_match("/^[a-zA-Z ]*$/",$department)){
            $error[] = "Only letters allowed";
            } 
        } 
    }
    return $error;
}



function validate_role($conn){

	$role  = $_POST['role'];
	$error=[];

    if(empty($_POST['role'])){
        $error[]="Role Is Required";
        
    }elseif ($sql = "SELECT * FROM department_role_table WHERE role ='$role'") {
        $result =mysqli_query ($conn,$sql);  
        if(mysqli_num_rows($result)> 0){
           $error[]= 'Role already Exist';   
        } else{
            $role = test_input($_POST["role"]);

            if (!preg_match("/^[a-zA-Z ]*$/",$role)){
            $error[] = "Only letters allowed";
            } 
        } 
    }
    return $error;

}


function validate_emp($conn){

  $error=[];
    
    if (empty($_POST["first_name"])) {
        $error[] = "First Name is required";
        } else {
        $first_name = test_input($_POST["first_name"]);
        
        if (!preg_match("/^[a-zA-Z]*$/",$first_name)){
        $error[] = "Only letters allowed";
        }
    }   

    
    if (empty($_POST["last_name"])) {
        $error[] = "Last Name is required";
        } else {
        $last_name = test_input($_POST["last_name"]);
        
        if (!preg_match("/^[a-zA-Z]*$/",$last_name)){
        $error[] = "Only letters allowed";
        }
    }   

    
    //email
    if (empty($_POST["email"])) {
    $error[] = "Email is required";
    } 
    if($sql = "SELECT * FROM employee_table WHERE email ='".$_POST["email"]."'"){
         $result =mysqli_query ($conn,$sql);  
        if(mysqli_num_rows($result)> 0)
        $error[]= 'email is used';
        } else{
         $email = test_input($_POST["email"]);
        }           


    //join
    if (empty($_POST["joining_date"])) {
        $error[] = "joining is required";
        } else {
        $joining_date = test_input($_POST["joining_date"]);
    }
    
    
    if (empty($_POST["emp_id"])) {
        $error[] = "employee id is required";
        } else {
        $emp_id = test_input($_POST["emp_id"]);
       }                        
        

    
    if (empty($_POST["dob"])) {
        $error[] = "DOB is required";
        } else {
        $dob = test_input($_POST["dob"]);
        }

    
    if (empty($_POST["department"])) {
        $error[] = "department is required";
        } else {
        $department = test_input($_POST["department"]);
        }         

    if (empty($_POST["role"])) {
        $error[] = "Select role";
        } else {
        $role = test_input($_POST["role"]);
        }
        
    if (empty($_POST["password1"])) {
        $error[] = "Enter password";
        } else {
        $password1 = test_input($_POST["password1"]);
        }
                              
    if (empty($_POST["password2"])) {
        $error[] = "Confirm password";
        } else {
        $password2 = test_input($_POST["password2"]);
        }   

    if ($_POST["password1"] !== $_POST["password2"]) {
        $error[] = 'Password or Confirm password should match!';
        }else{
        $password1 = test_input($_POST["password1"]);
        }               
      return $error;

}




?>