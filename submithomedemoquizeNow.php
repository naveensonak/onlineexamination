<?php 
ob_start();
session_start();
include('include/connect.php');
include("include/connection.php");
$userid=$_POST['userid'];
$testid=$_POST['testid'];
$attempted=$_POST['numberOfCheckedRadio'];
//echo $_POST['radio'];
$radio=explode('~',$_POST['radio']);
$sql_setting=mysqli_query($config,"select * from `tbl_demotest` where `id`='".$testid."' and `status`='1'");
   $result_setting=mysqli_fetch_array($sql_setting);
$totalquestion=$result_setting['totalquestion'];
$markspercorrectquestion=$result_setting['markspercorrectquestion'];
$marksperwrongquestion=$result_setting['marksperwrongquestion'];
$fullmarks=$result_setting['maximummarks'];
$marks_per_ques=$markspercorrectquestion;

$questionsql=mysqli_query($config,"SELECT * FROM `tbl_demotestquestion` where `testid`='".$testid."' and `status`='1'");
		while($questionsqlrow = mysqli_fetch_array( $questionsql )) {
		$answer[] = $questionsqlrow["answer"].$questionsqlrow["id"];
        $id = $questionsqlrow["id"];
		}
		
$count = count(array_intersect($radio, $answer));		
$rightanswer=$count*$marks_per_ques;
$Wronganswer=$attempted-$count;
$finalwrongscore=$Wronganswer*$marksperwrongquestion;
$Finalrightanswer=$rightanswer-$finalwrongscore;

echo $result=$testid.'~'.$count.'~'.$Finalrightanswer.'~'.$attempted.'~'.$Wronganswer;
$cookie_name = "demotestHome";
$cookie_value = $result;
//setcookie($cookie_name, $cookie_value, time() +60*60*24*365); // 86400 = 1 day
setcookie("demotestHome", $result, time()+3600,'/') or die('unable to create cookie'); 

?>