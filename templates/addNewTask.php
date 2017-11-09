<?php

session_start();

// print_r($_POST);

empty($_POST['newTaskName']) ? $newTaskName = 'No title' : $newTaskName = $_POST['newTaskName'];

$_SESSION['nbrTask']++;

$_SESSION['newTasks'][] = [
  'id' => $_SESSION['nbrTask'],
  'title' => $newTaskName,
  'category' => $_POST['taskCategorySelect'],
  'color' => $_POST['taskColorSelect'],
  'status' => false
];

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
