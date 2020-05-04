<?php
ob_start();
session_start();
include("include/connect.php");
include('include/connection.php');

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
	
	$testid=$_POST['testid'];
	$question=($_POST['question']);
	$opt1=$_POST['opt1'];
	$opt2=$_POST['opt2'];
	$opt3=$_POST['opt3'];
	$opt4=mysqli_real_escape_string($config,$_POST['opt4']);
	$answer=$_POST['answer'];
$editid=$_POST['editid'];
$time=date( 'Y-m-d h:i:s');

if($editid==''){

$sql= "INSERT INTO `tbl_demotestquestion`(`testid`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `answer`, `status`) VALUES ('".$testid."','". $question ."','". $opt1 ."','". $opt2 ."','".$opt3."','".$opt4."','".$answer."','1')";
$query=mysqli_query($config,$sql);

if($query){
	echo "1";
	}else{ echo"0";}

}else{
	
$role_query=mysqli_query($config,"UPDATE `tbl_demotestquestion` SET `question`='".$question."',`opt1`='".$opt1."',`opt2`='".$opt2."',`opt3`='".$opt3."',`opt4`='".$opt4."',`answer`='".$answer."' WHERE `id` ='".$editid."'");
if($role_query){	
echo"2";}else{ echo"0";}		
	
	}
		
}
if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `tbl_demotestquestion` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `tbl_demotestquestion` set status = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
	}
	
	
	
else if($_POST['type']=='delete'){	
	$dellid=$_POST['id'];	

			$sqlDel = "Delete from `tbl_demotestquestion` where `id` in ($dellid) ";
			$querydel=mysqli_query($config,$sqlDel);
			if($querydel){echo "1";}else{echo "0";}
		}
	
	}


?>