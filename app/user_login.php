<?php 
include("include/connection.php");
$sql="select * from `user` where `email`='".$_POST['email']."' and `password`='".md5($_POST['password'])."' and `status`='1'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	$line=mysql_fetch_assoc($result);
	if($num>=1)
	{
$response = array();

$response["statusCode"] = 200;
$response["data"]['name']=$line['name'];
$response["data"]['userId']=$line['id'];
$response["data"]['phone']=$line['mobile'];
$response["data"]['email']=$line['email'];
$response["data"]["message"] = "login Successful";
	}
	else
	{
$response["statusCode"] = 0;
$response["data"]["message"] = "Username Or Password Not Matched";
	}
	echo json_encode($response);
?>