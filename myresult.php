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
    <title>Online Examination || My Result</title>
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

<!---profile menu active link create variable---->
  <?php  $profile="myresult"; ?>
<!---end profile menu active link---->
      
    <?php 
    include('include/connect.php');
    include("include/connection.php");
    ?>
            <?php include("include/header.php");?>

       <section class="courses-details ptb-30">
            <div class="container">
                <div class="row">
                <div class="col-md-12 col-sm-6">
                <div class="col-md-9 col-sm-6">
                        <div class="about-text">
                            <h2>My Result</h2>
                        </div>
                        </div>
                    </div>
                <?php include("include/profilemenu.php");?> 
   <div class="col-md-9 col-sm-9">
   <div class="tab-accordion-area bg-off-white elements-tab-area">
            
                        <div class="tab-content fix">
                        <div class="tab-pane active" id="preview-2">
                        <ul class="tab-list">
    <li class="active"><a href="#series" data-toggle="tab">Test Series</a></li>
            
            <li><a href="#olym" data-toggle="tab">Olympiads</a></li>
            <li><a href="#qust" data-toggle="tab">Questa</a></li>
                                                      </ul>
                                                      <div class="tab-content">
                                    <div class="tab-pane active" id="series">
   <table width="100%" border="1" style="border-collapse:collapse;" bordercolor="#ccc" cellpadding="7" cellspacing="0" class="table table-striped">
<tr>
    <th valign="middle" colspan="8" style="background:#002046; text-align:center; color:#fff;"> <strong>Test Series Result</strong> </th>
</tr>
<tr>
    <th width="3%" valign="middle"> SN. </th>
    <th width="33%" valign="middle"> Series Name </th>
    <th width="33%" valign="middle"> Test Code </th>
    <th width="14%" valign="middle">Score</th>
    <th width="14%" valign="middle">% Score</th>
    <th width="23%" valign="middle">Question Attempted</th>
    <th width="18%" valign="middle"> Wrong Answer</th>
    <th width="10%" align="center">Date</th>
  </tr>
