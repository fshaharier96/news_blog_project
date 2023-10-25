<?php



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
            <div class="index-body-item">
               <div class="index-body-image">
                    <img src="images/news_image.jpg" alt="news_image">
               </div>
               <div class="index-body-content">
                   
                         <h3>Lorem ipsum dolor sit amet consectetur, adipisicing</h3>
                         <div>date</div>
                         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea, voluptatem numquam. Exercitationem velit omnis, iusto odio laborum quod possimus laboriosam ipsum harum quas excepturi libero, quibusdam quisquam deleniti natus. Quisquam?</p>
                    

                 </div> 


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
