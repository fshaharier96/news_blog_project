<?php
include_once "../config.php";
class Database{
    public $server=SERVER;
    public $user=USER;
    public $password=PASSWORD;
    public $database=DATABASE;
    public $conn;
    

    public function __construct(){
        $this->conn=mysqli_connect($this->server,$this->user,$this->password,$this->database) or die("connection failed");
       

    }

    public function select($sql){
          $result=mysqli_query($this->conn,$sql) or die("query unsuccessful");
          if(mysqli_num_rows($result)>0){
            return $result;
          }else{
            return false;
          }
    }

    public function insert($sql){
        $result=mysqli_query($this->conn,$sql) or die("query unsuccessfull");
        if($result){
            $msg="data submitted successful";
            return $msg;
        }else{
            $msg="data submit failed";
            return $msg;
        }

    }
    public function insertPost($sql){
        $result=mysqli_multi_query($this->conn,$sql) or die("query unsuccessfull".mysqli_error);
        if($result){
            $msg="data submitted successful";
            return $msg;
        }else{
            $msg="data submit failed";
            return $msg;
        }

    }
   
    
    public function delete($sql){
        $result=mysqli_query($this->conn,$sql) or die("query unsuccessfull");
        if($result){
            return $result;
        }else{
           return false;
        }
    }

    public function update($sql){
        $result=mysqli_query($this->conn,$sql) or die("query unsuccessfull");
        if($result){
            // return "query successful";
              return $result;
        }else{
            // return "query failed";
            return false;
        }
    }

    public function updateStatus($post_id){
        $sql="UPDATE post_table SET status=2 WHERE post_id={$post_id}";
        $db=new Database();
        $result=$db->update($sql);
        return $result;
 }

    public function __destruct(){
        mysqli_close($this->conn);
  
    }
}

?>