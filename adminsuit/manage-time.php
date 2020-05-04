<?php 
ob_start();
session_start();
if($_SESSION['userid']=="")
{
	header("location:index.php?msg1=notauthorized");
	exit();
}
	
//include ("include/connection.php");
include('include/connect.php');

if(isset($_POST['submit'])=='Submit'){
  
  include('include/connect.php');
	$short=mysqli_real_escape_string($config,$_POST['short']);
	$content=mysqli_real_escape_string($config,$_POST['content']);
	$title=mysqli_real_escape_string($config,$_POST['title']);
	$tag=mysqli_real_escape_string($config,$_POST['tag']);
	$metadescription=mysqli_real_escape_string($config,$_POST['metadescription']);
$sql= "UPDATE `seo_content` SET `shortdes`='$short',`content` = '$content',`title`='$title',`tag`='$tag',`metadescription`='$metadescription' WHERE `id`= '4'";
$query=mysqli_query($config,$sql);
if($query){
	
	header("location:manage-time.php?msg=updt");
	
	}

	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Adminsuit | Manage Time Effectively</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
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
<link rel="stylesheet" type="text/css" href="css/jquery.multiselect.css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
<script src="plugins/jQuery/jQuery-2.2.0.min.js"></script>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
<?php include('include/connect.php');//include ("include/header.inc.php");?>
 <?php include("include/navigation.inc.php");
 $sql="select* FROM `seo_content` WHERE id='4'";
$query=mysqli_query($config,$sql);
$role=mysqli_fetch_array($query);

 ?> 
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Manage Time Effectively</h1>
      <ol class="breadcrumb">
        <li><a href="desktop.php"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="active">Manage Time Effectively</li>
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
          
      <form id="formID" name="formID" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
            <div class="box-body">
<div class="clearfix"></div>
<div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="short">Short Description <small style="color:#f00;">[Max Chracter 110]</small></label>
 <textarea id="short" name="short" class="form-control" maxlength="110" style="height:50px; resize:none;" required><?php echo @$role["shortdes"]; ?></textarea>
                </div>
                </div>
<div class="col-md-12 col-sm-6 col-xs-12">
<div class="form-group">

<label for="content">Manage Time Effectively</label>
<textarea id="content" class="ckeditor" name="content"><?php echo @$role["content"]; ?></textarea>
</div></div>
<div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="title">Title </label>
 <textarea id="title" name="title" class="form-control"><?php echo @$role["title"]; ?></textarea>
                </div>
                </div>
                
    <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="tag">Meta Keywords </label>
 <textarea id="tag" name="tag" class="form-control"><?php echo @$role["tag"]; ?></textarea>
                </div>
                </div>            
   <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="metadescription">Meta Description </label>
 <textarea id="metadescription" name="metadescription" class="form-control"><?php echo @$role["metadescription"]; ?></textarea>
                </div>
                </div>             
             <div class="clearfix"></div>   
              <div class="form-group">
              <div class="text-center">
  
 <input type="submit" class="btn btn-primary" value="Submit"  name="submit" ></div>
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
  
<?php include("include/footer.inc.php"); ?></div>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckeditor/adapters/jquery.js"></script>
<script type="text/javascript">
		CKEDITOR.replace( 'content',
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
		
		
			
	</script>
</body>
</html>
