<?php
include('include/connect.php');
//include('include/connection.php');
$name = mysqli_real_escape_string($config,$_POST['name']);
//$mobile = mysql_real_escape_string($_POST['mobile']);
$email = mysqli_real_escape_string($config,$_POST['email']);
$subject = mysqli_real_escape_string($config,$_POST['subject']);
$message = mysqli_real_escape_string($config,$_POST['message']);

$sql= "INSERT INTO `contact_form`(`name`,`email`,  `subject`, `message`, `status`) VALUES ('".$name."','".$email."','".$subject."','".$message."','1')";
$query=mysqli_query($config,$sql);
$userid=mysqli_insert_id($config);
if($query){
@$email2='infoonlineexamination@gmail.com';	
$email_subject1=$subject;	
$textreg4="
<p>Below is contact detail</p>
<p><strong>Subject:- $subject</strong></p>
<p><strong>Name:- $name</strong></p>
<p><strong>Email:- </strong>$email</p>
<p><strong>Message:- </strong>$message</p>";

$header = "From: info@onlineexamination.in [Online Examination Contact]\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$header.= "X-Priority: 1\r\n"; 
        
		@$confirm = mail($email2, $email_subject1, $textreg4,$header);
		
$get_email_info_query=mysqli_query($config,"select * from `mailer` where id='8'");
$get_email_info=mysqli_fetch_array($get_email_info_query);

$email_subject2=$get_email_info['subject'];
$email_content2=$get_email_info['mail_body']; 
$header = "From: info@onlineexamination.in [Online Examination Management]\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$header.= "X-Priority: 1\r\n"; 
mail($email, $email_subject2, $email_content2, $header);
		
	echo "1";
	}else{ echo"0";}
		
?>