<?php
//include ("include/connection.php"); 
include('include/connect.php');
$title=mysqli_real_escape_string($config,$_POST['code']);
$filename=$_FILES['file']['name'];
	$ext = end(explode(".", $filename));
$random_digit=newname();
$new_file_name1=$title.'-'.$random_digit.".".$ext;
    $filesize=$_FILES['file']['size'];
    $path=$_FILES['file']['tmp_name'];
$des1="../mis/$new_file_name1";
 $des="mis/$new_file_name1";

if(move_uploaded_file($path,$des1))	
		{}
$sql= mysqli_query($config,"INSERT INTO `mis`(material,text,status) VALUES ('". $des ."','".$title."','1')");		
$final_array=array("url"=>'http://onlineexamination.in/'.$des);	
echo str_replace('\/','/',json_encode($final_array));

?>