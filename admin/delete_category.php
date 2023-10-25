<?php
    include_once "../classes/Register.php";
    $reg=new Register();
    $category_id=$_GET['page'];
    if(isset($category_id)){
        $result=$reg->delCategory($category_id);
        if($result)
        {
            header("Location:$host/category.php");

        }
        else{
             return "<script>
               alert('category deletion is failed')
             </script>";
        }
    }
    
?>