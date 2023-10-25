<?php
   include_once "../classes/Register.php";
   $reg=new Register();
   if(isset($_POST['submit'])){
    $result=$reg->addUser($_POST);
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>add user</title>
</head>
<body>
    <?php
    include "admin_header.php";
    ?>
    <div>
        <h1 class="text-center mb-5">Add User</h1>
        <div class="add-user-form-container">
        <form action="<?php  $_SERVER['PHP_SELF'];?>" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label user-label-style">First Name</label>
                <input type="text"  name="first_name" class="form-control border border-black" placeholder="First Name">   
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label user-label-style">Last Name</label>
                <input type="text" name="last_name" class="form-control border border-black" placeholder="Last Name">   
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label user-label-style">User Role</label>
                <select name="user_role" class="form-select border border-black" aria-label="Default select example">
                        <option value="1">admin</option>
                        <option value="2">user</option>
                </select> 
            </div>


            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label user-label-style">User Email</label>
                <input type="email" name="email" class="form-control border border-black" placeholder="User Name">   
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label user-label-style">Password</label>
                <input type="text" name="password" class="form-control border border-black" placeholder="Password">   
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
    
</body>
</html>