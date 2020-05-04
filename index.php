<?php 
ob_start();
session_start();?>
<?php include('include/connection.php');?>
<!doctype html>
<html class="no-js" lang="zxx">

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || Home</title>
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
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<script type="text/javascript" src="js/modernizr.custom.26633.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-117162376-1"></script>
  
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-117162376-1');
</script>
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?5eoB59zP760I5xxfKAJFcMs99AFlbsdL";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->
</head>

<body onLoad="RemoveCookie('dmy_cookie');">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">
        <?php include("include/header.php");?>
        <div class="slider-area">
            <div class="slider-active">
 <?php 
$pagenum=1;
$ii=(25*$pagenum)-25;
$banner_sql2=mysqli_query($config,"select * from `banner` where `status`='1'");
while($banner_result2=mysqli_fetch_array($banner_sql2)){$ii++;?>  
               <a class="button extra-small mb-20" href="<?php echo $banner_result2['link'];?>">
               <div class="slider-all">
                    <img src="<?php echo $banner_result2['material'];?>" alt="">
                    <div class="slider-text-wrapper">
                        <div class="table">
                            <div class="table-cell">
                                <div class="slider-text animated">
                                    <!--<h3>The Best Learning Institution</h3>-->
                                    <h2><?php echo $banner_result2['banner_title'];?></h2>
                                    <p><?php echo $banner_result2['smalltext'];?></p>
                                    
                                      
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
 </a>
                <?php }?>
            </div>
        </div>
        <!-- End of slider area --> 
        <!-- start categoris area --> 
        <div class="categoris-area pb-80 pt-110">
            <div class="container">
                <div class="section-title text-center mb-55">
                    <h1 class="uppercase">Join Us</h1>
                    <p>Join India's most trusted online test series for<br> Pre-Engineering IIT JEE(JEE Main, JEE Advanced), Pre-Medical(AIPMT, AIIMS).  </p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-categori mb-30 text-center">
                            <img src="images/icons/book1.png" alt="" >
                            <h3><a href="question-bank.php">Largest Question Bank</a></h3>
                            <p><?php echo(seocontent('shortdes','2'));?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-categori mb-30 text-center">
                            <img src="images/icons/analytics.png" alt="" >
                            <h3><a href="analysis.php">Analysis</a></h3>
                            <p><?php echo(seocontent('shortdes','3'));?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-categori mb-30 text-center">
                            <img src="images/icons/time.png" alt="" >
                            <h3><a href="manage-time.php">Manage Time Effectively</a></h3>
                            <p><?php echo(seocontent('shortdes','4'));?></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="single-categori mb-30 text-center">
                            <img src="images/icons/expert.png" alt="" >
                            <h3><a href="expert-recommendation.php">Expert Recommendations</a></h3>
                            <p><?php echo(seocontent('shortdes','5'));?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End categoris area -->  
        <!-- start courses area --> 
        <div class="top-courses-area gray-bg pb-160 pt-110">
            <div class="container">
                <div class="section-title text-center mb-55">
                    <h1 class="uppercase">Online Test Series</h1>
                    <p>Get online test series for Pre-Engineering <br>IIT JEE(JEE Main, JEE Advanced), Pre-Medical(AIPMT, AIIMS).  </p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt"></i>
                    </div>
                </div>
                <div class="row">
                    <div class="all-courses">
