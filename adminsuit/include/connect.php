<?php
 $config=mysqli_connect("localhost","root","");
mysqli_select_db($config,"onlineexamination");

 // For Production
// $config=mysqli_connect("localhost","vivekmis_onlineexamination","onlin3@3xamination");
// mysqli_select_db($config,"vivekmis_onlineexamination_Compile");

if (!$config)
  {
  die('Could not connect: ' . mysqli_error($config));
  }
?>