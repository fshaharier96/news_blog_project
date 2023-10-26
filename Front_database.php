<?php
include_once "config.php";
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

   

    public function __destruct(){
        mysqli_close($this->conn);
  
    }
}

?>