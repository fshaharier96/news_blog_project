<?php
      include_once "../classes/Register.php";
      $reg=new Register();
      $user_id=$_GET['delpage'];
      if(isset($user_id)){
          $result=$reg->delUser($user_id);
          if($result)
          {
              header("Location:$host/user.php");
  
          }
          else{
               return "<script>
                 alert('category deletion is failed')
               </script>";
          }
      }
?>