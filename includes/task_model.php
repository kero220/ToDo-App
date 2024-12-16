<?php

// ADD TASK TO DATABASE
function addTask($conn, $task){
   $query = "INSERT INTO tasks (title) VALUES ('$task')";
   mysqli_query($conn, $query);

   if(mysqli_affected_rows($conn) != 1){
      echo "Data Doesn't Inserted Succefully";
   }
}

// EMPTY TASK
function isEmpty($task){
   if(empty($task)){
      return true;
   } else{
      return false;
   }
}

// FETCH DATA FROM DB
function getTasks($conn) {
   $sql = "SELECT * FROM tasks";
   $result = mysqli_query($conn, $sql);

   $tasks = array();
   while ($row = mysqli_fetch_assoc($result)) {
      $tasks[] = $row;
   }

   mysqli_close($conn);
   return $tasks;
}

// DELETE TASK IN DB
function deleteTask($conn, $taskId) {
   $sql = "DELETE FROM tasks WHERE id = ?;";
   $stmt = mysqli_prepare($conn, $sql);
   if (!$stmt) {
      die('Error preparing statement: ' . mysqli_error($conn));
   }
   mysqli_stmt_bind_param($stmt, 'i', $taskId);
   mysqli_stmt_execute($stmt);
   if (!mysqli_stmt_execute($stmt)) {
      die('Error executing statement: ' . mysqli_stmt_error($stmt));
   }
   
   mysqli_stmt_close($stmt);
}

// UPDATE TASK IN DB
function updateTask($conn, $task, $taskId) {
   $query = "UPDATE tasks SET title = ? WHERE id = ?;";
   $stmt = mysqli_prepare($conn, $query);
   if (!$stmt) {
      die('Error preparing statement: ' . mysqli_error($conn));
   }
   mysqli_stmt_bind_param($stmt, 'si',$task, $taskId);
   mysqli_stmt_execute($stmt);
   if (!mysqli_stmt_execute($stmt)) {
      die('Error executing statement: ' . mysqli_stmt_error($stmt));
   }
   
   mysqli_stmt_close($stmt);
}