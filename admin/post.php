<?php
include_once "../classes/Register.php";
$reg=new Register();
$result=$reg->getPost();
session_start();


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
                <th>REMOVE</th>
                <th>STATUS</th>
                <?php
                 if($_SESSION['role']==1)
                 {
                    echo "<th>ACTION</th>";
                 }
                ?>
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
                <td><?php echo $row['status']?></td>

                <?php
                   if($_SESSION['role']==1)
                   {  
                       $row_id=$row['post_id'];
                      echo "<td>
                         <a class='post-action' href='action.php?actionId=1&post-id={$row_id}'>approve</a>
                         <a class='post-action' href='action.php?actionId=0&post-id={$row_id}'>reject</a>
                        </td>";
                   }
                ?>



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

    <script src="jquery.js"></script>
    <script src="app.js"></script>
    
</body>
</html>