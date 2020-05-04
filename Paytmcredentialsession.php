<?php 
//include("include/connection.php");
include('include/connect.php');
@$type=$_POST['type'];
@$userId=$_POST['userId'];
@$productId=$_POST['productId'];
@$amount=$_POST['amount'];
@$transactionId=$_POST['transactionId'];

if($type!='')
{


session_start();
unset($_SESSION["type"]);
unset($_SESSION["userId"]);
unset($_SESSION["productId"]);
unset($_SESSION["amount"]);
unset($_SESSION["transactionId"]);

  $_SESSION["type"] = $type;
  $_SESSION["userId"] = $userId;
  $_SESSION["productId"] = $productId;
  $_SESSION["amount"] = $amount;
  $_SESSION["transactionId"] = $transactionId;
  
  echo"1"; 

}else{echo"0";}
	?>