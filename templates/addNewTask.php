<?php

session_start();

// print_r($_POST);

empty($_POST['newTaskName']) ? $newTaskName = 'No title' : $newTaskName = $_POST['newTaskName'];

$_SESSION['newTasks'][] = [
  'title' => $newTaskName,
  'category' => $_POST['taskCategorySelect'],
  'color' => $_POST['taskColorSelect'],
  'status' => false
];

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

header('Location: ../index.php');
die();

?>
