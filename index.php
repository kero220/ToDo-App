<?php

require_once "includes/config.php";
require_once "includes/connection.php";
require_once "includes/task_model.php";
require_once "includes/task_view.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"
      integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="master.css">
   <title>Document</title>
</head>

<body>
   <div class="container">
      <form action="includes/formhandler.php" method="POST">
         <?php
      success();
      setErrors();
      ?>
         <input type="text" name="title" class="task" placeholder="Add Task">
         <input type="submit" value="Add" class="submit-btn">
      </form>
   </div>


   <table class="table">
      <thead>
         <tr>
            <th>#</th>
            <th>Task</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $tasks = getTasks($conn);
         foreach ($tasks as $task):?>
         <tr>
            <td class="id"><?php echo $task['id']?></td>
            <td class="task"><?php echo $task['title']?></td>
            <td class="action">
               <a href="includes/delete_task.php?id=<?php echo $task['id']; ?>" class="delete">
                  <i class="fa-solid fa-trash-can"></i>
               </a>
               <a href="includes/update_task.php?id=<?php echo $task['id']; ?>" class="delete">
                  <i class="fa-solid fa-pen"></i>
               </a>
            </td>
         </tr>
         <?php
         endforeach;
         ?>
      </tbody>
   </table>
</body>

</html>