<?php 
ob_start();
session_start();
include('include/connect.php');
//include("include/connection.php");
//include("include/function.php");

 		$amount= $_POST['amount'];
 		$user_id= $_POST['user_id'];
		$test_id= $_POST['test_id'];
		$type= $_POST['type'];
		@$free= $_POST['free'];
	 	//$transaction_id=random('alpha', '3').''.random('numeric', '6'); 
		 date_default_timezone_set("Asia/Kolkata");
$currentDate=date( 'Y-m-d H:i:s' );

		
$qry="select * from `user` where id='".$user_id."'";
		$result=mysqli_query($config,$qry);
		$datal=mysqli_fetch_array($result);
		
			$user_name=$datal['name'];		
			$email=$datal['email'];
			$mobile=$datal['mobile'];
if($type=='series'){
	if($free=='free'){
	$sql="INSERT INTO `orderdetail` (`userid`,testid,username,email,mobile,amount,paidunpaid,status) VALUES ('".$user_id."','".$test_id."','".$user_name."','".$email."','".$mobile."','".$amount."','2','1')";	
		
		}else{
 $sql="INSERT INTO `orderdetail` (`userid`,testid,username,email,mobile,amount,status) VALUES ('".$user_id."','".$test_id."','".$user_name."','".$email."','".$mobile."','".$amount."','1')";}}
else if($type=='qb'){
 $sql="INSERT INTO `questionbankorderdetail` (`userid`,qbid,username,email,mobile,amount,status) VALUES ('".$user_id."','".$test_id."','".$user_name."','".$email."','".$mobile."','".$amount."','1')";	
	} 
 
  $query = mysqli_query($sql);
  if($query){
	  echo"1";  
	  	  }else{echo"0";}
		  




?>