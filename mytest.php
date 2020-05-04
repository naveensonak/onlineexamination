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
    <title>Online Examination || My Test</title>
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

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">
    <?php include('include/connect.php');
    include("include/connection.php");?>
            <?php include("include/header.php");?>

       <section class="courses-details ptb-30">
            <div class="container">
                <div class="row">
                <div class="col-md-12 col-sm-6">
                <div class="col-md-9 col-sm-6">
                        <div class="about-text">
                            <h2>My Test</h2>
                        </div>
                        </div>
                    </div>
                <?php include("include/profilemenu.php");?> 
   <div class="col-md-9 col-sm-9">
   <table style="border-collapse:collapse;" class="table table-striped" width="100%" cellspacing="0" cellpadding="7" bordercolor="#ccc" border="1">

<tbody>
<tr>
    <th width="31%" valign="middle"> Series Name </th>
    <th width="10%" valign="middle"> Test Code </th>
    <th width="20%" valign="middle"> Chapter/Topic Covered </th>
    <th width="13%" valign="middle">Total  Question</th>
    <th width="10%" valign="middle">Time</th>
    <th width="16%" valign="middle">Action</th>
  </tr>
<?php
$seriesid=encryptor('decrypt',@$_GET['seriesid']);
$selectorder=mysqli_query($config,"SELECT *,(select `seriesname` from `tbl_testseries` where `id`=`tbl_test`.`seriesid`)as seriesname FROM `tbl_test` where `seriesid`='".$seriesid."' and `type`!='demo' and `status`='1'");
$mysqlnum=mysqli_num_rows($selectorder);
if($mysqlnum==''){?>

<tr>
    <td  valign="middle" colspan="5"><h5 class="text-center">Test Not Found In This Test Series !</h5></td></tr>

<?php }else{
while($testresult=mysqli_fetch_array($selectorder)){
?>
                <tr>
    <td  valign="middle"> <?php echo $testresult['seriesname'];?> </td>
    <td  valign="middle"> <?php echo $testresult['code'];?> </td>
    <td  valign="middle"> <?php echo $testresult['topic'];?> </td>
    <td  valign="middle"><?php echo $testresult['totalquestion'];?></td>
    <td  valign="middle"><?php echo $testresult['duration'];?> Minute</td>
    <td  valign="middle">
    <?php 
$chktestcomplete=mysqli_query($config,"SELECT * FROM `tbl_result` WHERE `userid`='".$_SESSION['frontuserid']."' and `testid`='".$testresult['id']."'");
$chkresult=mysqli_fetch_array($chktestcomplete);
if($chkresult['testid']==$testresult['id']){
?>
<p><strong class="text-primary">Score: <?php  echo $chkresult['totalscore'].'/'.$testresult['maximummarks']; ?></strong></p><strong class="text-danger">Completed</strong>
<?php }else{?>
    <a class="button extra-small button-blue " href="about-test.php?testid=<?php echo encryptor('encrypt',$testresult['id']);?>" onClick="RemoveCookie('my_cookie');"><span>Start Test</span></a>
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

</body>

</html>