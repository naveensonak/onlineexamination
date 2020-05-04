<?php
$config=mysqli_connect("localhost","vivekmis_onlineexamination","onlin3@3xamination");
mysqli_select_db($config,"onlineexamination_Compile");

if (!$config)
  {
  die('Could not connect: ' . mysqli_error());
  }
?>
<?php 
function newpassword() {
  $chars = "1234567435023456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
   srand((double) microtime() * 1000000);
    $i = 0;
    $pass = '';
    while ($i <= 8) {
        $num = rand() % 33;
        $tmp = substr($chars, $num, 1);
        $pass = $pass . $tmp;
        $i++;
    }
    return $pass;
}
function encryptor($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    //pls set your unique hashing key
    $secret_key = 'muni';
	
	if(@$_SESSION['frontuserid']==''){$a='555';}else{$a=$_SESSION['frontuserid'];}
	
	
	
   $secret_iv = $a;

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    //do the encyption given text/string/number
    if( $action == 'encrypt' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' ){
    	//decrypt the given text/string/number
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}
 function setting($page) {
       $config=mysqli_connect("localhost","sunil","123456");
       mysqli_select_db($config,"onlineexamination_Compile");
       
	$sql_page="select `$page` from `site_setting` where `id`='1'";
	$query_page=mysqli_query($config,$sql_page);
	$page_result=mysqli_fetch_array($query_page);	
       return  $page_result["$page"];
} 

 function content($page) {
       $config=mysqli_connect("localhost","sunil","123456");
       mysqli_select_db($config,"onlineexamination_Compile");

	$sql_page="select `$page` from `content` where `id`='1'";
	$query_page=mysqli_query($config,$sql_page);
	$page_result=mysqli_fetch_array($query_page);	
       return  $page_result["$page"];
}

function seocontent($page,$id) {
       $config=mysqli_connect("localhost","sunil","123456");
       mysqli_select_db($config,"onlineexamination_Compile");
       if (!$config)
         {
         die('Could not connect: ' . mysqli_error());
         }
          $sql_page="select `$page` from `seo_content` where `id`='$id'";
       $query_page=mysqli_query($config,$sql_page);
       if($query_page)
       {
           $page_result=mysqli_fetch_array($query_page);	
           return  $page_result["$page"];
       }
        return null;
}

function teamdetail($page,$id) {
       $config=mysqli_connect("localhost","sunil","123456");
       mysqli_select_db($config,"onlineexamination_Compile");
	$sql_page="select `$page` from `team` where `id`='$id'";
	$query_page=mysqli_query($config,$sql_page);
	$page_result=mysqli_fetch_array($query_page);	
       return  $page_result["$page"];
}


function newsdetail($page,$id) {
       $config=mysqli_connect("localhost","sunil","123456");
       mysqli_select_db($config,"onlineexamination_Compile");
	$sql_page="select `$page` from `blog_content` where `id`='$id'";
	$query_page=mysqli_query($config,$sql_page);
	$page_result=mysqli_fetch_array($query_page);	
       return  $page_result["$page"];
}

 
function truncate($mytext) {  
//Number of characters to show  
$chars = 400;  
$mytext = substr($mytext,0,$chars);  
$mytext = substr($mytext,0,strrpos($mytext,' '));  
return $mytext;  
}
function truncate2($mytext) {  
//Number of characters to show  
$chars = 250;  
$mytext = substr($mytext,0,$chars);  
$mytext = substr($mytext,0,strrpos($mytext,' '));  
return $mytext;  
}
function truncate3($mytext) {  
//Number of characters to show  
$chars = 120;  
$mytext = substr($mytext,0,$chars);  
$mytext = substr($mytext,0,strrpos($mytext,' '));  
return $mytext;  
}

function title($id) {
	$sql_page="SELECT * FROM `sub_menu` WHERE `id`='".$id."'";
	$query_page=mysqli_query($config,$sql_page);
	$page_result=mysqli_fetch_array($query_page);	
       return  ucwords(strtolower($page_result['submenuName']));
} 

function title2($id) {
       $config=mysqli_connect("localhost","sunil","123456");
       mysqli_select_db($config,"onlineexamination_Compile");

	$sql_page="SELECT * FROM `tbl_subcategory` WHERE `id`='".$id."'";
       $query_page=mysqli_query($config,$sql_page);
	$page_result=mysqli_fetch_array($query_page);	
       return  ucwords(strtolower($page_result['subcategory']));
} 
function olymtitle($id) {
       $config=mysqli_connect("localhost","sunil","123456");
       mysqli_select_db($config,"onlineexamination_Compile");

	$sql_page="SELECT * FROM `tbl_olympiads` WHERE `id`='".$id."'";
	$query_page=mysqli_query($config,$sql_page);
	$page_result=mysqli_fetch_array($query_page);	
       return  ucwords(strtolower($page_result['category']));
} 
function getBaseUrl() 
{
	// output: /myproject/index.php
	$currentPath = $_SERVER['PHP_SELF']; 
	
	// output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
	$pathInfo = pathinfo($currentPath); 
	
	// output: localhost
	$hostName = $_SERVER['HTTP_HOST']; 
	
	// output: http://
	$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
	
	// return: http://localhost/myproject/
	return $protocol.$hostName.$pathInfo['dirname'].'/';
}
function timer($a,$b){ 
$startdate=$a; 
$diff=strtotime($startdate)-strtotime($b); 
$temp=$diff/86400;  
$days=floor($temp); echo "<span class='countdown-section'>
<span class='countdown-amount'>$days</span>
<span class='countdown-period'>Day</span>
</span>"; $temp=24*($temp-$days); 
$hours=floor($temp); echo "<span class='countdown-section'>
<span class='countdown-amount'>$hours</span>
<span class='countdown-period'>Hours</span>
</span>"; $temp=60*($temp-$hours); 
$minutes=floor($temp); echo "<span class='countdown-section'>
<span class='countdown-amount'>$minutes</span>
<span class='countdown-period'>Minutes</span>
</span>"; $temp=60*($temp-$minutes); 
$seconds=floor($temp); echo "<span class='countdown-section'>
<span class='countdown-amount'>$seconds</span>
<span class='countdown-period'>Seconds</span>
</span>"; 
}
?>   
