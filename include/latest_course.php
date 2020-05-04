<div class="popular-courses">
<h3 class="cate-title">Latest Series</h3>
 <?php
 include("connect.php");
 $selectlatesttest=mysqli_query($config,"select * from `tbl_testseries` where `id`!='".$_GET['seriesid']."' and `status`='1' order by id desc limit 6");
while($selectlatestResult=mysqli_fetch_array($selectlatesttest)){?>
                                <div class="categori-list-one">
                                    <div class="categori-list-img">
 <a href="series-details.php?seriesid=<?php echo $selectlatestResult['id'];?>">
<img src="<?php echo $selectlatestResult['material'];?>" alt="" width="70" height="77">
                                        </a>
                                    </div>
                                    <div class="post-details">
                            <p> <a href="series-details.php?seriesid=<?php echo $selectlatestResult['id'];?>"><?php echo $selectlatestResult['seriesname'];?></a></p>
                                    </div>
                                </div>
                                <?php }?>
                            </div>