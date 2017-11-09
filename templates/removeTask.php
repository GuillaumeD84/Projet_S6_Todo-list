<?php

// Ne pas oublié de démarrer la session car on ne passe par par 'index.php' lors du chargement de ce script, ce qui signifie qu'on ne récupèrerai pas ce que l'on a stocké dans '$_SESSION'
session_start();

// print_r($_POST);

// Si $_SESSION['removedTasksId'] n'éxiste pas, on le créé
if(!isset($_SESSION['removedTasksId'])) $_SESSION['removedTasksId'] = array();

// Si $_POST['deleteTask'] éxiste, on ajoute dans $_SESSION['removedTasksId'] l'id de la tâche supprimée.
if (isset($_POST['deleteTask'])) {
  $taskToRemove = explode("-", $_POST['deleteTask']);

  $_SESSION['removedTasksId'][] = $taskToRemove[1];
}

// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';

// Afin de pouvoir rester sur la même page qu'au moment de la suppression de la tâche, on se doit de rediriger l'utilisateur vers la bonne url. Pour ce faire on créé un string '$urlFilters' qui contiendra tous les $_GET des filtres qu'il aura appliqué et on l'ajoutera dans notre header();
require('returnUrlFilters.php');

// On redirige l'utilisateur
header('Location: ../?'.$urlFilters);
die();

?>
