<?php

// Tableau de tâche(s) initiale(s)
$tasksList = array();
// Tableau final qui sera affiché sur la page
$todoList = array();

// Format par défault d'une tâche
// [
//   'id' => '',
//   'title' => '',
//   'category' => '',
//   'color' => '',
//   'status' => ''
// ]

// Définition des tâches initiales
$tasksList = [

  [
    'id' => 1,
    'title' => 'Développer une todo list',
    'category' => 'Job',
    'color' => 'dimgray',
    'status' => false
  ],
  [
    'id' => 2,
    'title' => 'Acheter du lait',
    'category' => 'Shopping',
    'color' => 'rebeccapurple',
    'status' => false
  ],
  [
    'id' => 3,
    'title' => 'Appeler le Psy',
    'category' => 'Important',
    'color' => 'red',
    'status' => true
  ],
  [
    'id' => 4,
    'title' => 'Découvrir PHP',
    'category' => 'Job',
    'color' => 'dimgray',
    'status' => true
  ],
  [
    'id' => 5,
    'title' => 'Faire le ménage',
    'category' => 'Chores',
    'color' => 'darkorange',
    'status' => false
  ],
  [
    'id' => 6,
    'title' => 'Acheter des cookies',
    'category' => 'Important',
    'color' => 'forestgreen',
    'status' => false
  ],
  [
    'id' => 7,
    'title' => 'Faire une pause',
    'category' => 'Misc.',
    'color' => 'cornflowerblue',
    'status' => false
  ],
  [
    'id' => 8,
    'title' => 'Mangez 5 fruits et légumes par jour',
    'category' => 'Misc.',
    'color' => 'forestgreen',
    'status' => false
  ],
  [
    'id' => 9,
    'title' => 'Replay !!!',
    'category' => 'Job',
    'color' => 'goldenrod',
    'status' => false
  ],
  [
    'id' => 10,
    'title' => 'Réparer le volet',
    'category' => 'Home',
    'color' => 'darkorange',
    'status' => true
  ],
  [
    'id' => 11,
    'title' => 'Appeler Yann',
    'category' => 'Contacts',
    'color' => 'rebeccapurple',
    'status' => false
  ],
  [
    'id' => 12,
    'title' => 'AIM training',
    'category' => 'Gaming',
    'color' => 'dimgray',
    'status' => false
  ],
  [
    'id' => 13,
    'title' => 'Acheter du café',
    'category' => 'Important',
    'color' => 'red',
    'status' => false
  ],
  [
    'id' => 14,
    'title' => 'Jouer avec le chien',
    'category' => 'Home',
    'color' => 'cornflowerblue',
    'status' => true
  ],
  [
    'id' => 15,
    'title' => 'S\'amuser avec les challenges de Julien',
    'category' => 'Job',
    'color' => 'goldenrod',
    'status' => false
  ],

];

// On compte le nombre de tâche contenu dans tasksList (uniquement lors de la première visite)
if (!isset($_SESSION['nbrTask'])) $_SESSION['nbrTask'] = count($tasksList);

// On récupère les tâches ajoutées dans la '$_SESSION' et on les ajoute au début du tableau '$tasksList'
if (isset($_SESSION['newTasks'])) {
  foreach ($_SESSION['newTasks'] as $newTask) {
    array_unshift($tasksList, $newTask);
  }
}

// Boucle qui edit le status terminé/non terminé des tâches d'après les données stockées dans $_SESSION
foreach ($tasksList as $key => $task) {

  if (array_key_exists($task['id'], $_SESSION['stateTasks'])) {

    if ($_SESSION['stateTasks'][$task['id']] === 'y') {
      $tasksList[$key]['status'] = true;
    }
    else {
      $tasksList[$key]['status'] = false;
    }

  }
}

// Boucle qui edit le nom des tâches d'après les données stockées dans $_SESSION
if (isset($_SESSION['editedNameTasks'])) {
  foreach ($tasksList as $key => $task) {

    if (array_key_exists($task['id'], $_SESSION['editedNameTasks'])) {
      $tasksList[$key]['title'] = $_SESSION['editedNameTasks'][$task['id']];
    }
  }
}

// Boucle qui edit les tags des tâches d'après les données stockées dans $_SESSION
if (isset($_SESSION['editedTagsTasks'])) {
  foreach ($tasksList as $key => $task) {

    if (array_key_exists($task['id'], $_SESSION['editedTagsTasks'])) {
      $tasksList[$key]['category'] = $_SESSION['editedTagsTasks'][$task['id']]['category'];
      $tasksList[$key]['color'] = $_SESSION['editedTagsTasks'][$task['id']]['color'];
    }
  }
}

?>

<?php

  // Si l'URL ne contient pas de '$_GET' (effectif lorsque l'on clique sur le logo TodoLIST), on vide les filtres appliqués
  if (empty($_GET)) {
    unset($_SESSION['finish'], $_SESSION['category'], $_SESSION['color']);
  }

  // Si '$_GET' contient 'clear' (effectif lorsque l'on clique sur All), on supprime le filtre 'finish' (qui permet d'afficher uniquement les tâches terminées ou non)
  if (isset($_GET['clear'])) {
    unset($_SESSION['finish']);
  }

  // Ces 3 if elseif permettent de mixer les filtres appliqués. C'est à dire que l'on pourra appliquer des catégories, des couleurs et filtrer les tâches terminées/non terminées en même temps.
  if (isset($_GET['finish'])) {
    $_SESSION['finish'] = $_GET['finish'];
    $finishFilter = $_GET['finish'];
  }
  elseif (isset($_SESSION['finish'])) {
    $finishFilter = $_SESSION['finish'];
  }

  if (isset($_GET['category'])) {
    $_SESSION['category'] = $_GET['category'];
    $categoryFilter = $_GET['category'];
  }
  elseif (isset($_SESSION['category'])) {
    $categoryFilter = $_SESSION['category'];
  }

  if (isset($_GET['color'])) {
    $_SESSION['color'] = $_GET['color'];
    $colorFilter = $_GET['color'];
  }
  elseif (isset($_SESSION['color'])) {
    $colorFilter = $_SESSION['color'];
  }


  // On filtre les tâches à afficher selon les filtres appliqués. On va remplir pas à pas le tableau '$todoList' avec les éléments présents dans '$tasksList' et si un des éléments de '$tasksList' de satisfait pas les filtres sélectionnés, on saute un tour de boucle grâce à 'continue;', c'est à dire que l'on ne met pas la tâche en question dans le tableau '$todoList'
  foreach ($tasksList as $key => $task) {

    if (isset($_SESSION['removedTasksId'])) {
      if (in_array($task['id'], $_SESSION['removedTasksId'])) {
        continue;
      }
    }

    if (isset($finishFilter) && ($finishFilter === 'yes' && !$task['status'] || $finishFilter === 'no' && $task['status'])) {
      continue;
    }

    if (isset($categoryFilter) && !in_array($task['category'], $categoryFilter)) {
      continue;
    }

    if (isset($colorFilter) && !in_array($task['color'], $colorFilter)) {
      continue;
    }

    // Si les critères d'affichages sont validés, on ajoute la tâche au tableau $todoList
    $todoList[] = $task;
  }

?>
