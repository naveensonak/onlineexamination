<?php
include('include/connect.php');
//include('include/connection.php');
function newname() {
    $chars = "abcdefghijkmnopqrstuvwxyz023456789";
    srand((double) microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= 5) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}
    $rname=mysqli_real_escape_string($config,$_POST['rname']);
	$remail=mysqli_real_escape_string($config,$_POST['remail']);
	$rcomment=mysqli_real_escape_string($config,$_POST['rcomment']);
	
$title_new=str_replace("&","And",$rname);
$newtitle=$title_new;
$urltitle=preg_replace('/[^a-z0-9]/i',' ', $newtitle);
$newurltitle=str_replace(" ","-",$newtitle);
$url= strtolower($newurltitle);
	
$filename=$_FILES['photo']['name'];

     $eft = (explode(".", $filename));
    $ext = end($eft);
    
$random_digit=newname();
$new_file_name1=$url.'-'.$random_digit.".".$ext;

$filesize=$_FILES['photo']['size'];
$path=$_FILES['photo']['tmp_name'];

$des1="testimonial/$new_file_name1";
 $des="testimonial/$new_file_name1";

if(move_uploaded_file($path,$des1))	
		{}
	
$sql= mysqli_query($config,"INSERT INTO `testimonials`(`title`,`email`,`text`,`mat`,`status`) VALUES ('". $rname ."','". $remail ."','".$rcomment."','".$des."','0')");
$insertuserid=mysqli_insert_id($config);

if($sql){echo"1";}else{echo"0";}


?>