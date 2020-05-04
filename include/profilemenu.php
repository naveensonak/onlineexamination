<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
<style type="text/css">
 .is-active{
  background-color: white;
  color: #002046 !important;
  width:100%;
  height:40px;
  
  } 
  .is-active .nav-item{background-color:white;}
 
  #nav-link{}
  #list{background-color: #002046;}
 .nav-item{width:100%;
            height:40px;
            border-bottom: 2px solid white;
            font-size: 18px;
              padding-top: 6px;
              padding-left: 15px;
              text-decoration: none;}
 .nav-item:hover{background-color:white;
                 color:black;
                }

</style>
<div class="col-md-3 col-sm-3">
  <div class="course-sidebar mrg-xs ">
    <div class="" id="list">  
      <ul>
        
        <a class="<?php if($profile=="myprofile") {echo"is-active";} ?>" href="myprofile.php" onclick="RemoveCookie('my_cookie');"><li class="nav-item"><i class="fa fa-user fa-lg"></i> &nbsp;My Profile</li></a>
        
        <a class="<?php if($profile=="mytestseries") {echo"is-active";} ?>" href="mytestseries.php" onclick="RemoveCookie('my_cookie');"><li class="nav-item "><i class="fa fa-book" aria-hidden="true"></i> &nbsp;Test Series</li></a>
        
        <a class="<?php if($profile=="myolympiads") {echo"is-active";} ?>" href="myolympiads.php" onclick="RemoveCookie('my_cookie');"><li class="nav-item"><i class="fa fa-object-ungroup" aria-hidden="true"></i> &nbsp;Olympiad</li></a>
        
        <a class="<?php if($profile=="myquesta") {echo"is-active";} ?>" href="myquesta.php" onclick="RemoveCookie('my_cookie');"><li class="nav-item"><i class="fa fa-object-ungroup" aria-hidden="true"></i> &nbsp;QUESTA</li></a>
        
        <a class="<?php if($profile=="myresult") {echo"is-active";} ?>" href="myresult.php" onclick="RemoveCookie('my_cookie');"><li class="nav-item"><i class="fa fa-pie-chart" aria-hidden="true"></i> &nbsp;Result</li></a>
      
      <a class="<?php if($profile=="myorder") {echo"is-active";} ?>" href="myorder.php"><li class="nav-item"><i class="fa fa-gift" aria-hidden="true"></i> &nbsp;Order History</li></a>

      <a class="<?php if($profile=="downloadqb") {echo"is-active";} ?>" href="downloadqb.php"><li class="nav-item"><i class="fa  fa-download" aria-hidden="true"></i> &nbsp;Download </li></a>
        
     <a href="#"><li class="nav-item"><i class="fa fa-bar-chart" aria-hidden="true"></i> &nbsp;Analysis</li></a>
        <a href="#" data-toggle="modal" data-target="#changepasword" data-backdrop="static" data-keyboard="false"><li class="nav-item"><i class="fa fa-lock" aria-hidden="true"></i> &nbsp;Change Password </li></a>
       <a href="logout.php" onclick="RemoveCookie('my_cookie');"> <li class="nav-item"><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;Logout </li></a>
      </ul>
    </div>
  </div>
</div>
