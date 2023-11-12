<?php
include_once "../classes/Register.php";
$reg=new Register();
if(isset($_POST['submit'])){
    $result=$reg->addPost($_POST,$_FILES);
   }
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>Document</title>
</head>
<body>
<?php
  include 'admin_header.php';
?>
 <div>
        <h1 class="text-center mb-5">Add New Post</h1>
        <div class="add-user-form-container">
        <form action="<?php  $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label user-label-style">Title</label>
                <input type="text" name="title" class="form-control border border-secondary" placeholder="Title">   
            </div>
            <div class="mb-3">
              <label  class="form-label user-label-style">Description</label>
                    <textarea name="description" class="form-control border border-secondary" placeholder="description" id="floatingTextarea2" style="height: 100px"></textarea>
                   
            </div>
         
           

            <div class="mb-3">
                <label  class="form-label user-label-style">Category</label>
                <select name="category" class="form-select border border-secondary">
                        <option disabled>select category</option>
                        <?php
                          $catResult=$reg->getCategory();
                          if($catResult){
                            while($row=mysqli_fetch_assoc($catResult)){
                               echo "<option value=".$row['category_id'].">".$row['category_name']."</option>";
                            }
                          }else{
                            echo "<option>no options</option>";
                          }

                        ?>
                        
                </select> 
            </div>
            <div class="mb-3">
                <label  class="form-label user-label-style">Post Image</label>
                <input type="file" name="image"  class="form-control border border-secondary" placeholder="description">   
            </div>
                
           
            <button type="submit" name="submit" class="btn btn-primary form-control">SAVE</button>

            <?php
                        if(isset($result)){
                            echo "<div style='width:440px;margin-top:8px' class='alert alert-warning text-center mx-auto'>{$result}</div>";
                        }
                ?>
      </form>
        </div>
    </div>

    <script>
      if(window.history.replaceState){
         window.history.replaceState(null,null,window.location.href);
         }
     </script>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/popper.min.js"></script>
    
</body>
</html>