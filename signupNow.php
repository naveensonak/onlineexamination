<?php
include('include/connection.php');
include('include/connect.php');








$name = mysqli_real_escape_string($config,$_POST['name']);
$email = mysqli_real_escape_string($config,$_POST['email']);
$mobile = mysqli_real_escape_string($config,$_POST['mobile']);
$password = mysqli_real_escape_string($config,$_POST['password']);
$terms = mysqli_real_escape_string($config,$_POST['acceptTC']);
$class = mysqli_real_escape_string($config,$_POST['s_class']);
$school = mysqli_real_escape_string($config,$_POST['school']);
$questa = mysqli_real_escape_string($config,$_POST['math']);
$questa = mysqli_real_escape_string($config,$_POST['science']);

// print_r($_POST);

// echo $email;


$chkemail=mysqli_query($config,"select * from `user` where `email`='".$email."'");
//  echo $chkemail;
$chkrows=mysqli_num_rows($chkemail);

if($chkrows==''){	
$sql= "INSERT INTO `user`(`name`,`mobile`,`email`,`password`,`class`,`school`,`questa`,`tc`,`status`) VALUES 
('".$name."','".$mobile."','".$email."','".md5($password)."','".$class."','".$school."','".$questa."','".$terms."','1')";

$query=mysqli_query($config,$sql);
$userid=mysqli_insert_id($config);
	echo $query;
	die();
if($query){
$encrypt_id=encryptor('encrypt',$userid);
$url="<a href='http://onlineexamination.in/email-verification.php?token=$encrypt_id'target='_blank'>Click Here</a>";

$get_email_info_query=mysqli_query($config,"select * from `mailer` where id='1'");
$get_email_info=mysqli_fetch_array($get_email_info_query);
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
        //$confirm = mail($email, $email_subject1, $textreg4,$header);
	
	
	echo "1";
	}else{ echo"0";}
		
}else{ echo"2";}
?>