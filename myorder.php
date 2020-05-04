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
    <title>Online Examination || My Order</title>
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
.news-are{ height: 320px; margin-bottom:30px;}
        </style>
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">

<!---profile menu active link create variable---->
  <?php  $profile="myorder"; ?>
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
                            <h2>My Order</h2>
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
            <li><a href="#qb" data-toggle="tab">Question Bank</a></li>
            <li><a href="#olym" data-toggle="tab">Olympiads</a></li>
            <li><a href="#qust" data-toggle="tab">Questa</a></li>
                                                      </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="series">
                                        <table style="border-collapse:collapse;" class="table table-striped" width="100%" cellspacing="0" cellpadding="7" bordercolor="#ccc" border="1">

<tbody>
<tr>
    <th valign="middle" colspan="4" style="background:#002046; text-align:center; color:#fff;"> <strong>Test Series</strong> </th>
</tr>
<tr>
    <th valign="middle" width="32%"> Item Name </th>
    <th valign="middle" width="29%"> Amount</th>
    <th valign="middle" width="15%">Status</th>
    <th valign="middle" width="9%">Date</th>
  </tr>
  <?php 
  include('include/connect.php');

  $sqll = mysqli_query($config,"SELECT *,(SELECT `seriesname` FROM `tbl_testseries` where `id`=`orderdetail`.`testid`)as `seriesname` FROM `orderdetail` where `userid`='".$_SESSION['frontuserid']."' order by id desc");
  $myrows=mysqli_num_rows($sqll);
  if($myrows!=''){
while($orderresult=mysqli_fetch_array($sqll)){
 ?>
     <tr>
    <td valign="middle"> <?php echo $orderresult['seriesname'];?></td>
    <td valign="middle"> <?php echo $orderresult['amount'];?>.00</td>
    <td valign="middle"><?php 
	  if($orderresult['paidunpaid']==1){
	  ?>
      <a href="javascript:void(0);"  style="color:#090;" title="Paid">Paid</a>
      <?php } else if($orderresult['paidunpaid']==0){?>
     
      <a href="javascript:void(0);" style="color:#f00;" title="Unpaid">Unpaid</a>
	  <?php } else if($orderresult['paidunpaid']==2){?>
      <a href="javascript:void(0);" style="color:#000;" title="Free">Free</a>
	  <?php }?></td>
    <td valign="middle"><?php 
  $post_date = $orderresult['createdate'];
 $post_date2 = strtotime($post_date);
  echo $convert=date('d-m-Y',$post_date2);
 ?></td>
  </tr>
<?php }}else{?>
     <tr>
<td valign="middle" colspan="4"><h5 class="text-center">Order Not Found !</h5></td></tr>
<?php }?>
                                 </tbody></table>
                                    </div>
                                    <div class="tab-pane" id="qb">
                                        <table style="border-collapse:collapse;" class="table table-striped" width="100%" cellspacing="0" cellpadding="7" bordercolor="#ccc" border="1">

<tbody>
<tr>
    <th valign="middle" colspan="4" style="background:#002046; text-align:center; color:#fff;"> <strong>Question Bank</strong> </th>
</tr>
<tr>
    <th valign="middle" width="32%"> Item Name </th>
    <th valign="middle" width="29%"> Amount</th>
    <th valign="middle" width="15%">Status</th>
    <th valign="middle" width="9%">Date</th>
  </tr>
  <?php $sqll = mysqli_query($config,"SELECT *,(SELECT `qbname` FROM `tbl_questionbank` where `id`=`questionbankorderdetail`.`qbid`)as `seriesname` FROM `questionbankorderdetail` where `userid`='".$_SESSION['frontuserid']."' order by id desc");
  $myrows=mysqli_num_rows($sqll);
  if($myrows!=''){
while($orderresult=mysqli_fetch_array($sqll)){
 ?>
     <tr>
    <td valign="middle"> <?php echo $orderresult['seriesname'];?></td>
    <td valign="middle"> <?php echo $orderresult['amount'];?>.00</td>
    <td valign="middle"><?php 
	  if($orderresult['paidunpaid']==1){
	  ?>
      <a href="javascript:void(0);"  style="color:#090;" title="Paid">Paid</a>
      <?php } else if($orderresult['paidunpaid']==0){?>
     
      <a href="javascript:void(0);" style="color:#f00;" title="Unpaid">Unpaid</a><?php }?></td>
    <td valign="middle"><?php 
  $post_date = $orderresult['createdate'];
 $post_date2 = strtotime($post_date);
  echo $convert=date('d-m-Y',$post_date2);
 ?></td>
  </tr>
<?php }}else{?>
     <tr>
<td valign="middle" colspan="4"><h5 class="text-center">Order Not Found !</h5></td></tr>
<?php }?>
                                 </tbody></table>
                                    </div>
                                    <div class="tab-pane" id="olym">
                                        <table style="border-collapse:collapse;" class="table table-striped" width="100%" cellspacing="0" cellpadding="7" bordercolor="#ccc" border="1">

