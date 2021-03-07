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



//function to fie all department

function getDepartment($conn){                           
$result=mysqli_query($conn,"SELECT * FROM department_detail WHERE 1=1");	
if(mysqli_num_rows($result)>0)
{	
	while($row=mysqli_fetch_assoc($result)){
 		$role[]=$row;										 
		}
		}	                                                        
	else{
		
		$role[]=0;
		}
	
   return $role;
   
}
	


function Employee($conn,$query){
	$q1 = mysqli_query($conn, $query);
	return $q1;
}





function clear_data($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


function validate_first_name($data){
	if (empty($_POST['first_name'])) {
	$nameError1 = "first name is required";
	}else{
		$first_name = clear_data($_POST['first_name']);
		if (!preg_match("/^[a-zA-Z]*$/", $first_name)) {
			$nameError1 = "Only letters are allowed";
		}elseif (preg_match("/^[a-zA-Z]*$/", $first_name)) {
			return $first_name = clear_data($_POST['first_name']);	
		}
		return $nameError1;
	}
	return $nameError1;
}


function validate_last_name($data){
	if (empty($_POST['first_name'])) {
	$nameError = "Last name is required";
	}else{
		$first_name = clear_data($_POST['first_name']);
		if (!preg_match("/^[a-zA-Z]*$/", $first_name)) {
			$nameError1 = "Only letters are allowed";
		}elseif (preg_match("/^[a-zA-Z]*$/", $first_name)) {
			return $first_name = clear_data($_POST['first_name']);	
		}
		return $nameError;
	}
	return $nameError;
}



function validate_joining_date($data){
	if (empty($_POST['joining_date'])) {
		$nameError = "joining_date is required";
	}else{
		return $joining_date   =   clear_data($_POST["joining_date"]);
	}
	return $nameError;
}


function validate_emp_id($data){
	if (empty($_POST['emp_id'])) {
		$nameError = "emp_id is required";
	}else{
		return $emp_id   =   clear_data($_POST["emp_id"]);
	}
	return $nameError;
}



function validate_dob($data){
	if (empty($_POST['dob'])) {
		$nameError = "dob is required";
	}else{
		return $dob   =   clear_data($_POST["dob"]);
	}
	return $nameError;
}



function validate_dep($data){
	if (empty($_POST['department'])) {
		$nameError = "Select Department";
	}else{
		return $department   =   clear_data($_POST["department"]);
	}
	return $nameError;
}


function validate_role($data){
	if (empty($_POST['role'])) {
		$nameError = "Select Role";
	}else{
		return $role   =   clear_data($_POST["role"]);
	}
	return $nameError;
}



function validate_email($data){
	if (empty($_POST['email'])) {
		$nameError = "email is required";
	}else{
		$email   =   clear_data($_POST["email"]);
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return $email   =   clear_data($_POST["email"]);
		}
		return $nameError = "Invalid Formate";
	}
	return $nameError;
}





?>









?>
















