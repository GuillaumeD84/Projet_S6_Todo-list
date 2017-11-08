<?php

// print_r($_GET);

if(!isset($_SESSION['stateTasks'])) $_SESSION['stateTasks'] = array();

if (isset($_GET['check'])) {
  $taskToEdit = explode("-", $_GET['check']);

  $_SESSION['stateTasks'][$taskToEdit[1]] = $taskToEdit[0];
}

// echo '<pre>';
// print_r($_SESSION['stateTasks']);
// echo '</pre>';

?>
