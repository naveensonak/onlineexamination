<?php 
ob_start();
session_start();?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || Account Veryfication</title>
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
        <?php include('include/connect.php');//include("include/connection.php");?>
<?php include("include/header.php");?>        
        <!-- Start page content -->
        <section class="contact-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-offset-3">
                        <div class="conract-area-bottom pt-30">
          <h2 class="main-contact"><i class="icofont icofont-key"></i> Account Veryfication</h2>
          
         <?php @$id=$_GET['token'];
   if($id==''){}else{
   $encrypt_id=encryptor('decrypt',$id);
   $sql= "UPDATE `user` SET `status`='1' WHERE `id`='".$encrypt_id."'";
   $query=mysqli_query($config,$sql);
   if($query){
	echo "<p>Thank You. Your Registration Has Been Sucessfully Completed. You Can Login Your Account Now And Update Ypur Profile !</p>";
	}else{ echo"<p>Oops Some Technical Problem</p>";}
}


?>
    <div class="text-center">                        
    <a class="button small button-blue" href="account.php"><span> Login</span></a></div>
                           
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End page content -->
<?php
 $Getuserinfo="select * from user where `id`='".$encrypt_id."'";
   $User_info_query=mysqli_query($config,$Getuserinfo);
   $User_info=mysqli_fetch_array($User_info_query);
    $email= $User_info['email'];
    $name=$User_inf0['name'];
    $get_email_info_query=mysqli_query($config,"select * from `mailer` where id='9'");
    $get_email_info=mysqli_fetch_array($get_email_info_query);
    $email_subject1=$get_email_info['subject'];
    $email_content1=$get_email_info['mail_body'];   
    $oldWordreg1="@@USERNAME@@";
    $newWordreg1=ucfirst($name);
    
    
    $textreg1=str_replace($oldWordreg1 , $newWordreg1 , $email_content1);

    $header = "From: info@onlineexamination.in [Online Examination Registration]\r\n"; 
    $header.= "MIME-Version: 1.0\r\n"; 
    $header.= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
    $header.= "X-Priority: 1\r\n"; 
            $confirm = mail($email, $email_subject1,$email_content1,$header);
        
?>        
        
<?php include("include/footer.php");?>  
      
    </div>
    
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/plugins.js"></script>
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