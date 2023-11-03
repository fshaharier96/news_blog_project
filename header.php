<?php
 include_once "Front_register.php";
 $reg1=new Register();
 $result1=$reg1->show2();
 $result2=$reg1->show2();
 $result3=$reg1->show_bell_item();
           
?>
<div>
    <div class="header-upper-container">
        <div class="header-search-container">
          <i class="fa-solid fa-bars show"></i>
          <i class="fa-solid fa-xmark hide"></i>
        <div class="header-search-side-menu">
        <ul>
        <li>
            <a href="index.php">All</a>
        </li>
        <?php 
        if($result2){
            while($row2=mysqli_fetch_assoc($result2)){
        
           ?>
             <li>
                <a href="category.php?cat_page=<?php echo $row2["category_id"];?>&cat_name=<?php echo $row2["category_name"];?>"><?php echo $row2['category_name'] ?>
               </a>
        </li>
    
        <?php
         }
        }
        ?>

         </ul>
        </div>
        <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
        <p><?php echo date("d M , Y") ?></p>
        </div>
        <div class="header-heading-container">
            <h1>
                Contemp News Portal
            </h1>


        </div>
        <div class="header-login-container">
            <div class="header-bell">
                <i id="bell-id" class="fa-regular fa-bell"></i>
                <span></span>
            </div>
        <div class="header-bell-container">
            <ul>
                 <?php 
                 if($result3){
                    while($row3=mysqli_fetch_assoc($result3)){
                       $des=$row3['post_description'];
                       $bell_item=substr($des,0,40);
                 ?>

                <li>
                    <a class="header-bell-container-item" href="single_post.php?page=<?php echo $row3['post_id'] ?>">
                        <?php echo $bell_item ?>
                    </a>
                </li>

                <?php 
                   }
                }
                 
                 ?>
            </ul>

        </div>

        <a  class="header-login-link" href="http://localhost/news_blog/news_blog_project_local/admin/">Login</a>
        </div>
    </div>
   
    <div class="header-menu-container">
    <ul class="header-list-container">
        <li><a href="index.php">All</a></li>
    <?php
         if($result1){
            while($row1=mysqli_fetch_assoc($result1)){
     
           
        ?>
   
       
            <li>
                <a href="category.php?cat_page=<?php echo $row1["category_id"];?>&cat_name=<?php echo $row1["category_name"];?>"><?php echo $row1['category_name'] ?>
            </a>
        </li>
       

        <?php
         }
        }
        ?>
         </ul>
    </div>
</div>
