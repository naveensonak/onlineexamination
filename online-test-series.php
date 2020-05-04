<?php 
ob_start();
session_start();?>
<?php include('include/connect.php');
include("include/connection.php");
@$id=$_GET['id'];?>
<!doctype html>
<html class="no-js" lang="zxx">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || <?php echo(teamdetail('title',$id));?></title>
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
<?php include("include/header.php");?>        
        <!-- Start page content -->
        <section class="about-area pt-30">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-6">
                        <div class="about-text">
                            <h2><?php echo(teamdetail('name',$id));?></h2>
                            <?php echo(teamdetail('about',$id));?>
                            
                        </div>
                    </div>
                    
                </div>
                 <div class="row" style="margin-bottom:30px; text-align:center;" >
                <a href="account.php" style="color:white; font-size:18px; background-color:#0151b0; padding:15px 40px; margin:auto; border-radius:10px">Register</a>
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