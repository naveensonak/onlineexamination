<?php   
ob_start();
session_start();
if($_SESSION['frontuserid']=="")
{header("location:account.php");exit();}?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Online Examination || My Test Series</title>
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
        .gray-bg > h4 {
  font-size: 18px;
  font-weight: 600;
  margin-bottom: 1px;
  text-transform: normal;
  text-align:center;}
.gray-bg {padding: 15px 15px 15px;}
.img-text a.button.extra-small span {padding:7px;}
.news-are{ height: 332px; margin-bottom:30px;}
.news-are p{margin-bottom: 3px;}
        </style>
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">

<!---profile menu active link create variable---->
  <?php  $profile="mytestseries"; ?>
<!---end profile menu active link---->
        
    <?php include('include/connect.php');
    include("include/connection.php");?>
            <?php include("include/header.php");?>

       <section class="courses-details ptb-30">
            <div class="container">
                <div class="row">
                <div class="col-md-12 col-sm-6">
                <div class="col-md-9 col-sm-6">
                        <div class="about-text">
                            <h2>My Test Series</h2>
                        </div>
                </div>
                    </div>
                <?php include("include/profilemenu.php");?> 
   <div class="col-md-9 col-sm-9">
<?php 
$num_rec_per_page=12;
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1;}; 
$start_from = ($page-1) * $num_rec_per_page; 
$sql = "SELECT tc.id,tc.seriesno,tc.seriesname,tc.material,tc.nooftest,o.createdate FROM `orderdetail` o
inner join tbl_testseries tc on o.testid= tc.id
where `userid`='".$_SESSION['frontuserid']."' and (`paidunpaid`='1' or `paidunpaid`='2')  order by id desc LIMIT $start_from, $num_rec_per_page"; 
$rs_result = mysqli_query ($config,$sql); //run the query
$mynumrows=mysqli_num_rows($rs_result);
if($mynumrows!=''){
while ($row = mysqli_fetch_assoc($rs_result)) { ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="news-are gray-bg ">
                            <div class="news-img">
        <img src="<?php echo $row['material'];?>" width="245" height="150" >
                            </div>
                            <div class="clearfix"></div>
                            <div class="text-center gray-bg">
           <h4><a href="javascript:void(0);"><?php echo $row['seriesname'];?></a></h4>
       <p class="text-center">Series No: [<?php echo $row['seriesno'];?>]</p>
       <p class="text-center text-danger"><?php echo $row['nooftest'];?> Test</p>
<a class="button extra-small button-blue " href="mytest.php?seriesid=<?php echo encryptor('encrypt',$row['id']);?>" onClick="RemoveCookie('my_cookie');">
   <span>Take A Test</span><i class="fa fa-hand-o-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                
                <div class="row">
                    <div class="col-md-12 text-center pt-20">
                        <div class="pages2">
                            <ul>
                                <?php $page; 
$sql = "SELECT * FROM `orderdetail` where `userid`='".$_SESSION['frontuserid']."'and `paidunpaid`='1' and`status`='1' order by id desc"; 
$rs_result = mysqli_query($config,$sql); 
$total_records = mysqli_num_rows($rs_result);
 $total_pages = ceil($total_records / $num_rec_per_page); 
if($page==1){}else{
if($page==1){$a='active';}else{$a='';}	
echo "<li class='$a'><a href='mytestseries.php?page=1' aria-label='previous'><span aria-hidden='true'><i class='fa fa-angle-double-left'></i></span></a> </li>";}
for ($i=1; $i<=$total_pages; $i++) {
	if($page == $i){$a='active';}else{$a='';}
echo "<li class='$a'><a href='mytestseries.php?page=".$i."'>".$i."</a></li> "; };
	if($page==$total_pages){}else{ 
	if($page==$total_pages){$a='active';}else{$a='';}
echo "<li class='$a'><a href='mytestseries.php?page=$total_pages' aria-label='Next'><span aria-hidden='true'><i class='fa fa-angle-double-right'></i></span></a> </li>";}?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php }else{?>
				<h4 class="text-center">Test Series Not Found !</h4>
				<?php }?>
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