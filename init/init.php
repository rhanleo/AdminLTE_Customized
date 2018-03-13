<?php
//Sign up
include('../conn.php');
$con = new db();
$conn = $con->connect();

if(isset($_POST['signup'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$data = "INSERT INTO users (fname,lname,email,password) VALUES ('$fname','$lname','$email','$password')";
	
	$sql = mysqli_query($conn, $data);
	header('location:http://localhost:81/AdminLTE/forms/register.php?s=1');
}




?>