<?php 
ob_start();
session_start();
if($_SESSION['userid']=="")
{
	header("location:index.php?msg1=notauthorized");
	exit();
}
	
	?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Adminsuit | Manage Order</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="plugins/select2/select2.min.css">
<link rel="stylesheet" href="plugins/iCheck/all.css">
    <link href="css/custom.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
     <link rel="stylesheet" href="css/app.css" id="maincss">

</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
<?php include("include/connection.php");
include('include/connect.php');?>
<?php include("include/header.inc.php");?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include("include/navigation.inc.php");?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Order</h1>
      <ol class="breadcrumb">
        <li><a href="desktop.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Order</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header box-header2">
           
              <div class="col-sm-6">
              <div class="pull-right">
     <!-- <a href="download_bike_excel.php" class="btn btn-warning">Download Excel</a>-->
       <!--<a data-toggle="modal" href="#excel" onclick="rolereset();" class="btn btn-info">Upload Excel</a>
       <a href="add_student.php" class="btn btn-danger">Add New</a>-->
       </div>
       </div>
      
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right ui-sortable-handle">
            <li><a href="#olym" data-toggle="tab" aria-expanded="false">Olympiads</a></li>
      <li><a href="#Today" data-toggle="tab" aria-expanded="true">Question Bank</a></li>
         <li class="active"><a href="#latedelivery" data-toggle="tab" aria-expanded="false">Test Series</a></li>
    
      
            </ul>
            <div class="tab-content no-padding">
            <div class="chart tab-pane" id="olym" style="position: relative;">
   <div class="box-body">
