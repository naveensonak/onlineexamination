<?php 
ob_start();
session_start();?>

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Course Details || Universe</title>
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
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">
<?php include('include/connect.php');//include("include/connection.php");?> 
<?php include("include/header.php");?>       
<!-- End of header area -->
        
        <!-- Start page content -->
        <section class="courses-details pt-30 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <div class="course-left-sidebar">
                            <div class="course-details-img">
                          <img alt="" src="onlinetestseries/cbse-classes-nybwmb.jpg">
                                
                                <div class="free-area pt-30">
                                    <div class="free-text">
                            <h4>Lorem ipsum dolor sit amet, consectetur adipisicn</h4>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="free-button">
                                        <h3>&#x20B9; 1000.00</h3>
                                        <a class="button extra-small button-blue" href="#"><span> Buy This Courses </span></a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="about-lectures">
                                <h3>About Course</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.  t ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="course-sidebar mrg-xs">
                            <div class="course-categoris">
                                <h3 class="cate-title">Categories</h3>
                                <ul>
                                    <li><a href="select-class.php ">6th Standard</a></li>
					<li><a href="select-class.php ">7th Standard</a></li>
					<li><a href="select-class.php ">8th Standard</a></li>
					<li><a href="select-class.php ">9th Standard</a></li>
					<li><a href="select-class.php ">10th Standard</a></li>
                                </ul>
                            </div>
                            <div class="popular-courses">
                                <h3 class="cate-title">Latest Courses</h3>
                                <div class="categori-list-one">
                                    <div class="categori-list-img">
                                        <a href="#">
                                            <img src="onlinetestseries/cbse-classes-nybwmb.jpg" alt="" width="70" height="77">
                                        </a>
                                    </div>
                                    <div class="post-details">
                                        
                                        <p>Android app Development </p>
                                    </div>
                                </div>
                                <div class="categori-list-one">
                                    <div class="categori-list-img">
                                        <a href="#">
                                            <img src="onlinetestseries/cbse-classes-nybwmb.jpg" alt="" width="70" height="77">
                                        </a>
                                    </div>
                                    <div class="post-details">
                                      
                                        <p>Android app Development </p>
                                    </div>
                                </div>
                                <div class="categori-list-one">
                                    <div class="categori-list-img">
                                        <a href="#">
                                            <img src="onlinetestseries/cbse-classes-nybwmb.jpg" alt="" width="70" height="77">
                                        </a>
                                    </div>
                                    <div class="post-details">
                                       <!-- <span>Date : 14.10.16</span>-->
                                        <p>Android app Development </p>
                                    </div>
                                </div>
                            </div>
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