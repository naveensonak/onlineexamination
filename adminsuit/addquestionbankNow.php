<?php
ob_start();
session_start();
include('include/connection.php');
include('include/connect.php');
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
	
	$category=$_POST['category'];
	$subcategory=$_POST['subcategory'];
	$seriesno=$_POST['seriesno'];
	$title=$_POST['title'];
	$price=$_POST['price'];
	$shortdes=$_POST['shortdes'];
	$detail=$_POST['detail'];
$editid=$_POST['editid'];
$time=date( 'Y-m-d h:i:s');

if($editid==''){

$filename=$_FILES['images']['name'];
	$qft2 = explode(".", $filename);
	$ext = end($qft2);
$random_digit=newname();
$new_file_name1=$seriesno."-".$random_digit.".".$ext;
    $filesize=$_FILES['images']['size'];
    $path=$_FILES['images']['tmp_name'];
$des1="../qustionbank/$new_file_name1";
 $des="qustionbank/$new_file_name1";

if(move_uploaded_file($path,$des1))	
		{}
		
$filename1=$_FILES['pdf']['name'];
	$qft3 = explode(".", $filename1);
	$ext1 = end($qft3);
$random_digit1=newname();
$new_file_name11=$seriesno."-".$random_digit1.".".$ext1;
    $filesize1=$_FILES['pdf']['size'];
    $path1=$_FILES['pdf']['tmp_name'];
$des11="../qbankpdf/$new_file_name11";
 $des1="qbankpdf/$new_file_name11";

if(move_uploaded_file($path1,$des11))	
		{} 
				
$sql= "INSERT INTO `tbl_questionbank`(`catid`, `subcatid`, `qbid`, `qbname`, `material`, `price`,`shortdes`, `description`, `pdf`, `status`) VALUES ('". $category ."','".$subcategory."','". $seriesno ."','". $title ."','". $des ."','".$price."','".$shortdes."','".$detail."','".$des1."','1')";
$query=mysqli_query($config,$sql);

if($query){
	echo "1";
	}else{ echo"0";}

}else{
$filename1=$_FILES['images']['name'];
$qft = explode(".", $filename1);
$ext1 = end($qft);
$random_digit122=newname();
$new_file_name12=strtolower($seriesno.'-'.$random_digit122.".".$ext1);
    if($filename1!=''){
	$delete = "SELECT `material` FROM `tbl_questionbank` where `id`='".$editid."'";   
	$ress_details1=mysqli_query($config,$delete);
		$numfeat1=mysqli_num_rows($ress_details1);
		if($numfeat1>'0')
{	$rowfeat1=mysqli_fetch_array($ress_details1);
 $filename1=$rowfeat1['material'];
unlink( '../'.$filename1);
		}
    $filesize1=$_FILES['images']['size'];
    $path111=$_FILES['images']['tmp_name'];

$des111="../qustionbank/$new_file_name12";
$des12="qustionbank/$new_file_name12";

if(move_uploaded_file($path111,$des111))
$sql="update `tbl_questionbank` set `material`='$des12' where `id`='".$editid."'"; 
						mysqli_query($config,$sql);
}	

$filename11=$_FILES['pdf']['name'];
$qft1 = explode(".", $filename11);
$ext11 = end($qft1);

$random_digit122=newname();
$new_file_name121=strtolower($seriesno.'-'.$random_digit122.".".$ext11);
    if($filename11!=''){
	$delete1 = "SELECT `pdf` FROM `tbl_questionbank` where `id`='".$editid."'";   
	$ress_details11=mysqli_query($config,$delete1);
		$numfeat11=mysqli_num_rows($ress_details11);
		if($numfeat11>'0')
{	$rowfeat11=mysqli_fetch_array($ress_details11);
 $filename11=$rowfeat11['pdf'];
unlink( '../'.$filename11);
		}
    $filesize11=$_FILES['pdf']['size'];
    $path1111=$_FILES['pdf']['tmp_name'];

$des1113="../qbankpdf/$new_file_name121";
$des123="qbankpdf/$new_file_name121";

if(move_uploaded_file($path1111,$des1113))
$sql="update `tbl_questionbank` set `pdf`='$des123' where `id`='".$editid."'"; 
						mysqli_query($config,$sql);
}


$role_query=mysqli_query($config,"UPDATE `tbl_questionbank` SET `catid`='".$category."',`subcatid`='".$subcategory."',`qbid`='".$seriesno."',`qbname`='".$title."',`price`='".$price."',`shortdes`='".$shortdes."',`description`='".$detail."' WHERE `id` ='".$editid."'");
if($role_query){	
echo"2";}else{ echo"0";}		
	
	}
		
}
if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `tbl_questionbank` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `tbl_questionbank` set status = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
	}
	
	
	
else if($_POST['type']=='delete'){	
	$dellid=$_POST['id'];	
$result = "SELECT `material`,`pdf` FROM `tbl_questionbank` where `id`in($dellid)";   
$ress_details=mysqli_query($config,$result);
		$numfeat=mysqli_num_rows($ress_details);

		if($numfeat>'0')
{
	while($rowfeat=mysqli_fetch_array($ress_details))
		{
 $filename=$rowfeat['material'];
 $filename2=$rowfeat['pdf'];
unlink( '../'.$filename);
unlink( '../'.$filename2);
		}}
			$sqlDel = "Delete from `tbl_questionbank` where `id` in ($dellid) ";
			$querydel=mysqli_query($config,$sqlDel);
			if($querydel){echo "1";}else{echo "0";}
		}
	
	}


?>