<?php 
$series_sql2=mysqli_query($config,"select * from `team` where `status`='1'");
while($series_result2=mysqli_fetch_array($series_sql2)){$ii++;?>  

                        <div class="col-md-4">
                            <div class="single-course">
                            <div class="single-course-img">
    <a href="javascript:void(0);"><img src="<?php echo $series_result2['material'];?>" alt="" ></a> </div>
                                <div class="single-coures-text">
                     <h3><a href="javascript:void(0);"><?php echo $series_result2['name'];?></a></h3>
                                    <p><?php echo $series_result2['desig'];?></p></div>
                                
                            <div class="lecturersdd-details">
             <a class="button extra-small" href="online-test-series.php?id=<?php echo $series_result2['id'];?>"><span>View Details </span><i class="fa fa-hand-o-right"></i></a>
                                </div>
                            
                            </div>
                        </div>
                        <?php }?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- End courses area -->   
        <!-- start courses area --> 
        <div class="upcoming-event-area pt-110 pb-70">
            <div class="container">
                <div class="section-title text-center mb-55">
                    <h1 class="uppercase">Our Demo Test</h1>
                    <p>Sign Up Now! Test your ability with us. Take free demo test online and<br> analyse performance & improve weak areas. </p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt"></i>
                    </div>
                </div>

                <div class="row">
                    <div class="all-upcoming-event">
      <?php $DemoQuery=mysqli_query($config,"select * from `tbl_demotest` where `status`='1' limit 4");
	  while($demoResult=mysqli_fetch_array($DemoQuery)){?>
                        <div class="col-md-3 col-sm-12">
                            <div class="single-upcoming mb-40">
                                <div class="upcoming-date text-center newimg">
                              <img src="<?php echo $demoResult['material']; ?>" alt="">
                                </div>
                                <div class="single-upcoming-text newimgh3">
                                    <h3><a href="demo-quiz-start.php?demotest=<?php echo encryptor('encrypt',@$demoResult['id']);?>" onClick="RemoveCookie('dmy_cookie');"><?php echo $demoResult['testname']; ?></a></h3>
                                    <p><?php echo $demoResult['detail']; ?></p>

                                    <a class="button extra-small" href="demo-quiz-start.php?demotest=<?php echo encryptor('encrypt',@$demoResult['id']);?>" onClick="RemoveCookie('dmy_cookie');"><span>Take Demo </span><i class="fa fa-hand-o-right"></i></a>




                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End courses area -->



        <!--<div class="countdown-area bg-1 ptb-110 bg-opacity bg-relative">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-sm-7 col-xs-12 text-center">
                        <div class="countdown-all">
                            <h3>Get 100 of online courses for free </h3>
                            <h1>Register Now</h1>
                            <div class="timer">
                                <div data-countdown="2019/01/01"></div>
                            </div>	
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12">
                        <div class="register-from">
                            <div class="register-top">
                                <h3>Fil The Register Form</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicng elit, sed do eiusmod tempor </p>
                            </div>
                            <form class="ordering">
                                <input required="" placeholder="Name*" type="text">
             <input class="form-control2" required="" placeholder="Email*" type="email" style=" margin-bottom:0px;">
<input class="form-control2" required="" placeholder="Mobile No.*" type="text" >
                                <div class="orderby-wrapper">
                                    <select name="orderby" class="orderby">
                                        <option value="menu_order">Master*</option>
                                        <option value="popularity" selected='selected'>Courses*</option>
                                        <option value="rating">Associate Degree</option>
                                        <option value="date">Bachelor's Degree</option>
                                        <option value="price">Master's Degree</option>
                                        <option value="price-desc">Doctorate/Prof Degree</option>
                                    </select>
                                </div>
                                <div class="sent text-center">
                                    <button class="submit" type="submit">
                                        submit
                                    </button>
                                </div>
                            </form>
                            <img src="images/icons/c6.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- start courses area --> 
        <div class="upcoming-event-area gray-bg pt-110 pb-80">
            <div class="container">
                <div class="section-title text-center mb-55">
                    <h1 class="uppercase">OUR Video</h1>
                    <p>Online examination has engaging online test series for Pre-Engineering IIT JEE(JEE Main, JEE Advanced)<br>Pre-Medical(AIPMT, AIIMS)! Our self-paced video lessons can help you study for exams. </p>
                    <div class="separator my mtb-15">
                        <i class="icofont icofont-hat-alt"></i>
                    </div>
                </div>
                <div class="row">
<?php
$detailresult = mysqli_query($config,"SELECT * FROM `gallery_video` where `status`='1' order by id desc limit 6");
$num=mysqli_num_rows($detailresult);
if($num!=''){
  while($detailrow = mysqli_fetch_array( $detailresult )){?>
                    <div class="col-md-4 col-sm-6">
                        <div class="mb-30">
                      <iframe  width="100%" height="250" frameborder="0" src="https://www.youtube.com/embed/<?php echo $detailrow["material"]; ?>"></iframe>
                      <div class="portfolio-i-text">
					<b><?php echo $detailrow['heading'];?></b></div>
                        </div>
                        
                    </div>
                    <?php }}?>
                </div>
            </div>
        </div>
        <div class="counter-area bg-2 bg-opacity bg-relative ptb-110">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 text-center">
                        <div class="counter-bottom2">
                            <div class="counter-img">
                                <img src="images/icons/wtests.png" alt="" >
                            </div>
                            <div class="counter-all">
                                <div class="counter-next2">
                                    <h2>Test Series</h2>
                                </div>
                                <div class="counter cnt-two">
                                    <h1><?php echo setting('series');?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3  text-center">
                        <div class="counter-bottom2 mrg-xs">
                            <div class="counter-img">
                                <img src="images/icons/student.png" alt="" >
                            </div>
                            <div class="counter-all">
                                <div class="counter-next2">
                                    <h2>Student Enrolled</h2>
                                </div>
                                <div class="counter cnt-two">
                                    <h1><?php echo setting('student');?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3  text-center">
                        <div class="counter-bottom2 mrg-xs">
                            <div class="counter-img">
                                <img src="images/icons/wbooks.png" alt="" >
                            </div>
                            <div class="counter-all">
                                <div class="counter-next2">
                                    <h2>Question Bank </h2>
                                </div>
                                <div class="counter cnt-two">
                                    <h1><?php echo setting('question');?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3  text-center">
                        <div class="counter-bottom2 mrg-xs">
                            <div class="counter-img">
                                <img src="images/icons/doubt.png" alt="" >
                            </div>
                            <div class="counter-all">
                                <div class="counter-next2">
                                    <h2>Doubts Answered</h2>
                                </div>
                                <div class="counter cnt-two">
                                    <h1><?php echo setting('doubt');?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End courses area --> 
        <div class="blank" style="width:100%; 
height:80px; 
background-color: #f6f6f6;">
        </div>
        <!-- End page content -->
        <div class="testimonial-area bg-10 bg-opacity bg-relative ptb-110">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="testimonial-all slider-active2">
                        <?php 
$event_sql2=mysqli_query($config,"select * from `testimonials` where `status`='1' order by id desc limit 5");
while($event_result2=mysqli_fetch_array($event_sql2)){?>
                            <div class="single-testimonial">
                                <div class="test-img-name">
                                    <div class="test-img">
       <img src="<?php echo $event_result2['mat'];?>" alt="" width="100" height="100">
                                    </div>
                                    <div class="test-name">
                               <h3><?php echo $event_result2['title'];?></h3>
                                       
                                    </div>
                                </div>
                                <p><?php echo $event_result2['text'];?></p>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 padding-0">
                        <div class="single-student2 ptb-40">
                            <div class="text-center">
                            <h2>What <b> people </b> are saying !</h2>
 <a class="button small button-blue mb-20" href="testimonials.php"><span>View More </span><i class="fa fa-hand-o-right"></i></a>
                        </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="event-area ptb-110">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title text-center mb-55">
                            <h1 class="uppercase">OUR NEWS</h1>
                            <p>A complete guide for Pre-Engineering IIT JEE(JEE Main, JEE Advanced), Pre-Medical(AIPMT, AIIMS). preparation. <br>Follow my news to get a good rank in toughest engineering exam. </p>
                            <div class="separator my mtb-15">
                                <i class="icofont icofont-hat-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                 <?php 
$pagenum=1;
$ii=(25*$pagenum)-25;
$news_sql2=mysqli_query($config,"select * from `blog_content` where `status`='1' order by id desc limit 3");
while($news_result2=mysqli_fetch_array($news_sql2)){$ii++;?>  
                    <div class="col-md-4 col-sm-6">
                        <div class="news-are">
                            <div class="news-img">
                                <img src="<?php echo $news_result2['material'];?>" alt="" >
                                
                            </div>
                            <div class="img-text gray-bg">
                                <h3><a href="javascript:void(0);"><?php echo $news_result2['blogtitle'];?></a></h3>
                                <p><?php echo $news_result2['short'];?></p>
                                <a class="button extra-small" href="news-detail.php?id=<?php echo $news_result2['id'];?>">
                                    <span>Read More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <!-- Start footer area -->
        <?php include("include/footer.php");?>
        
    </div>
    <!-- Body main wrapper end -->
    
    
    
    
    
    
    
    
    
    

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- jquery latest version -->
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap framework js -->
    <script src="js/bootstrap.min.js"></script>
    <!--  ajax-mail.js  -->	
    <script src="js/ajax-mail.js"></script>
    <!-- All js plugins included in this file. -->
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
<script type="text/javascript" src="js/jquery.gridrotator.js"></script>
		<script type="text/javascript">	
			$(function() {
			
				$( '#ri-grid' ).gridrotator( {
					w320 : {
						rows : 3,
						columns : 4
					},
					w240 : {
						rows : 3,
						columns : 3
					}
				} );
			
			});
		</script>
</body>

</html>