<?php
include('include/connect.php');
include("include/connection.php");
include("include/function.php");
@$type=$_POST['type'];

if($type=='frontuser'){

$newpassword=$_POST['newpassword'];
$cpassword=$_POST['cpassword'];
$token=$_POST['token'];

if($newpassword!='' && $cpassword!='' && $token!='')
{
if(strlen($newpassword!==$cpassword))	
{
	echo"2";
	
	}else{
$npassword=md5($newpassword);
$sql2= mysqli_query($config,"update `user` set `password`='".$npassword."',`forgot_token`='NULL' where `id`= '".$token."'");
				
if($sql2){echo "1";}else{echo "0";}				
				}	
	
	
	}else{ echo "3";
			}
			
}else if($type=='inituser'){

$newpassword=$_POST['newpassword'];
$cpassword=$_POST['cpassword'];
$token=$_POST['token'];

if($newpassword!='' && $cpassword!='' && $token!='')
{
if(strlen($newpassword!==$cpassword))	
{
	echo"2";
	
	}else{
$npassword=md5($newpassword);
$sql2= mysqli_query($config,"update `admin` set `password`='".$npassword."',`forgot_token`='NULL' where `id`= '".$token."'");
				
if($sql2){echo "11";}else{echo "0";}				
				}	
	
	
	}else{ echo "3";
			}
			
}
?>