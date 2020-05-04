<?php 
include('include/connect.php');
include("include/connection.php");
include("include/function.php");
function forgot() {
  
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    srand((double) microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= 6) {
        $num = rand() % 33; 
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}
$random_password=forgot();

$email = $_POST['emailid'];
date_default_timezone_set("Asia/Kolkata");
$date=date( 'Y-m-d H:i:s');

if($email!=''){

$sql="select * from `user` where `email`='".$email."'";
	$result=mysqli_query($config,$sql);
	$num=mysqli_num_rows($result);
	$line=mysqli_fetch_assoc($result);
	if($num!='')
	{ 
$user_id=$line['id'];
$PersonName=$line['name'];
$encrypt_id=encryptor('encrypt',$user_id);
$date_id=encryptor('encrypt',$date);
$type=encryptor('encrypt','frontuser');
$url="<a href='http://onlineexamination.in/password_reset.php?token=$encrypt_id&urlid=$date_id&type=$type' target='_blank'>Click Here</a>";

////////////////////emailing///////////////////////	
$get_email_info_query=mysqli_query($config,"select * from `mailer` where id='2'");
$get_email_info=mysqli_fetch_array($get_email_info_query);
	  
	$email_subject1=$get_email_info['subject'];
	$email_content1=$get_email_info['mail_body']; 
	
	$oldWordreg1="##USERNAME##";
$newWordreg1=ucfirst($PersonName);
$oldWordreg2="##url##";
$newWordreg2=($url);


$textreg1=str_replace($oldWordreg1 , $newWordreg1 , $email_content1);
$textreg2=str_replace($oldWordreg2 , $newWordreg2 , $textreg1);//final mail body

$header = "From: info@onlineexamination.in [Online Examination Management]\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$header.= "X-Priority: 1\r\n"; 

mail($email, $email_subject1, $textreg2, $header);
////////////////////emailing end///////////////////////////////

$sql2= mysqli_query($config,"UPDATE `user` SET `forgot_token`= '".$encrypt_id."',`forgotdate`='".$date."' WHERE `id`='".$user_id."'");

echo "1";
	} //confirm
	
	else
{
echo "2";	}	
	
}
else
{
	
echo "3";
	
	}
?>

