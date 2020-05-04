<?php
function random ($type = 'sha1', $len = 20)
{
        if (phpversion() >= 4.2) mt_srand();
        else
            mt_srand(hexdec(substr(md5(microtime()), - $len)) & 0x7fffffff);

    switch ($type) {
        case 'basic':
            return mt_rand();
            break;
        case 'alpha':
        case 'numeric':
        case 'nozero':
            switch ($type) {
                case 'alpha':
                    $param = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    break;
                case 'numeric':
                    $param = '0123456789';
                    break;
                case 'nozero':
                    $param = '123456789';
                    break;
            }
            $str = '';
            for ($i = 0; $i < $len; $i ++) {
                $str .= substr($param, mt_rand(0, strlen($param) - 1), 1);
            }
            return $str;
            break;
        case 'md5':
            return md5(uniqid(mt_rand(), TRUE));
            break;
        case 'sha1':
            return sha1(uniqid(mt_rand(), TRUE));
            break;
    }
}
function getyojnaUserRank($userId,$testid){
    include("connection.php");
    include("connect.php");
   $sql     =  "SELECT * FROM yojnaquizeattempted where `testid`='".$testid."' ORDER BY totalscore DESC";
   $result =  mysqli_query($config,$sql);
   $rows  =  '';
 
   $data = array();
   if (!empty($result))
        $rows      =  mysqli_num_rows($result);
   else
        $rows      =  '';
 
    if (!empty($rows)){
        while ($rows = mysqli_fetch_assoc($result)){
                $data[]   = $rows;
        }
    }
 
   // now they did a php loop to get the user rank by user id
   $rank = 1;
   foreach($data as $item){
       if ($item['userid'] == $userId){
           return $rank;
       }
       ++$rank;
   }
}
function getUserRank($userId,$testid){
    include("connect.php");
    include("connection.php");
   $sql     =  "SELECT * FROM quizeattempted where `testid`='".$testid."' ORDER BY totalscore DESC";
   $result =  mysqli_query($config,$sql);
   $rows  =  '';
 
   $data = array();
   if (!empty($result))
        $rows      =  mysqli_num_rows($result);
   else
        $rows      =  '';
 
    if (!empty($rows)){
        while ($rows = mysqli_fetch_assoc($result)){
                $data[]   = $rows;
        }
    }
 
   // now they did a php loop to get the user rank by user id
   $rank = 1;
   foreach($data as $item){
       if ($item['userid'] == $userId){
           return $rank;
       }
       ++$rank;
   }
   
}
?>