<?php

function setErrors()
{
   if (isset($_SESSION["error"])) {
      $error = $_SESSION['error'];

      echo "<p class='error'>" . $error["empty_task"] . "</p>";

      unset($_SESSION["error"]);
   }
}

function success()
{
   if (isset($_SESSION['success'])) {
      $success = $_SESSION['success'];

      echo "<p class='success'>" . $success . "</p>";

      unset($_SESSION["success"]);
   }
}