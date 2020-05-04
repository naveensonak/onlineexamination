<?php
include("include/connection.php");
 @$type=$_POST["type"];
 @$userid=$_POST["userId"];
 @$productinfo=$_POST["seriesId"];
 @$amount=$_POST["amount"];
@$txnid=$_POST["transactionId"] ;

$response = array();
if($type!='' || $userid!='' || $productinfo!='' || @$txnid!=''){
if($type=='series'){	
	
$transactionid=mysql_query("select * from `orderdetail` where `transactionId`='".$txnid."'");		 
$trows=mysql_num_rows($transactionid); 
if($trows=='')
{
$qry="select * from `user` where id='".$userid."'";
		$result=mysql_query($qry);
		$datal=mysql_fetch_array($result);
		
			$user_name=$datal['name'];		
			$email2=$datal['email'];
			$mobile2=$datal['mobile'];	
$sql=mysql_query("INSERT INTO `orderdetail` (`userid`,`testid`,`username`,`email`,`mobile`,`amount`,`transactionId`,`paidunpaid`,`status`,`webapp`) VALUES ('".$userid."','".$productinfo."','".$user_name."','".$email2."','".$mobile2."','".$amount."','".$txnid."','1','1','App')");

$selectdetails=mysql_query("select `seriesno`,`seriesname`,(select `subcategory` from `tbl_subcategory` where `id`=`tbl_testseries`.`subcatid`)as category from `tbl_testseries` where `id`='".$productinfo."'");
$res=mysql_fetch_array($selectdetails);

$testname=$res['seriesname'];
$cat=$res['category'];
$code=$res['seriesno'];

$get_email_info_query=mysql_query("select * from `mailer` where id='4'");
$get_email_info=mysql_fetch_array($get_email_info_query);
	  
	$email_subject1=$get_email_info['subject'];
	$email_content1=$get_email_info['mail_body']; 
	
$oldWordreg1="##seriesname##";
$newWordreg1=ucfirst($testname);
$oldWordreg2="##category##";
$newWordreg2=($cat);
$oldWordreg3="##transactionid##";
$newWordreg3=($txnid);

$oldWordreg4="##code##";
$newWordreg4=($code);


$textreg1=str_replace($oldWordreg1 , $newWordreg1 , $email_content1);
$textreg2=str_replace($oldWordreg2 , $newWordreg2 , $textreg1);//final mail body
$textreg3=str_replace($oldWordreg3 , $newWordreg3 , $textreg2);//final mail body
$textreg4=str_replace($oldWordreg4 , $newWordreg4 , $textreg3);//final mail body

$header = "From: info@onlineexamination.in [Online Examination Management]\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$header.= "X-Priority: 1\r\n"; 
mail($email2, $email_subject1, $textreg4, $header);	
	
$response["statusCode"] = 200;		
$response["data"]["message"] = "order receive sucessfull check email !";
	echo json_encode($response);
	
	}else{
$response["statusCode"] = 2;		
$response["data"]["message"] = "transactionId exist !";
	echo json_encode($response);
	}//chk user	
	
}//==========series end=================
else if($type=='qb'){
	
$transactionid=mysql_query("select * from `questionbankorderdetail` where `transactionId`='".$txnid."'");		
 $trows=mysql_num_rows($transactionid); 
if($trows==''){
	
$qry="select * from `user` where id='".$userid."'";
		$result=mysql_query($qry);
		$datal=mysql_fetch_array($result);
		
			$user_name=$datal['name'];		
			$email2=$datal['email'];
			$mobile2=$datal['mobile'];	
	
	
	
$sql=mysql_query("INSERT INTO `questionbankorderdetail` (`userid`,`qbid`,`username`,`email`,`mobile`,`amount`,`transactionId`,`paidunpaid`,`status`) VALUES ('".$userid."','".$productinfo."','".$user_name."','".$email2."','".$mobile2."','".$amount."','".$txnid."','1','1')");


$selectdetails=mysql_query("select `qbid`,`qbname`,(select `subcategory` from `tbl_subcategory` where `id`=`tbl_questionbank`.`subcatid`)as category from `tbl_questionbank` where `id`='".$productinfo."'");
$res=mysql_fetch_array($selectdetails);

$testname=$res['qbname'];
$cat=$res['category'];
$code=$res['qbid'];

$get_email_info_query=mysql_query("select * from `mailer` where id='5'");
$get_email_info=mysql_fetch_array($get_email_info_query);
	  
	$email_subject1=$get_email_info['subject'];
	$email_content1=$get_email_info['mail_body']; 
	
$oldWordreg1="##qustionbankname##";
$newWordreg1=ucfirst($testname);
$oldWordreg2="##category##";
$newWordreg2=($cat);
$oldWordreg3="##transactionid##";
$newWordreg3=($txnid);

$oldWordreg4="##code##";
$newWordreg4=($code);


$textreg1=str_replace($oldWordreg1 , $newWordreg1 , $email_content1);
$textreg2=str_replace($oldWordreg2 , $newWordreg2 , $textreg1);//final mail body
$textreg3=str_replace($oldWordreg3 , $newWordreg3 , $textreg2);//final mail body
$textreg4=str_replace($oldWordreg4 , $newWordreg4 , $textreg3);//final mail body

$header = "From: info@onlineexamination.in [Online Examination Management]\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$header.= "X-Priority: 1\r\n"; 

mail($email2, $email_subject1, $textreg4, $header);
$response["statusCode"] = 200;		
$response["data"]["message"] = "order receive sucessfull check email !";
	echo json_encode($response);

	}//		
	else{
$response["statusCode"] = 2;		
$response["data"]["message"] = "transactionId exist !";
	echo json_encode($response);
	}//chk user
	}//==========question bank end=================





		
}else{//=============if empty=====================
	
$response["statusCode"] = 400;		
$response["data"]["message"] = "Bad request !";
	echo json_encode($response);

	}
?>