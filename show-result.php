<?php 
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{header("location:account.php");exit();}?>

<!doctype html>
<html class="no-js" lang="zxx">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || Show Score</title>
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
        .gray-bg > h3 {
  font-size: 28px;
  font-weight: 600;
  margin-bottom: 1px;
  text-transform: normal;
  text-align:center; color:#fff;}
.gray-bg {padding: 15px 15px 15px; background:#002046; margin-bottom:10px;}
.gray-bg b{color: #fff !important;}
.img-text a.button.extra-small span {padding:7px;}
        </style>
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">
    <?php 
    include('include/connect.php');
    include("include/connection.php");?>
            <?php include("include/header.php");?>

       <section class="courses-details ptb-30">
            <div class="container">
                <div class="row">
                <div class="col-md-12 col-sm-6">
                <div class="col-md-9 col-sm-6">
                        <div class="about-text">
                            <h2>Your Score</h2>
                        </div>
                        </div>
                    </div>
 <?php include("include/profilemenu.php");?> 
   <div class="col-md-9 col-sm-9">
   
<?php
include('include/connect.php');

$testid=encryptor('decrypt',@$_GET['testid']);
// $orderid=(@$_GET['assigned']);

// $qury="select *,(SELECT `code` FROM `tbl_questatest` WHERE `id`=`tbl_result`.`testid`)as testname,(SELECT `maximummarks` FROM `tbl_questatest` WHERE `id`=`tbl_result`.`testid`)as fullmarks from `tbl_result` where `userid`='".$_SESSION['frontuserid']."' and `testid`='".$testid."'";
// echo $qury;

// $event_sql2=mysqli_query($config,"select *,
// (SELECT `code` FROM `tbl_questatest` WHERE `id`=`tbl_questaresult`.`testid`)as testname,
// (SELECT `maximummarks` FROM `tbl_questatest` WHERE `id`=`tbl_questaresult`.`testid`)
// as fullmarks from `tbl_questaresult` where `userid`='".$_SESSION['frontuserid']."' and `testid`='".$testid."'");

// $event_sql2=mysqli_query($config,"select *,(SELECT `code` FROM `tbl_test` WHERE `id`=`tbl_result`.`testid`)as testname,(SELECT `maximummarks` FROM `tbl_test` WHERE `id`=`tbl_result`.`testid`)as fullmarks from `tbl_result` where `userid`='".$_SESSION['frontuserid']."' and `testid`='".$testid."'");
 
// $qury="select *,(SELECT `code` FROM `tbl_questatest` WHERE `id`=`tbl_questaresult`.`testid`)as testname,(SELECT `maximummarks` FROM `tbl_questatest` WHERE `id`=`tbl_questaresult`.`testid`)as fullmarks from `tbl_questaresult` where `userid`='".$_SESSION['frontuserid']."' and `testid`='".$testid."'"; 
//  echo $qury;
 $event_sql2=mysqli_query($config,"select *,(SELECT `code` FROM `tbl_questatest` WHERE `id`=`tbl_questaresult`.`testid`)as testname,(SELECT `maximummarks` FROM `tbl_questatest` WHERE `id`=`tbl_questaresult`.`testid`)as fullmarks from `tbl_questaresult` where `userid`='".$_SESSION['frontuserid']."' and `testid`='".$testid."'");
($event_result2=mysqli_fetch_array($event_sql2));

// echo $event_result2;
 ?>
 <div class="about-lectures">
<h2 class="border">Test Booklet code: <?php echo $event_result2['testname'];?></h2>
<div class="col-md-4 col-sm-9 text-center">
<div class="news-are gray-bg ">
<h3 class="border">Total Score <br><br>
<em><b><?php echo $event_result2['totalscore'].'/'.$event_result2['fullmarks'];?></b></em></h3>
</div>
</div>
<div class="col-md-4 col-sm-9 text-center">
<div class="news-are gray-bg">
<h3 class="border">Total Attempted <br><br>
<em><b><?php echo $event_result2['attempted'];?></b></em></h3></div></div>
<div class="col-md-4 col-sm-9 text-center">
<div class="news-are gray-bg ">
<h3 class="border">Wrong Answer <br><br>
<em><b><?php echo $event_result2['wrongans'];?></b></em></h3></div></div>
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