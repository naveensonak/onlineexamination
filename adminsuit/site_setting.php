<?php 
ob_start();
session_start();
if($_SESSION['userid']=="")
{
	header("location:index.php");
	exit();
}

include("include/connection.php");
//include("include/connect.php");

if(isset($_POST['submit'])=='Save'){
	$address=mysqli_real_escape_string($config,$_POST['address']);
	$email=mysqli_real_escape_string($config,$_POST['email']);
	$mobile=mysqli_real_escape_string($config,$_POST['mobile']);
	$tax=mysqli_real_escape_string($config,$_POST['tax']);
	$content1=mysqli_real_escape_string($config,$_POST['content1']);
	$content2=mysqli_real_escape_string($config,$_POST['content2']);
	$content3=mysqli_real_escape_string($config,$_POST['content3']);
	$series=mysqli_real_escape_string($config,$_POST['series']);
	$student=mysqli_real_escape_string($config,$_POST['student']);
	$question=mysqli_real_escape_string($config,$_POST['question']);
	$doubt=mysqli_real_escape_string($config,$_POST['doubt']);
$content4='no';
$content5='no';
	
$sql= "UPDATE `site_setting` SET `address` = '".$address."',`time` = '".$content5."',`email` = '".$email."',`mobile` = '".$mobile."',`tax` = '".$tax."',`fblink` = '".$content1."',`twlink` = '".$content2."',`gplus`='".$content3."',`series`='".$series."',`student`='".$student."',`question`='".$question."',`doubt`='".$doubt."' WHERE `id`= '1'";
$query=mysqli_query($config,$sql);
if($query){
	
	header("location:site_setting.php?msg=updt");
	
	}

	}
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Adminsuit | Site Setting</title>
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
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="plugins/select2/select2.min.css">
<link rel="stylesheet" href="plugins/iCheck/all.css">
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/app.css" id="maincss">

</head>

<body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
        <?php
        include("include/header.inc.php");
        ?>
        <?php include("include/navigation.inc.php");

 $sql="SELECT * FROM `site_setting` where `id`='1'";
$query=mysqli_query($config,$sql);
$role=mysqli_fetch_array($query);

 ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1> Site Setting</h1>
                <ol class="breadcrumb">
                    <li><a href="desktop.php"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active"> Site Setting</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12 text-center">

                        <?php if(isset($_GET['msg'])=="updt"){ ?>
                        <span class="text-center red_txt">Update Successfully......</span><?php  } ?></div>
                    <div class="col-xs-12">


                        <div class="box">

                            <!-- /.box-header -->

                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" id="taskform">
                                <div class="box-body">

                                    <div class="clearfix"></div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input class="form-control" id="address" name="address" type="text"
                                                value="<?php echo @$role['address']; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input class="form-control" id="email" name="email" type="text"
                                                value="<?php echo @$role['email']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="mobile">Mobile</label>
                                            <input class="form-control" id="mobile" name="mobile" type="text"
                                                value="<?php echo @$role['mobile']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="content5">GST</label>
                                            <input class="form-control" id="tax" name="tax" type="text"
                                                value="<?php echo @$role['tax']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="content1">Facebook Link</label>
                                            <input class="form-control" id="content1" name="content1" type="text"
                                                value="<?php echo @$role['fblink']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="content2">Twitter Link</label>
                                            <input class="form-control" id="content2" name="content2" type="text"
                                                value="<?php echo @$role['twlink']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <label for="content3">Gplus Link</label>
                                            <input class="form-control" id="content3" name="content3" type="text"
                                                value="<?php echo @$role['gplus']; ?>">
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <div class="box-header box-header2">
                                        <div class="col-xs-12">
                                            <h3 class="box-title"><strong>Counter Settings</strong></h3>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div><br>

                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="series"> Test Series </label>
                                            <input class="form-control" id="series" name="series" type="text"
                                                value="<?php echo @$role['series']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="student">Student Enrolled</label>
                                            <input class="form-control" id="student" name="student" type="text"
                                                value="<?php echo @$role['student']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="question">Question Bank</label>
                                            <input class="form-control" id="question" name="question" type="text"
                                                value="<?php echo @$role['question']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-group">
                                            <label for="doubt">Doubts Answered</label>
                                            <input class="form-control" id="doubt" name="doubt" type="text"
                                                value="<?php echo @$role['doubt']; ?>">
                                        </div>
                                    </div>
                                    <input name="id" value="<?php echo @$id?>" type="hidden">
                                    <div class="clearfix"></div>


                                    <div class="clearfix"></div>

                                    <div class="clearfix"></div>
                                    <div class="col-md-12 col-sm-6 col-xs-12">
                                        <div class="form-group">
                                            <div class="text-center">

                                                <input type="submit" name="submit" class="btn btn-primary" value="Save">
                                            </div>
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
    <script>
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    });
    $(function() {
        $(".checkbox-toggle").click(function() {
            var clicks = $(this).data('clicks');
            if (clicks) {
                //Uncheck all checkboxes
                $("input[type='checkbox']").iCheck("uncheck");
                $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
            } else {
                //Check all checkboxes
                $("input[type='checkbox']").iCheck("check");
                $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
            }
            $(this).data("clicks", !clicks);
        });
        //$("#example1").DataTable();
        $('#example1').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": true
        });
    });
    </script>
    <script type="text/javascript">
    function cancel() {
        var strconfirm = confirm("Are you sure you want to cancel ?");
        if (strconfirm == true) {
            window.location = 'manage_quotation.php';
        }

    }
    </script>

    <!--sucess modal-->


</body>

</html>