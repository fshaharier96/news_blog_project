<?php
include_once "../classes/Register.php";
$reg=new Register();
if(isset($_POST['submit'])){
   $result= $reg->addData($_POST);
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

  <div class="container">
       <div class="row">
        <div class="col-md-6 shadow bg-white">
            <h2 class="text-center mb-3">Registration</h2>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="">
                            <label  class="form-label signup-label">First Name</label>
                            <input type="text" name="first_name" class=" border border-dark-subtle signup-input">
                </div>
                <div class="">
                            <label  class="form-label signup-label">Last Name</label>
                            <input type="text" name="last_name" class=" border border-dark-subtle signup-input">
                </div>
                <div class="">
                <label for="exampleInputEmail1" class="form-label signup-label">User Role</label>
                <select name="user_role" class=" border border-dark-subtle signup-input" aria-label="Default select example">
                        <option value="1">admin</option>
                        <option value="2">user</option>
                </select> 
            </div>
                
                <div class="">
                    <label  class="form-label signup-label">Email address</label>
                    <input type="email" name="email" class="border border-dark-subtle signup-input">
                </div>
                <div class="">
                    <label  class="form-label signup-label">Password</label>
                    <input type="password" name="password" class=" border border-dark-subtle signup-input">
                </div>
                <div class="">
                    <label  class="form-label signup-label">Confirm Password</label>
                    <input type="password" name="c_password" class=" border border-dark-subtle signup-input">
                </div>

                <button type="submit" name="submit" class="form-control btn btn-primary mt-3">signup</button>
                <br><br>
                <div class="text-center">Already Have an account? <a href="index.php">Log in</a></div>
                <?php
                        if(isset($result)){
                            echo "<div style='width:440px;margin-top:8px' class='alert alert-warning text-center mx-auto'>{$result}</div>";
                        }
                ?>
                </form>
                
        </div>
       
       </div>
  </div>
  <script>
      if(window.history.replaceState){
         window.history.replaceState(null,null,window.location.href);
         }
     </script>
</body>
</html>