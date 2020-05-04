<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{
header("location:account.php");
	exit();
}
include('include/connect.php');

 //include("include/connection.php");?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || Order Success</title>
   <meta name="description" content="Order Details" />
  <meta name="keywords" content="Order Details" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/color/color-1.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">
<?php include("include/header.php");?>        
        <!-- Start page content -->
        <section class="about-area pt-30">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8 col-md-offset-2">
                        <div class="about-text "><br><br>


                            <h2><i class="fa fa-check-square-o"></i> Payment Success</h2><br><br>


<?php  //@$_SESSION["slotid"];
 @$type=$_SESSION["type"];
 @$userid=$_SESSION["userId"];
 @$productinfo=$_SESSION["productId"];
 @$amount=$_SESSION["amount"];
@$txnid=$_SESSION["transactionId"] ;


header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	//echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<h3><b>Thank You. Your order status is ". $_POST["RESPMSG"] .".</b></h3>";
       echo "<h4>Your <b>Transaction ID</b> for this transaction is <b>".$txnid.".</b></h4>";
          echo "<h4>We have received a payment of Rs. " . $_POST["TXNAMOUNT"] . " through " . $_POST["PAYMENTMODE"] . " . Your order will soon be shipped.</h4>";
		
/////////////////////////////////////////////////////////////////////////////////////////////
		
	if($type=='series'){		  
$transactionid=mysqli_query($config,"select * from `orderdetail` where `transactionId`='".$txnid."'");		 $trows=mysqli_num_rows($transactionid); 
if($trows==''){
	
$qry="select * from `user` where id='".$userid."'";
		$result=mysqli_query($config,$qry);
		$datal=mysqli_fetch_array($result);
		
			$user_name=$datal['name'];		
			$email2=$datal['email'];
			$mobile2=$datal['mobile'];	
	
	
	
$sql=mysqli_query($config,"INSERT INTO `orderdetail` (`userid`,`testid`,`username`,`email`,`mobile`,`amount`,`transactionId`,`paidunpaid`,`status`) VALUES ('".$userid."','".$productinfo."','".$user_name."','".$email2."','".$mobile2."','".$amount."','".$txnid."','1','1')");

$selectdetails=mysqli_query($config,"select `seriesno`,`seriesname`,(select `subcategory` from `tbl_subcategory` where `id`=`tbl_testseries`.`subcatid`)as category from `tbl_testseries` where `id`='".$productinfo."'");
$res=mysqli_fetch_array($selectdetails);

$testname=$res['seriesname'];
$cat=$res['category'];
$code=$res['seriesno'];

$get_email_info_query=mysqli_query($config,"select * from `mailer` where id='4'");
$get_email_info=mysqli_fetch_array($get_email_info_query);
	  
	$email_subject1=$get_email_info['subject'];
	$email_content1=$get_email_info['mail_body']; 
	
$oldWordreg1="##seriesname##";
$newWordreg1=ucfirst($testname);
$oldWordreg2="##category##";
$newWordreg2=($cat);
$oldWordreg3="##transactionid##";
$newWordreg3=($txnid);

$oldWordreg4="##code##";
$newWordreg4=($code);


$textreg1=str_replace($oldWordreg1 , $newWordreg1 , $email_content1);
$textreg2=str_replace($oldWordreg2 , $newWordreg2 , $textreg1);//final mail body
$textreg3=str_replace($oldWordreg3 , $newWordreg3 , $textreg2);//final mail body
$textreg4=str_replace($oldWordreg4 , $newWordreg4 , $textreg3);//final mail body

$header = "From: info@onlineexamination.in [Online Examination Management]\r\n"; 
$header.= "MIME-Version: 1.0\r\n"; 
$header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
$header.= "X-Priority: 1\r\n"; 

mail($email2, $email_subject1, $textreg4, $header);

unset($_SESSION["type"]);
unset($_SESSION["userId"]);
unset($_SESSION["productId"]);
unset($_SESSION["amount"]);
unset($_SESSION["transactionId"]);


	
	
	}//	
}
		
		
		
		
		
	}
	else {
		echo "<h3>Transaction status is failure</h3>" . "<br/>";
	}

	//if (isset($_POST) && count($_POST)>0 )
	//{ 
		//foreach($_POST as $paramName => $paramValue) {
				//echo "<br/>" . $paramName . " = " . $paramValue;
		//}
	//}
	

}
else {
	echo "<h3>Transaction status is failure</h3>" . "<br/>";
	//Process transaction as suspicious.
}

?>

<div class="conract-area-bottom text-center text-info icofont-5x"><i class="fa fa-check-square-o"></i></div>                          
                        </div>
                    </div>
                    
                </div>
            </div>
        </section><br><br><br>
<br>
<br><br><br>




        <?php include("include/footer.php");?>        

    </div>
    <!-- Body main wrapper end -->
    
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/paynow.js"></script>

</body>

</html>