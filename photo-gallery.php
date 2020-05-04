<?php 
ob_start();
session_start();?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || Photo Gallery</title>
      <meta name="description" content="" />
  <meta name="keywords" content="" />

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
 <?php include('include/connect.php'); 
 include("include/connection.php");?>
<?php include("include/header.php");?>        
        <!-- Start page content -->
        <section class="about-area pt-30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-6">
                        <div class="about-text">
                            <h2>Photo Gallery</h2><br>

                           <div class="row">
<?php
//include('include/connect.php');
$detailresult = mysqli_query($config,"SELECT * FROM `gallery_photo` where `status`='1' order by id desc");
$num=mysqli_num_rows($detailresult);
if($num!=''){
  while($detailrow = mysqli_fetch_array( $detailresult )){?>
  <div class="col-md-4 col-sm-6">
                        <div class="gallery-img mb-30">
                            <img src="<?php echo $detailrow["material"]; ?>" alt="">
                            <div class="gallery-view">
                   <a class="img-poppu" href="<?php echo $detailrow["material"]; ?>">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <?php }}?>
                </div>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <?php include("include/footer.php");?>        

    </div>
    <!-- Body main wrapper end -->
    
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>