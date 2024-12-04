<?php
require_once 'config.php';
require_once 'connection.php';
require_once 'task_model.php';

$taskId = $_GET['id'];
deleteTask($conn, $taskId);
$_SESSION["success"] = "Task deleted successfuly!";
header('Location: ../index.php');
exit;