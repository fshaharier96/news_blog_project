<?php
       include_once "../classes/Register.php";
       $reg=new Register();
       $result=$reg->getUser();
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
    <title>all user</title>
</head>
<body class="admin-user-body">
    <?php
    include 'admin_header.php';
    ?>
    <div class="user-container">
        <div class="user-table-header">
            <h2>All Users</h2>
            <a href="add_user.php">Add User</a>
        </div>
        <table class="user-table">
            <thead>
                <tr>
                <th>SI NO.</th>
                <th>FULL NAME</th>
                <th>USER NAME</th>
                <th>ROLE</th>
                <th>EDIT</th>
                <th>DELETE</th>
                </tr>

            </thead>
            <tbody>
                <?php
                while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){

                ?>
                <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['first_name']." ".$row['last_name']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['user_role']?></td>
                <td><a href="edit_user.php?page=<?php echo $row['id']?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="delete_user.php?delpage=<?php echo $row['id']?>"><i class="fa-solid fa-trash-can"></i></a></td>
                </tr>
                <?php
                }
                
            }
            else{
                echo "<div>No Records found</div>";
            }
                ?>


            </tbody>

        </table>
    </div>
</body>
</html>