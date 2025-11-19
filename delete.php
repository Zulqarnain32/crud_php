<?php
  if(isset($_GET['id'])){
    $id = $_GET['id'];
     $servername = "localhost";
     $username = "root";
     $passowrd = "";
     $database = "university";
     //connection
     $conn = new mysqli($servername, $username, $passowrd, $database);

     $sql = "DELETE FROM students where id = $id";
     $conn->query($sql);

  }
 header("location: /crud/index.php");
 exit;
?>
