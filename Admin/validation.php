<?php 



// $q3 = "SELECT * FROM department_table";
// $q4 = mysqli_query($conn,$q3);
// $count1 = mysqli_num_rows($q4);

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

function validation($data){
	if (empty($_POST['first_name'])) {
	$nameError1 = "Name is required";
	}else{
		$first_name = clear_data($_POST['first_name']);
		if (!preg_match("/^[a-zA-Z]*$/", subject)) {
			$nameError1 = "Only letters are allowed";
		}
	}
}

function valid($data){
	 if (empty($_POST["name"])) {
    $nameErr = "Name is required";
	  } else {
	    $name = test_input($_POST["name"]);
	   
	    if (!preg_match("/^[a-zA-Z]*$/",$name)) {
	      $nameErr = "Only letters and white space allowed";
	    }
	  }
}

?>







<?php 

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}






$arr_inputname = array("first_name","last_name","email");

function ValidateForm($arr_inputname){
	if (!is_array($arr_inputname)) {
		echo "Field name Must be array";
		exit();
	}
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$ErrMsg  = array();

			foreach ($arr_inputname as $name) {

				if (empty($_POST['first_name'])) {
					$ErrMsg[$name] = $name."is required";
				}else{
					$_POST["first_name"] = test_input($_POST["first_name"]);
					$ErrMsg[$name] = NULL;
					$ErrMsg = pregcheck($name,$ErrMsg);
				}
			}//foreach
			return $ErrMsg;
	}
//if


}

$ErrMsg = ValidateForm($arr_inputname);


function pregcheck($name, $ErrMsg){
	if($name == "first_name"){
		if (!preg_match("/^[a-zA-Z]*$/", $_POST["first_name"])) {
			$ErrMsg[$name] = "Only letters are allowed";
		}
	}

	if($name == "last_name"){
		if (!preg_match("/^[a-zA-Z]*$/", $_POST["last_name"])) {
			$ErrMsg[$name] = "Only letters are allowed";
		}		
	}

	if ($name == "email") {
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$ErrMsg[$name] = "Invalid email formate";
		}		
	}

	return $ErrMsg;

}



function showPost($name){
	if (isset($_POST["first_name"])) {
		echo $_POST["first_name"];
		return $_POST["first_name"];
	}
	if (isset($_POST["email"])) {
	echo $_POST["email"];
	return $_POST["email"];
	}

}

function ShowErr($name){
	global $ErrMsg;
	if (isset($ErrMsg)) {
		echo $ErrMsg["first_name"];
	}

		if (isset($ErrMsg)) {
		echo $ErrMsg["email"];
	}
}




?>












<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field</span></p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
	  Name: <input type="text" name="first_name" value="<?php showPost('first_name');?>">
	  <span class="error">* <?php ShowErr("first_name");?></span>
	  <br><br>
	  E-mail: <input type="text" name="email" value="<?php showPost('email');?>">
	  <span class="error">* <?php ShowErr("email");?></span>
	  <br><br>

	  <input type="submit" name="submit" value="Submit">  
	</form>



</body>
</html>




