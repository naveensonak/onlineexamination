<?php 
ob_start();
session_start();
include('include/connect.php');
//include("include/connect.php");

if(isset($_POST['login'])=="login")
{ 
	
date_default_timezone_set("Asia/Kolkata");
$time=date( 'Y-m-d H:i:s' );
$username=$_POST['loginemail'];
$password=$_POST['loginpassword'];
if($username!='' && $password!=''){
$sql="select * from `user` where `email`='".$username."' and `password`='".md5($password)."' and `status`='1'";
	$result=mysqli_query($config,$sql);
	$num=mysqli_num_rows($result);
	$line=mysqli_fetch_assoc($result);
	if($num>=1)
	{
		
		$userid=$line['id'] ;
		$_SESSION['frontuserid']=$userid;
		$_SESSION['name']=$line['name'];
		$_SESSION['email']=$line['email'];
		
			// header('location:')

		if($_POST['seriesid']=='' && $_POST['qbankid']=='' && $_POST['questa']=='')
		{
			echo"1";
		}
         else if(($_POST['seriesid']!='')){
	echo "2";
	}
	else if(($_POST['qbankid']!='')){echo "3";}else if(($_POST['questa']!='')){echo "4";}
	}
	else
	{
		echo"0";
		exit;
	}
}else{echo"0";}
}
else
{
	echo"0";
	exit;
}
?>