<?php
ob_start();
session_start();
//include('include/connection.php');
include('include/connect.php');

if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `tbl_demotestenquery` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `tbl_demotestenquery` set status = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
	}
	
	
	
else if($_POST['type']=='delete'){	
	$dellid=$_POST['id'];	

			$sqlDel = "Delete from `tbl_demotestenquery` where `id` in ($dellid) ";
			$querydel=mysqli_query($config,$sqlDel);
			if($querydel){echo "1";}else{echo "0";}
		}
	
	}


?>