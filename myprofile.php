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
    <title>Online Examination || My Profile</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/core.css">
    <link rel="stylesheet" href="css/shortcode/shortcodes.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/color/color-1.css">
    <link href="css/jquery.datetimepicker.css" rel="stylesheet" type="text/css">

    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    
    <style>
    td, th {padding: 10px;}
	input[type="radio"]{/*height: 0px;*/
padding-left: 0px;
width: 15px; 
float:left; margin-left:8px; margin-top:3px;}
input {height:15px;}
label{ float:left; margin-left:3px;}
    </style>
</head>

<body>
    <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <!-- Body main wrapper start -->
    <div class="wrapper">
<!---profile menu active link create variable---->
  <?php  $profile="myprofile"; ?>
<!---end profile menu active link---->
     <?php include("include/connection.php");?>
    <?php include("include/header.php");?>
      

    <?php
$userid=$_SESSION['frontuserid'];
$selectruser=mysqli_query($config,"select * from `user` where `id`='".$userid."'");
$userresult=mysqli_fetch_array($selectruser);
?> 
        <section class="courses-details pt-30">
            <div class="container">
                <div class="row">
                <div class="col-md-12 col-sm-6">
                 <div class="col-md-9 col-sm-6">
                        <div class="about-text">
                            <h2>My Profile</h2>
                        </div>
                 </div> 
                        
                        <div id="hide22">
<div class="col-md-3 col-sm-3 col-xs-12 text-right"><br>

<a class="button extra-small button-blue mb-20" href="javascript:void(0);" id="zone"><span>Edit Profile</span> <i class="icofont icofont-pencil-alt-2"></i></a>



</div></div>
<div id="hide11">
<div class="col-md-3 col-sm-3 col-xs-12 text-right"><br><a class="button extra-small button-blue mb-20" href="javascript:void(0);" id="cancele"><span>Cancel Edit Profile</span> <i class="icofont icofont-pencil-alt-2"></i></a></div></div>

                    </div>
                <?php include("include/profilemenu.php");?> 
                
                    <div class="col-md-9 col-sm-9">
                        <div class="">
                            <div class="row">

<div id="hide222">
<div class="col-md-10 col-sm-9 col-xs-12 text-left">
<h4><i class="fa fa-eye" aria-hidden="true"></i> View Profile  <div class="borderbotom"></div></h4></div></div>
<div id="hide111">
<div class="col-md-10 col-sm-9 col-xs-12 text-left">
<h4><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile  <div class="borderbotom"></div></h4></div></div>
<div class="col-md-10 col-sm-9 col-xs-12 text-left">
<span id="sucess"></span></div>
</div>



<div id="hide">
<p id="sucess"></p>
<form class="" action="#" autocomplete="off" id="myprofiles" method="POST">

<table width="100%" cellpadding="10" cellspacing="0" class="table-striped">
<tr>
<td  width="30%"><strong>Name</strong></td>
<td><input type="text" class="form-control logincontrol" name="name" id="name" placeholder=" Name"  value="<?php echo $userresult['name'];?>" required></td>
</tr>

<tr>
  <td ><strong>Mobile No</strong></td>
  <td><input type="text" class="form-control logincontrol" name="mobile" maxlength="10" id="mobile" placeholder="Mobile No."  onKeyPress="return isNumber(event)" value="<?php echo $userresult['mobile'];?>" required></td>
</tr>
<tr>
  <td ><strong>Mobile No-2</strong></td>
  <td><input type="text" class="form-control logincontrol" name="amobile" maxlength="10" id="amobile" placeholder="Mobile No-2"  onKeyPress="return isNumber(event)" value="<?php echo $userresult['amobile'];?>"></td>
</tr>
<tr>
  <td ><strong>Date of Birth</strong></td>
  <td><input  type="text" class="form-control logincontrol dob" name="dob" id="dob" placeholder="DOB"  value="<?php echo $userresult['dob'];?>" required></td>
</tr>
<tr>
<td  width="30%"><strong>Class</strong></td>
<td><input type="text" class="form-control logincontrol" name="myclass" id="myclass" placeholder="Class"  value="<?php echo $userresult['class'];?>" required> </td>
</tr>
<tr>
<td  width="30%"><strong>School</strong></td>
<td><input type="text" class="form-control logincontrol" name="school" id="school" placeholder="School" value="<?php echo $userresult['school'];?>" required> </td>
</tr>

