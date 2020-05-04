<?php
ob_start();
session_start();
include("include/connect.php");
include('include/connection.php');
if(isset($_POST['editid']))
{
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
    }return $pass;}
	
	$title=$_POST['title'];
	$totalquestion=$_POST['totalquestion'];
	$markspercorrectquestion=$_POST['markspercorrectquestion'];
	$marksperwrongquestion=$_POST['marksperwrongquestion'];
	$maximummarks=$_POST['maximummarks'];
	$duration=$_POST['duration'];
	$shortdes=$_POST['shortdes'];
$editid=$_POST['editid'];
$time=date( 'Y-m-d h:i:s');

if($editid==''){
	
$filename=$_FILES['images']['name'];
	$tft= explode(".", $filename);
	$ext = end($tft);

$random_digit=newname();
$new_file_name1=$random_digit.".".$ext;
    $filesize=$_FILES['images']['size'];
    $path=$_FILES['images']['tmp_name'];
$des1="../demotest/$new_file_name1";
 $des="demotest/$new_file_name1";

if(move_uploaded_file($path,$des1))	
		{}
$sql= "INSERT INTO `tbl_demotest`(`testname`, `detail`, `material`,`totalquestion`, `markspercorrectquestion`, `marksperwrongquestion`, `maximummarks`, `duration`, `status`) VALUES ('". $title ."','".$shortdes."','". $des ."','". $totalquestion ."','". $markspercorrectquestion ."','".$marksperwrongquestion."','".$maximummarks."','".$duration."','0')";
$query=mysqli_query($config,$sql);

if($query){
	echo "1";
	}else{ echo"0";}

}else{
	$filename1=$_FILES['images']['name'];
	$tft1 = explode(".", $filename1);
$ext1 = end($tft1);

$random_digit122=newname();
$new_file_name12=strtolower($random_digit122.".".$ext1);
    if($filename1!=''){
	$delete = "SELECT `material` FROM `tbl_demotest` where `id`='".$editid."'";   
	$ress_details1=mysqli_query($config,$delete);
		$numfeat1=mysqli_num_rows($ress_details1);
		if($numfeat1>'0')
{	$rowfeat1=mysqli_fetch_array($ress_details1);
 $filename1=$rowfeat1['material'];
unlink( '../'.$filename1);
		}
    $filesize1=$_FILES['images']['size'];
    $path111=$_FILES['images']['tmp_name'];

$des111="../demotest/$new_file_name12";
$des12="demotest/$new_file_name12";

if(move_uploaded_file($path111,$des111))
$sql="update `tbl_demotest` set `material`='$des12' where `id`='".$editid."'"; 
						mysqli_query($config,$sql);
}	

$role_query=mysqli_query($config,"UPDATE `tbl_demotest` SET `testname`='".$title."',`detail`='".$shortdes."',`totalquestion`='".$totalquestion."',`markspercorrectquestion`='".$markspercorrectquestion."',`marksperwrongquestion`='".$marksperwrongquestion."',`maximummarks`='".$maximummarks."',`duration`='".$duration."' WHERE `id` ='".$editid."'");
if($role_query){	
echo"2";}else{ echo"0";}		
	
	}
		
}
if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `tbl_demotest` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `tbl_demotest` set status = '1' where `id`='".$_POST['id']."' ";
			$a=mysqli_query($config,$sqlA);
	}
	
else if($_POST['type']=='delete'){	
	$dellid=$_POST['id'];	
		$result = "SELECT `material` FROM `tbl_demotest` where `id`in($dellid)";   
$ress_details=mysqli_query($config,$result);
		$numfeat=mysqli_num_rows($ress_details);

		if($numfeat>'0')
{
	while($rowfeat=mysqli_fetch_array($ress_details))
		{
 $filename=$rowfeat['material'];
unlink( '../'.$filename);
		}}

			$sqlDel = "Delete from `tbl_demotest` where `id` in ($dellid) ";
			$querydel=mysqli_query($config,$sqlDel);
			if($querydel){echo "1";}else{echo "0";}
		}
	
	}


?>