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
    <title>Online Examination || Question</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/color/color-1.css">
    <link rel="stylesheet" href="css/tabs.css" type="text/css"/>
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
input[type="radio"], input[type="checkbox"] {
    margin: -5px 0 0; height:15px;}
	.timer {margin-left: 5px;}
	p {
    line-height: 29px;
    margin-bottom: 1px;
}
        </style>
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">
    <?php include('include/connect.php');//include("include/connection.php");?>
            <?php include("include/header.php");?>
<?php
include('include/connect.php');
$orderid=encryptor('decrypt',@$_GET['assigned']);
$testid=encryptor('decrypt',@$_GET['testid']);
$selectorder=mysqli_query($config,"SELECT * FROM `tbl_olympiadstest` where `id`='".$testid."' and `status`='1'");
$mysqlnum=mysqli_num_rows($selectorder);
$testresult=mysqli_fetch_array($selectorder);
$totaltime=$testresult['duration'];
$totalquestion=$testresult['totalquestion'];
$testid=$testresult['id'];
	 date_default_timezone_set("Asia/Kolkata");
$currentDate=date( 'Y-m-d H:i:s' );
$selectorder=mysqli_query($config,"SELECT *,(select `startdate` from `olymtest_slot` where `id`=`olympiadorderdetail`.`timeslot`)as startdate,(select `enddate` from `olymtest_slot` where `id`=`olympiadorderdetail`.`timeslot`)as enddate FROM `olympiadorderdetail` where `id`='".$orderid."'");
$slotresult=mysqli_fetch_array($selectorder);


if($currentDate>=$slotresult['startdate'] && $slotresult['enddate']>=$currentDate){?>


       <section class="courses-details ptb-30">
            <div class="container">
                <div class="row">
                <div class="col-md-12 col-sm-6">
                <div class="col-md-9 col-sm-6">
                        <div class="about-text">
          <h2>Test Booklet Code [<?php echo $testresult['code'];?>]</h2>
                        </div>
                        </div>
                    </div>
 <?php include("include/profilemenu.php");?> 
   <div class="col-md-9 col-sm-9">
   <?php
$sql=("SELECT * FROM `tbl_olymquestion` where `testid`='".$testresult['id']."' and `status`='1'");
		$chkquery=mysqli_query($config,$sql);
$chkquestion=mysqli_num_rows($chkquery);
if($chkquestion!=''){?> 
   <div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 text-left">
<h3><span class="qt" id="blink">Time:<span id="countdown" class="timer"></span></span></h3></div>
<div class="col-md-6 col-sm-6 col-xs-12 text-right">
<h3>Total Question: <span><?php echo $totalquestion;?></span></h3></div>
</div>
              
<div class="about-lectures">
<div id="tabs">
      <ul style="display:none;">
      <?php
				$pagenum=1;
				$i=(25*$pagenum)-25;
				$a=(25*$pagenum)-25;
				//
		$pager=mysqli_query($config,$sql);
		while($pager_row = mysqli_fetch_array( $pager )) {$i++;
		?>
  <li><a href="#<?php echo $i;?>"><?php echo $i;?></a></li>
         <?php }?>
          </ul>
          <form method="post" action="#"  id="quize">
          <?php
		  $query=mysqli_query($config,$sql);
		   while($row = mysqli_fetch_array( $query )) {$a++; ?>
      <div id="<?php echo $a;?>" class="ui-tabs-panel" style="padding:5px;">
      
            <table cellpadding="0" cellspacing="1" width="100%">
            	<tr>
                	<td width="9%"><b><?php echo $a;?>.</b></td>
                    <td width="91%"><?php echo $row['question'];?></td>
                    </tr>
               <tr>
                	<td>&nbsp;</td>
                    
                    </tr>     
                   
               <tr>
                	<td>
         <input type="radio" id="a<?php echo $row['id'];?>" name="radio<?php echo $row['id'];?>" value="a<?php echo $row['id'];?>" /></td>
                    <td><label for="a<?php echo $row['id'];?>"><?php echo $row['opt1'];?></label></td>
                    </tr>
                    
                   <tr>
                	<td>
         <input type="radio" id="b<?php echo $row['id'];?>" name="radio<?php echo $row['id'];?>" value="b<?php echo $row['id'];?>" /></td>
                    <td><label for="b<?php echo $row['id'];?>"><?php echo $row['opt2'];?></label></td>
                    </tr>
                    
                   <tr>
                	<td>
         <input type="radio" id="c<?php echo $row['id'];?>" name="radio<?php echo $row['id'];?>" value="c<?php echo $row['id'];?>" /></td>
                    <td><label for="c<?php echo $row['id'];?>"><?php echo $row['opt3'];?></label></td>
                    </tr>
                    
                    <tr>
                	<td>
          <input type="radio" id="d<?php echo $row['id'];?>" name="radio<?php echo $row['id'];?>" value="d<?php echo $row['id'];?>"/></td>
                    <td><label for="d<?php echo $row['id'];?>"><?php echo $row['opt4'];?></label></td>
                    </tr>
                    <tr>
           			<td>
  
  </td>
           			<td>&nbsp;</td>
                    </tr>
                  <tr class="">
                	<td>&nbsp;</td>
                    <td>&nbsp;</td>
                    </tr>      
                </table>
             
          </div>
         <?php }?>
         <input type="hidden" name="userid" id="userid" value="<?php echo $_SESSION['frontuserid'];?>">     
  <input type="hidden" name="testid" id="testid" value="<?php echo $testid;?>" />
  <input type="hidden" name="orderid" id="orderid" value="<?php echo $orderid;?>" />
  <input type="hidden" name="enctestid" id="enctestid" value="<?php echo encryptor('encrypt',@$testid);?>" />
  <input type="button" name="quize_submit" id="quize_submit" class="finish"  value="Submit"/>      
         
          </form>
          
   	 </div>
</div>
            <?php } else{?><?php echo "<h4 class='text-center'>Question Not Available...</h4>";}?>
    
     
                
                    </div>
                    
                </div>
            </div>
        </section> 
        <?php }else{header("location:myolympiads.php");exit();}?>
        
