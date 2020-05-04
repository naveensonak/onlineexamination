<?php
include('include/connect.php');

if(isset($_POST['type']))
{
	if($_POST['type']=='chk'){

	 $sqlA = "Update `team` set status = '0' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
}else if($_POST['type']=='unchk') 
{
 $sqlA = "Update `team` set status = '1' where `id`='".$_POST['id']."' ";
			mysqli_query($config,$sqlA);
	}
	
	
	
else if($_POST['type']=='delete'){	
@$id=$_POST['id'];

$result = "SELECT `material` FROM `team` where `id`in($id)";   
$ress_details=mysqli_query($config,$result);
		$numfeat=mysqli_num_rows($ress_details);

		if($numfeat>'0')
{
	while($rowfeat=mysqli_fetch_array($ress_details))
		{
 $filename=$rowfeat['material'];
unlink( '../'.$filename);
		}}
$sqlDel = "Delete from `team` where `id` in ($id) ";
$queryDel=mysqli_query($config,$sqlDel);
if($queryDel){ echo "1";}else{ echo "0";}
}
	
	}

?>