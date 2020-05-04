<?php 
include("include/connection.php");
$userid=$_POST['userId'];
$oldpassword=($_POST['oldpassword']);
$newpassword=($_POST['newpassword']);
$response = array();

$sql="select * from `user` where `id`='".$userid."' and `password`='".md5($oldpassword)."'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	$line=mysql_fetch_assoc($result);
	if($num!='')
	{
$sql2= "UPDATE `user` SET `password`= '".md5($newpassword)."' WHERE `id`='".$userid."'";
$query2=mysql_query($sql2);

$response["statusCode"] = 200;
$response["data"]["message"] = "Password Change Successfully";
echo json_encode($response);
	
	
	}
	else
	{
$response["statusCode"] = 0;
$response["data"]["message"] = "UserId or old password not wrong";
echo json_encode($response);
	}
	?>