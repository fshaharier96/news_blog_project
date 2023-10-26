<?php
  include_once "Front_database.php";
  class Register{
     
        public function  show($offset,$limit){
            $sql="SELECT pt.post_id,pt.post_title,pt.post_description,pt.post_image,pt.post_date,ct.category_name,lt.first_name,lt.last_name FROM post_table pt INNER JOIN login_table lt on pt.author=lt.id INNER JOIN category ct on pt.post_category=ct.category_id LIMIT {$offset},{$limit}";
            $db=new Database();
            $result=$db->select($sql);
            return $result;
        }

        public function  show1($pageId){
          $sql="SELECT pt.post_id,pt.post_title,pt.post_description,pt.post_image,pt.post_date,ct.category_name,lt.first_name,lt.last_name FROM post_table pt INNER JOIN login_table lt on pt.author=lt.id INNER JOIN category ct on pt.post_category=ct.category_id WHERE pt.post_id={$pageId}";
          $db=new Database();
          $result=$db->select($sql);
          return $result;
      }
      public function  show2(){
        $sql="SELECT * FROM category WHERE post>0";
        $db=new Database();
        $result=$db->select($sql);
        return $result;
      }
      public function show3($cat_id){
        $sql="SELECT pt.post_id,pt.post_title,pt.post_description,pt.post_image,pt.post_date,ct.category_name,lt.first_name,lt.last_name FROM post_table pt INNER JOIN login_table lt on pt.author=lt.id INNER JOIN category ct on pt.post_category=ct.category_id WHERE post_category={$cat_id}";
        $db=new Database();
        $result=$db->select($sql);
        return $result;
      }
  }

?>