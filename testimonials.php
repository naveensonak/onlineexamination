<?php 
ob_start();
session_start();?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || Testimonials</title>
      <meta name="description" content="Testimonials" />
  <meta name="keywords" content="Testimonials" />

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
    .form-control{ margin-bottom:8px;}
    </style>
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
                
                    <div class="col-md-9 col-sm-6">
                        <div class="about-text">
                            <h2>Testimonials</h2>
                        </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                        <div class="about-text text-right">
                            <a class="button extra-small button-blue mb-20" href="#review" data-toggle="modal" data-backdrop="static" data-keyboard="false"><span>Write Testimonial</span> <i class="icofont icofont-pencil-alt-2"></i></a>
                        </div>
                        </div>
                        <?php 
$event_sql2=mysqli_query($config,"select * from `testimonials` where `status`='1'");
while($event_result2=mysqli_fetch_array($event_sql2)){?>
                        <div class="col-md-4"> 
        <!--testimonials-1-start -->
        <div class="testimonial-block  text-center">
          <div class="testimonial-content">
            <div class="test-img2">
       <img src="<?php echo $event_result2['mat'];?>" alt="" width="100" height="100">
                                    </div>
        <p class="testimonial-text"><?php echo $event_result2['text'];?> </p>
       <span class="testimonial-meta"><?php echo $event_result2['title'];?></span> </div>
        </div>
      </div>
      <?php }?>
                </div>
            </div>
        </section>
        <?php include("include/footer.php");?>        
    </div>
    <div id="review" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" data-dismiss="modal" aria-label="Close" class="close"> <span aria-hidden="true">&times;</span> </button>
        <h3 class="modal-title"><i class="fa fa-pencil"></i> Write Testimonial</h3>
      </div>
      <div class="modal-body">
      <strong> Your opinions and comments are very important to us and we read every message that we receive.</strong>
      <div class="clearfix"></div><br>


      <form class="form-horizontal clearfix" action="#" id="reviewform" method="post" autocomplete="off" enctype="multipart/form-data"><span id="rsucess"></span>
          <div class="col-lg-12" >
 <label><strong>Name<span>*</span></strong></label>
      <input class="form-control" id="rname" name="rname" type="text" required>
     <label><strong>Photo <span>*</span></strong> <small style="color:#B80F0A;">[Photo Size(100x100)]</small></label>
      <input class="form-control" id="photo" name="photo" type="file" required style="height: 32px; padding: 0px 0px 32px 0px;">

    <label><strong>Email Id<span>*</span></strong></label>
 <input class="form-control" id="remail" name="remail" type="email" required>
       <label class="control-label"><strong>Your Comment</strong> <small style="color:#B80F0A;">[Maximum 300 character]</small><span>*</span></label>
 <textarea class="form-control" id="rcomment" name="rcomment" required maxlength="300" style="resize:none; height:100px"></textarea>
 
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
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
<script type="text/javascript" src="js/review.js"></script>
</body>

</html>