<h3 class="text-danger" style="margin-top:0px;margin-bottom: -25px;">Olympiads</h3>
            <form id="formID" name="formID" method="post" action="#">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Sr.No</th>
                  <th>Test Name/Code</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Amount</th>
                  <th>TransactionId</th>
                  <th>Paid</th>
                  <th>Date</th>
                  
                </tr>
                </thead>
                <tbody>
     <?php
     include('include/connect.php');
      mysqli_select_db($config,"onlineexamination_Compile");
	  date_default_timezone_set("Asia/Kolkata");
   $Datetime=date( 'Y-m-d' );
  $quotation_query=mysqli_query($config,"SELECT *,(SELECT `code` FROM `tbl_olympiadstest` where `id`=`olympiadorderdetail`.`olympiadsid`)as `seriesno`,(SELECT `testname` FROM `tbl_olympiadstest` where `id`=`olympiadorderdetail`.`olympiadsid`)as `seriesname` FROM `olympiadorderdetail` order by id desc");
 
  $i=0; 
  while($quotation_result=mysqli_fetch_array($quotation_query)){$i++;
   ?>   
                <tr>
                  <td><?php echo $i;?>.</td>
                  
                  <td><?php echo $quotation_result['seriesname'];?>/<?php echo $quotation_result['seriesno']; ?></td>
                  <td><a href="javascript:void(0);" onClick="ownerdetail(<?php echo $quotation_result['userid']; ?>)" title="View User"><?php echo $quotation_result['username']; ?></a></td>
                  <td><a href="javascript:void(0);" onClick="ownerdetail(<?php echo $quotation_result['userid']; ?>)" title="View User"><?php echo $quotation_result['email']; ?></a></td>
                  <td><?php echo $quotation_result['mobile']; ?></td>
                  <td><?php echo $quotation_result['amount']; ?></td>
                  <td><?php echo $quotation_result['transactionId']; ?></td>
                  <td><?php 
	  if($quotation_result['paidunpaid']==1){
	  ?>
     
      <a href="javascript:void(0);"  style="color:#090;" title="Paid">Paid</a>
      <?php } else if($quotation_result['paidunpaid']==0){?>
      
      <a href="javascript:void(0);" onClick="UnRespond(<?php echo $quotation_result['id']; ?>)"  style="color:#f00;" title="Unpaid">Unpaid</a>
	<?php } else if($quotation_result['paidunpaid']==2){?>  
	  <a href="javascript:void(0);" style="color:#000;" title="Free">Free</a>
	  <?php }?></td>
      <td><?php 
  $post_date = $quotation_result['createdate'];
 $post_date2 = strtotime($post_date);
  echo $convert=date('d-m-Y',$post_date2);
 ?></td>
                   
   
                </tr>
        <?php }?>
                </tbody>
              </table>
              </form>
            </div>
 </div>
              <!-- Morris chart - Sales -->
  <div class="chart tab-pane" id="Today" style="position: relative;">
  <div class="box-body">
 <h3 class="text-danger" style="margin-top:0px; margin-bottom: -25px;">Question Bank</h3>
            <form id="formID1" name="formID1" method="post" action="#">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Sr.No</th>
                  <th>Title</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Amount</th>
                  <th>TransactionId</th>
                  <th>Paid</th>
                  <th>Date</th>
                  
                </tr>
                </thead>
                <tbody>
     <?php
	  date_default_timezone_set("Asia/Kolkata");
   $Datetime=date( 'Y-m-d' );
  $quotation_query=mysqli_query($config,"SELECT *,(SELECT `qbid` FROM `tbl_questionbank` where `id`=`questionbankorderdetail`.`qbid`)as `seriesno`,(SELECT `qbname` FROM `tbl_questionbank` where `id`=`questionbankorderdetail`.`qbid`)as `seriesname` FROM `questionbankorderdetail` order by id desc");
 
  $i=0; 
  while($quotation_result=mysqli_fetch_array($quotation_query)){$i++;
   ?>   
                <tr>
                  <td><?php echo $i;?>.</td>
                  <td><?php echo $quotation_result['seriesname'];?>/<?php echo $quotation_result['seriesno']; ?></td>
                  <td><a href="javascript:void(0);" onClick="ownerdetail(<?php echo $quotation_result['userid']; ?>)" title="View User"><?php echo $quotation_result['username']; ?></a></td>
                  <td><a href="javascript:void(0);" onClick="ownerdetail(<?php echo $quotation_result['userid']; ?>)" title="View User"><?php echo $quotation_result['email']; ?></a></td>
                  <td><?php echo $quotation_result['mobile']; ?></td>
                  <td><?php echo $quotation_result['amount']; ?></td>
                  <td><?php echo $quotation_result['transactionId']; ?></td>
                  <td><?php 
	  if($quotation_result['paidunpaid']==1){
	  ?>
      &nbsp;&nbsp;&nbsp;
      <a href="javascript:void(0);"  style="color:#090;" title="Paid">Paid</a>
      <?php } else if($quotation_result['paidunpaid']==0){?>
      &nbsp;&nbsp;&nbsp;
      <a href="javascript:void(0);" onClick="UnRespondqb(<?php echo $quotation_result['id']; ?>)"  style="color:#f00;" title="Unpaid">Unpaid</a><?php }?></td>
      <td><?php 
  $post_date = $quotation_result['createdate'];
 $post_date2 = strtotime($post_date);
  echo $convert=date('d-m-Y',$post_date2);
 ?></td>
                   
   
                </tr>
        <?php }?>
                </tbody>
              </table>
              </form>
            </div>
 			 </div>
                            
 <div class="chart tab-pane active" id="latedelivery" style="position: relative;">
   <div class="box-body">
