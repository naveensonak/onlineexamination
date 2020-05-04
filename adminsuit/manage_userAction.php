<?php
include('include/connect.php');
include('include/connection.php');

if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `user` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `user` set status = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
	}
		
else if($_POST['type']=='delete'){	
@$id=$_POST['id'];
$result = "SELECT `photo` FROM `user` where `id`in($id)";   
$ress_details=mysqli_query($config,$result);
		$numfeat=mysqli_num_rows($ress_details);

		if($numfeat>'0')
{
	while($rowfeat=mysqli_fetch_array($ress_details))
		{
 $filename=$rowfeat['photo'];
@unlink( '../'.$filename);
		}}
$sqlDel = "Delete from `user` where `id` in ($id) ";
$queryDel=mysqli_query($config,$sqlDel);
if($queryDel){ echo "1";}else{ echo "0";}
}
else if($_POST['type']=='viewowner'){
	@$id=$_POST['id'];
$selectowner=mysqli_query($config,"select * from `user` where `id`='".$id."'");
	$ownerresult=mysqli_fetch_array($selectowner);
	$name=$ownerresult['name'];
	$email=$ownerresult['email'];
	$mobile=$ownerresult['mobile'].' , '.$ownerresult['amobile'];
	$dob=$ownerresult['dob'];
	$class=$ownerresult['class'];
	$school=$ownerresult['school'];
	$address=$ownerresult['address'];
	$gender=ucfirst($ownerresult['gender']);
 
  $post_date = $ownerresult['create_date'];
 $post_date2 = strtotime($post_date);
  $convert=date('d-m-Y/ H:i',$post_date2);
 
	
	if($ownerresult['photo']==''){$photo='images/user.png';}else{$photo='../'.$ownerresult['photo'];}
	echo"<div class='modal-content'>
              <div class='modal-header panel-heading'>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title text-center'>User Detail</h4>
              </div>
              <div class='modal-body'>
                  <div class='form-group'>
				  <div class='table-responsive'>
                  <table class='table table-bordered table-hover'>
                     <thead >
<tr><td colspan='2' align='center'><center><img class='img-circle img-bordered-sm' src='$photo' width='50' height=50''></center>
<b>$name</b></td>

</tr>
                      <tr><th>Email</th><td>$email</td></tr>
                       <tr><th>Mobile</th><td>$mobile</td></tr>
                        <tr><th>DOB </th><td>$dob</td></tr>
						<tr><th>Gender</th><td>$gender</td></tr>
						<tr><th>Class</th><td>$class</td></tr>
						<tr><th>School</th><td>$school</td></tr>
						<tr><th>Address</th><td>$address</td></tr>
						<tr><th>Registration Date</th><td>$convert</td></tr>
						
                           </tr>
                          </thead></table>
                       ";
	}
	
	}

?>