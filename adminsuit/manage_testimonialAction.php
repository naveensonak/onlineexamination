<?php
include('include/connect.php');

{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `testimonials` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
$time=date( 'Y-m-d H:i:s' );
 $sqlA = "Update `testimonials` set status = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
	}
	
	
	
else if($_POST['type']=='delete'){	
@$id=$_POST['id'];

$result = "SELECT `mat` FROM `testimonials` where `id`in($id)";   
$ress_details=mysqli_query($config,$result);
		$numfeat=mysqli_num_rows($ress_details);

		if($numfeat>'0')
{
	while($rowfeat=mysqli_fetch_array($ress_details))
		{
 $filename=$rowfeat['mat'];
unlink( '../'.$filename);
		}}
$sqlDel = "Delete from `testimonials` where `id` in ($id) ";
$queryDel=mysqli_query($config,$sqlDel);
if($queryDel){ echo "1";}else{ echo "0";}
}
	
	}

?>