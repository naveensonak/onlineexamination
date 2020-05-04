<?php
$email='sourabhprakash.1984@gmail.com';
$username='sss';
$useremail='ddd';
$PersonName='sourabh';
$random_password='ABC12345';
$email_subject1='Share Drive Password Reset Request';
$textreg2="test";

		  $subject = "$email_subject1";
          $headers = 'MIME-Version: 1.0' . "\r\n";
          $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
		 "From:   admin@vinspirer.com". "\r\n";
         $confirm = mail($email, $email_subject1, $textreg2,$headers);
if($confirm){echo"1";}else{echo"0";}

?>