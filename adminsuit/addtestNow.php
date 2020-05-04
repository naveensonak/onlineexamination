<?php
ob_start();
session_start();
//include('include/connection.php');
include('include/connect.php');
if(isset($_POST['editid']))
{
	function forgot() {
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    srand((double) microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= 6) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }return $pass;}
	
	$series=$_POST['series'];
	$code=$_POST['code'];
	$totalquestion=$_POST['totalquestion'];
	$markspercorrectquestion=$_POST['markspercorrectquestion'];
	$marksperwrongquestion=$_POST['marksperwrongquestion'];
	$maximummarks=$_POST['maximummarks'];
	$duration=$_POST['duration'];
	$type=$_POST['type'];
	$topic=$_POST['topic'];
	$detail=$_POST['detail'];
$editid=$_POST['editid'];
$time=date( 'Y-m-d h:i:s');

if($editid==''){

$sql= "INSERT INTO `tbl_test`(`seriesid`, `code`, `totalquestion`, `duration`, `markspercorrectquestion`, `marksperwrongquestion`, `maximummarks`,`topic`, `type`,`introduction`, `status`) VALUES ('". $series ."','".$code."','". $totalquestion ."','". $duration ."','". $markspercorrectquestion ."','".$marksperwrongquestion."','".$maximummarks."','".$topic."','".$type."','".$detail."','0')";
$query=mysqli_query($config,$sql);

if($query){
	echo "1";
	}else{ echo"0";}

}else{
	
$role_query=mysqli_query($config,"UPDATE `tbl_test` SET `seriesid`='".$series."',`code`='".$code."',`totalquestion`='".$totalquestion."',`duration`='".$duration."',`markspercorrectquestion`='".$markspercorrectquestion."',`marksperwrongquestion`='".$marksperwrongquestion."',`maximummarks`='".$maximummarks."',`topic`='".$topic."',`type`='".$type."',`introduction`='".$detail."' WHERE `id` ='".$editid."'");
if($role_query){	
echo"2";}else{ echo"0";}		
	
	}
		
}
if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `tbl_test` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `tbl_test` set status = '1' where `id`='".$_POST['id']."' ";
			$a=mysqli_query($config,$sqlA);
		if($a){			
$selectformail=mysqli_query($config,"SELECT o.userid,u.name,u.email,u.mobile,tc.seriesname,(SELECT `code` FROM `tbl_test` WHERE `id`='".$_POST['id']."')as testname FROM `orderdetail`o 
inner join user u on o.userid= u.id
inner join tbl_testseries tc on o.testid= tc.id
where `testid`='".$_POST['seriesid']."'");
while($emailresult=mysqli_fetch_array($selectformail)){
$name=$emailresult['name'];
$seriesname=$emailresult['seriesname'];
$testname=$emailresult['testname'];	
$email=$emailresult['email'];
$email_subject1='New Test Added On Online Examination';
$textreg5="<p>&nbsp;</p>
<div>
<span><strong>Dear  $name</strong><br /><br />
New test added in your account<br />
<br /></span>	
<div style=' clear:both; float:left; width:100%;'>
Test Series Name:- $seriesname<br /><br />
Test Name:- $testname<br /><br />
<br />
<br />
Very best regards,<br /><br />
Online Examination<br />
<a href='http://onlineexamination.in/'>www.onlineexamination.in/</a>
</div></div>";
$header = "From: info@onlineexamination.in [Online Examination]\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$header.= "X-Priority: 1\r\n"; 
        @$confirm = mail($email, $email_subject1, $textreg5,$header);

}
}	
			
	}
	
	
	
else if($_POST['type']=='delete'){	
	$dellid=$_POST['id'];	
		
			$sqlDel = "Delete from `tbl_test` where `id` in ($dellid) ";
			$querydel=mysqli_query($config,$sqlDel);
			if($querydel){echo "1";}else{echo "0";}
		}
	
	}


?>