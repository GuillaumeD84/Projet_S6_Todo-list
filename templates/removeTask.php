<?php

session_start();

// print_r($_POST);

if(!isset($_SESSION['removedTasksId'])) $_SESSION['removedTasksId'] = array();

if (isset($_POST['deleteTask'])) {
  $taskToRemove = explode("-", $_POST['deleteTask']);

  $_SESSION['removedTasksId'][] = $taskToRemove[1];
}

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

header('Location: ../index.php');
die();

?>
