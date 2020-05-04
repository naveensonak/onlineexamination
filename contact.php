<?php 
ob_start();
session_start();?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || Contact Us</title>
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
    <?php 
include("include/connection.php");?> 
<?php include("include/header.php");?>      
        <!-- Start page content -->
        <section class="contact-area">
            <div class="container">
               
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="conract-area-bottom pt-30">
                            <h2 class="main-contact">Get In Touch</h2>
<p id="sucess"></p>
                            <form id="contact" action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="main-input">
                               <input id="name" name="name" placeholder="Name*" type="text">
                                            <i class="icofont icofont-hotel-boy"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="main-input mrg-eml">
                <input id="email" name="email" placeholder="Email*" type="email">
                                            <i class="icofont icofont-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="main-input mt-20 mb-20">
                       <input id="subject" name="subject" placeholder="Subject*" type="text">
                                            <i class="icofont icofont-pencil"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="text-leave2">
     <textarea id="message" name="message" placeholder="Type Your Massage......."></textarea>
             <button class="submit" type="submit">Send Massage</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="communication-all pt-70">
                            <h3 class="main-contact">Address</h3>
                            <div class="single-communication mb-20">
                                <div class="communication-icon">
                                    <i class="icofont icofont-social-google-map"></i>
                                </div>
                                <div class="communication-text">
                                    <p><?php echo setting('address');?> </p>
                                    
                                </div>
                            </div>
                            <div class="single-communication mb-20">
                                <div class="communication-icon">
                                    <i class="icofont icofont-ui-call"></i>
                                </div>
                                <div class="communication-text">
                                    <p><?php echo setting('mobile');?></p>
                                    
                                </div>
                            </div>
                            <div class="single-communication">
                                <div class="communication-icon">
                                    <i class="icofont icofont-envelope"></i>
                                </div>
                                <div class="communication-text">
                                    <p>
                                        <a href="#"><?php echo setting('email');?></a>
                                        
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><br>
<br>
<br>

<?php include("include/footer.php");?>        
    </div>
    <!-- Body main wrapper end -->
    
    
    
    
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>