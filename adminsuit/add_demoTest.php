<?php 
ob_start();
session_start();
if($_SESSION['userid']=="")
{
	header("location:index.php");
	exit();
}
include("include/connection.php");
include("include/connect.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Adminsuit | <?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Demo Test </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/ionicons.min.css">
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">

  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="plugins/select2/select2.min.css">
<link rel="stylesheet" href="plugins/iCheck/all.css">

  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/app.css" id="maincss">

</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
<?php include ("include/header.inc.php");?>
 <?php include ("include/navigation.inc.php");
   $qwerty=basename($_SERVER['PHP_SELF']) . '';
  chpermission($qwerty);
  
  if(@$id=encryptor('decrypt', $_GET['id'])){
$sql="SELECT * FROM `admin` where id=$id";
$query=mysqli_query($config,$sql);
$role=mysqli_fetch_array($query);
  }
	?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1><?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Demo Test </h1>
      <ol class="breadcrumb">
   <li><a href="manage_demoTest.php"><i class="fa fa-dashboard"></i> Manage Demo Test </a></li>
  <li class="active"><?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Demo Test </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header box-header2">
             <div class="col-xs-12 text-center">
         <h3 class="box-title">
		 <?php 
				if((@$_GET['msg'])=="updt") 
				{ ?>
              <font size="+1" color="#FF0000">Save Successfully......</font>
              <?php  } ?></h3></div>
              
            </div>
            <!-- /.box-header -->
            
   <form id="adddemotestform" name="formID" method="post" action="#" enctype="multipart/form-data">
      <div class="col-sm-10 col-xs-offset-1">
            <div class="box-body">
          
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="title">Test Name :<span>*</span></label>
   <input class="form-control" id="title" name="title" type="text" value="" >
                </div>
                </div>
                
                
                
                
                 <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="duration">Duration :<span>*</span></label>
<input class="form-control" id="duration" name="duration" type="text" value="" >
                </div>
                </div>                
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="totalquestion">Total No of Question :<span>*</span></label>
<input class="form-control" id="totalquestion" name="totalquestion" type="text" value="" >
                </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group">
  <label for="markspercorrectquestion">Correct Answer Marks per Question :<span>*</span></label>
<input class="form-control" id="markspercorrectquestion" name="markspercorrectquestion" type="text" value="" >
                </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="marksperwrongquestion">Wrong Answer marks per question :<span>*</span></label>
<input class="form-control" id="marksperwrongquestion" name="marksperwrongquestion" type="text" value="" >
                </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="maximummarks">Maximum Marks  :<span>*</span></label>
<input class="form-control" id="maximummarks" name="maximummarks" type="text" value="" >
                </div>
                </div>
                
 
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="images">Images <span>*</span></label>
         <input  id="images" name="images" type="file" value="" >
         <span style="color:#f00;">images Size(180x180)</span>
                </div>
                </div>
                
                <div class="clearfix"></div>
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="detail">Short Description :<small class="red_txt">[Max 150 character]</small></label>
<textarea name="shortdes" id="shortdes"  class="form-control" maxlength="150"></textarea>
              </div>
                </div>
                <div class="clearfix"></div>
                              
             <div class="clearfix"></div> 
             <input  id="editid" name="editid" type="hidden" value="" >
              <div class="form-group">
              <div class="text-center">
              <button type="reset" class="btn btn-default" onClick="location.href='manage_demoTest.php'">Cancel</button>
 <input type="submit" id="" name="Action" class="btn btn-primary" value="<?php if(@$id != ''){echo 'Edit';}else{echo 'Add';}?>"  ></div>
                </div> 
               </div>
               
               </div>
                <div class="clearfix"></div> 
          </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php  include("include/footer.inc.php");?></div>
<script type="text/javascript" src="js/add_demotest.js"></script>

</body>
</html>
