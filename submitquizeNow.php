<?php 
include('include/connect.php');
//include("include/connection.php");

$userid=$_POST['userid'];
$testid=$_POST['testid'];
$orderid=$_POST['orderid'];
$attempted=$_POST['numberOfCheckedRadio'];
//echo $_POST['radio'];
$radio=explode('~',$_POST['radio']);

// $qury="select * from `tbl_test` where `id`='".$testid."' and `status`='1'";
// echo $qury;
// die();

$sql_setting=mysqli_query($config,"select * from `tbl_test` where `id`='".$testid."' and `status`='1'");
   $result_setting=mysqli_fetch_array($sql_setting);
$totalquestion=$result_setting['totalquestion'];
$markspercorrectquestion=$result_setting['markspercorrectquestion'];
$marksperwrongquestion=$result_setting['marksperwrongquestion'];
$fullmarks=$result_setting['maximummarks'];
$marks_per_ques=$markspercorrectquestion;

// $qury="SELECT * FROM `tbl_question` where `testid`='".$testid."' and `status`='1'";
// echo $qury;

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

// $qury="INSERT INTO `tbl_result` (`userid`, `testid`,`totalright`, `totalscore`, `attempted`, `wrongans`) VALUES ('".$userid."', '".$testid."','".$count."', '".$Finalrightanswer."', '".$attempted."', '".$Wronganswer."')";


// $qury="INSERT INTO `tbl_questaresult` (`orderid`,`userid`, `testid`,`totalright`, `totalscore`, `attempted`, `wrongans`) VALUES ('".$orderid."','".$userid."', '".$testid."','".$count."', '".$Finalrightanswer."', '".$attempted."', '".$Wronganswer."')";

//  echo $qury;
$saveresult=mysqli_query($config,"INSERT INTO `tbl_questaresult` (`orderid`,`userid`, `testid`,`totalright`, `totalscore`, `attempted`, `wrongans`) VALUES ('".$orderid."','".$userid."', '".$testid."','".$count."', '".$Finalrightanswer."', '".$attempted."', '".$Wronganswer."')");
if($saveresult){ echo "1";}
?>