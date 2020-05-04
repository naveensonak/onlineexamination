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
	$type=$_POST['type'];
	$test=$_POST['test'];
	$price=$_POST['price'];
	$shortdes=$_POST['shortdes'];
	$topic=$_POST['topic'];
	$detail=$_POST['detail'];
	$faq=$_POST['faq'];
$editid=$_POST['editid'];
$time=date( 'Y-m-d h:i:s');

if($editid==''){

$filename=$_FILES['images']['name'];
	$eft = explode(".", $filename);
	$ext=end($eft);
$random_digit=newname();
$new_file_name1=$seriesno."-".$random_digit.".".$ext;
    $filesize=$_FILES['images']['size'];
    $path=$_FILES['images']['tmp_name'];
$des1="../series/$new_file_name1";
 $des="series/$new_file_name1";

if(move_uploaded_file($path,$des1))	
		{}
$sql= "INSERT INTO `tbl_testseries`(`catid`, `subcatid`, `seriesno`, `seriesname`, `material`, `type`, `price`, `nooftest`,`shortdes`,`topic`, `description`, `faq`, `status`) VALUES ('". $category ."','".$subcategory."','". $seriesno ."','". $title ."','". $des ."','".$type."','".$price."','".$test."','".$shortdes."','".$topic."','".$detail."','".$faq."','1')";
$query=mysqli_query($config,$sql);

if($query){
	echo "1";
	}else{ echo"0";}

}else{
$filename1=$_FILES['images']['name'];
$oft = explode(".", $filename1);
$ext1 = end($oft);

$random_digit122=newname();
$new_file_name12=strtolower($seriesno.'-'.$random_digit122.".".$ext1);
    if($filename1!=''){
	$delete = "SELECT `material` FROM `tbl_testseries` where `id`='".$editid."'";   
	$ress_details1=mysqli_query($config,$delete);
		$numfeat1=mysqli_num_rows($ress_details1);
		if($numfeat1>'0')
{	$rowfeat1=mysqli_fetch_array($ress_details1);
 $filename1=$rowfeat1['material'];
unlink( '../'.$filename1);
		}
    $filesize1=$_FILES['images']['size'];
    $path111=$_FILES['images']['tmp_name'];

$des111="../series/$new_file_name12";
$des12="series/$new_file_name12";

if(move_uploaded_file($path111,$des111))
$sql="update `tbl_testseries` set `material`='$des12' where `id`='".$editid."'"; 
						mysqli_query($config,$sql);
}	
$role_query=mysqli_query($config,"UPDATE `tbl_testseries` SET `catid`='".$category."',`subcatid`='".$subcategory."',`seriesno`='".$seriesno."',`seriesname`='".$title."',`type`='".$type."',`price`='".$price."',`nooftest`='".$test."',`shortdes`='".$shortdes."',`topic`='".$topic."',`description`='".$detail."',`faq`='".$faq."' WHERE `id` ='".$editid."'");
if($role_query){	
echo"2";}else{ echo"0";}		
	
	}
		
}
if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `tbl_testseries` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `tbl_testseries` set status = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
	}
	
	
	
else if($_POST['type']=='delete'){	
	$dellid=$_POST['id'];	
$result = "SELECT `material` FROM `tbl_testseries` where `id`in($dellid)";   
$ress_details=mysqli_query($config,$result);
		$numfeat=mysqli_num_rows($ress_details);

		if($numfeat>'0')
{
	while($rowfeat=mysqli_fetch_array($ress_details))
		{
 $filename=$rowfeat['material'];
unlink( '../'.$filename);
		}}
			$sqlDel = "Delete from `tbl_testseries` where `id` in ($dellid) ";
			$querydel=mysqli_query($config,$sqlDel);
			if($querydel){echo "1";}else{echo "0";}
		}
	
	}


?>