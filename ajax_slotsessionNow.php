<?php 
include("include/connection.php");
include('include/connect.php');
$id=$_POST['id'];

if($id!='')
{
$slotQuery=mysqli_query($config,"select * from`olymtest_slot` where `id`='".$id."'");
$slotResult=mysqli_fetch_array($slotQuery);
$assignlimit=$slotResult['limit'];

$selectolymorder=mysqli_query($config,"select count(*)as slotcount from `olympiadorderdetail` where `timeslot`='".$id."'");
$selectolymorderarray=mysqli_fetch_array($selectolymorder);
if($selectolymorderarray['slotcount']!=$assignlimit){

session_start();
unset($_SESSION["slotid"]);
  $_SESSION["slotid"] = $id;
  
  echo"1"; 
}else{echo"0";}}

else{echo"0";}
	?>