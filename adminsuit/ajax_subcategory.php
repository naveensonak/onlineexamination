<?php

//include ("include/connection.php");
include('include/connect.php');
if($_POST['id'])
{
 $id=$_POST['id'];
 echo '<option selected="selected" value="">Select a Sub Category</option>';

$sql = mysqli_query($config,"SET NAMES utf8");

$sql=mysqli_query($config,"SELECT * FROM `tbl_subcategory` where `catid` ='".$id."'");
$rows=mysqli_num_rows($sql);
if($rows!=''){

while($row=mysqli_fetch_array($sql))
{
$id=$row['id'];
$data=$row['subcategory'];


echo '<option value="'.$id.'">'.$data.'</option>';





}}else{
$id='0';
$data='No Sub category Available';


echo '<option value="'.$id.'" style="color:#f00;">'.$data.'</option>';
}
}

?>