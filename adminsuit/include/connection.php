<?php 

$config=mysqli_connect("localhost","root","");
mysqli_select_db($config,"onlineexamination");    
    // For Production
// $config=mysqli_connect("localhost","vivekmis_onlineexamination","onlin3@3xamination");
// mysqli_select_db($config,"vivekmis_onlineexamination_Compile");

?>
<?php
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
function encryptor($action, $string) {
    $output = false;

    $encrypt_method = "AES-256-CBC";
    //pls set your unique hashing key
    $secret_key = 'muni';
    $secret_iv = 'muni123';

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

//chk permission page==================================
function chpermission($actionurl){
    include("connect.php");
$session_roles=$_SESSION['role_id'];
$urll =$actionurl ;
$chkurls=mysqli_query($config,"select `c_id` from `secondchild_menu` where `url`='".$urll."' and `status`='1'");
$chkurls_result=mysqli_fetch_array($chkurls);
$chk= $chkurls_result['c_id'];
$valurls=mysqli_query($config,"SELECT * FROM `task` where `role_id`='".$session_roles."' And task  like '%$chk%' and `status`='1'");
$vals_row=mysqli_num_rows($valurls);
if($vals_row=='0'){
header("location:404.php");
} 
}//chk permission page end==================================

?>