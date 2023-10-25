<?php
    include_once "../classes/Register.php";
    include_once "../classes/Database.php";
    $reg=new Register();
    $post_id=$_GET['page'];
    $sql="SELECT * FROM post_table WHERE post_id={$post_id}";
    $db=new Database();
    $result=$db->select($sql);
    
    if($result)
    {   $row=mysqli_fetch_assoc($result);
        unlink($row['post_image']);
    }
   

    if(isset($post_id)){

        $result=$reg->delPost($post_id);
        if($result)
        {
            header("Location:$host/post.php"); 
        }
        else{
             return "<script>
               alert('category deletion is failed')
             </script>";
        }
    }

 ?>