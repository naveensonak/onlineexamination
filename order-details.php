<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{
header("location:account.php");
	exit();
}
include('include/connect.php');
 include("include/connection.php");
$id=encryptor('decrypt',@$_GET['seriesid']);
$selecttest=mysqli_query($config,"select * from `tbl_testseries` where `id`='".$id."'");
$selectresult=mysqli_fetch_array($selecttest);
?>

<?php

$MERCHANT_KEY = "9B9X426a";

// Merchant Salt as provided by Payu
$SALT = "sG6cwKY7Ow";
// Merchant Key and Salt as provided by Payu.

//$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode
$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || Order Details</title>
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
    <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() { 
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
</head>

<body onLoad="submitPayuForm()">
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
                    <div class="col-md-8 col-sm-8 col-md-offset-2">
                        <div class="about-text ">
                            <h2>Your Order Details</h2><br><br>

<?php $qry="select * from `user` where id='".$_SESSION['frontuserid']."'";
		$result=mysqli_query($config,$qry);
		$datal=mysqli_fetch_array($result);
		
			$user_name=$datal['name'];		
			$email=$datal['email'];
			$mobile=$datal['mobile'];?>




<?php $tax=setting('tax');
 $tax_amount= ($selectresult['price']*$tax/100); $Total= round($selectresult['price'] + $tax_amount);?>

<h4><?php echo $selectresult['seriesname'];?> 
<span class="pull-right" id="pfee">&#x20B9; <?php echo sprintf('%0.2f',$selectresult['price']);?></span></h4>
 <h4 class="border">GST 
<span class="pull-right" id="taxfee">&#x20B9; <?php echo sprintf('%0.2f',$tax_amount);?></span></h4>
<h3 class="border">Total 
<span class="pull-right" id="totalfee">&#x20B9; <?php 
echo sprintf('%0.2f',$Total) ;?></span></h3>
<div class="conract-area-bottom">
<form action="<?php echo $action; ?>" method="post" name="payuForm">


 <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />

          <input type="hidden" name="amount" id="amount" value="<?php echo $Total; ?>" />
          
         <input type="hidden" name="firstname" id="firstname" value="<?php echo $user_name; ?>" />
         <input type="hidden" name="email" id="email" value="<?php echo $email; ?>" />
         <input type="hidden" name="udf1" value="series" />
         <input type="hidden" name="phone" id="phone" value="<?php echo $mobile; ?>" />
         <input type="hidden" name="productinfo" value="<?php echo $selectresult['id'];?>"/>
         <!--<textarea name="productinfo">product</textarea>-->
  <input type="hidden" name="surl" value="https://onlineexamination.in/order-success.php" size="64" />
<input type="hidden" name="furl" value="https://onlineexamination.in/order-failure.php" size="64" />
        <input type="hidden" name="service_provider" value="payu_paisa" size="64" />






<!--=============================================================================================-->
<input type="hidden" name="amount" id="amount"  value="<?php echo $Total;?>"/>
<input type="hidden" name="user_id" id="user_id"  value="<?php echo $_SESSION['frontuserid']; ?>"/>
<input type="hidden" name="test_id" id="test_id"  value="<?php echo $selectresult['id'];?>"/>
<input type="hidden" name="type" id="type"  value="series"/>
 <div class="col-lg-6 pull-left text-center">
 <?php if(!$hash) { ?>
<span><button class="submit" type="submit">Pay Through PayU Money</button></span><?php }?></div>
</form>
<!--// PayTm-->
<form method="post" action="pgRedirect.php">
<input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"name="ORDER_ID" autocomplete="off" value="<?php echo  "ORDS" . rand(10000,99999999)?>">

<input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST00<?php echo $_SESSION['frontuserid']; ?>">
<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
	<input type="hidden" title="TXN_AMOUNT" tabindex="10" name="TXN_AMOUNT" value="<?php echo $Total;?>">
    <input type="hidden" name="MOBILE_NO" value="<?php echo $mobile; ?>">
                    <input type="hidden" name="EMAIL" value="<?php echo $email; ?>">
		<!--<input value="CheckOut" type="submit"	onclick="" class="submit">-->
        <div class="col-lg-6 pull-right text-center">
		<span><button class="submit" type="submit" value="CheckOut" style="background:#00b9f5;" onClick="paytmsuccesscredential('series',<?php echo $_SESSION['frontuserid']; ?>,<?php echo $selectresult['id'];?>,<?php echo $Total;?>)">Pay Through Paytm</button></span></div>
	</form>
<!--// PayTm End-->

  </div>                          
                        </div>
                    </div>
                    
                </div>
            </div>
        </section><br><br>

        <?php include("include/footer.php");?>        

    </div>
    <!-- Body main wrapper end -->
    
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/paynow.js"></script>
    <script>

function paytmsuccesscredential(type,userId,productId,amount)
{ 
var transactionId=$("#ORDER_ID").val();
//alert(productId); 
var dataString = "type=" + type + "& userId=" + userId + "& productId=" + productId + "& amount=" + amount + "& transactionId=" + transactionId;


$.ajax
({
type: "POST",
url: "Paytmcredentialsession.php",
data: dataString,
cache: false,
success: function(html)
{
return false;
} 
});
};
</script>


</body>

</html>