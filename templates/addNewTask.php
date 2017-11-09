<?php

// Ne pas oublié de démarrer la session car on ne passe par par 'index.php' lors du chargement de ce script, ce qui signifie qu'on ne récupèrerai pas ce que l'on a stocké dans '$_SESSION'
session_start();

// print_r($_POST);

// Si l'utilisateur n'a pas indiqué de titre à sa nouvelle tâche on lui en applique un par défaut
empty($_POST['newTaskName']) ? $newTaskName = 'No title' : $newTaskName = $_POST['newTaskName'];

// On incrémente le nombre de tâche
$_SESSION['nbrTask']++;

// On créé la nouvelle tâche à partir des données récupérées dans le $_POST que l'on push dans notre tableau de nouvelles tâches $_SESSION['newTasks']
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

// Afin de pouvoir rester sur la même page qu'au moment de l'ajout de la nouvelle tâche, on se doit de rediriger l'utilisateur vers la bonne url. Pour ce faire on créé un string '$urlFilters' qui contiendra tous les $_GET des filtres qu'il aura appliqué et on l'ajoutera dans notre header();
require('returnUrlFilters.php');

// On redirige l'utilisateur
header('Location: ../?'.$urlFilters);
die();

?>
