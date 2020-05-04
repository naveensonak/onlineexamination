<?php
include("connect.php");
$selectcat=mysqli_query($config,"select `catid` from `tbl_testseries` where `id`='".$_GET['seriesid']."'");
$catresult=mysqli_fetch_array($selectcat);
$catid=$catresult['catid'];?>
<div class="course-categoris">
                                <h3 class="cate-title">Categories</h3>
                                <ul>
                                
           <?php
$subcat_query=mysqli_query($config,"select * from `tbl_subcategory` where `catid`='".$catid."' ");
while($subcatResult=mysqli_fetch_array($subcat_query)){?>                     
                                
              <li><a href="item-listing.php?primary=<?php echo $catid;?>&secondary=<?php echo $subcatResult['id'];?>"><?php echo $subcatResult['subcategory'];?></a></li>
              <?php }?>
                                </ul>
                            </div>