<?php
  include_once "Front_register.php";
  $reg2=new Register();
  $result2=$reg2->show5();
?>

<div class="index-sidebar">
<h3>Recent Post</h3>
                <?php
                   if($result2){
                    while($row2=mysqli_fetch_assoc($result2)){
                  
                ?>
                <div class="index-sidebar-item">
                    <div class="index-sidebar-item-image">
                        <img src="admin/<?php echo $row2['post_image']?>" alt="sidebar-image">
                    </div>
                    <div class="index-sidebar-item-content">
                        <h4>
                            <?php echo  $row2['post_title'] ?> 
                        </h4>
                            <div>
                                <span>
                                <i class="fa-solid fa-tag"></i>
                                <?php echo  $row2['category_name'] ?>
                                </span>
                                <span>
                                    <i class="fa-regular fa-calendar-days"></i>
                                    <?php echo  $row2['post_date'] ?>
                                </span>
                            </div>
                            <button>Read more</button>
                    </div>
                </div>
                <?php
                  }
                }
                ?>
            </div>