<tbody>
<tr>
    <th valign="middle" colspan="4" style="background:#002046; text-align:center; color:#fff;"> <strong>Olympiads</strong> </th>
</tr>
<tr>
    <th valign="middle" width="32%"> Item Name </th>
    <th valign="middle" width="29%"> Amount</th>
    <th valign="middle" width="15%">Status</th>
    <th valign="middle" width="9%">Date</th>
  </tr>
  <?php $sqll = mysqli_query($config,"SELECT *,(SELECT `testname` FROM `tbl_olympiadstest` where `id`=`olympiadorderdetail`.`olympiadsid`)as `seriesname` FROM `olympiadorderdetail` where `userid`='".$_SESSION['frontuserid']."' order by id desc");
  $myrows=mysqli_num_rows($sqll);
  if($myrows!=''){
while($orderresult=mysqli_fetch_array($sqll)){
 ?>
     <tr>
    <td valign="middle"> <?php echo $orderresult['seriesname'];?></td>
    <td valign="middle"> <?php echo $orderresult['amount'];?>.00</td>
    <td valign="middle"><?php 
	  if($orderresult['paidunpaid']==1){
	  ?>
      <a href="javascript:void(0);"  style="color:#090;" title="Paid">Paid</a>
      <?php } else if($orderresult['paidunpaid']==0){?>   
      <a href="javascript:void(0);" style="color:#f00;" title="Unpaid">Unpaid</a><?php }?></td>
    <td valign="middle"><?php 
  $post_date = $orderresult['createdate'];
 $post_date2 = strtotime($post_date);
  echo $convert=date('d-m-Y',$post_date2);
 ?></td>
  </tr>
<?php }}else{?>
     <tr>
<td valign="middle" colspan="4"><h5 class="text-center">Order Not Found !</h5></td></tr>
<?php }?>
                                 </tbody></table>
                                    </div>
    <div class="tab-pane" id="qust">
  <table style="border-collapse:collapse;" class="table table-striped" width="100%" cellspacing="0" cellpadding="7" bordercolor="#ccc" border="1">
<tbody>
<tr>
    <th valign="middle" colspan="4" style="background:#002046; text-align:center; color:#fff;"> <strong>Questa</strong> </th>
</tr>
<tr>
    <th valign="middle" width="32%"> Item Name </th>
    <th valign="middle" width="29%"> Amount</th>
    <th valign="middle" width="15%">Status</th>
    <th valign="middle" width="9%">Date</th>
  </tr>
  <?php $sqll = mysqli_query($config,"SELECT *,(SELECT `testname` FROM `tbl_questatest` where `id`=`questaorderdetail`.`questaid`)as `seriesname` FROM `questaorderdetail` where `userid`='".$_SESSION['frontuserid']."' order by id desc");
  $myrows=mysqli_num_rows($sqll);
  if($myrows!=''){
while($orderresult=mysqli_fetch_array($sqll)){
 ?>
  <tr>
  <td valign="middle"> <?php echo $orderresult['seriesname'];?></td>
  <td valign="middle"> <?php echo $orderresult['amount'];?>.00</td>
  <td valign="middle"><?php 
    if($orderresult['paidunpaid']==1){
    ?>
      <a href="javascript:void(0);"  style="color:#090;" title="Paid">Paid</a>
      <?php } else if($orderresult['paidunpaid']==0){?>   
      <a href="javascript:void(0);" style="color:#f00;" title="Unpaid">Unpaid</a><?php }?> 
  </td>
  <td valign="middle">
    <?php 
  $post_date = $orderresult['createdate'];
 $post_date2 = strtotime($post_date);
  echo $convert=date('d-m-Y',$post_date2);
 ?>
  </td>
</tr>

<?php }}else{?>
     <tr>
<td valign="middle" colspan="4"><h5 class="text-center">Order Not Found !</h5></td></tr>
<?php }?>
</tbody>
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