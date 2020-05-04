<div class="popular-courses">
<h3 class="cate-title">Latest Olympiads</h3>
 <?php 
  include("connect.php");
 // $config=mysqli_connect("localhost","sunil","123456");
  //mysqli_select_db($config,"onlineexamination_Compile");
  
 $selectlatesttest=mysqli_query($config,"select * from `tbl_olympiadstest` where `id`!='".$_GET['olympiadsid']."' and `status`='1' order by id desc limit 6");
 $olymrows=mysqli_num_rows($selectlatesttest);
 if($olymrows==''){echo"Nothing Found....";}else{
while($selectlatestResult=mysqli_fetch_array($selectlatesttest)){?>
                                <div class="categori-list-one">
                                    <div class="categori-list-img">
 <a href="olympiads-details.php?olympiadsid=<?php echo $selectlatestResult['id'];?>">
<img src="<?php echo $selectlatestResult['material'];?>" alt="" width="70" height="77">
                                        </a>
                                    </div>
                                    <div class="post-details">
                            <p> <a href="olympiads-details.php?olympiadsid=<?php echo $selectlatestResult['id'];?>"><?php echo $selectlatestResult['testname'];?></a></p>
                                    </div>
                                </div>
                                <?php }?>
                            </div><?php }?>