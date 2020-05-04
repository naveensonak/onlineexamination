<?php

include('include/connect.php');

if(isset($_POST['submit']))
{
$name = mysqli_real_escape_string($config,$_POST['name']);
$father = mysqli_real_escape_string($config,$_POST['father']);
$mother = mysqli_real_escape_string($config,$_POST['mother']);
$class = mysqli_real_escape_string($config,$_POST['class']);
$school = mysqli_real_escape_string($config,$_POST['school']);
$mobile = mysqli_real_escape_string($config,$_POST['mobile']);
$email = mysqli_real_escape_string($config,$_POST['email']);
$pass = mysqli_real_escape_string($config,$_POST['password']);
$subject = mysqli_real_escape_string($config,$_POST['subject']);
	
 $sql="INSERT INTO `tbl_registration_formquesta'(name,father,mother,class,school,mobile,email,password,subject,isactive) VALUES ('".$name."','".$father."','".$mother."','".$class."','".$school."','".$mobile."','".$email."','".$pass."','".$subject."','1')";
 mysqli_query($config,$sql);
header("location:index.php");
exit();

}
?>