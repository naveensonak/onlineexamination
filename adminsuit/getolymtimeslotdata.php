<?php
//include('include/connect.php');
include('include/connect.php');
if($_POST['type']=='roleedit'){
$id=$_POST['id'];
  $department_query=mysqli_query($config,"select * from `olymtest_slot` where `id`='".$id."'");
  $department_result=mysqli_fetch_array($department_query);
   $post_date1 = strtotime($department_result['startdate']);
 $convert1=date('d-m-Y H:i',$post_date1);

 $post_date2 = strtotime($department_result['enddate']);
 $convert2=date('d-m-Y H:i',$post_date2);

  
   echo $vehicletype=$convert1.'~'.$convert2.'~'.$department_result['limit'];
}
?>