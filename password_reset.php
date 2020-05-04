<?php
ob_start();
session_start();
include('include/connect.php');
include("include/connection.php");
@$token=$_GET['token'];
@$type=encryptor('decrypt',@$_GET['type']);
if($token!='' && $type!=''){
if($type=='frontuser'){	
$chkkey=mysqli_query($config,"select * from `user` where `forgot_token`='".$token."' and `forgotdate`>= CURDATE() - INTERVAL 2 DAY");}
else if($type=='inituser'){	
$chkkey=mysqli_query($config,"select * from `admin` where `forgot_token`='".$token."' and `forgotdate`>= CURDATE() - INTERVAL 2 DAY");}

$chkkey_row=mysqli_num_rows($chkkey);
$chkkey_array=mysqli_fetch_array($chkkey);
if($chkkey_row!=''){
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || Password Reset</title>
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
	input[type="checkbox"]{height: 0px;
padding-left: 0px;
width: 0px;}
    </style>
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start of header area -->
        <?php //include("include/connection.php");?>
<?php include("include/header.php");?>        
        <!-- Start page content -->
        <section class="contact-area">
            <div class="container">
               
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="conract-area-bottom pt-30">
                            <h2 class="main-contact">Password Reset</h2>
                            <p id="eros"></p>
                            <form id="forgotpasswordnow" action="#" method="post">
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="main-input mrg-eml">
                                            <input  type="password" placeholder="Enter New Password" autocomplete="off"  required name="newpassword" id="newpassword">
                                            <i class="icofont icofont-lock"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="main-input mt-20 mb-20">
                                            <input  type="password" placeholder="Confirm New Password" autocomplete="off"  name="cpassword" id="cpassword" required>
 <input type="hidden" value="<?php echo @$chkkey_array['id'];?>" name="token" id="token">
 <input type="hidden" value="<?php echo @$type;?>" name="type" id="type">
                                            <i class="icofont icofont-lock"></i>
                                        </div>
                                    </div>
                                    
             
                                    <div class="col-md-12">
                                   
                                        <div class="text-leave2 pull-right">
                             <button class="submit" type="submit">Reset Password</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End page content -->
<?php include("include/footer.php");?>  
      
    </div>
    
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/signup.js"></script>
 <script src="js/forgotpasswordnow.js"></script>
 </body>

</html>
<?php }else{header("Location:index.php");}

}else{header("Location:index.php");}?>