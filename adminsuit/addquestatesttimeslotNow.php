<?php
include('include/connection.php');

include('include/connect.php');
if(isset($_POST['testid']))
{
@$testid = mysqli_real_escape_string($config,$_POST['testid']);
@$startdate = mysqli_real_escape_string($config,$_POST['startdate']);
@$enddate = mysqli_real_escape_string($config,$_POST['enddate']);
@$limit = mysqli_real_escape_string($config,$_POST['limit']);
@$roleid = mysqli_real_escape_string($config,$_POST['editid']);
$date=date( 'Y-m-d h:i:s' );
 $post_date1 = strtotime($startdate);
 $convert1=date('Y-m-d H:i:s',$post_date1);
 
 $post_date2 = strtotime($enddate);
 $convert2=date('Y-m-d H:i:s',$post_date2);

if($roleid==''){
	
$sql= "INSERT INTO `questatest_slot`(`testid`,`startdate`,`enddate`,`limit`,`status`) VALUES ('".$testid."','". $convert1 ."','".$convert2."','". $limit ."','1')";
$query=mysqli_query($config,$sql);
if($query){
	echo "1";
	}else{ echo"0";}

	
}else{
$role_query=mysqli_query($config,"UPDATE `questatest_slot` SET `startdate`='".$convert1."',`enddate`='".$convert2."',`limit`='".$limit."' WHERE `id` ='".$roleid."'");
if($role_query){	
echo"2";}else{ echo"0";}		
	}
		
}



if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `questatest_slot` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `questatest_slot` set status = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
	}
	
	
	
else if($_POST['type']=='delete'){	
	$dellid=$_POST['id'];	
			$sqlDel = "Delete from `questatest_slot` where `id` in ($dellid) ";
			$querydel=mysqli_query($config,$sqlDel);
			if($querydel){echo "1";}else{echo "0";}
		}
	
	}

?>