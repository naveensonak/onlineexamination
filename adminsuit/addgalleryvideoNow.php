<?php
include('include/connection.php');
include('include/connect.php');

if(isset($_POST['add_item']))
{
@$particular = mysqli_real_escape_string($config,$_POST['add_item']);
@$video = mysqli_real_escape_string($config,$_POST['video']);
@$roleid = mysqli_real_escape_string($config,$_POST['editid']);
$date=date( 'Y-m-d h:i:s' );
if($roleid==''){	

 $sql= "INSERT INTO `gallery_video`(heading,material,status,updt_time) VALUES ('". $particular ."','". $video ."','1','$date')";
 
 
$query=mysqli_query($config,$sql);
// echo $sql;

// "INSERT INTO `gallery_video`(heading,material,status) VALUES ('Motivational Speech','https://www.youtube.com/watch?v=nGr3C3wbh9c&list=PLC3y8-rFHvwhBRAgFinJR8KHIrCdTkZcZ&index=33','1')"
if($query){
	echo "1";
	}else{ echo"0";}
		

	
}else{

$role_query=mysqli_query($config,"UPDATE `gallery_video` SET `heading`='".$particular."',`material`='".$video."' WHERE `id` ='".$roleid."'");
if($role_query){	
echo"2";}else{ echo"0";}		
	
	}
		
}



if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `gallery_video` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `gallery_video` set status = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
	}
	
	
	
else if($_POST['type']=='delete'){	
	$dellid=$_POST['id'];	

			$sqlDel = "Delete from `gallery_video` where `id` in ($dellid) ";
			$querydel=mysqli_query($config,$sqlDel);
			if($querydel){echo "1";}else{echo "0";}
		}
	
	}

?>