<h3 class="text-danger" style="margin-top:0px;margin-bottom: 25px;">Test Series</h3>
            <form id="formID" name="formID" method="post" action="#">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <th>Sr.No</th>
                  <th>Test Series/Series No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Amount</th>
                  <th>TransactionId</th>
                  <th>Paid</th>
                  <th>Date</th>
                  
                </tr>
                </thead>
                <tbody>
     <?php
	  date_default_timezone_set("Asia/Kolkata");
   $Datetime=date( 'Y-m-d' );
  $quotation_query=mysqli_query($config,"SELECT *,(SELECT `seriesno` FROM `tbl_testseries` where `id`=`orderdetail`.`testid`)as `seriesno`,(SELECT `seriesname` FROM `tbl_testseries` where `id`=`orderdetail`.`testid`)as `seriesname` FROM `orderdetail` order by id desc");
 
  $i=0; 
  while($quotation_result=mysqli_fetch_array($quotation_query)){$i++;
   ?>   
                <tr>
                  <td><?php echo $i;?>.</td>
                  
                  <td><?php echo $quotation_result['seriesname'];?>/<?php echo $quotation_result['seriesno']; ?></td>
                  <td><a href="javascript:void(0);" onClick="ownerdetail(<?php echo $quotation_result['userid']; ?>)" title="View User"><?php echo $quotation_result['username']; ?></a></td>
                  <td><a href="javascript:void(0);" onClick="ownerdetail(<?php echo $quotation_result['userid']; ?>)" title="View User"><?php echo $quotation_result['email']; ?></a></td>
                  <td><?php echo $quotation_result['mobile']; ?></td>
                  <td><?php echo $quotation_result['amount']; ?></td>
                  <td><?php echo $quotation_result['transactionId']; ?></td>
                  <td><?php 
	  if($quotation_result['paidunpaid']==1){
	  ?>
     
      <a href="javascript:void(0);"  style="color:#090;" title="Paid">Paid</a>
      <?php } else if($quotation_result['paidunpaid']==0){?>
      
      <a href="javascript:void(0);" onClick="UnRespond(<?php echo $quotation_result['id']; ?>)"  style="color:#f00;" title="Unpaid">Unpaid</a>
	<?php } else if($quotation_result['paidunpaid']==2){?>  
	  <a href="javascript:void(0);" style="color:#000;" title="Free">Free</a>
	  <?php }?></td>
      <td><?php 
  $post_date = $quotation_result['createdate'];
 $post_date2 = strtotime($post_date);
  echo $convert=date('d-m-Y',$post_date2);
 ?></td>
                   
   
                </tr>
        <?php }?>
                </tbody>
              </table>
              </form>
            </div>
 </div>
 
 
            </div>
          </div>
            </div>
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
  
<?php include("include/footer.inc.php");?></div>
<!-- ./wrapper -->
 

<script>
  $(function () {
    $('#example1').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true
    });
	$('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script type="text/javascript">
 function Respond(Id) {
 var strconfirm = confirm("Are you sure you want to unpaid ?");

           if (strconfirm == true) {
               $.ajax({
                   type: "Post",
                  data:"id=" + Id + "& type=" + "chk" ,
                   url: "manage_seriesorderAction.php",
                   success: function (html) {
                       //alert(html);
                       window.location = '';
                       return false;
                   },
                   error: function (e) {
                   }
               });
           }

       }

 function UnRespond(Id) {
           var strconfirm = confirm("Are you sure you want to paid ?");
           if (strconfirm == true) {
               $.ajax({
                   type: "Post",
                   data:"id=" + Id + "& type=" + "unchk" ,
                   url: "manage_seriesorderAction.php",
                   success: function (html) {
                       //alert(html);
                    window.location = '';
                       return false;
                   },
                   error: function (e) {
                   }
               });
           }

       }
	    function ownerdetail(Id) {
               $.ajax({
                   type: "Post",
                  data:"id=" + Id + "& type=" + "viewowner" ,
                   url: "manage_userAction.php",
                   success: function (html) {
			$('#viewownerdetail').modal({backdrop: 'static', keyboard: false})  
  			$('#viewownerdetail').modal('show');
				   document.getElementById('viewResult').innerHTML = html;
                       return false;
                   },
                   error: function (e) {
                   }
               });

       }
</script>
<script type="text/javascript">
 function Respondqb(Id) {
 var strconfirm = confirm("Are you sure you want to unpaid ?");

           if (strconfirm == true) {
               $.ajax({
                   type: "Post",
                  data:"id=" + Id + "& type=" + "chk" ,
                   url: "manage_qbrderAction.php",
                   success: function (html) {
                       //alert(html);
                       window.location = '';
                       return false;
                   },
                   error: function (e) {
                   }
               });
           }

       }

 function UnRespondqb(Id) {
           var strconfirm = confirm("Are you sure you want to paid ?");
           if (strconfirm == true) {
               $.ajax({
                   type: "Post",
                   data:"id=" + Id + "& type=" + "unchk" ,
                   url: "manage_qbrderAction.php",
                   success: function (html) {
                       //alert(html);
                    window.location = '';
                       return false;
                   },
                   error: function (e) {
                   }
               });
           }

       }
	   </script>
<div id="viewownerdetail" class="modal modal-default fade" role="dialog">

  <div class="modal-dialog" id="viewResult">
            
            <!-- /.modal-content -->
          </div>
         
</div>
</body>
</html>