<?php 
$i=0;
include('include/connect.php');
$sqll = mysqli_query($config,"SELECT qa.`totalscore`,qa.`attempted`,qa.`wrongans`,qa.`createdate`,ts.code,ts.maximummarks,tc.seriesname FROM `tbl_result`qa
inner join tbl_test ts on qa.testid=ts.id
inner join tbl_testseries tc on ts.seriesid=tc.id
where `userid`='".$_SESSION['frontuserid']."' order by qa.id desc");
while($orderresult=mysqli_fetch_array($sqll)){$i++;
 ?>
   <tr>
    <td width="3%" valign="middle"> <?php echo $i;?>. </td>
    <td width="33%" valign="middle"> <?php echo $orderresult['seriesname'];?> </td>
    <td width="33%" valign="middle"> <?php echo $orderresult['code'];?> </td>
   <td width="14%" valign="middle" style="color:#090;"> <strong><?php echo $orderresult['totalscore'].'/'.$orderresult['maximummarks'];?></strong> </td>
   <td width="14%" valign="middle"> <?php echo $orderresult['totalscore']/$orderresult['maximummarks']*100;?> </td>
   
    <td width="23%" valign="middle"> <?php echo $orderresult['attempted'];?></td>
    <td width="18%" valign="middle" style="color:#f00;"> <strong><?php echo $orderresult['wrongans'];?></strong></td>
    <td width="10%" align="center"><?php 
  $post_date = $orderresult['createdate'];
 $post_date2 = strtotime($post_date);
  echo $convert=date('d-m-Y',$post_date2);
 ?>
    </td>
  </tr>
<?php }?>
</table>   
  </div>
                    
            <div class="tab-pane" id="olym">
   <table width="100%" border="1" style="border-collapse:collapse;" bordercolor="#ccc" cellpadding="7" cellspacing="0" class="table table-striped">
<tr>
    <th valign="middle" colspan="8" style="background:#002046; text-align:center; color:#fff;"> <strong>Olympiads Result</strong> </th>
</tr>
<tr>
    <th width="3%" valign="middle"> SN. </th>
    <th width="33%" valign="middle"> Test Name </th>
    <th width="33%" valign="middle"> Test Code </th>
    <th width="14%" valign="middle">Score</th>
    <th width="14%" valign="middle">% Score</th>
    <th width="23%" valign="middle">Question Attempted</th>
    <th width="18%" valign="middle"> Wrong Answer</th>
    <th width="10%" align="center">Date</th>
  </tr>
<?php
$selectorder=mysqli_query($config,"SELECT *,(select `startdate` from `olymtest_slot` where `id`=`olympiadorderdetail`.`timeslot`)as startdate,(select `enddate` from `olymtest_slot` where `id`=`olympiadorderdetail`.`timeslot`)as enddate FROM `olympiadorderdetail` where `userid`='".$_SESSION['frontuserid']."' order by id desc");
$mysqlnum=mysqli_num_rows($selectorder);
if($mysqlnum==''){?>
<tr>
    <td  valign="middle" colspan="8"><h5 class="text-center">Test Not Found In This Olympiads !</h5></td></tr>
<?php }else{
	$i=0;
while($testresult=mysqli_fetch_array($selectorder)){$i++;
	$selecttest=mysqli_query($config,"select * from `tbl_olympiadstest` where `id`='".$testresult['olympiadsid']."'");
	$testolymResult=mysqli_fetch_array($selecttest);
	
date_default_timezone_set("Asia/Kolkata");
$currentDate=date( 'Y-m-d H:i:s' );

$chktestcomplete=mysqli_query($config,"SELECT * FROM `tbl_olympiadresult` WHERE `orderid`='".$testresult['id']."' and `userid`='".$_SESSION['frontuserid']."' and `testid`='".$testolymResult['id']."'");
while($chkresult=mysqli_fetch_array($chktestcomplete)){
	?>
   <tr>
    <td width="3%" valign="middle"> <?php echo $i;?>. </td>
    <td width="33%" valign="middle"> <?php echo $testolymResult['testname'];?> </td>
    <td width="33%" valign="middle"> <?php echo $testolymResult['code'];?> </td>
   <td width="14%" valign="middle" style="color:#090;"> <strong><?php echo $chkresult['totalscore'].'/'.$testolymResult['maximummarks'];?></strong> </td>
   <td width="14%" valign="middle"> <?php echo $chkresult['totalscore']/$testolymResult['maximummarks']*100;?> </td>
   
    <td width="23%" valign="middle"> <?php echo $chkresult['attempted'];?></td>
    <td width="18%" valign="middle" style="color:#f00;"> <strong><?php echo $chkresult['wrongans'];?></strong></td>
    <td width="10%" align="center"><?php 
  $post_date = $chkresult['createdate'];
 $post_date2 = strtotime($post_date);
  echo $convert=date('d-m-Y',$post_date2);
 ?>
    </td>
  </tr>
<?php }}}?>
</table>   
</div>      <!---**quest**--->     
 <div class="tab-pane" id="qust">
   <table width="100%" border="1" style="border-collapse:collapse;" bordercolor="#ccc" cellpadding="7" cellspacing="0" class="table table-striped">
     <tr>
    <th valign="middle" colspan="8" style="background:#002046; text-align:center; color:#fff;"> <strong>Questa Result</strong> </th>
</tr>
<tr>
    <th width="3%" valign="middle"> SN. </th>
    <th width="33%" valign="middle"> Test Name </th>
    <th width="33%" valign="middle"> Test Code </th>
    <th width="14%" valign="middle">Score</th>
    <th width="14%" valign="middle">% Score</th>
    <th width="23%" valign="middle">Question Attempted</th>
    <th width="18%" valign="middle"> Wrong Answer</th>
    <th width="10%" align="center">Date</th>
  </tr>
<?php
$selectorder=mysqli_query($config,"SELECT *,(select `startdate` from `questatest_slot` where `id`=`questaorderdetail`.`timeslot`)as startdate,(select `enddate` from `questatest_slot` where `id`=`questaorderdetail`.`timeslot`)as enddate FROM `questaorderdetail` where `userid`='".$_SESSION['frontuserid']."' order by id desc");
$mysqlnum=mysqli_num_rows($selectorder);
if($mysqlnum==''){?>
<tr>
    <td  valign="middle" colspan="5"><h5 class="text-center">Test Not Found In This Questa !</h5></td>
  </tr>
  <?php }else{
  $i=0;
  while($testresult=mysqli_fetch_array($selectorder)){$i++;
    $selecttest=mysqli_query($config,"select * from `tbl_questatest` where `id`='".$testresult['questaid']."'");
    $testquestaResult=mysqli_fetch_array($selecttest);

    date_default_timezone_set("Asia/Kolkata");
    $currentDate=date( 'Y-m-d H:i:s' );

    $chktestcomplete=mysqli_query($config,"SELECT * FROM `tbl_questaresult` WHERE `orderid`='".$testresult['id']."' and `userid`='".$_SESSION['frontuserid']."' and `testid`='".$testquestaResult['id']."'");
  while($chkresult=mysqli_fetch_array($chktestcomplete)){
  ?><tr>
    <td width="3%" valign="middle"><?php echo $i;?>.  </td>
    <td width="33%" valign="middle"><?php echo $testquestaResult['testname']; ?></td>
    <td width="33%" valign="middle"><?php echo $testquestaResult['code']; ?></td>
    <td width="14%" valign="middle" style="color:#090;"> <strong><?php echo $chkresult['totalscore'].'/'.$testquestaResult['maximummarks'];?></strong> </td>
   <td width="14%" valign="middle"> <?php echo $chkresult['totalscore']/$testquestaResult['maximummarks']*100;?> </td>
   
    <td width="23%" valign="middle"> <?php echo $chkresult['attempted'];?></td>
    <td width="18%" valign="middle" style="color:#f00;"> <strong><?php echo $chkresult['wrongans'];?></strong></td>
    <td width="10%" align="center"><?php 
  $post_date = $chkresult['createdate'];
 $post_date2 = strtotime($post_date);
  echo $convert=date('d-m-Y',$post_date2);
 ?>
    </td>
  </tr>
<?php }}} ?>
   </table>
 </div>
                    
                    
                    </div>
                    </div>
                    </div>
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