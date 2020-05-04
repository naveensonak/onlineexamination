
<div class="course-categoris">
<h3 class="cate-title">Categories</h3>
                                <ul>
                                
           <?php
include("connect.php");
           // $config=mysqli_connect("localhost","sunil","123456");
            //mysqli_select_db($config,"onlineexamination_Compile");
$subcat_query=mysqli_query($config,"select * from `tbl_olympiads` where `status`='1' ");
while($subcatResult=mysqli_fetch_array($subcat_query)){?>                     
                                
              <li><a href="item-olympiads.php?olympiads=<?php echo $subcatResult['id'];?>"><?php echo $subcatResult['category'];?></a></li>
              <?php }?>
                                </ul>
                            </div>