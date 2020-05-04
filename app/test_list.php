<?php 
include("include/connection.php");
@$userId=$_POST['userId'];
@$seriesId=$_POST['seriesId'];
if($userId!='' || $seriesId!=''){

$sql="select * from `tbl_test` where `seriesid`='".$seriesId."' and `status`='1'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	//$line=mysql_fetch_assoc($result);
	if($num>=1)
	{
$response = array();

while($line=mysql_fetch_assoc($result)){
$chktestcomplete=mysql_query("SELECT * FROM `tbl_result` WHERE `userid`='".$userId."' and `testid`='".$line['id']."'");
$resultrows=mysql_num_rows($chktestcomplete);
if($resultrows==''){$resultstatus=0;}else{$resultstatus=1;}
$chkresult=mysql_fetch_array($chktestcomplete);		
$final_array[]=array("testId"=>$line['id'],"testCode"=>$line['code'],"totalQuestion"=>$line['totalquestion'],
"duration"=>$line['duration'],"markspercorrectquestion"=>$line['markspercorrectquestion'],"marksperwrongquestion"=>$line['marksperwrongquestion'],"maximummarks"=>$line['maximummarks'],"topic"=>$line['topic'],"type"=>$line['type'],"introduction"=>$line['introduction'],"scoreobtained"=>$chkresult['totalscore'],"isResultPublished"=>$resultstatus);}



$response["statusCode"] = 200;
$response["data"]['test']=$final_array;
$response["data"]["message"] = "test detail fetched succcessfully";
	}
	else
	{
$response["statusCode"] = 503;
$response["data"]["message"] = "some technical error";
	}
	echo str_replace('\/','/',json_encode($response));
	
}else{// if empty
	
$response["statusCode"] = 400;		
$response["data"]["message"] = "Bad request !";
	echo str_replace('\/','/',json_encode($response));

	}
?>