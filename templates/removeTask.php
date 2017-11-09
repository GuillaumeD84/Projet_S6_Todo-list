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

$urlFilters = '';

if (isset($_SESSION['category'])) {
  foreach ($_SESSION['category'] as $filteredCategory) {
    $urlFilters .= 'category%5B%5D='.$filteredCategory.'&';
  }
}

if (isset($_SESSION['color'])) {
  foreach ($_SESSION['color'] as $filteredColor) {
    $urlFilters .= 'color%5B%5D='.$filteredColor.'&';
  }
}

$urlFilters = substr($urlFilters, 0, -1);

header('Location: ../?'.$urlFilters);
die();

?>
