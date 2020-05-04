<div class="clearfix"></div>
<footer class="footer-area">
            <div class="footer-top ptb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="footer-text footer-social">
                            <a href="index.php"><img src="images/logo/logo.png" alt=""> </a>
                                <!-- <a href="index.php">
                                    <img alt="" src="images/logo/logo-2.png">
                                </a> -->
                                <p>We are a group of educationists, who have more than 26 years of teaching experience in school and university level.  </p>
                                <ul>
                 <li><a href="<?php echo setting('fblink');?>" target="_blank"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a href="<?php echo setting('twlink');?>" target="_blank"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a href="<?php echo setting('gplus');?>" target="_blank"><i class="zmdi zmdi-google-plus"></i></a></li>
                                    
                                </ul>
                            </div>
                        </div>
                        
   <?php 
$footermenu_query=mysqli_query($config,"select * from `tbl_category` where id in(2,3,4) and `status`='1'");
while($footermenu_result=mysqli_fetch_array($footermenu_query)){
$footersubmenu_query=mysqli_query($config,"select * from `tbl_subcategory` where `catid`='".$footermenu_result['id']."' limit 6");
$footersub_menu_rows=mysqli_num_rows($footersubmenu_query);?>                     
                        
                        <div class="col-md-2 col-sm-6">
                            <div class="footer-text mrg-xs">
                                <h3><?php echo $footermenu_result['category'];?> </h3>
                                <ul class="footer-text-all">
                                <?php 
while($footersubmenu_result=mysqli_fetch_array($footersubmenu_query)){?>
                                    <li><a href="<?php echo $footermenu_result['url'];?>?primary=<?php echo $footermenu_result['id'];?>&secondary=<?php echo $footersubmenu_result['id'];?>" onclick="RemoveCookie('my_cookie');"><?php echo $footersubmenu_result['subcategory'];?></a></li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                        <?php }?>
                        <div class="col-md-2 col-sm-6">
                            <div class="footer-text mrg-sm3 mrg-xs">
                                <h3>Help</h3>
                                <ul class="footer-text-all">
                                    <li><a href="about-us.php">About Us</a></li>
                        <li><a href="photo-gallery.php">Photo Gallery</a></li>
                    <li><a href="video-gallery.php">Video Gallery</a></li>
                                    <li><a href="testimonials.php"> Testimonials</a></li>
                       <li><a href="privacy-policy.php"> Privacy Policy</a></li>
                        <li><a href="return-refund.php">Return and Refunds</a></li>
                                    <li><a href="news.php">News</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="footer-bottom-text ptb-20">
                                <p>
                                    Copyrights © <script type="text/javascript">
document.write(+new Date().getFullYear());
</script>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End footer area -->
        <!-- start scrollUp ============================================ -->
        <div id="toTop">
            <i class="fa fa-chevron-up"></i>
        </div>
        <?php include("include/changepassword.php");?>