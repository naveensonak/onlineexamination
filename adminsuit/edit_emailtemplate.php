<?php 
ob_start();
session_start();
if($_SESSION['userid']=="")
{
	header("location:index.php");
	exit();
}
//include("include/connection.php");
include('include/connect.php');

if(isset($_POST['Action'])){
		
	$title=mysqli_real_escape_string($config,$_POST['title']);
	$detail=mysqli_real_escape_string($config,$_POST['detail']);
	@$id=$_POST['editid'];

	$time=date( 'M jS, Y / H:i A' );	
	$default_status=1;		
if($_POST['Action']=='Edit'){

 $sql2= "UPDATE `mailer` SET `subject`='".$title."',`mail_body`='".$detail."' WHERE `id`='$id'";
	
$query2=mysqli_query($config,$sql2);

if($query2){
	
		header("location:manage_emailTemplate.php?msg=updt");

	
	}
	
	
}}

	
	
	?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Adminsuit | <?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Email Template</title>
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
  chpermission($qwerty);?>
   
  <?php 
  if(@$id=encryptor('decrypt', $_GET['id'])){
$sql="SELECT * FROM `mailer` where id=$id";
$query=mysqli_query($config,$sql);
$role=mysqli_fetch_array($query);}?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1><?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Email Template</h1>
      <ol class="breadcrumb">
        <li><a href="manage_emailTemplate.php"><i class="fa fa-dashboard"></i> Manage Email Template</a></li>
        <li class="active"><?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Email Template</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">
            <div class="box-header box-header2">
             <div class="col-sm-10">
         <h3 class="box-title">
		 <?php 
				if((@$_GET['msg'])=="ins") 
				{ ?>
              <font size="+2" color="#FF0000">Update Successfully......</font>
              <?php  } ?></h3></div>
              
            </div>
            <!-- /.box-header -->
            
      <form  method="post" action="#" id="editteam" class="editteam" autocomplete="off" enctype="multipart/form-data"><div class="col-sm-10 col-xs-offset-1">
            <div class="box-body">
           
                <div class="clearfix"></div>
                
              
                <div class="col-md-8 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="title">Title<span>*</span></label>
   <input class="form-control" id="title" name="title" type="text" value="<?php echo @$role['subject']; ?>" required>
                </div>
                </div>
                  
            <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="detail">Blog Full Description </label>
<textarea name="detail" id="detail"  class="ckeditor"><?php echo @$role['mail_body']; ?></textarea>
              </div>
                </div> 
  <input name="editid" id="editid" value="<?php echo @$role['id']; ?>" type="hidden">
                                      
             <div class="clearfix"></div> 
             
              <div class="form-group">
              <div class="text-center">
  
 <input type="submit" id="addinstructor" name="Action" class="btn btn-primary" value="<?php if(@$id != ''){echo 'Edit';}else{echo 'Add';}?>"  ></div>
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
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
		CKEDITOR.replace( 'detail',
				{
				fontSize_sizes : "8/80%;9/90%;10/100%;12/120%;14/135%;16/160%;18/180%;20/200%;24/240%;26/260%;28/280%;36/360%;48/480%;72/650%;",
					toolbar :
					[
						['Source','Undo','Redo','Table'],
						['Bold', 'Italic','Underline'],
						['JustifyLeft','-','JustifyCenter'],
						['JustifyRight','-','JustifyBlock'],
['NumberedList','BulletedList','-','Blockquote','-','Outdent','Indent'],
					['Link', 'Unlink', 'Image', '-','SpecialChar'],
					['Find','-','SelectAll','RemoveFormat'],
						
				['Styles','Format','Font','FontSize' ],['TextColor'],
					],
					// Strip CKEditor smileys to those commonly used in BBCode.	
			//uiColor: 'orange'		
		} );
		
		
			
	</script></body>
</html>
