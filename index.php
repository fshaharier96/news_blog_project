<?php
include_once "Front_register.php";

$reg=new Register();
$limit_per_page=3;

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
                         <p>
                            <?php
                             $index_des= $row['post_description'];
                             $index_des_wrap=substr($index_des,0,125);
                              echo $index_des_wrap."...";
                              ?>
                        
                        </p>
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
                    $sql1="SELECT * FROM post_table";
                    $result1=mysqli_query($conn,$sql1) or die("query unsuccessfull");
                    
                    
                
                    if(mysqli_num_rows($result1)>0)
                    {
                        $total_records=mysqli_num_rows($result1);
                        $pages=ceil($total_records/$limit_per_page);
                        echo ' <ul class="index-pagination"> ';
                        if($page>1){
                            echo '<li><a class="index-pagination-pn" href="index.php?page='.($page-1).'">Prev</a></li>';
                        }

                    
                        for($i=1;$i<=$pages;$i++)
                        {
                           echo '<li><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                        }

                        if($pages>$page){
                            echo '<li><a class="index-pagination-pn" href="index.php?page='.($page+1).'">Next</a></li>';
                            }
                              
                    }
                   
                    
                    echo "</ul>";

                    ?>
                
                   

            </div>
             
        </div>

        <!-- sidebar container starts -->
        <div class="index-sidebar-container">
        <?php 
            include_once 'sidebar_search.php';
         ?>
             <?php 
            include_once 'sidebar_post.php';
             ?>
        </div>
        <!-- sidebar container ends -->

    </div>


    <script src="js/jquery.js"></script>
    <scirpt src="js/bootstrap.min.js"></scirpt>
    <script src="js/popper.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>

