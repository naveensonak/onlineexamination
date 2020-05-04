<header class="header-area">
  <div class="header-bottom stick-h2">
    <div class="container">
      <div class="row">
        <div class="col-md-2 col-sm-12 col-xs-12">
          <div class="logo"> <a href="index.php"><img src="images/logo/logo.png" alt=""> </a> </div>
        </div>
        <div class="col-md-8 hidden-sm hidden-xs">
          <div class="menu-area f-right">
            <nav>
             <ul>
<li><a href="index.php" onclick="RemoveCookie('my_cookie');">HOME </a> </li>
 <li><a href="about-us.php" onclick="RemoveCookie('my_cookie');">ABOUT US </a></li>
                <?php 
$menu_query=mysql_query("select * from `tbl_category` where `status`='1'");
while($menu_result=mysql_fetch_array($menu_query)){
$submenu_query=mysql_query("select * from `tbl_subcategory` where `catid`='".$menu_result['id']."' ");
$sub_menu_rows=mysql_num_rows($submenu_query);
?>
                <li class="level-menu"><a href="#"><?php echo $menu_result['category'];?> <?php if($sub_menu_rows==''){}else{?><i class="zmdi zmdi-caret-down"></i><?php }?></a>
                 <?php if($sub_menu_rows==''){}else{?>
                  <ul class="tas">
                  <?php 
while($submenu_result=mysql_fetch_array($submenu_query)){?>
<li><a href="<?php echo $menu_result['url'];?>?primary=<?php echo $menu_result['id'];?>&secondary=<?php echo $submenu_result['id'];?>" onclick="RemoveCookie('my_cookie');"><?php echo $submenu_result['subcategory'];?></a></li>
					<?php }?>
                  </ul><?php }?>
                </li>
                <?php }?>
                
                <li class="level-menu"><a href="#">Olympiads <i class="zmdi zmdi-caret-down"></i></a>
                  <ul class="tas">
      <?php 
	  $olymQuery=mysql_query("select * from `tbl_olympiads` where `status`='1' ");
	  while($olymResult=mysql_fetch_array($olymQuery)){ ?>
                    <li><a href="<?php echo $olymResult['url'];?>?olympiads=<?php echo $olymResult['id'];?>" onclick="RemoveCookie('my_cookie');"><?php echo $olymResult['category'];?></a></li>
                    <?php }?>
                  </ul>
                </li>
                <li><a href="contact.php">CONTACT US</a></li>
              </ul>
              
              
              
            </nav>
          </div>
        </div>
        <div class="col-md-2 hidden-sm hidden-xs">
          <div class="menu-area f-left">
            <nav>
              <ul>
              <?php if(isset($_SESSION['frontuserid'])){?>
<li class="no-padding"><a href="javascript:void(0);"><strong>Hello <?php echo strtok($_SESSION['name'], " ");?></strong> <i class="zmdi zmdi-caret-down"></i></a>
<ul>
        <li><a href="myprofile.php"><i class="fa fa-user fa-lg"></i>My Profile</a></li>
        <li><a href="mytestseries.php" onclick="RemoveCookie('my_cookie');"><i class="fa fa-book" aria-hidden="true"></i> &nbsp;Test Series</a></li>
        <li><a href="myolympiads.php" onclick="RemoveCookie('my_cookie');"><i class="fa fa-object-ungroup" aria-hidden="true"></i> &nbsp;Olympiads</a></li>
      
        <li><a href="myresult.php" onclick="RemoveCookie('my_cookie');"><i class="fa fa-pie-chart" aria-hidden="true"></i>Result</a></li>
     <li><a href="myorder.php"><i class="fa fa-gift" aria-hidden="true"></i> Order History</a></li>
     <li><a href="downloadqb.php"><i class="fa  fa-download" aria-hidden="true"></i> Download</a></li>
     <li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i>Analysis</a></li>
        <li><a href="#" data-toggle="modal" data-target="#changepasword" data-backdrop="static" data-keyboard="false"><i class="fa fa-lock" aria-hidden="true"></i>Change Password </a></li>
        <li><a href="logout.php" onclick="RemoveCookie('my_cookie');"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout </a></li>
      </ul>
</li>



<?php }else{?>
   <li class="no-padding"><a href="account.php" ><strong>Login</strong> </a> <b>/</b></li>
  <li class="no-padding"><a href="account.php" class="no-padding"><strong>Sign Up</strong> </a></li><?php }?>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- mobile-menu-area start -->
