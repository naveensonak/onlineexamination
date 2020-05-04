<?php
//include("include/connection.php");
include('include/connect.php');
if($_POST['type']=='roleedit'){
$id=$_POST['id'];
  $department_query=mysqli_query($config,"select * from `banner` where `id`='".$id."'");
  $department_result=mysqli_fetch_array($department_query);
   echo $SocietyDepartmentName=$department_result['banner_title'].'~'.$SocietyDepartmentName=$department_result['smalltext'].'~'.$SocietyDepartmentName=$department_result['link'];
}
?>