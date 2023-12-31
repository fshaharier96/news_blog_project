<?php
  include_once "../classes/Register.php";
  $reg=new Register();
  $result=$reg->getCategory();
  if($result){
    
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>Document</title>
</head>
<body>
<?php
include 'admin_header.php';
?>

<div class="user-container">
        <div class="user-table-header">
            <h2>All Categories</h2>
            <a href="add_category.php">Add Category</a>
        </div>
        <table class="user-table">
            <thead>
                <tr>
                <th>SI NO.</th>
                <th>CATEGORY NAME</th>
                <th>NUMBER OF POSTS</th>
                <th>EDIT</th>
                <th>ACTION</th>
                </tr>

            </thead>
            <tbody>
                <?php
                  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
                  {
                ?>
                <tr>
                <td><?php echo $row['category_id'] ?></td>
                <td><?php echo $row['category_name'] ?></td>
                <td><?php echo $row['post'] ?></td>
                <td><a href="add_category.php?page=<?php echo $row['category_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="delete_category.php?page=<?php echo $row['category_id'] ?>"><i class="fa-solid fa-trash-can"></i></a></td>

                </tr>

                <?php
                  }
               ?>


            </tbody>

        </table>
        <?php
            }else{
                echo "<div>No records found</div>";
            }
        ?>
    </div>
    
</body>
</html>