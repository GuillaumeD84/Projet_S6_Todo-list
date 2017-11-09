<?php

// print_r($_GET);

// Si $_SESSION['stateTasks'] n'éxiste pas, on le créé
if(!isset($_SESSION['stateTasks'])) $_SESSION['stateTasks'] = array();

// Si dans l'url on a $_GET['check'] de présent, on ajoute dans $_SESSION['stateTasks'] le nouvel état de la tâche qui a été modifié.
// Le format récupéré via $_GET['check'] et y-id ou n-id, traduit par : la tâche ayant l'identifiant id est désormais validée/non validée
if (isset($_GET['check'])) {
  $taskToEdit = explode("-", $_GET['check']);

  $_SESSION['stateTasks'][$taskToEdit[1]] = $taskToEdit[0];
}

// echo '<pre>';
// print_r($_SESSION['stateTasks']);
// echo '</pre>';

?>
