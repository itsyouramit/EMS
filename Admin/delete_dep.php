<?php

session_start();
include_once "db_connection.php";

$id = $_GET['id'];
$q1 = "DELETE FROM department_table WHERE id='$id'";
$q2 = mysqli_query($conn,$q1);

header("location:all_department.php");
?>