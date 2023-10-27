<?php
include_once '../config.php';
      session_start();
      if(isset($_SESSION['name'])){
        session_unset();
        session_destroy();
        header("Location:{$host}");
      }else{
        echo "session variable is not set";
      }
?>