<?php include("include/footer.php");?>
    </div>
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
        <script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.7.custom.min.js"></script>
<script type="text/javascript" src="js/olymquize.js"></script>
    <script type="text/javascript">
		$(function() {
			var $tabs = $('#tabs').tabs();
			$(".ui-tabs-panel").each(function(i){
			  var totalSize = $(".ui-tabs-panel").size() - 1;
			  if (i != totalSize) {
			      next = i + 2;
		   		  $(this).append("<a href='#' class='next-tab mover' rel='" + next + "'>Next &#187;</a>");
			  }
			});
	
			$('.next-tab, .prev-tab').click(function() { 
		           $tabs.tabs('select', $(this).attr("rel"));
		           return false;
		       });
		});</script>
    <script>
function setCookie(cname,cvalue,exdays)
{
var d = new Date();
var a = d.setTime(d.getTime()+(exdays*1*60*1000));
//alert(d);
var expires = "expires="+d.toGMTString();
//alert(expires);
document.cookie = cname + "=" + cvalue + "; " + expires;
}
function getCookie(cname)
{
var name = cname + "=";
var ca = document.cookie.split(';');
for(var i=0; i<ca.length; i++) 
  {
  var c = ca[i].trim();
  if (c.indexOf(name)==0) return c.substring(name.length,c.length);
  }
return "";
}

//check existing cookie
cook=getCookie("my_cookie");

if(cook==""){
   //cookie not found, so set seconds=60
   var seconds =<?php echo $totaltime;?>*60;
}else{
     seconds = cook;
     console.log(cook);
}

function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;

    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    //store seconds to cookie
    setCookie("my_cookie",seconds,5); //here 5 is expiry days
    
    document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
	if(seconds==10){
//--------------blink timer------
var blink_line = document.getElementById("blink");

function d_block(){

    if(blink_line.style.visibility=='hidden')
    {
        blink_line.style.visibility='visible';
    }
    else{
        blink_line.style.visibility='hidden';
    }

}
setInterval(function(){d_block();}, 300);

}//--------------blink timer------
	
	
	
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Timed Out";
        //document.getElementById('quize').submit();
		//$("#quize_submit").click()
		submit_form();
    } else {    
        seconds--;
    }
}

var countdownTimer = setInterval(secondPassed, 1000);
    </script>
<script>
function showTime() {
var numberOfCheckedRadio = $('input:radio:checked').length;
//alert(numberOfCheckedRadio);
}
</script>


</body>

</html>