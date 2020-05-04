<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{
header("location:account.php");
	exit();
}
 include("include/connection.php");
 include('include/connect.php');
$id=encryptor('decrypt',@$_GET['seriesid']);
$selecttest=mysqli_query($config,"select * from `tbl_testseries` where `id`='".$id."'");
$selectresult=mysqli_fetch_array($selecttest);
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
                    <div class="col-md-8 col-sm-8 col-md-offset-2">
                        <div class="about-text ">
                            <h2>Your Order Details</h2><br><br>
<?php if($selectresult['type']=='free'){?>
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
<form action="#" name="payment" id="payment" method="post" class="pay">
<input type="hidden" name="amount" id="amount"  value="<?php echo $selectresult['price'];?>"/>
<input type="hidden" name="user_id" id="user_id"  value="<?php echo $_SESSION['frontuserid']; ?>"/>
<input type="hidden" name="test_id" id="test_id"  value="<?php echo $selectresult['id'];?>"/>
<input type="hidden" name="type" id="type"  value="series"/>
<input type="hidden" name="free" id="free"  value="<?php echo $selectresult['type'];?>"/>
 <div class="col-lg-12 text-center">
 
<span><button class="submit" type="submit">Pay Now</button></span>
</div>

</form>
  </div>   
  
  <?php }else{echo "<h3>Wrong Action Perform By You !</h3>";}?>                       
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
    <script src="js/ajax-mail.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/paynow.js"></script>

</body>

</html>