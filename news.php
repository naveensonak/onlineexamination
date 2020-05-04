<?php 
ob_start();
session_start();?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || News</title>
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
        <style>.news-are{ height: 499px; margin-bottom:30px;}
        .gray-bg { height: 245px;}</style>
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

        <section class="news-page-area ptb-30">
            <div class="container">
                <div class="row">
                <div class="col-md-12 col-sm-6">
                        <div class="about-text">
                            <h2>News</h2>
                          </div>
                    </div>
                    <?php 
$num_rec_per_page=12;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1;}; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT * FROM `blog_content` where `status`='1' order by id desc LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysqli_query ( $config,        $sql); //run the query
?> 

<?php 
while ($row = mysqli_fetch_assoc($rs_result)) { 
?>
                    <div class="col-md-4 col-sm-6">
                        <div class="news-are">
                            <div class="news-img">
                                <img src="<?php echo $row['material'];?>" alt="" width="360" height="245">
                                
                            </div>
                            <div class="img-text gray-bg">
           <h3><a href="javascript:void(0);"><?php echo $row['blogtitle'];?></a></h3>
                                <p><?php echo $row['short'];?></p>
      <a class="button extra-small" href="news-detail.php?id=<?php echo $row['id'];?>">
                                    <span>Read More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center pt-20">
                        <div class="pages2">
                            <ul>
                                <?php $page; 
$sql = "SELECT * FROM `blog_content` where `status`='1' order by id desc"; 
$rs_result = mysqli_query( $config,$sql); 
$total_records = mysqli_num_rows($rs_result);
 $total_pages = ceil($total_records / $num_rec_per_page); 
if($page==1){}else{
if($page==1){$a='active';}else{$a='';}	
echo "<li class='$a'><a href='news.php?page=1' aria-label='previous'><span aria-hidden='true'><i class='fa fa-angle-double-left'></i></span></a> </li>"; // Goto 1st page  
}
for ($i=1; $i<=$total_pages; $i++) {
	if($page == $i){$a='active';}else{$a='';}
	
            echo "<li class='$a'><a href='news.php?page=".$i."'>".$i."</a></li> "; 
	
	};
	if($page==$total_pages){}else{ 
	if($page==$total_pages){$a='active';}else{$a='';}
echo "<li class='$a'><a href='news.php?page=$total_pages' aria-label='Next'><span aria-hidden='true'><i class='fa fa-angle-double-right'></i></span></a> </li>"; // Goto last page
	}
?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php include("include/footer.php");?>
    </div>
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ajax-mail.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>