<div class="mobile-menu-area">
  <div class="container">
    <div class="row">
      <div class="hidden-lg hidden-md col-sm-12 col-xs-12">
        <div class="mobile-menu">
          <nav id="dropdown">
            
            <ul>
                <li><a href="index.php">HOME </a> </li>
                <li><a href="about-us.php">ABOUT US </a></li>
                <?php 
$menu_query=mysql_query("select * from `tbl_category` where `status`='1'");
while($menu_result=mysql_fetch_array($menu_query)){
$submenu_query=mysql_query("select * from `tbl_subcategory` where `catid`='".$menu_result['id']."' ");
$sub_menu_rows=mysql_num_rows($submenu_query);
?>
                <li class="level-menu"><a href="#"><?php echo $menu_result['category'];?> <?php if($sub_menu_rows==''){}else{?><?php }?></a>
                 <?php if($sub_menu_rows==''){}else{?>
                  <ul class="tas">
                  <?php 
while($submenu_result=mysql_fetch_array($submenu_query)){?>
<li><a href="<?php echo $menu_result['url'];?>?primary=<?php echo $menu_result['id'];?>&secondary=<?php echo $submenu_result['id'];?>"><?php echo $submenu_result['subcategory'];?></a></li>
					<?php }?>
                  </ul><?php }?>
                </li>
                <?php }?>
                
                <li class="level-menu"><a href="#">Gallery <i class="zmdi zmdi-caret-down"></i></a>
                  <ul class="tas">
                    <li><a href="photo-gallery.php">Photo Gallery</a></li>
                    <li><a href="video-gallery.php">Video Gallery</a></li>
                  </ul>
                </li>
                <li><a href="contact.php">CONTACT US</a></li>
                <?php if(isset($_SESSION['frontuserid'])){?>
<li class="no-padding"><a href="javascript:void(0);"><strong>Hello <?php echo strtok($_SESSION['name'], " ");?></strong> <i class="zmdi zmdi-caret-down"></i></a>
<ul>
        <li><a href="myprofile.php"><i class="fa fa-user fa-lg"></i>My Profile</a></li>
        <li><a href="mytestseries.php" onclick="RemoveCookie('my_cookie');"><i class="fa fa-book" aria-hidden="true"></i> &nbsp;Test Series</a></li>
      
        <li><a href="myresult.php" onclick="RemoveCookie('my_cookie');"><i class="fa fa-pie-chart" aria-hidden="true"></i>Result</a></li>
        <li><a href="myorder.php"><i class="fa fa-gift" aria-hidden="true"></i> Order History</a></li>
        <li><a href="downloadqb.php"><i class="fa  fa-download" aria-hidden="true"></i> &nbsp;Download</a></li>
     <li><a href="#"><i class="fa fa-bar-chart" aria-hidden="true"></i>Analysis</a></li>
        <li><a href="#" data-toggle="modal" data-target="#changepasword" data-backdrop="static" data-keyboard="false"><i class="fa fa-lock" aria-hidden="true"></i>Change Password </a></li>
        <li><a href="logout.php" onclick="RemoveCookie('my_cookie');"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout </a></li>
      </ul>
</li>
<?php }else{?>
                <li class="no-padding"><a href="account.php" ><strong>Login / Sign Up</strong> </a> </li><?php }?>
              </ul>
              
          </nav>
          
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- mobile-menu-area end --> 
