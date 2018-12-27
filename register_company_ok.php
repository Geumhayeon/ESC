<?php
error_reporting(E_ALL);
ini_set('display_errors','1');
$cmpID=$_POST['cmpID'];
$cmpName = $_POST['cmpName'];
$mngEmail = $_POST['mngEmail'];
$cmpWant = $_POST['cmpWant'];
$minGrade = $_POST['minGrade'];
$password=password_hash($_POST['inputPassword'],PASSWORD_DEFAULT,["cost"=>10]);
$conn=mysqli_connect("localhost","root","esc","esc");
if(mysqli_connect_errno($conn))
{
        echo "failed".mysqli_connect_error();
}
else
        echo "sucess!!";
$sql2 = "insert into company_profile (cmpID, cmpName, mngEmail, cmpWant, minGrade) values ('".$cmpID."', '".$cmpName."','".$mngEmail."', '".$cmpWant."','".$minGrade."')";
$conn->query($sql2);
$sql = "insert into user (id, pw) values ('".$cmpID."', '".$password."')";
$conn->query($sql);
$conn->close();

?>
<meta http-equiv='refresh' content='0;url=login.php'>
