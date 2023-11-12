<?php
include_once "../classes/Register.php";
$reg=new Register();
if(isset($_POST['submit'])){

    $result=$reg->updatePost($_POST,$_FILES);
    echo "this is result ".$result;

    if($result){
        header("Location:http://localhost/news_blog/news_blog_project_local/admin/post.php");
    }else{
        echo "data can't be updated";
    }

    // echo $post_title=$_POST['title'];
    // echo "<br/>";
    // echo $post_description=$_POST['description'];
    // echo "<br/>";
    // echo $post_title=$_POST['id'];
    // echo "<br/>";
    // echo $category=$_POST['category'];
    // echo "<br/>";
    // echo $post_image=$_POST['old_image'];
    // echo "<br/>";
}

?>