<?php
include('include/connect.php');
//include('include/connection.php');
if(isset($_POST['add_item']))
{
@$particular = mysqli_real_escape_string($config,$_POST['add_item']);
@$roleid = mysqli_real_escape_string($config,$_POST['editid']);
@$url='item-questa.php';
$date=date( 'Y-m-d h:i:s' );
if($roleid==''){	

 $sql= "INSERT INTO `tbl_questa`(category,url,status) VALUES ('". $particular ."','". $url ."','1')";
$query=mysqli_query($config,$sql);
if($query){
	echo "1";
	}else{ echo"0";}
	

	
}else{
$role_query=mysqli_query($config,"UPDATE `tbl_questa` SET `category`='".$particular."' ,`url`='".$url."' WHERE `id` ='".$roleid."'");
if($role_query){	
echo"2";}else{ echo"0";}		
	
	}
		
}



if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `tbl_questa` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `tbl_questa` set status = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
	}
	
	
	
else if($_POST['type']=='delete'){	
	$dellid=$_POST['id'];	

			$sqlDel = "Delete from `tbl_questa` where `id` in ($dellid) ";
			$querydel=mysqli_query($config,$sqlDel);
			if($querydel){echo "1";}else{echo "0";}
		}
	
	}

?>