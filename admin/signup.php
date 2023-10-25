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
       <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6 shadow p-4 bg-white">
            <h2 class="text-center">Registration</h2>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="mb-3">
                            <label  class="form-label">First Name</label>
                            <input type="text" name="first_name" class="form-control border border-dark-subtle">
                </div>
                <div class="mb-3">
                            <label  class="form-label">Last Name</label>
                            <input type="text" name="last_name" class="form-control border border-dark-subtle">
                </div>
                <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Role</label>
                <select name="user_role" class="form-select border border-dark-subtle" aria-label="Default select example">
                        <option value="1">admin</option>
                        <option value="2">user</option>
                </select> 
            </div>
                
                <div class="mb-3">
                    <label  class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control border border-dark-subtle">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Password</label>
                    <input type="password" name="password" class="form-control border border-dark-subtle">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Confirm Password</label>
                    <input type="password" name="c_password" class="form-control border border-dark-subtle">
                </div>

                <button type="submit" name="submit" class="btn btn-primary form-control mt-3">signup</button>
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