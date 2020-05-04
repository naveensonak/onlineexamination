<?php

include('include/connection.php');
include('include/connect.php');

if(isset($_POST['ename']))
{
@$ename = mysqli_real_escape_string($config,$_POST['ename']);
@$eemailid = mysqli_real_escape_string($config,$_POST['eemailid']);
@$econtact = mysqli_real_escape_string($config,$_POST['econtact']);
@$result=explode('~',@$_COOKIE['demotestHome']);
@$testid=$result[0];
 @$marks=$result[2];
if($result!=''){
	
		
 $sql= "INSERT INTO `tbl_demotestenquery`(name,email,contact,testid,marks,status) VALUES ('". $ename ."','". $eemailid ."','". $econtact ."','". $testid ."','". $marks ."','1')";
$query=mysqli_query($config,$sql);
if($query){
$selectdetails=mysqli_query($config,"select `testname`,`maximummarks` from `tbl_demotest` where `id`='".$testid."'");
$res=mysqli_fetch_array($selectdetails);

$testname=$res['testname'];
$maximummarks=$res['maximummarks'];
$finalmarks=$marks.'/'.$maximummarks;
	
$get_email_info_query=mysqli_query($config,"select * from `mailer` where id='6'");
$get_email_info=mysqli_fetch_array($get_email_info_query);
	  
	$email_subject1=$get_email_info['subject'];
	$email_content1=$get_email_info['mail_body']; 
	
$oldWordreg1="##testname##";
$newWordreg1=ucfirst($testname);
$oldWordreg2="##marks##";
$newWordreg2=($finalmarks);



$textreg1=str_replace($oldWordreg1 , $newWordreg1 , $email_content1);
$textreg2=str_replace($oldWordreg2 , $newWordreg2 , $textreg1);//final mail body

$header = "From: info@onlineexamination.in [Online Examination Management]\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$header.= "X-Priority: 1\r\n"; 

mail($eemailid, $email_subject1, $textreg2, $header);
	
	
	echo "1";
	
	}else{ echo"0";}

	
}
		}
?>