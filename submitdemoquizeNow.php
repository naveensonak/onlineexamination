<?php 
include('include/connect.php');
//include("include/connection.php");
$userid=$_POST['userid'];
$testid=$_POST['testid'];
$attempted=$_POST['numberOfCheckedRadio'];
//echo $_POST['radio'];
$radio=explode('~',$_POST['radio']);
$sql_setting=mysqli_query($config,"select * from `tbl_test` where `id`='".$testid."' and `status`='1'");
   $result_setting=mysqli_fetch_array($sql_setting);
$totalquestion=$result_setting['totalquestion'];
$markspercorrectquestion=$result_setting['markspercorrectquestion'];
$marksperwrongquestion=$result_setting['marksperwrongquestion'];
$fullmarks=$result_setting['maximummarks'];
$marks_per_ques=$markspercorrectquestion;

$questionsql=mysqli_query($config,"SELECT * FROM `tbl_question` where `testid`='".$testid."' and `status`='1'");
		while($questionsqlrow = mysqli_fetch_array( $questionsql )) {
		$answer[] = $questionsqlrow["answer"].$questionsqlrow["id"];
        $id = $questionsqlrow["id"];
		}
		
$count = count(array_intersect($radio, $answer));		
$rightanswer=$count*$marks_per_ques;
$Wronganswer=$attempted-$count;
$finalwrongscore=$Wronganswer*$marksperwrongquestion;
$Finalrightanswer=$rightanswer-$finalwrongscore;


$saveresult=mysqli_query($config,"INSERT INTO `tbl_demoresult` (`userid`, `testid`,`totalright`, `totalscore`, `attempted`, `wrongans`) VALUES ('".$userid."', '".$testid."','".$count."', '".$Finalrightanswer."', '".$attempted."', '".$Wronganswer."')");
if($saveresult){ echo "1";}
?>