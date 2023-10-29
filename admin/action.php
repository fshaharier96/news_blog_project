<?php
include_once "../classes/Register.php";
$reg=new Register();
  $post_id=$_GET['post-id'];
  $actionId=$_GET['actionId'];
  if($actionId==1){
       $result=$reg->updateStatus($post_id);
       if($result){
        header("Location:$host/post.php"); 
       }else{
         echo "post status can not be updated";
       }
  }else{
    $result=$reg->delPost($post_id);
    if($result){
        header("Location:$host/post.php"); 
    }
   
  }

?>