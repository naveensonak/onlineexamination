<?php 
ob_start();
session_start();
include('include/connect.php');
include('include/connection.php');
date_default_timezone_set("Asia/Kolkata");
$time=date( 'Y-m-d H:i:s' );
$authId=$_POST['id'];
$name=$_POST['name'];
$username=$_POST['loginemail'];
$photo=$_POST['photo'];
$authtype=$_POST['authtype'];
if($authId!='' && $username!=''){
$sql="select * from `user` where `email`='".$username."' and `status`='1'";
	$result=mysqli_query($config,$sql);
	$num=mysqli_num_rows($result);
	$line=mysqli_fetch_assoc($result);
	if($num>=1)
	{
		
		$userid=$line['id'] ;
		$_SESSION['frontuserid']=$userid;
		$_SESSION['name']=$line['name'];
		$_SESSION['email']=$line['email'];
		if($_POST['seriesid']=='' && $_POST['qbankid']=='' && $_POST['olympiad']==''){
echo"1";}else if(($_POST['seriesid']!='')){
	echo "2";
	}else if(($_POST['qbankid']!='')){echo "3";}else if(($_POST['olympiad']!='')){echo "4";}
	}
	else
	{
		
$sql2 = mysqli_query($config,"INSERT INTO user (`name`, `email`,`password`,`photo`,`status`,`authtype`, `authid`) VALUES ('".$name."', '".$username."','not required', '".$photo."','1','".$authtype."','".$authId."')");	
$userid = mysqli_insert_id($config);
		$_SESSION['frontuserid']=$userid;
		$_SESSION['name']=$name;
		$_SESSION['email']=$username;
	
		
	if($_POST['seriesid']=='' && $_POST['qbankid']=='' && $_POST['olympiad']==''){
echo"1";}else if(($_POST['seriesid']!='')){
	echo "2";
	}else if(($_POST['qbankid']!='')){echo "3";}else if(($_POST['olympiad']!='')){echo "4";}	
		
	}
}else{echo"0";}
?>