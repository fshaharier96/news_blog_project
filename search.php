<?php
include_once "Front_register.php";
if(isset($_POST['search'])){
    $search_term=$_POST['index-search'];
}
$reg=new Register();
$result=$reg->show4($search_term);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> 
    <!-- <link rel="stylesheet" href="style/bootstrap.min.css"> -->
    <link rel="stylesheet" href="style/style.css">
    <title>Category Page</title>
</head>
<body>
    <?php 
     include "header.php";
    ?>

    <div class="index-main-container">
        <div class="index-body-container">
        <div class="category-heading">
           <h2> <?php echo "Search : ". $search_term; ?></h2>
        </div>
    <?php
       if($result){
        
      
    ?>
       

        <?php 
              while($row=mysqli_fetch_assoc($result)){

              
        ?>
          
            <div class="index-body-item">
               <div class="index-body-image">
                    <img src="admin/<?php echo $row['post_image']?>" alt="news_image">
               </div>
               <div class="index-body-content">
                   
                         <h3>
                            <?php echo  $row['post_title'] ?>
                        </h3>
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
                         <p><?php echo $row['post_description'] ?></p>
                         <a class="read-more" href="#">Read More</a>
                    

                 </div> 
                <?php 

                      }
                    }else{
                        echo "<div>No records found</div>";
                    }
                
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