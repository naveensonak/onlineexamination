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
if(isset($_POST['Action'])){
		@$id=$_POST['id'];

	$title=mysqli_real_escape_string($config,$_POST['title']);
	$email=mysqli_real_escape_string($config,$_POST['email']);
	$shortdescription=mysqli_real_escape_string($config,$_POST['shortdescription']);
$heading_new=str_replace("&","And",$title);
$heading_new1=str_replace("(","",$heading_new);
$heading_new2=str_replace(")","",$heading_new1);
$newtitle=$heading_new2;
$urltitle=preg_replace('/[^a-z0-9]/i',' ', $newtitle);
$newurltitle=str_replace(" ","-",$newtitle);
$newurltitle2=str_replace(".","",$newurltitle);
$url=strtolower($newurltitle2);

	$time=date( 'M jS, Y / H:i A' );	
	$default_status=1;
	if(isset($_POST['Action'])=="Add"){
	
	$filename=$_FILES['images']['name'];
	$ext = end(explode(".", $filename));
$random_digit=newname();
$new_file_name1=$url.'-'.$random_digit.".".$ext;
		if($filename!=''){
    $filesize=$_FILES['images']['size'];
    $path=$_FILES['images']['tmp_name'];

$des1="../testimonial/$new_file_name1";
 $des="testimonial/$new_file_name1";

if(move_uploaded_file($path,$des1))	
		{}

$sql= "INSERT INTO `testimonials`(`title`,`email`,`text`,`mat`,`status`) VALUES ('".$title."','". $email ."','". $shortdescription ."','".$des."','1')";
$query=mysqli_query($config,$sql);
if($query){
	header("location:add_testimonial.php?msg=updt");
	}exit();
	
	
		}
	} 
		
}
	?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Adminsuit | <?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Testimonial</title>
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

 ?>
   
  <?php 
  include("include/connect.php");
  if(@$id=encryptor('decrypt', $_GET['id'])){
$sql="SELECT * FROM `admin` where id=$id";
$query=mysqli_query($config,$sql);
$role=mysqli_fetch_array($query);
  }
	?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1><?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Testimonial</h1>
      <ol class="breadcrumb">
        <li><a href="manage_testimonial.php"><i class="fa fa-dashboard"></i> Manage Testimonial</a></li>
        <li class="active"><?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Blog</li>
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
            
      <form id="addblog" name="formID" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
      <div class="col-sm-10 col-xs-offset-1">
            <div class="box-body">
           
                <div class="clearfix"></div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="title">Name<span>*</span></label>
   <input class="form-control" id="title" name="title" type="text" value="" required>
                </div>
                </div>
                <div class="col-md-5 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="email">Email<span>*</span></label>
   <input class="form-control" id="email" name="email" type="text" value="" required>
                </div>
                </div>  
    
                <div class="col-md-2 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="images">Images <span>*</span></label>
         <input  id="images" name="images" type="file" value="" required>
         <span style="color:#f00;">images Size(100x100)</span>
                </div>
                </div>
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="shortdescription">Testimonial <span>Max 300 character</span></label>
 <textarea id="shortdescription" name="shortdescription" class="form-control" maxlength="300"></textarea>
                </div>
                </div> 
                                
             <div class="clearfix"></div> 
             
              <div class="form-group">
              <div class="text-center">
  <button type="reset" class="btn btn-default" onClick="location.href='manage_testimonial.php'">Cancel</button>
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
		
		
			
	</script>

 

</body>
</html>
