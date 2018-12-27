<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
$name=$_POST['name'];
$gender = $_POST['gender'];
$studentID = $_POST['student_id'];
$inputEmail = $_POST['inputEmail'];
$password=password_hash($_POST['inputPassword'],PASSWORD_DEFAULT,["cost"=>10]);
$conn=mysqli_connect("localhost","root","esc","esc");
if(mysqli_connect_errno($conn))
{
	echo "failed".mysqli_connect_error();
}
else
	echo "sucess!!";
$sql2 = "insert into student_profile (stuID, stuName, stuEmail, stuGender) values ('".$studentID."', '".$name."','".$inputEmail."', '".$gender."')";
$conn->query($sql2);
$sql = "insert into user (id, pw) values ('".$studentID."', '".$password."')";
$conn->query($sql);
$conn->close();

?>
<meta http-equiv='refresh' content='0;url=login.html'>
