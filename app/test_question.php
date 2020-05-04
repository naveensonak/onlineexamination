<?php 
include("include/connection.php");
@$userId=$_POST['userId'];
@$testId=$_POST['testId'];
if($userId!='' || $testId!=''){

$sql="select (`id`)as questionId,`question`,`opt1`,`opt2`,`opt3`,`opt4`,`answer` from `tbl_question` where `testid`='".$testId."' and `status`='1'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	//$line=mysql_fetch_assoc($result);
	if($num>=1)
	{
$response["statusCode"] = 200;
while($line=mysql_fetch_assoc($result)){
$response["data"]['question'][]=$line;
}
$response["data"]["message"] = "Question fetched succcessfully";
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