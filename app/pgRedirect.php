<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$checkSum = "";
$paramList = array();
$response = array();
@$ORDER_ID = $_POST["orderID"];
@$custId = $_POST["custID"];
@$INDUSTRY_TYPE_ID = 'Retail';
@$CHANNEL_ID = 'WAP';
@$TXN_AMOUNT = $_POST["txnAMOUNT"];
@$MOBILE_NO = $_POST["mobileNO"];
@$EMAIL = $_POST["emailId"];
if($ORDER_ID!='' || $custId!='' || $TXN_AMOUNT!='' || $MOBILE_NO!='' || $EMAIL!=''){
// Create an array having all required parameters for creating checksum.
$paramList["MID"] = PAYTM_MERCHANT_MID;
$paramList["ORDER_ID"] = $ORDER_ID;
$paramList["CUST_ID"] = $custId;
$paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
$paramList["CHANNEL_ID"] = $CHANNEL_ID;
$paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
$paramList["MOBILE_NO"] = $MOBILE_NO; //Mobile number of customer
$paramList["EMAIL"] = $EMAIL; //Email ID of customer

$paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
$paramList["CALLBACK_URL"] = "https://securegw.paytm.in/theia/paytmCallback?ORDER_ID=$ORDER_ID";
$checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);
$response["statusCode"] = 200;
$response["data"]['checksum']=$checkSum;
$response["data"]["message"] = "Get checksum Successful";
echo json_encode($response);
}else{
$response["statusCode"] = 400;		
$response["data"]["message"] = "Bad request !";
	echo json_encode($response);

	}
?>
