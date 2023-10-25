<?php
  include_once "Database.php";
  class Register{
     
        public function addData($post){
            if(!empty(!empty($post['first_name']) && !empty($post['last_name']) && !empty($post['user_role'])  && $post['email'])&& !empty($post['password']) && !empty($post['c_password']) ){

                 $first_name=$post['first_name'];
                 $last_name=$post['last_name'];
                 $user_role=$post['user_role'];
                 $email=$post['email'];
                 $password = md5($post['password']);
                 $c_password = md5($post['c_password']);

                 $sql="SELECT * FROM login_table WHERE email='{$email}'";

                 $result=$this->dataCheck($sql);

                 if($result)
                 {
                    return "This email is  already exist";
                 }
                 else{
                     if($password==$c_password){
                        $sql1="INSERT INTO login_table(first_name,last_name,user_role,email,password) VALUES('{$first_name}','{$last_name}','{$user_role}','{$email}','{$password}')";
                        $db=new Database();
                       $insertResult= $db->insert($sql1);
                       return $insertResult;

                     }
                     else{
                        return "password does not match";
                     }
                 }

            }else{
                return "input field is empty !";
            }

        }

        public function loginData($post){
                
            if(!empty($post['email'])&& !empty($post['password'])){
                $email=$post['email'];
                $password = md5($post['password']);
            $sql="SELECT * FROM login_table WHERE email='{$email}' AND password ='{$password}'";
            $db=new Database();
            $result= $db->select($sql);
            if($result){
               return $result;
            }else{
                return false;
            }

        }
    }
 
    public function getCategory(){
        $sql="SELECT * FROM category";
        $db=new Database();
        $result=$db->select($sql);
        return $result;
    }

    public function addCategory($post){
           if(!empty($post['category_name']))
           { 
              $category=$post['category_name'];
              $sql="INSERT INTO category(category_name) VALUES('{$category}')";
               $db=new Database();
               $result=$db->insert($sql);
               return $result;

           }else{
              return 'input field is empty !';
           }
    }

     public function delCategory($category_id){
        $sql="DELETE FROM category WHERE category_id='{$category_id}'";
        $db=new Database();
        $result=$db->delete($sql);
        return $result;


     }


     public function getUser(){
        $sql="select l.id, l.first_name, l.last_name, u.user_role, l.email from login_table l inner join user_role u on l.user_role=u.id";
        $db=new Database();
        $result=$db->select($sql);
        return $result;

     }


     public function addUser($post){

           if(!empty($post['first_name']) && !empty($post['last_name']) && !empty($post['user_role']) && !empty($post['email']) && !empty($post['password'])){
                      $first_name=$post['first_name'];
                      $last_name=$post['last_name'];
                      $user_role=$post['user_role'];
                      $user_email=$post['email'];
                      $password=md5($post['password']);
                      $sql="INSERT INTO login_table(first_name, last_name, user_role, email,password) VALUES('{$first_name}','{$last_name}','{$user_role}','{$user_email}','{$password}')";
                      $db=new Database();
                      $result=$db->insert($sql);
                      return $result;
           }else{
            return "input fields are  empty !";
           }
     }


     public function delUser($user_id){
        $sql="DELETE FROM login_table WHERE id='{$user_id}'";
        $db=new Database();
        $result=$db->delete($sql);
        return $result;
     }

    public function getPost(){
        $sql="SELECT pt.post_id,pt.post_title,pt.post_date,ct.category_name,lt.first_name,lt.last_name FROM post_table pt INNER JOIN login_table lt on pt.author=lt.id INNER JOIN category ct on pt.post_category=ct.category_id";
        $db=new Database();
        $result=$db->select($sql);
        return $result;
    }

     public function addPost($post,$file){
         if(!empty($post['title']) && !empty($post['description']) && !empty($post['category']) && !empty($file['image'])){

            $uploadedFile=$file['image'];
            $fileName=$uploadedFile['name'];
            $fileTempName=$uploadedFile['tmp_name'];
            $extension=explode(".",$fileName);
            $fileExtension=end($extension);
            $folder="uploads/".$fileName;
            $extArray=['jpeg','jpg','png'];
            if(in_array($fileExtension,$extArray))
            {
                move_uploaded_file($fileTempName,$folder);
            }
            session_start();
            $post_title=$post['title'];
            $post_description=$post['description'];
            $post_date=date("Y-m-d ");
            $post_image=$folder;
            $post_category=$post['category'];
            $author=$_SESSION['id'];
           
            $sql="INSERT INTO post_table(post_title,post_description,post_date,post_image,post_category,author) VALUES('{$post_title}','{$post_description}','{$post_date}','{$post_image}',{$post_category},{$author});";
            $sql.="UPDATE category SET post = post + 1 WHERE category_id={$post_category}";
            $db=new Database();
            $result=$db->insertPost($sql);
            return $result;


         }else{
            return "input field is empty ";
         }
     }

     public function delPost($post_id){
        $sql="DELETE FROM post_table WHERE post_id='{$post_id}'";
        $db=new Database();
        $result=$db->delete($sql);
        return $result;
     }


        public function dataCheck($sql){
            $db=new Database();
            $result=$db->select($sql);
            if($result){
                return $result;
            }
            else{
                return false;
            }
        }

  }

?>