<?php 
include("include/connection.php");
@$userId=$_POST['userId'];
@$type=$_POST['type'];
if($userId!=''){
	
if($type=='series'){
$sql="SELECT tc.id,tc.seriesno,tc.seriesname,tc.material,tc.nooftest,o.createdate FROM `orderdetail` o
inner join tbl_testseries tc on o.testid= tc.id
where `userid`='".$userId."' and (`paidunpaid`='1' or `paidunpaid`='2')  order by id desc";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if($num>=1)
	{
$response = array();
while($line=mysql_fetch_assoc($result)){
	$photo='https://www.onlineexamination.in/'.$line['material'];
$final_array[]=array("seriesId"=>$line['id'],"seriesCode"=>$line['seriesno'],"seriesname"=>$line['seriesname'],
"photo"=>$photo,"numberofTest"=>$line['nooftest']);}

$response["statusCode"] = 200;
$response["data"]["seriesdetail"]=$final_array;
$response["data"]["message"] = "series fetched succcessfully";
	}
	else
	{
$response["statusCode"] = 503;
$response["data"]["message"] = "some technical error";
	}
	echo str_replace('\/','/',json_encode($response));
	
}//type validation
else if($type=='qb'){
$sql="SELECT *,(SELECT `qbname` FROM `tbl_questionbank` where `id`=`questionbankorderdetail`.`qbid`)as `seriesname`,(SELECT `pdf` FROM `tbl_questionbank` where `id`=`questionbankorderdetail`.`qbid`)as `pdf` FROM `questionbankorderdetail` where `userid`='".$userId."' order by id desc";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if($num>=1)
	{
$response = array();
while($line=mysql_fetch_assoc($result)){
	$pdf='https://www.onlineexamination.in/'.$line['pdf'];
	
$final_array[]=array("id"=>$line['id'],"qbCode"=>$line['qbid'],"qbname"=>$line['seriesname'],
"pdf"=>$pdf);}
$response["statusCode"] = 200;
$response["data"]["questionbank"]=$final_array;
$response["data"]["message"] = "questionbank fetched succcessfully";
	}
	else
	{
$response["statusCode"] = 503;
$response["data"]["message"] = "some technical error";
	}
	echo str_replace('\/','/',json_encode($response));	
	
	
	
	}
}else{// if empty
	
$response["statusCode"] = 400;		
$response["data"]["message"] = "Bad request !";
	echo str_replace('\/','/',json_encode($response));

	}
?>