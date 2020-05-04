<?php 
ob_start();
session_start();
if($_SESSION['userid']=="")
{
	header("location:index.php");
	exit();
}
include("include/connection.php");
include('include/connect.php');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Adminsuit | <?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Test </title>
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
  
  if(@$id=encryptor('decrypt', $_GET['id'])){
    include('include/connect.php');
$sql="SELECT * FROM `tbl_test` where id=$id";
$query=mysqli_query($config,$sql);
$role=mysqli_fetch_array($query);
  }
	?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1><?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Test </h1>
      <ol class="breadcrumb">
    <li><a href="manage_test.php"><i class="fa fa-dashboard"></i> Manage Test </a></li>
        <li class="active"><?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Test </li>
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
            
      <form id="addtestform" name="formID" method="post" action="#" enctype="multipart/form-data">
      <div class="col-sm-10 col-xs-offset-1">
            <div class="box-body">
           <div class="col-md-6 col-sm-6 col-xs-12">
         
                  <div class="form-group">
                  <label for="series">Select a Test Series<span>*</span></label>
          <select class="form-control select2" id="series" name="series">
          <option value="" selected>Select a Test Series</option>
                  <?php 
$sql_query_status11=mysqli_query($config,"select * from `tbl_testseries` where `status`='1'");
  while($row_query_status11=mysqli_fetch_array($sql_query_status11)) {?>
   <option <?php if(@$role['seriesid']==$row_query_status11['id']) {echo "selected='selected'";} ?> value="<?php echo $row_query_status11['id']?>" >
    <?php echo $row_query_status11['seriesname'].'/'.$row_query_status11['seriesno']?>
  </option> <?php }	?> 
                </select>
                </div>
                </div>
                
                
              
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="code">Test Booklet Code :<span>*</span></label>
   <input class="form-control" id="code" name="code" type="text" value="<?php echo @$role['code'];?>" >
                </div>
                </div>
                  
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="totalquestion">Total No of Question :<span>*</span></label>
<input class="form-control" id="totalquestion" name="totalquestion" type="text" value="<?php echo @$role['totalquestion'];?>" >
                </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group">
  <label for="markspercorrectquestion">Correct Answer Marks per Question :<span>*</span></label>
<input class="form-control" id="markspercorrectquestion" name="markspercorrectquestion" type="text" value="<?php echo @$role['markspercorrectquestion'];?>" >
                </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="marksperwrongquestion">Wrong Answer marks per question :<span>*</span></label>
<input class="form-control" id="marksperwrongquestion" name="marksperwrongquestion" type="text" value="<?php echo @$role['marksperwrongquestion'];?>" >
                </div>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="maximummarks">Maximum Marks  :<span>*</span></label>
<input class="form-control" id="maximummarks" name="maximummarks" type="text" value="<?php echo @$role['maximummarks'];?>" >
                </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="duration">Duration :<span>*</span></label>
<input class="form-control" id="duration" name="duration" type="text" value="<?php echo @$role['duration'];?>" >
                </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="type">Select a Type<span>*</span></label>
          <select class="form-control" id="type" name="type" >
          <option value="" selected>Select a type</option>
          <option value="demo" <?php if(@$role['type']=='demo') {echo "selected='selected'";} ?>>Demo Test</option>
          <option value="normal" <?php if(@$role['type']=='normal') {echo "selected='selected'";} ?>>Normal Test</option>
                  
                </select>
                </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="form-group">
                  <label for="detail">Chapter/Topic Covered :<small class="red_txt">[Please use comma(,) for more than 1]</small></label>
<input class="form-control" id="topic" name="topic" type="text" value="<?php echo @$role['topic'];?>" >
              </div></div>
                <div class="clearfix"></div>
                              
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="shortdescription">Introduction :</label>
 <textarea id="detail" name="detail" class="ckeditor"><?php echo @$role['introduction'];?></textarea>
                </div>
                </div> 
             
             <div class="clearfix"></div> 
             <input  id="editid" name="editid" type="hidden" value="<?php echo @$role['id'];?>" >
              <div class="form-group">
              <div class="text-center">
 
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
<script type="text/javascript" src="js/add_test.js"></script>
<script>
$(document).ready(function () {
$("#category").change(function()
{ 
var id=$(this).val();
alert(id); 
var dataString = 'id='+ id;


$.ajax
({
type: "POST",
url: "ajax_subcategory.php",
data: dataString,
cache: false,
success: function(html)
{
	 //alert(html);

$("#subcategory").html(html);
} 
});
});
$("#type").change(function()
{ 
var id=$(this).val();
if(id=="free"){
document.getElementById('price').value = '0';
$('#price').attr('readonly','readonly');	
		}else{
	document.getElementById('price').value = '';
$('#price').removeAttr('readonly','readonly');	
}
});

});

</script>
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
