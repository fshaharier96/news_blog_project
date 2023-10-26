<?php
include_once "Front_register.php";

$reg=new Register();
$limit_per_page=2;

if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}
$offset=($page-1)*$limit_per_page;
$result=$reg->show($offset,$limit_per_page);
if($result)
 {
  


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
         While($row=mysqli_fetch_assoc($result)){

       
        
        ?>
            <div class="index-body-item">
               <div class="index-body-image">
                    <img src="admin/<?php echo $row['post_image']?>" alt="news_image">
               </div>
               <div class="index-body-content">
                   
                         <h3><a href="single_post.php?page=<?php echo  $row['post_id'] ?>"><?php echo  $row['post_title'] ?></a></h3>
                         <div>
                                <span>
                                <i class="fa-solid fa-tag"></i>
                                <?php echo  $row['category_name'] ?>
                                </span>
                            <span>
                            <i class="fa-solid fa-user"></i> 
                            <?php echo  $row['first_name']." ".$row['last_name']?>
                            </span>
                          <span>
                            <i class="fa-regular fa-calendar-days"></i>
                            <?php echo  $row['post_date'] ?>
                          </span>
                          
                    </div>
                         <p><?php echo $row['post_description'] ?></p>
                         <a class="read-more" href="single_post.php?page=<?php echo  $row['post_id'] ?>">Read More</a>
                    

                 </div> 


            </div>
            <?php
                 }
     
                }
                else{
                    echo "<div>No records found</div>";
                
                 }
            ?>
            <div class="index-pagination-box">
               <?php
                    $conn=mysqli_connect(SERVER,USER,PASSWORD,DATABASE) or die("connection failed");
                    $sql="SELECT * FROM post_table";
                    $result1=mysqli_query($conn,$sql) or die("query unsuccessfull");
                    echo ' <ul class="index-pagination"> ';
                    if(mysqli_num_rows($result)>0)
                    {
                        $total_records=mysqli_num_rows($result);
                        $pages=ceil($total_records/$limit_per_page);
                    
                        for($i=1;$i<=$pages;$i++)
                        {
                           echo '<li><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                        }
                       
                              
                    }
                    echo "</ul>";

                    ?>
                
                   

            </div>
             
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

