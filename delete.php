<?php

  include('db.php');

  if(isset($_GET['id'])){
    $id = $_GET['id'];
  
     $sql = "DELETE FROM students where id = $id";
     $conn->query($sql);

  }
 header("location: index.php");
 exit;
?>
