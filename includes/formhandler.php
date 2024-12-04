<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
   require_once "config.php";
   require_once "connection.php";
   require_once "task_model.php";

   $task = trim(htmlspecialchars( htmlentities($_POST['title'])));
   $errors = [];

   // EMPTY TASK
   if (isEmpty($task)) {
      $errors["empty_task"] = "No task inserted!";
   }
   if ($errors) {
      $_SESSION["error"] = $errors;
      header("Location: ../index.php");
      die();
   }

   if(isset($_GET['id'])){
      $_SESSION['update'] = "Update suucessful";
   }

   $_SESSION["success"] = "Data inserted successfully!";
   addTask($conn, $task);
   
   mysqli_close($conn);
   header("Location: ../index.php?status=success");
   exit;
   
} else {
   header("Location: ../index.php");
   die();
}