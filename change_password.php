<?php 
include('include/connect.php');
//include("include/connection.php");
$userid=$_POST['userid'];
$oldpassword=($_POST['oldpassword']);
$newpassword=$_POST['newpassword'];
$cpassword=$_POST['cpassword'];
$finalnewpassword=($newpassword);
if(strlen($newpassword!==$cpassword)){echo "2";}else{
$sql="select * from `user` where `id`='".$userid."' and `password`='".md5($oldpassword)."'";
	$result=mysqli_query($config,$sql);
	$num=mysqli_num_rows($result);
	$line=mysqli_fetch_assoc($result);
	if($num!='')
	{
$sql2= "UPDATE `user` SET `password`= '".md5($finalnewpassword)."' WHERE `id`='".$userid."'";
$query2=mysqli_query($config,$sql2);

	echo "1";
	
	
	}
	else
	{
echo "0";
	}
}
	?>