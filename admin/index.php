<?php
  include '../classes/Register.php';
  $reg=new Register();
  session_start();

  


  
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
        <div class="col-md-4 shadow p-4 bg-white mt-5">
            <h2 class="text-center">Login</h2>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <div class="mb-3">
                    <label  class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control border border-dark-subtle">
                </div>
                <div class="mb-3">
                    <label  class="form-label">Password</label>
                    <input type="password" name="password" class="form-control border border-dark-subtle">
                </div>

                <button type="submit" name="submit" class="btn btn-primary form-control mt-3">Login</button>
                </form>
                <div class="my-3 text-center fs-6">
                    <span>Don't you have any account? </span><a class="text-decoration-none" href="signup.php">Create new here.</a>
                </div>
                <?php
                                    if(isset($_POST["submit"])){
                                        $result=$reg->loginData($_POST);
                                        if($result){
                                            while($row=mysqli_fetch_assoc($result))
                                            {
                                                $_SESSION['id']=$row['id'];
                                                $_SESSION['name']=$row['first_name'];
                                                $_SESSION['role']=$row['user_role'];
                                            }
                                           
                                            header("Location:{$host}/post.php");
                                        }else{
                                            echo "<div style='width:330px;margin-top:8px' class='alert alert-warning text-center'>Invalid username and password</div>";
                                        }
                                    }

                    ?>
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