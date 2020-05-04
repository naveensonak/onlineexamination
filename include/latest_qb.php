<div class="popular-courses">
<h3 class="cate-title">Latest Question Bank</h3>
 <?php
 include("connect.php");
 $selectlatesttest=mysqli_query($config,"select * from `tbl_questionbank` where `id`!='".$_GET['qbankid']."' and `status`='1' order by id desc limit 6");
while($selectlatestResult=mysqli_fetch_array($selectlatesttest)){?>
                                <div class="categori-list-one">
                                    <div class="categori-list-img">
 <a href="question-bank-details.php?qbankid=<?php echo $selectlatestResult['id'];?>">
<img src="<?php echo $selectlatestResult['material'];?>" alt="" width="70" height="77">
                                        </a>
                                    </div>
                                    <div class="post-details">
                            <p> <a href="question-bank-details.php?qbankid=<?php echo $selectlatestResult['id'];?>"><?php echo $selectlatestResult['qbname'];?></a></p>
                                    </div>
                                </div>
                                <?php }?>
                            </div>