<?php

include('include/connection.php');
include('include/connect.php');
   
if(isset($_POST['add_item']))
{
@$particular = mysqli_real_escape_string($config,$_POST['add_item']);
@$roleid = mysqli_real_escape_string($config,$_POST['editid']);
$date=date( 'Y-m-d h:i:s' );
if($roleid==''){	
	$filename=$_FILES['material']['name'];
	$gft = explode(".", $filename);
	$ext = end($gft);
	
$random_digit=newname();
$new_file_name1=strtolower($particular.'-'.$random_digit.".".$ext);
		if($filename!=''){
    $filesize=$_FILES['material']['size'];
    $path=$_FILES['material']['tmp_name'];

$des1="../gallery_photo/$new_file_name1";
 $des="gallery_photo/$new_file_name1";

if(move_uploaded_file($path,$des1))	
		{}
 $sql= "INSERT INTO `gallery_photo`(material,text,status) VALUES ('". $des ."','". $particular ."','1')";
$query=mysqli_query($config,$sql);
if($query){
	echo "1";
	}else{ echo"0";}
		}

	
}else{
$filename1=$_FILES['material']['name'];
$gft1 = explode(".", $filename1);
$ext1 = end($gft1);
$random_digit122=newname();
$new_file_name12=strtolower($particular.'-'.$random_digit122.".".$ext1);
    if($filename1!=''){
	$delete = "SELECT `material` FROM `gallery_photo` where `id`='".$roleid."'";   
	$ress_details1=mysqli_query($config,$delete);
		$numfeat1=mysqli_num_rows($ress_details1);
		if($numfeat1>'0')
{	$rowfeat1=mysqli_fetch_array($ress_details1);
 $filename1=$rowfeat1['material'];
unlink( '../'.$filename1);
		}
    $filesize1=$_FILES['material']['size'];
    $path111=$_FILES['material']['tmp_name'];

$des111="../gallery_photo/$new_file_name12";
$des12="gallery_photo/$new_file_name12";

if(move_uploaded_file($path111,$des111))
$sql="update `gallery_photo` set `material`='$des12' where `id`='".$roleid."'"; 
						mysqli_query($config,$sql);
}
$role_query=mysqli_query($config,"UPDATE `gallery_photo` SET `text`='".$particular."' WHERE `id` ='".$roleid."'");
if($role_query){	
echo"2";}else{ echo"0";}		
	
	}
		
}



if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `gallery_photo` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `gallery_photo` set status = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
	}
	
	
	
else if($_POST['type']=='delete'){	
	$dellid=$_POST['id'];	
$result = "SELECT `material` FROM `gallery_photo` where `id`in($dellid)";   
$ress_details=mysqli_query($config,$result);
		$numfeat=mysqli_num_rows($ress_details);

		if($numfeat>'0')
{
	while($rowfeat=mysqli_fetch_array($ress_details))
		{
 $filename=$rowfeat['material'];
unlink( '../'.$filename);
		}}
			$sqlDel = "Delete from `gallery_photo` where `id` in ($dellid) ";
			$querydel=mysqli_query($config,$sqlDel);
			if($querydel){echo "1";}else{echo "0";}
		}
	
	}

?>