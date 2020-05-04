<?php
//include('include/connection.php');
include('include/connect.php');

if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `orderdetail` set `paidunpaid` = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `orderdetail` set `paidunpaid` = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
	}
		
	
	}

?>