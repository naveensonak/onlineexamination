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
  <title>Adminsuit | <?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Demo Question Detail</title>
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
<?php include("include/header.inc.php");?>
 <?php include("include/navigation.inc.php");
   $qwerty=basename($_SERVER['PHP_SELF']) . '';
  chpermission($qwerty);
if(@$testid=encryptor('decrypt', $_GET['testid'])){
	
  }else{header("location:404.php");}
	?>

  <div class="content-wrapper">
    <section class="content-header">
    <h1><?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Demo Question Detail</h1>
      <ol class="breadcrumb">
        <li><a href="manage_DemoquestionDetail.php?id=<?php echo @$_GET['testid']?>"><i class="fa fa-dashboard"></i> Manage Demo Question Detail</a></li>
        <li class="active"><?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Question Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         <?php
         include("include/connect.php");
  $Query=mysqli_query($config,"select * from `tbl_demotestquestion` where `testid`='".$testid."' ");
  $num=mysqli_num_rows($Query);
   $result=mysqli_fetch_array($Query);
   ?> 

          <div class="box">
            <div class="box-header2"> 
             <div class="col-xs-12">
<span style="color:#f56954;">You Are Adding Question No:- <?php echo 1+$num;?></span>
 </div>
           <div class="clearfix"></div>   
            </div>
            <!-- /.box-header -->
            
      <form id="addquestionform" name="formID" method="post" action="#" enctype="multipart/form-data">
      <div class="col-sm-10 col-xs-offset-1">
            <div class="box-body">
                  <div class="clearfix"></div>
                
                  
   <input class="form-control" id="testid" name="testid" type="hidden" value="<?php echo @$testid;?>" >
<input class="form-control" id="convertedtestid" name="convertedtestid" type="hidden" value="<?php echo @$_GET['testid'];?>">                 
                <div class="clearfix"></div>
               <input class="form-control" id="code" name="code" type="hidden" value="<?php echo @$code;?>"> 
                              
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="shortdescription">Question :</label>
 <textarea id="question" name="question" class="ckeditor"></textarea>
                </div>
                </div> 
            <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="opt1">Option-A : &nbsp;<input name="radio" type="radio" value="a" class="ans flat-red"></label>
<textarea name="opt1" id="opt1"  class="ckeditor"></textarea>
              </div>
                </div> 
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="opt2">Option-B : &nbsp;<input name="radio" type="radio" value="b" class="ans flat-red"></label>
<textarea name="opt2" id="opt2"  class="ckeditor"></textarea>
              </div>
                </div>
                
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="opt3">Option-C : &nbsp;<input name="radio" type="radio" value="c" class="ans flat-red"></label>
<textarea name="opt3" id="opt3"  class="ckeditor"></textarea>
              </div>
                </div>
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="opt4">Option-D : &nbsp;<input name="radio" type="radio" value="d" class="ans flat-red"></label>
<textarea name="opt4" id="opt4"  class="ckeditor"></textarea>
              </div>
                </div>
             <div class="clearfix"></div> 
             <input  id="editid" name="editid" type="hidden" value="" >
           <input class="form-control" id="answer" name="answer" type="hidden" value="" >
              <div class="form-group">
              <div class="text-center">
 <span style="color:#f56954;"><strong><?php
 $Query2=mysqli_query($config,"select `totalquestion` from `tbl_demotest` where `id`='".$testid."' ");
  $result=mysqli_fetch_array($Query2);
  if($result['totalquestion']==$num){echo"Total No of Question Added Succesfully";}else{
   ?></strong></span>

 <input type="submit" id="" name="Action" class="btn btn-primary" value="<?php if(@$id != ''){echo 'Edit';}else{echo 'Add';}?>"  ><?php }?></div>
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
<script type="text/javascript" src="js/add_DemoquestionDetail.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="js/setting.js"></script>
<script>
  $(function () {

    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
  });
</script>
<script>
$(document).ready(function(){
$checks = $(".ans");
$checks.on('ifChecked', function () {
var string = $checks.filter(":checked").map(function(){
 var id=this.value;
 //alert(id);
return id;
}).get().join(",");
if(string=='false'){ $('#answer').val('');}else{
 $('#answer').val(string);}

	});
});
</script>
<script>
//$(document).ready(function(){
//$checks = $(".ans");
//$checks.on('change', function() {
//var string = $checks.filter(":checked").map(function(){
// var id=this.value;
// //alert(id);
//return id;
//}).get().join(",");
//if(string=='false'){ $('#answer').val('');}else{
// $('#answer').val(string);}
//});
//});

</script>
</body>
</html>
