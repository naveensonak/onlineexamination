<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{header("location:account.php");exit();}?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || About  Test</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/color/color-1.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <style>
        .gray-bg > h4 {
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 1px;
  text-transform: normal;
  text-align:center;}
.gray-bg {padding: 15px 15px 15px;}
.img-text a.button.extra-small span {padding:7px;}
.news-are{ height: 320px; margin-bottom:30px;}
        </style>
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">
    <?php include('include/connect.php');//include("include/connection.php");?>
            <?php include("include/header.php");?>

       <section class="courses-details ptb-30">
            <div class="container">
                <div class="row">
                <div class="col-md-12 col-sm-6">
                <div class="col-md-9 col-sm-6">
                        <div class="about-text">
                            <h2>About Test</h2>
                        </div>
                        </div>
                    </div>
 <?php include("include/profilemenu.php");?> 
   <div class="col-md-9 col-sm-9">
   
<?php
$orderid=encryptor('decrypt',@$_GET['assigned']);
$testid=encryptor('decrypt',@$_GET['testid']);
$selectorder=mysqli_query($config,"SELECT * FROM `tbl_olympiadstest` where `id`='".$testid."' and `status`='1'");
$mysqlnum=mysqli_num_rows($selectorder);
$testresult=mysqli_fetch_array($selectorder);
	 date_default_timezone_set("Asia/Kolkata");
$currentDate=date( 'Y-m-d H:i:s' );

$selectorder=mysqli_query($config,"SELECT *,(select `startdate` from `olymtest_slot` where `id`=`olympiadorderdetail`.`timeslot`)as startdate,(select `enddate` from `olymtest_slot` where `id`=`olympiadorderdetail`.`timeslot`)as enddate FROM `olympiadorderdetail` where `id`='".$orderid."'");
$slotresult=mysqli_fetch_array($selectorder);
?>                
<div class="about-lectures">
 <h3>Introduction</h3>
 <p><b>Test Booklet Code:</b> <?php echo $testresult['code'];?></p>
 <p><b>Total No of Question:</b> <?php echo $testresult['totalquestion'];?></p>
 <p><b>Duration:</b> <?php echo $testresult['duration'];?> Minute</p>
           <p><?php echo $testresult['abouttest'];?></p>
   <?php if($currentDate>=$slotresult['startdate'] && $slotresult['enddate']>=$currentDate){?>
          <p class="text-center"> <a class="button extra-small button-blue " href="olymquestion-start.php?testid=<?php echo encryptor('encrypt',$testresult['id']);?>&assigned=<?php echo encryptor('encrypt',$orderid);?>" onClick="RemoveCookie('my_cookie');"><span>Start Test</span></a></p><?php } ?>
                            </div>
                
     
                
                    </div>
                    
                </div>
            </div>
        </section> 
        
        
<?php include("include/footer.php");?>
    </div>
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>