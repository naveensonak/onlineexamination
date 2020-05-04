<?php
include("include/connection.php");
$name = mysql_real_escape_string($_POST['name']);
$email = mysql_real_escape_string($_POST['email']);
$mobile = mysql_real_escape_string($_POST['phone']);
$password = mysql_real_escape_string($_POST['password']);
$status='1';
$response = array();
if($email!=''){
$checkuser=mysql_query("select * from `user` where `email`='".$email."'");
  $user_row=mysql_num_rows($checkuser);
if($user_row=='')
{
$result= mysql_query("INSERT INTO `user`(`name`,`mobile`,`email`,`password`) VALUES ('".$name."','".$mobile."','".$email."','".md5($password)."')");
$userid=mysql_insert_id();
if ($result) {
$getuser=mysql_query("select * from `user` where `id`='".$userid."'");
$getuserResult=mysql_fetch_array($getuser);
	
$response["statusCode"] = 200;
$response["data"]['name']=$getuserResult['name'];
$response["data"]['userId']=$getuserResult['id'];
$response["data"]['phone']=$getuserResult['mobile'];
$response["data"]['email']=$getuserResult['email'];

//=================================================================================
$encrypt_id=encryptor('encrypt',$userid);
$url="<a href='https://onlineexamination.in/email-verification.php?token=$encrypt_id'target='_blank'>Click Here</a>";

$get_email_info_query=mysql_query("select * from `mailer` where id='1'");
$get_email_info=mysql_fetch_array($get_email_info_query);
$email_subject1=$get_email_info['subject'];
 $email_content1=$get_email_info['mail_body']; 
	
$oldWordreg1="[[USERNAME]]";
$newWordreg1=ucfirst($name);
$oldWordreg2="[[email]]";
$newWordreg2=$email;
$oldWordreg3="[[password]]";
$newWordreg3=$password;
$oldWordreg4="[[url]]";
$newWordreg4=$url;

$textreg1=str_replace($oldWordreg1 , $newWordreg1 , $email_content1);
$textreg2=str_replace($oldWordreg2 , $newWordreg2 , $textreg1);//final mail body
$textreg3=str_replace($oldWordreg3 , $newWordreg3 , $textreg2);
$textreg4=str_replace($oldWordreg4 , $newWordreg4 , $textreg3);

$header = "From: info@onlineexamination.in [Online Examination Registration]\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$header.= "X-Priority: 1\r\n"; 
$confirm = mail($email, $email_subject1, $textreg4,$header);
//=================================================================================


$response["data"]["message"] = "Registration Successful. Email verification llnk sent to you on this email";
echo json_encode($response);

}else{ $response["statusCode"] = 501;
$response["data"]["message"] = "Registration Failed";

echo json_encode($response);
}

}else{
$userResult=mysql_fetch_array($checkuser);	
	
$response["statusCode"] = 2;
$response["data"]['name']=$userResult['name'];
$response["data"]['userId']=$userResult['id'];
$response["data"]['phone']=$userResult['mobile'];
$response["data"]['email']=$userResult['email'];
		
$response["data"]["message"] = "Email id allready register with us !";
	echo json_encode($response);
	}//chk user		
}else{
	
$response["statusCode"] = 400;		
$response["data"]["message"] = "Bad request !";
	echo json_encode($response);

	}
?>