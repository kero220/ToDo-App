<?php
require_once 'config.php';
require_once 'connection.php';
require_once 'task_model.php';

// DISPLAY THE FORM
echo "<form action='#' method='POST'>";
echo "<input type='text' class='task' name='update_title' placeholder='New Task'>";
echo "<input type='submit' class='submit-btn' value='Update'>";
echo "</form>";

// ADD STYLES
echo <<<'now'
<style>
   form{
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
      gap: 20px;
      background-color: #CCC;
      padding: 30px 0;
      width: 50%;
      position: absolute;
      top: 30%;
      left: 50%;
      transform: translate(-50%, 0);
      -webkit-transform: translate(-50%, 0);
      -moz-transform: translate(-50%, 0);
      -ms-transform: translate(-50%, 0);
      -o-transform: translate(-50%, 0);
   }

   .task,
   .submit-btn{
      flex-basis: 80%;
      padding: 10px;
      border: none;
      border-radius: 7px;
      -webkit-border-radius: 7px;
      -moz-border-radius: 7px;
      -ms-border-radius: 7px;
      -o-border-radius: 7px;
   }

   .submit-btn{
      flex-basis: 30%
   }

   .task{
      outline: none;
      font-weight: bold;
      padding: 15px;
   }

   .task::placeholder{
      font-size: 1.1em;
   }

   .submit-btn{
      cursor: pointer;
      outline: none;
      background-color: cadetblue;
      color: white;
   }
</style>
now;


// GET DATA FROM THE FORM

if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $taskId = $_GET['id'];
   $task = $_POST['update_title'];
   updateTask($conn, $task, $taskId);
   $_SESSION["success"] = "Task updated successfully!";
   header('Location: ../index.php');
   exit;
}