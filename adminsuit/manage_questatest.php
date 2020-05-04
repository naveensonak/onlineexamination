<?php 
error_reporting(0);
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
  <title>Adminsuit | Manage Questa Test </title>
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
<?php include("include/connection.php");?>
<?php include("include/header.inc.php");?>
  <!-- Left side column. contains the logo and sidebar -->
 <?php include("include/navigation.inc.php");?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Manage Questa Test</h1>
      <ol class="breadcrumb">
        <li><a href="desktop.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Questa Test</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header box-header2">
             <div class="col-sm-10">
         <!--<h3 class="box-title">Data Table With Full Features</h3>--></div>
              <div class="col-sm-2">
              <div class="pull-right-btn">
  <a href="add_questaTest.php" class="btn btn-block btn-danger">Add New</a>
       </div>
       </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form id="formID" name="formID" method="post" action="#" enctype="multipart/form-data">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                
                <th>Test Code</th>
                 <th>Test Name</th>
                 <th>T. Question</th>
                  <th>Duration</th>
                  

                  <th>Images</th>
                  <th>Questa</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
     <?php
     include('include/connect.php');
      
  $Query=mysqli_query($config,"select *,(select `category` from `tbl_questa` WHERE `id`=`tbl_questatest`.`catid`)as category from `tbl_questatest` order by id desc");
  $i=0; 
  while($row=mysqli_fetch_array($Query)){$i++;
  $post_date1 = strtotime($row['startdate']);
 $convert1=date('d-m-Y',$post_date1);
 $convert11=date('d-m-Y H:i:s',$post_date1);

 $post_date2 = strtotime($row['enddate']);
 $convert2=date('d-m-Y',$post_date2);
  $convert22=date('d-m-Y H:i:s',$post_date2);
 

   ?>   
                <tr>
                 
                 
                  <td><?php echo @$row["code"]; ?></td>
                  <td><?php echo @$row["testname"]; ?></td>
                  <td><?php echo ucfirst(@$row["totalquestion"]); ?></td>
                  <td><?php echo @$row["duration"]; ?></td>
                  

                  <td><div class="user-block">
  <img class="img-circle img-bordered-sm" src="../<?php echo @$row["material"]; ?>">
                  </div></td>
                  <td><?php echo @$row["category"]; ?></td>
                   <td><a href="edit_questatest.php?id=<?php echo encryptor('encrypt', $row['id']); ?>" class="update-person" title="Edit"><i class="fa fa-edit" style="font-size:20px;"></i></a>&nbsp;&nbsp;&nbsp;
                   <a href="manage_questatimeSlot.php?id=<?php echo encryptor('encrypt', $row['id']); ?>" class="update-person" title="Add Slot"><i class="fa fa-clock-o" style="font-size:22px; color:#2B2BFF;"></i></a>&nbsp;&nbsp;&nbsp;
                   <a href="javascript:void(0);" onClick="delete_row(<?php echo $row['id'];?>)" class="update-person" style="color:#f56954; font-size:20px;" title="Delete"><i class="fa fa-trash"></i></a>
                   <?php 
	  if($row['status']==1){
	  ?>
      &nbsp;&nbsp;&nbsp;
      <a href="javascript:void(0);" onClick="Respond(<?php echo $row['id']; ?>)" class="update-person" style="color:#090; font-size:20px;" title="Active"><i class="fa fa-check-square-o"></i></a>
      <?php } else if($row['status']==0){?>
      &nbsp;&nbsp;&nbsp;
      <a href="javascript:void(0);" onClick="UnRespond(<?php echo $row['id']; ?>)" class="update-person" style="color:#f00; font-size:20px;" title="Inactive"><i class="fa fa-square-o"></i></a>
       <?php }?>
      </td>
   
     
                </tr>
        <?php }?>
               
               
                </tbody>
                
              </table>
              <div class="box-header box-header2" style="margin-bottom: 10px;">&nbsp; </div>
<div class="row">              
<div class="col-sm-10"></div>
              <div class="col-sm-2">
               &nbsp;
            </div>
              </div>
              </form>
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
 
	
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
  $(function () {
	  $(".checkbox-toggle").click(function () { 
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
 function delete_row(Id) {
 var strconfirm = confirm("Are You Sure You Want To Delete?");

           if (strconfirm == true) {
               $.ajax({
                   type: "Post",
                  data:"id=" + Id + "& type=" + "delete" ,
                   url: "addquestaTestNow.php",
                   success: function (html) { //alert(html);
                      if(html==1){
				alert("Selected Item Deleted Sucessfully....");
                     window.location = '';
					  }
					  else if(html==0){
						  alert("Some Technical Problem");
						  
						  }
                   },
                   error: function (e) {
                   }
               });
           }

       }
</script>
<script type="text/javascript">
 function Respond(Id) {
 var strconfirm = confirm("Are you sure you want to Inactive?");

           if (strconfirm == true) {
               $.ajax({
                   type: "Post",
                  data:"id=" + Id + "& type=" + "chk" ,
                   url: "addquestaTestNow.php",
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
<script type="text/javascript">
 function UnRespond(Id) {
           var strconfirm = confirm("Are you sure you want to Active?");
           if (strconfirm == true) {
               $.ajax({
                   type: "Post",
                   data:"id=" + Id + "& type=" + "unchk" ,
                   url: "addquestaTestNow.php",
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


</body>
</html>
