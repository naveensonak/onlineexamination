<?php
include("include/connection.php");
$userid=$_POST['userid'];
$testid=$_POST['testid'];
$attempted=$_POST['numberOfCheckedRadio'];

$response = array();
if($userid!='' || $testid!=''|| $attempted!=''){
	
$radio=explode(',',$_POST['CheckedRadio']);
$sql_setting=mysql_query("select * from `tbl_test` where `id`='".$testid."' and `status`='1'");
   $result_setting=mysql_fetch_array($sql_setting);
$totalquestion=$result_setting['totalquestion'];
$markspercorrectquestion=$result_setting['markspercorrectquestion'];
$marksperwrongquestion=$result_setting['marksperwrongquestion'];
$fullmarks=$result_setting['maximummarks'];
$marks_per_ques=$markspercorrectquestion;

$questionsql=mysql_query("SELECT * FROM `tbl_question` where `testid`='".$testid."' and `status`='1'");
		while($questionsqlrow = mysql_fetch_array( $questionsql )) {
		$answer[] = $questionsqlrow["answer"].$questionsqlrow["id"];
        $id = $questionsqlrow["id"];
		}
		
$count = count(array_intersect($radio, $answer));		
$rightanswer=$count*$marks_per_ques;
$Wronganswer=$attempted-$count;
$finalwrongscore=$Wronganswer*$marksperwrongquestion;
$Finalrightanswer=$rightanswer-$finalwrongscore;


$saveresult=mysql_query("INSERT INTO `tbl_result` (`userid`, `testid`,`totalright`, `totalscore`, `attempted`, `wrongans`) VALUES ('".$userid."', '".$testid."','".$count."', '".$Finalrightanswer."', '".$attempted."', '".$Wronganswer."')");
if ($saveresult) {
	
$event_sql2=mysql_query("select *,(SELECT `code` FROM `tbl_test` WHERE `id`=`tbl_result`.`testid`)as testname,(SELECT `maximummarks` FROM `tbl_test` WHERE `id`=`tbl_result`.`testid`)as fullmarks from `tbl_result` where `userid`='".$userid."' and `testid`='".$testid."'");
($event_result2=mysql_fetch_array($event_sql2));

	
$response["statusCode"] = 200;
$response["data"]['Testid']=$event_result2['testid'];
$response["data"]['TestBookletcode']=$event_result2['testname'];
$response["data"]['TotalScore']=$event_result2['totalscore'];
$response["data"]['FullMarks']=$event_result2['fullmarks'];
$response["data"]['TotalAttempted']=$event_result2['attempted'];
$response["data"]['WrongAnswer']=$event_result2['wrongans'];

//=================================================================================
//=================================================================================


$response["data"]["message"] = "Quiz Submitted Successfully";
echo json_encode($response);

}else{ $response["statusCode"] = 501;
$response["data"]["message"] = "Technical Error";

echo json_encode($response);
}

}else{
	
$response["statusCode"] = 400;		
$response["data"]["message"] = "Bad request !";
	echo json_encode($response);

	}
?>