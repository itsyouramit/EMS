<?php 
include_once "db_connection.php";
include_once "function.php";





$q1 = "SELECT * FROM `employee_table`";
$result = mysqli_query($conn,$q1);
$rowcount = mysqli_num_rows($result);


$record_per_page = 6;

$all_emp=emp_count($conn);

$total_page=ceil($all_emp/$record_per_page);

if(isset($_GET["page"]) && $_GET["page"]!=1)
{
	$start_no = ($_GET["page"]-1)*$record_per_page;
	}
	else{
		$start_no=0;
	}

$q1 = "SELECT * FROM employee_table LIMIT $record_per_page OFFSET $start_no";
$query = mysqli_query($conn,$q1);
$data = mysqli_fetch_array($query);

?>
