<?php
include ("include/connect.php");
//include('include/connection.php');

if(isset($_POST['add_item']))
{
	include("include/connect.php");
$particular = mysqli_real_escape_string($config,$_POST['add_item']);
@$roleid = mysqli_real_escape_string($config,$_POST['roleid']);
$date=date( 'Y-m-d h:i:s' );
if($roleid==''){	
$sql= "INSERT INTO `role`(`role`,`status`) VALUES ('".$particular."','1')";
$query=mysqli_query($config,$sql);
if($query){
	echo "1";
	}else{ echo"0";}
	
}else{
	
$role_query=mysqli_query($config,"UPDATE `role` SET `role`='".$particular."',`modified_date`='".$date."' WHERE `id` ='".$roleid."'");
if($role_query){	
echo"2";}else{ echo"0";}		
	
	}
		
}



if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `role` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `role` set status = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
	}
	
	
	
else if($_POST['type']=='delete'){	
@$id=$_POST['id'];
	$sqlDel = "Delete from `role` where `id` in ($id) ";
			$queryDel=mysqli_query($config,$sqlDel);
			if($queryDel){ echo "1";}else{ echo "0";}
}
	
	}

?>