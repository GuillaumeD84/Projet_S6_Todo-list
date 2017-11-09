<?php

// Ne pas oublié de démarrer la session car on ne passe par par 'index.php' lors du chargement de ce script, ce qui signifie qu'on ne récupèrerai pas ce que l'on a stocké dans '$_SESSION'
session_start();

// print_r($_POST);

// Si $_SESSION['editedTasksId'] n'éxiste pas, on le créé
if(!isset($_SESSION['editedNameTasks'])) $_SESSION['editedNameTasks'] = array();

// Si $_POST['newTaskName'] et $_POST['editTaskNameId'] éxistent, on ajoute dans $_SESSION['editedNameTasks'][id] le nom modifié.
if (isset($_POST['newTaskName']) && isset($_POST['editTaskNameId'])) {

  $_SESSION['editedNameTasks'][$_POST['editTaskNameId']] = $_POST['newTaskName'];

  // echo '<pre>';
  // print_r($_SESSION['editedNameTasks']);
  // echo '</pre>';
}

// Afin de pouvoir rester sur la même page qu'au moment de la modification du nom de la tâche, on se doit de rediriger l'utilisateur vers la bonne url. Pour ce faire on créé un string '$urlFilters' qui contiendra tous les $_GET des filtres qu'il aura appliqué et on l'ajoutera dans notre header();
require('returnUrlFilters.php');

// On redirige l'utilisateur
header('Location: ../?'.$urlFilters);
die();

?>
