<?php
   session_start();
?>

<div class="admin-header-upper-container">
    <h2>Contemp News portal</h2>
    <a href="logout.php">Logout</a>
</div>
<div class="admin-header-menu-container">
    <ul class="admin-header-list-container">
        <li><a href="post.php">Post</a></li>
        <?php 
        if($_SESSION['role']==1){
        ?>
        <li><a href="category.php">Category</a></li>
        <li><a href="user.php">User</a></li>
        <?php
           }
        ?>

    </ul>

</div>
