<?php
include('include/connect.php');

if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `contact_form` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `contact_form` set status = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
	}
	
	
	
else if($_POST['type']=='delete'){	
@$id=$_POST['id'];
$sqlDel = "Delete from `contact_form` where `id` in ($id) ";
$queryDel=mysqli_query($config,$sqlDel);
if($queryDel){ echo "1";}else{ echo "0";}
}
else if($_POST['type']=='viewowner'){
	@$id=$_POST['id'];
$selectowner=mysqli_query($config,"SELECT * FROM `contact_form` where `id`='".$id."'");
	$ownerresult=mysqli_fetch_array($selectowner);
	$name=$ownerresult['name'];
	$email=$ownerresult['email'];
	//$mobile=$ownerresult['mobile'];
	$subject=$ownerresult['subject'];
	$message=$ownerresult['message'];
	
	  $post_date = $ownerresult['date'];
 $post_date2 = strtotime($post_date);
  $convert=date('d-m-Y',$post_date2);

	echo"<div class='modal-content'>
              <div class='modal-header panel-heading'>
          <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
                <h4 class='modal-title text-center'>Contact Detail</h4>
              </div>
              <div class='modal-body'>
                  <div class='form-group'>
				  <div class='table-responsive'>
                  <table class='table table-bordered table-hover'>
                     <thead >
					 <tr><th>Name</th><td>$name</td></tr> 
                      <tr><th>Email</th><td>$email</td></tr>
                       
                        <tr><th>Subject</th><td>$subject</td></tr>
						<tr><th>Date</th><td>$convert</td></tr>
						<tr><th>Message</th><td>$message</td></tr>
						
                           </tr>
                          </thead></table>
                       ";
	}
	
	}

?>