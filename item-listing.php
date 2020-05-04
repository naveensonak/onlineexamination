<?php 
ob_start();
session_start();
include("include/connection.php");
?>
<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || <?php if (isset($_GET["secondary"])){echo title2($_GET['secondary']);}?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/color/color-1.css">
    
    <!-- Modernizr JS -->
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
        <section class="top-courses pt-30 pb-80">
            <div class="container">
                
                <div class="row">
                <div class="col-md-12 col-sm-6">
                        <div class="about-text">
 <h2><?php if (isset($_GET["secondary"])){echo title2($_GET['secondary']);}?></h2>
                        </div>
                        </div>
                        <?php
	$catid=$_GET['primary'];
	$courseid=$_GET['secondary']; 
$num_rec_per_page=12;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1;}; 
$start_from = ($page-1) * $num_rec_per_page;
$sql = "SELECT * FROM `tbl_testseries` where `status`='1' and `catid`='".$catid."' and `subcatid`='".$courseid."' LIMIT $start_from, $num_rec_per_page";
$rs_result = mysqli_query($config,$sql); //run the query

@$numrows=mysqli_num_rows($rs_result);
if($numrows==''){echo '<center><h3>Nothing Found....</h3></center>';}else{
?> 
<?php 
while ($row = mysqli_fetch_assoc($rs_result)) { 
?>
                    <div class="col-md-4 col-sm-6">
                        <div class="single-course mb-30">
<a href="series-details.php?seriesid=<?php echo $row['id'];?>"><img src="<?php echo $row['material'];?>" alt="<?php echo $row['seriesname'];?>" width="358" height="197"></a>
                            <div class="single-coures-text">
                                <h3><a href="series-details.php?seriesid=<?php echo $row['id'];?>"><?php echo $row['seriesname'];?></a></h3>
                   <b class="text-danger"><?php echo $row['nooftest'];?> Test</b>
                                <p><?php echo $row['shortdes'];?></p>
                                
   <a href="series-details.php?seriesid=<?php echo $row['id'];?>">READ MORE</a>
                            </div>
                        </div>
                    </div>
                    <?php }}?>
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

</body>

</html>