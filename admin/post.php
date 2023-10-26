<?php
include_once "../classes/Register.php";
$reg=new Register();
$result=$reg->getPost();



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
            <h2>All Post</h2>
            <a href="add_post.php">Add Post</a>
        </div>
        <table class="user-table">
            <thead>
                <tr>
                <th>SI NO.</th>
                <th>TITLE</th>
                <th>CATEGORY</th>
                <th>DATE</th>
                <th>AUTHOR</th>
                <th>EDIT</th>
                <th>ACTION</th>
                </tr>

            </thead>
            <tbody>
                <?php
                if($result){
                while($row=mysqli_fetch_assoc($result)){
                    
                
                ?>
                <tr>
                <td><?php echo $row['post_id']?></td>
                <td><?php echo $row['post_title']?></td>
                <td><?php echo $row['category_name']?></td>
                <td><?php echo $row['post_date']?></td>
                <td><?php echo $row['first_name']." ".$row['last_name']?></td>
                <td><a href="edit_post.php?page=<?php echo $row['post_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="delete_post.php?page=<?php echo $row['post_id'] ?>"><i class="fa-solid fa-trash-can"></i></a></td>

                </tr>
                <?php
                }
            }else{
                echo "<tr><td>No records</td></tr>";
            }

                ?>

            </tbody>

        </table>
    </div>
    
</body>
</html>