<?php 
include("include/connection.php");
@$userId=$_POST['userId'];
@$type=$_POST['type'];
@$categoryId=$_POST['categoryId'];
@$subcategoryId=$_POST['subcategoryId'];
if($userId!='' || $type!=''|| $categoryId!=''|| $subcategoryId!=''){
if($type=='item-listing.php'){
$sql="select * from `tbl_testseries` where `catid`='".$categoryId."' and `subcatid`='".$subcategoryId."' and `status`='1'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if($num>=1)
	{
$response = array();
while($line=mysql_fetch_assoc($result)){
	$photo='https://www.onlineexamination.in/'.$line['material'];
$final_array[]=array("seriesId"=>$line['id'],"seriesCode"=>$line['seriesno'],"seriesname"=>$line['seriesname'],
"photo"=>$photo,"paymentType"=>$line['type'],"price"=>$line['price'],"numberofTest"=>$line['nooftest'],"shortDescription"=>$line['shortdes'],"Description"=>$line['description'],"topic"=>$line['topic'],"faq"=>$line['faq']);}

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
else if($type=='question-bank-listing.php'){
$sql="select * from `tbl_questionbank` where `catid`='".$categoryId."' and `subcatid`='".$subcategoryId."' and `status`='1'";
	$result=mysql_query($sql);
	$num=mysql_num_rows($result);
	if($num>=1)
	{
$response = array();
while($line=mysql_fetch_assoc($result)){
	$photo='https://www.onlineexamination.in/'.$line['material'];
	$pdf='https://www.onlineexamination.in/'.$line['pdf'];
	
$final_array[]=array("id"=>$line['id'],"qbCode"=>$line['qbid'],"qbname"=>$line['qbname'],
"photo"=>$photo,"price"=>$line['price'],"shortDescription"=>$line['shortdes'],"Description"=>$line['description'],"pdf"=>$pdf);}
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