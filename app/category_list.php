<?php
include("include/connection.php");
$userId = ($_POST['userId']);

if($userId!=''){
$response = array("Categories" => array());
$getcategory=mysql_query("select `id`,`category`,`url` from `tbl_category` where `status`='1'");
while ($srow = mysql_fetch_assoc($getcategory))
{
$category = array(); // temp array
$category["cat_id"] = $srow["id"];
$category["name"] = $srow["category"];
$category["type"] = $srow["url"];
$category["sub_categories"] = array();
$submenu_query=mysql_query("select * from `tbl_subcategory` where `catid`='".$srow['id']."' ");
while($submenu_result=mysql_fetch_array($submenu_query)){

$subcat = array(); // temp array
$subcat["subcat_id"] = $submenu_result['id'];
$subcat["name"] = $submenu_result['subcategory'];
// pushing sub category into subcategories node

array_push($category["sub_categories"], $subcat);

	}
	
array_push($response["Categories"], $category);	
}

$response["statusCode"] = 200;
$response["data"]["message"] = "Data receive successful.";

echo json_encode($response);

}else{
$response = array();	
$response["statusCode"] = 400;		
$response["data"]["message"] = "Bad request !";
	echo json_encode($response);

	}
?>