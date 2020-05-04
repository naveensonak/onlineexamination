<?php 
ob_start();
session_start();
include('include/connect.php');
 include("include/connection.php");

$selecttest=mysqli_query($config,"select * from `tbl_olympiadstest` where `id`='".$_GET['olympiadsid']."'");
$selectresult=mysqli_fetch_array($selecttest);
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Course Details || <?php echo $selectresult['testname'];?></title>
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
    <style>.post-details a{ color:#000;}
    .post-details a:hover{ color:#0151b0;}</style>
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">
<?php include("include/header.php");?>       
<!-- End of header area -->
        
        <!-- Start page content -->
        <section class="courses-details pt-30 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <div class="course-left-sidebar">
                            <div class="course-details-img">
  <img alt="" src="<?php echo $selectresult['material'];?>" width="847" height="465">
                                
                                <div class="free-area pt-30">
                                    <div class="free-text">
                            <h4><?php echo $selectresult['testname'];?></h4>
                                    </div>
                                    <div class="clearfix"></div>

                                    <div class="free-button">
                          <?php if($selectresult['type']=='free'){?>
                                 <h3>Free</h3>
  <?php if(@$_SESSION['frontuserid']==''){?>                
<a class="button extra-small button-blue" href="account.php?olympiad=<?php echo $selectresult['id'];?>"><span> Buy This Test </span></a>
<!--<a class="button extra-small button-black" href="account.php?seriesid=<?php echo $selectresult['id'];?>"><span> Demo Test </span></a>-->

<?php }else{?>
<a class="button extra-small button-blue" href="free.php?olympiad=<?php echo encryptor('encrypt',@$selectresult['id']);?>"><span> Buy This Test </span></a>
<!--<a class="button extra-small button-black" href="about-demo-test.php?seriesid=<?php echo encryptor('encrypt',@$selectresult['id']);?>" target="_blank" onClick="RemoveCookie('my_cookie');"><span> Start Demo Test </span></a>-->

<?php } }else{?>
<h3>&#x20B9; <?php echo $selectresult['price'];?>.00</h3>
<?php if(@$_SESSION['frontuserid']==''){?>
<a class="button extra-small button-blue" href="account.php?olympiad=<?php echo $selectresult['id'];?>"><span> Buy This Test </span></a>
<!--<a class="button extra-small button-black" href="account.php?seriesid=<?php echo $selectresult['id'];?>"><span> Demo Test </span></a>-->
<?php }else{?>
<a class="button extra-small button-blue" href="olympiads-order-details.php?olympiad=<?php echo encryptor('encrypt',@$selectresult['id']);?>"><span> Buy This Test </span></a>
<!--<a class="button extra-small button-black" href="about-demo-test.php?seriesid=<?php echo encryptor('encrypt',@$selectresult['id']);?>" target="_blank" onClick="RemoveCookie('my_cookie');"><span> Start Demo Test </span></a>-->
<?php }}?>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="about-lectures">
                                <h3>About Course</h3>
                                <p><?php echo $selectresult['description'];?></p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="course-sidebar mrg-xs">
                            <?php include("include/olympiad_menu.php");?>
                            <?php include("include/latest_olympiad.php");?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End page content -->
<?php include("include/footer.php");?>
    </div>
    <!-- Body main wrapper end -->
    
    
    
    
    <!-- Placed js at the end of the document so the pages load faster -->
    <!-- jquery latest version -->
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- ajax-mail JS
    ============================================ -->		
    <script src="js/ajax-mail.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>