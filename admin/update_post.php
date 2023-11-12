<?php
include_once "../classes/Register.php";
$update_id=$_GET['page'];
$reg=new Register();
$result=$reg->postForUpdate($update_id);

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
        <form action="update_post_data.php" method="post" enctype="multipart/form-data">
      <?php
         if($result)
         { 
            while($row=mysqli_fetch_assoc($result)){

            
       ?>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label user-label-style">Title</label>
                <input hidden type="number" name="id" class="form-control border border-secondary" value="<?php echo $row['post_id'] ?>">  
                <input type="text" name="title" class="form-control border border-secondary" placeholder="Title" value="<?php echo $row['post_title'] ?>">   
            </div>
            <div class="mb-3">
              <label  class="form-label user-label-style">Description</label>
                    <textarea name="description" class="form-control border border-secondary" placeholder="description" id="floatingTextarea2" style="height: 100px" >
                    <?php echo $row['post_description'] ?>
                </textarea>
                   
            </div>
         
           

            <div class="mb-3">
                <label  class="form-label user-label-style">Category</label>
                <select name="category" class="form-select border border-secondary">
                        <option disabled>select category</option>
                        <?php
                          $catResult=$reg->getCategory();
                          if($catResult){
                            while($row1=mysqli_fetch_assoc($catResult)){
                                if($row["post_category"]==$row1["category_id"])
                                {
                                    $select='selected';
                                }else{
                                    $select="";
                                }
                                echo "select value is ".$select;
                               echo "<option {$select} value=".$row1['category_id'].">".$row1['category_name']."</option>";
                            }
                          }else{
                            echo "<option>no options</option>";
                          }

                        ?>
                        
                </select> 
            </div>
            <div class="mb-3">
                <label  class="form-label user-label-style">Post Image</label>
            <input type="file" name="image"  class="form-control border border-secondary"/> 
            <img class="update-post-image" src="<?php echo $row["post_image"] ?>" alt="post-image"/>  
            <input hidden type="text" name="old_image" value="<?php echo $row["post_image"] ?>"/>
            </div>
                
           
            <button type="submit" name="submit" class="btn btn-primary form-control">UPDATE</button>

           
      </form>
      <?php
           }
        }
            // if(isset($result)){
            //     echo "<div style='width:440px;margin-top:8px' class='alert alert-warning text-center mx-auto'>{$result}</div>";
            // }
    ?>
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