<?php 
ob_start();
session_start();
if($_SESSION['userid']=="")
{
	header("location:index.php");
	exit();
}
include("include/connection.php");
include('include/connect.php');

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Adminsuit | <?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Test Series</title>
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
  
$sql="SELECT * FROM `tbl_testseries` where id=$id";
$query=mysqli_query($config,$sql);
$role=mysqli_fetch_array($query);
  }
	?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1><?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Test Series</h1>
      <ol class="breadcrumb">
        <li><a href="manage_testseries.php"><i class="fa fa-dashboard"></i> Manage Test Series</a></li>
        <li class="active"><?php if(@$_GET['id']!=''){echo "Edit";}else{echo "Add";} ?> Test Series</li>
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
            
      <form id="addtestseriesform" name="formID" method="post" action="#" enctype="multipart/form-data">
      <div class="col-sm-10 col-xs-offset-1">
            <div class="box-body">
           <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="category">Select a Category<span>*</span></label>
          <select class="form-control" id="category" name="category">
          <option value="" selected>Select a Category</option>
                  <?php 
$sql_query_status11=mysqli_query($config,"select * from `tbl_category` where `status`='1'");
  while($row_query_status11=mysqli_fetch_array($sql_query_status11)) {?>
   <option <?php if(@$role['catid']==$row_query_status11['id']) {echo "selected='selected'";} ?> value="<?php echo $row_query_status11['id']?>" >
    <?php echo $row_query_status11['category']?>
  </option> <?php }	?> 
                </select>
                </div>
                </div>
                
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="subcategory">Select a Sub Category<span>*</span></label>
          <select class="form-control" id="subcategory" name="subcategory">
          <option value="" selected>Select a Sub Category</option>
             <?php $selecttype=mysqli_query($config,"SELECT * FROM `tbl_subcategory` where `catid`='".@$role['catid']."'"); 
  while($typeresult=mysqli_fetch_array($selecttype)){?>
  <option <?php if(@$role['subcatid']==$typeresult['id']) {echo "selected='selected'";} ?> value="<?php echo $typeresult['id'];?>"><?php echo $typeresult['subcategory'];?></option><?php }?>     
                </select>
                </div>
                </div>
              
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="seriesno">Series No. :<span>*</span></label>
   <input class="form-control" id="seriesno" name="seriesno" type="text" value="<?php echo @$role['seriesno'];?>" >
                </div>
                </div>
                  <div class="clearfix"></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="title">Series Name :<span>*</span></label>
   <input class="form-control" id="title" name="title" type="text" value="<?php echo @$role['seriesname'];?>" >
                </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="type">Select a Type<span>*</span></label>
          <select class="form-control" id="type" name="type" >
          <option value="" selected>Select a type</option>
          <option <?php if(@$role['type']=='free') {echo "selected='selected'";} ?>value="free">Free</option>
          <option <?php if(@$role['type']=='paid') {echo "selected='selected'";} ?>value="paid">Paid</option>
                  
                </select>
                </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="test">No of Test :<span>*</span></label>
   <input class="form-control" id="test" name="test" type="text" value="<?php echo @$role['nooftest'];?>" >
                </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="price">Price :<span>*</span></label>
   <input class="form-control" id="price" name="price" type="text" <?php if(@$role['type']=='free'){echo"readonly";}else{}?> value="<?php echo @$role['price'];?>" >
                </div>
                </div>
                
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="images">Images <span>*</span></label>
         <input  id="imagess" name="images" type="file" value="" >
         <span style="color:#f00;">images Size(850x460)</span>
                </div>
                </div>
                
               <div class="clearfix"></div>
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="detail">Short Description :<small class="red_txt">[Max 150 character]</small></label>
<textarea name="shortdes" id="shortdes"  class="form-control" maxlength="150"><?php echo @$role['shortdes'];?></textarea>
              </div>
                </div>
<div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="detail">Chapter/Topic Covered :<small class="red_txt">[Please use comma(,) for more than 1 chapter]</small></label>
<textarea name="topic" id="topic"  class="form-control"><?php echo @$role['topic'];?></textarea>
              </div>
                </div>
                <div class="clearfix"></div>
                              
                <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="shortdescription">Description :</label>
 <textarea id="detail" name="detail" class="ckeditor"><?php echo @$role['description'];?></textarea>
                </div>
                </div> 
            <div class="col-md-12 col-sm-6 col-xs-12">
                  <div class="form-group">
                  <label for="detail">FAQ :</label>
<textarea name="faq" id="faq"  class="ckeditor"><?php echo @$role['faq'];?></textarea>
              </div>
                </div> 
             <div class="clearfix"></div> 
             <input  id="editid" name="editid" type="hidden" value="<?php echo @$role['id'];?>" >
              <div class="form-group">
              <div class="text-center">
               <button type="reset" class="btn btn-default" onClick="location.href='manage_testseries.php'">Cancel</button> 
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
<script type="text/javascript" src="js/add_testseries.js"></script>
<script>
 
$(document).ready(function () {
$("#category").change(function()
{ 
  debugger; 
var id=$(this).val(); 
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
<script type="text/javascript">
		CKEDITOR.replace( 'faq',
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
