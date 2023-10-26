<?php
include_once "Front_register.php";
$reg=new Register();
 $pageId=$_GET['page'];
 $result=$reg->show1($pageId);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> 
    <!-- <link rel="stylesheet" href="style/bootstrap.min.css"> -->
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
    <?php 
     include "header.php";
    ?>

    <div class="index-main-container">
        <div class="index-body-container">

             <?php
                 if($result){
                    while($row=mysqli_fetch_assoc($result))
                    {

                   
             ?>
               <div class="single-post-body-content">
                   
                         <h2>
                            <?php echo  $row['post_title'] ?>
                        </h2>
                         <div>
                            <span>
                                <i class="fa-solid fa-tag"></i>
                                <?php echo  $row['category_name'] ?>
                                </span>
                            <span>
                                <i class="fa-solid fa-pen-nib"></i> 
                                <?php echo  $row['first_name']." ".$row['last_name']?>
                            </span> 
                            <span>
                                <i class="fa-regular fa-calendar-days"></i>
                                <?php echo  $row['post_date'] ?>
                        </span>
                    </div>
                    

                 </div> 
                 <div class="single-post-body-image">
                    <img src="admin/<?php echo $row['post_image']?>" alt="news_image">
               </div>
               <div class="single-post-body-desc">
               <p><?php echo $row['post_description'] ?></p>
               </div>

            <?php
                
                    }
                }
            ?>
           
         
        </div>

        <!-- sidebar container starts -->
        <div class="index-sidebar-container">
            <div class="index-search-container"> 
                <h3>
                    Search Post
                </h3>
                <div class="index-search-input-box">
                    <input type="text" name="index-search" placeholder="search..">
                    <button>search</button>
                </div>

            </div>
            <div class="index-sidebar">
                <div class="index-sidebar-item">
                    <div class="index-sidebar-item-image">
                        <img src="images/news_image.jpg" alt="sidebar-image">
                    </div>
                    <div class="index-sidebar-item-content">
                           <h4>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error </h4>
                            <div>Date</div>
                            <button>Read more</button>
                    </div>
                </div>

            </div>
        </div>
        <!-- sidebar container ends -->

    </div>


    <script src="js/jquery.js"></script>
    <scirpt src="js/bootstrap.min.js"></scirpt>
    <script src="js/popper.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>