<?php
include('include/connect.php');
if($_POST['type']=='roleedit'){
$id=$_POST['id'];
  $department_query=mysqli_query($config,"select * from `tbl_subcategory` where `id`='".$id."'");
  $department_result=mysqli_fetch_array($department_query);
   echo $vehicletype=$department_result['catid'].'~'.$department_result['subcategory'];
}
?>