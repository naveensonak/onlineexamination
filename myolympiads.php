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
    <title>Online Examination || My Olympiads Test</title>
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
p{ padding:0px; margin-bottom:0px;}
        </style>
</head>

<body onLoad="RemoveCookie('my_cookie');">
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">

<!---profile menu active link create variable---->
  <?php  $profile="myolympiads"; ?>
<!---end profile menu active link---->
      
    <?php include('include/connect.php');// include("include/connection.php");?>
            <?php include("include/header.php");?>

       <section class="courses-details ptb-30">
            <div class="container">
                <div class="row">
                <div class="col-md-12 col-sm-6">
                <div class="col-md-9 col-sm-6">
                        <div class="about-text">
                            <h2>My Olympiads Test</h2>
                        </div>
                        </div>
                    </div>
                <?php include("include/profilemenu.php");?> 
   <div class="col-md-9 col-sm-9">
   <table style="border-collapse:collapse;" class="table table-striped" width="100%" cellspacing="0" cellpadding="7" bordercolor="#ccc" border="1">

<tbody>
<tr>
    <th width="32%" valign="middle"> Test Name </th>
    <th width="16%" valign="middle"> Test Code </th>
    <th width="16%" valign="middle">No. of Question</th>
    <th width="9%" valign="middle">Time</th>
    <th width="27%" valign="middle">Action</th>
  </tr>
<?php
include('include/connect.php');

$selectorder=mysqli_query($config,"SELECT *,(select `startdate` from `olymtest_slot` where `id`=`olympiadorderdetail`.`timeslot`)as startdate,(select `enddate` from `olymtest_slot` where `id`=`olympiadorderdetail`.`timeslot`)as enddate FROM `olympiadorderdetail` where `userid`='".$_SESSION['frontuserid']."' order by id desc");
$mysqlnum=mysqli_num_rows($selectorder);
if($mysqlnum==''){?>

<tr>
    <td  valign="middle" colspan="5"><h5 class="text-center">Test Not Found In This Olympiads !</h5></td></tr>

<?php }else{
while($testresult=mysqli_fetch_array($selectorder)){
	$selecttest=mysqli_query($config,"select * from `tbl_olympiadstest` where `id`='".$testresult['olympiadsid']."'");
	$testolymResult=mysqli_fetch_array($selecttest);
?>
                <tr>
    <td  valign="middle"> <?php echo $testolymResult['testname'];?> </td>
    <td  valign="middle"> <?php echo $testolymResult['code'];?> </td>
    <td  valign="middle"><?php echo $testolymResult['totalquestion'];?></td>
    <td  valign="middle"><?php echo $testolymResult['duration'];?> Minute</td>
    <td  valign="middle">
    <?php 
	 date_default_timezone_set("Asia/Kolkata");
$currentDate=date( 'Y-m-d H:i:s' );

$chktestcomplete=mysqli_query($config,"SELECT * FROM `tbl_olympiadresult` WHERE `orderid`='".$testresult['id']."' and `userid`='".$_SESSION['frontuserid']."' and `testid`='".$testolymResult['id']."'");
$chkresult=mysqli_fetch_array($chktestcomplete);
if($chkresult['testid']==$testolymResult['id']){
?>
<p><strong class="text-primary">Score: <?php  echo $chkresult['totalscore'].'/'.$testolymResult['maximummarks']; ?></strong></p><strong class="text-danger">Completed</strong>
<?php }else{?>

<?php if($currentDate>=$testresult['startdate'] && $testresult['enddate']>=$currentDate){?>
<a class="button extra-small button-blue " href="about-olymtest.php?testid=<?php echo encryptor('encrypt',$testolymResult['id']);?>&assigned=<?php echo encryptor('encrypt',$testresult['id']);?>" onClick="RemoveCookie('my_cookie');"><span>Start Test</span></a>
	<?php }
	elseif($currentDate>=$testresult['enddate']){
		echo"<span class='text-danger text'><strong>Test End</strong></span>";
		}else{
 $post_date2 = strtotime($testresult['startdate']);
  echo ' <b>Test Start Date:</b> <a href="javascript:void(0);" style="color:#f00;">'.$convert=date('d-m-Y H:i',$post_date2).'<br></a>';
   $post_date2 = strtotime($testresult['enddate']);
  echo '<b>Test End Date:</b> <a href="javascript:void(0);" style="color:#f00;">'.$convert=date('d-m-Y H:i',$post_date2).'</a>'; }?>
    
    <?php }?>
    </td>
  </tr>


                    <?php }}?>
             </tbody></table>   
                
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
<script src="js/payNow.js"></script>
</body>

</html>