<tr>
  <td ><strong>Address</strong></td>
  <td><input type="text" class="form-control logincontrol" name="address" id="address" placeholder="Address"  value="<?php echo $userresult['address'];?>" required></td>
</tr>

<tr>
  <td ><strong>Photo</strong></td>
  <td><input type="file" class="form-control logincontrol" name="photo" id="photo" style="height: 32px; padding: 0px 0px 32px 0px;"></td>
</tr>
<input type="hidden" name="userid" id="userid" value="<?php echo $userresult['id'];?>">
<tr>
  <td ><strong>Gender </strong></td>
  <td>
<input type="radio" name="gender" value="male"  <?php if($userresult['gender']=='male'){echo "checked";} ?> required><label>Male</label>
 &nbsp;&nbsp; <input type="radio" name="gender" value="female"  <?php if($userresult['gender']=='female'){echo "checked";} ?> required><label>Female</label>

</td>
</tr>
<tr ><td></td><td><div class="col-md-3 col-sm-3 col-xs-12 text-center"><button class="btn btn-info" type="submit">Save</button></div></td></tr>
</table>
</form>
</div>
<div id="hide2">
<table width="100%" cellpadding="10" cellspacing="0" class="table-striped">
<tr>
<td  width="30%"><strong>Name</strong></td>
<td><?php echo $userresult['name'];?></td>
</tr>
<tr>
<td  width="30%"><strong>Email Id</strong></td>
<td><?php echo $userresult['email'];?></td>
</tr>

<tr>
<td  width="30%"><strong>Mobile No.</strong></td>
<td><?php echo $userresult['mobile'];?></td>
</tr>
<tr>
<td  width="30%"><strong>Mobile No-2</strong></td>
<td><?php echo $userresult['amobile'];?></td>
</tr>
<tr>
  <td ><strong>Date of Birth</strong></td>
  <td><?php echo $userresult['dob'];?></td>
</tr>
<tr>
  <td ><strong>Class</strong></td>
  <td><?php echo $userresult['class'];?></td>
</tr>
<tr>
  <td ><strong>School</strong></td>
  <td><?php echo $userresult['school'];?>  </td >
</tr>
<tr>
  <td ><strong>Address</strong></td>
  <td><?php echo $userresult['address'];?> </td >
</tr>
<tr>
  <td ><strong>Gender</strong></td>
  <td><?php echo ucfirst($userresult['gender']);?></td>
</tr>

<tr>
  <td ><strong>Photo </strong></td>
  <td><div class="test-img2">
       <img src="<?php echo ($userresult['photo']);?>" alt="" height="100" width="100">
                                    </div></td>
</tr>
</table>
</div>

                            
                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
        <br>
<br>

<?php include("include/footer.php");?>    
 </div>
    <script src="js/vendor/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
     <script src="js/myprofile.js"></script>

<script type="text/javascript">
function hideAll() {
        $('#hide,#hide11,#hide111').hide();
    }
 function cancel() {
 var strconfirm = confirm("Are you sure you want to cancel ?");
           if (strconfirm == true) {
           window.location = 'manage_quotation.php'; 
           }

       }
	 $(document).ready(function() {
		hideAll(); 
		$('#zone,#cancele').click(function() { 
        hideAll();
       $('#hide,#hide11,#hide111').show();
	   $('#hide2,#hide22,#hide222').hide();
        //alert(val);
      
    });
	$('#cancele').click(function() { 
        hideAll();
       $('#hide,#hide11,#hide111').hide();
	   $('#hide2,#hide22,#hide222').show();
        //alert(val);
      
    }); 
	 });
</script>
<script type="text/javascript" src="js/jquery.datetimepicker.js"></script>
  <script>
  	 $(document).ready(function () {
           jQuery(function () {jQuery('.dob').datetimepicker({
                format: 'd/m/Y',
				startDate:	'1980/01/01',
                onShow: function (ct) {
                    this.setOptions({
                    })
                },
                timepicker: false
            });});
       });
    	</script>
</body>

</html>