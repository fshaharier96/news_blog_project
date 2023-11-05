<?php
include_once "../classes/Register.php";
$reg=new Register();
if(isset($_POST['submit'])){
    $result=$reg->addCategory($_POST);
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
<div class="container ">
    <div class="row d-flex align-items-start mt-5">
        <div class="col-md-6 shadow p-4 bg-white mx-auto">
            <h3 class="text-center">Create Category</h3>
            <form class="form" action="<?php $_SERVER['PHP_SELF']?>" method="post">
              <div class="mb-3">
                <label class="form-label text-center ">Category Name</label>
                <input type="text" name="category_name" class="form-control border border-secondary" placeholder="Category Name">   
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
</div>
    
</body>
</html>