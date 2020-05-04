<?php
include('include/connect.php');
include('include/connection.php');

$name = mysqli_real_escape_string($config,$_POST['name']);
$mobile = mysqli_real_escape_string($config,$_POST['mobile']);
$amobile = mysqli_real_escape_string($config,$_POST['amobile']);
$dob = mysqli_real_escape_string($config,$_POST['dob']);
$class = mysqli_real_escape_string($config,$_POST['myclass']);
$school = mysqli_real_escape_string($config,$_POST['school']);
$address = mysqli_real_escape_string($config,$_POST['address']);
$gender = mysqli_real_escape_string($config,$_POST['gender']);
$userid = mysqli_real_escape_string($config,$_POST['userid']);

$filename1=$_FILES['photo']['name'];
@$ext1 = end(explode(".", $filename1));
$random_digit122=newpassword();
$new_file_name12=$userid."-".$random_digit122.".".$ext1;
if($filename1!=''){
$delete = "SELECT `photo` FROM `user` where `id`='".$userid."'";   
	$ress_details1=mysqli_query($config,$delete);
		$numfeat1=mysqli_num_rows($ress_details1);
		if($numfeat1>'0')
{	$rowfeat1=mysqli_fetch_array($ress_details1);
 $filename1=$rowfeat1['photo'];
@unlink(@$filename1);
		}
    $filesize1=$_FILES['photo']['size'];
    $path111=$_FILES['photo']['tmp_name'];
$des111="profilephoto/$new_file_name12";
$des12="profilephoto/$new_file_name12";

if(move_uploaded_file($path111,$des111))
$sql=mysqli_query($config,"update `user` set `photo`='$des12' where `id`='".$userid."'"); 
}


$sql= "UPDATE `user` SET `name`='".$name."',`mobile`='".$mobile."',`amobile`='".$amobile."',`dob`='".$dob."',`class`='".$class."',`school`='".$school."',`address`='".$address."',`gender`='".$gender."' WHERE `id`='".$userid."'";
$query=mysqli_query($config,$sql);
if($query){
	echo "1";
	}else{ echo"0";}
		
?>