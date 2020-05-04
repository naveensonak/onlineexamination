<?php 
include("include/connection.php");
//include('include/connect.php');
$id=$_POST['id'];

if($id!='')
{
$slotQuery=mysqli_query($config,"select * from`questatest_slot` where `id`='".$id."'");
$slotResult=mysqli_fetch_array($slotQuery);
//echo $slotResult['limit'];
$assignlimit=$slotResult['limit'];
$selectquestaorder=mysqli_query($config,"select count(*)as slotcount from `questaorderdetail` where `timeslot`='".$id."'");
$selectquestaorderarray=mysqli_fetch_array($selectquestaorder);
if($selectquestaorderarray['slotcount']!=$assignlimit){


//unset($_SESSION["slotid"]);
  $timeSlotId = $_SESSION["slotid"] = $id;
  
  echo"1|".$timeSlotId; 
}else{echo"0";}}

else{echo"0";}
	?>