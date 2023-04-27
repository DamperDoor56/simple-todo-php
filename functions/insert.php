<?php

   require '../db/conn.php';

   if($_POST["action"] == "Insert") {
      $task = $_POST['mytask'];
  
      $insert = $conn->prepare("INSERT INTO tasks (name) VALUES (:name)");
      $insert->execute([':name' => $task]);
} 
?>