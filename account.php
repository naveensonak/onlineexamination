<?php 
ob_start();
session_start();
if(@$_SESSION['frontuserid']!="")
{
header("location:myprofile.php");
}
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || My Account</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google-signin-client_id" content="336442331598-n1lgd2a1nn3pb8r03cnkvl64tuplqb8p.apps.googleusercontent.com" >
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/color/color-1.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    
    <style>
	input[type="checkbox"]{/*height: 0px;*/
padding-left: 0px;
width: 15px; float:left;
margin-top:-7px;}
input {height:0px; }
.fbbutton{ width:210px; height:39px;}
.abcRioButtonIcon{padding: 11px !important;
background: #fff !important;}
.abcRioButtonContentWrapper{background: #4285f4 !important; color: #fff !important;}
  
    
  </style>

</head>

<body>

    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start of header area -->
        <?php 
         include("include/connection.php");
        include("include/connect.php");?> 
<?php include("include/header.php");?>        
        <!-- Start page content -->
        <section class="contact-area">
            <div class="container">
               
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="conract-area-bottom pt-30">
                            <h2 class="main-contact"><i class="icofont icofont-key"></i> Login</h2>
                             <p style="font-size:12px;" id="error"></p>
                            <form id="loginform" action="#" method="post">
                                <div class="row">
                                    
                                    <div class="col-md-12">
                                        <div class="main-input mrg-eml">
                                            <input name="loginemail" id="loginemail" placeholder="Email*" type="email" required value="">
                                            <i class="icofont icofont-envelope"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="main-input mt-20 mb-20">
                                            <input name="loginpassword" id="loginpassword" placeholder="Password*" type="password" required value="">
                                            <i class="icofont icofont-lock"></i>
                                        </div>
                                    </div>
                                    
 <input type="hidden" name="seriesid" id="seriesid" value="<?php echo @$_GET['seriesid'];?>">
<input type="hidden" name="qbankid" id="qbankid" value="<?php echo @$_GET['qbankid'];?>">
<input type="hidden" name="olympiad" id="olympiad" value="<?php echo @$_GET['olympiad'];?>">
<input type="hidden" name="questa" id="questa" value="<?php echo @$_GET['questa'];?>">
               
                    <input name="login" id="login" type="hidden" value="login">
                                    <div class="col-md-12">
                                    <div class="pull-left">
<a data-toggle="modal" href="#forgot" data-backdrop="static" data-keyboard="false" class="text-black"><strong><i class="icofont icofont-ui-lock"></i> Forgot Password</strong></a>
</div>
                                        <div class="text-leave2 pull-right">
                             <button class="submit" type="submit">Login</button>
                                        </div>
                                       <div class="clearfix"></div>
                                        <div class="col-md-12">
                                         <center> <strong>OR LOGIN WITH</strong></center><br>
                                         <div class="text-leave2 pull-left">
           <center><div class="g-signin2" data-onsuccess="onSignIn" data-width="210" data-height="39" data-longtitle="true"></div></center>
                                        </div>
                                        <div class="text-leave2">
  <center><a href="javascript:void(0);" onClick="fbLogin()" id="fbLink"><img class="fbbutton" src="images/fblogin.png"/></a></center>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 border-left-0">
                        <div class="conract-area-bottom pt-30">
                   <h2 class="main-contact"><i class="icofont icofont-user"></i> Register</h2>
                            <p style="font-size:12px;" id="sucess"></p>
                            <form id="signup" action="#" method="post" autocomplete="off">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-input">
           <input name="studentname" id="studentname" placeholder="Name*" type="text" required>
                                            <i class="icofont icofont-hotel-boy"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="main-input mt-20 mb-20">
         <input name="studentemail" id="studentemail" placeholder="Email*" type="email" required>
                                            <i class="icofont icofont-envelope"></i>
                                            <p style="font-size:12px;" id="exist"></p>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="main-input">
 <input name="mobile" id="mobile" placeholder="Mobile No.*" type="text" maxlength="10" required>
                                            <i class="icofont icofont-mobile-phone"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="main-input mt-20 mb-20">
                                            <input name="password" id="password" placeholder="Password*" type="password" required>
                                            <i class="icofont icofont-lock"></i>
                                        </div>
                                    </div>
                              <div class="col-md-12">
                              <div class="main-input  mb-20">      
 <input type="checkbox"  name="acceptTC" id="acceptTC"/> &nbsp; <label for="acceptTC">By clicking register, I read &amp; accept the <a href="#" class="text-black"><b>Terms and Conditions</b></a> and <a href="privacy-policy.php" class="text-black"><b>Privacy Policy</b></a>.</label>
 <p style="font-size:12px;" id="chk"></p></div></div>        
                                     
                                    <div class="col-md-12">
                                        <div class="text-leave2 pull-right">
                                            
                               <button class="submit"  type="submit">Signup</button>
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
    <script src="js/plugins.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="js/main.js"></script>
    <script src="js/signup.js"></script>
    <script type="text/javascript" src="js/forgotpassword-chkemail.js"></script>
    
     
     
    <div id="forgot" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"> <span aria-hidden="true">&times;</span> </button>
   <h4 class="modal-title"><i class="icofont icofont-ui-lock"></i> Forgot Password</h4>
      </div>
      <div class="modal-body">
      <strong> Please enter your registered email id.</strong>
      <div class="clearfix"></div><br>
<span id="ffsucess"></span>

      <form class="form-horizontal clearfix" action="#" id="forgotpasswordform" method="post" autocomplete="off" enctype="multipart/form-data"><span id="rsucess"></span>
          <div>
 <!--<label><strong>Email<span>*</span></strong></label>-->
      <input class="form-control" id="emailid" name="emailid" type="email" placeholder="Enter Registered Email  Id" required>
 
            <br />
            
            <div class="">
              <div class="col-lg-offset-2 col-lg-8 text-center conract-area-bottom">
    <button type="submit" class="submit">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!--<div class="modal-footer">
        <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
      </div>-->
    </div>
  </div>
</div>
</body>

</html>