<?php

$tasksList = array();
$todoList = array();

// Format par défault d'une tâche
// [
//   'id' => '',
//   'title' => '',
//   'category' => '',
//   'color' => '',
//   'status' => ''
// ]

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

if (!isset($_SESSION['nbrTask'])) $_SESSION['nbrTask'] = count($tasksList);

// On récupère les tâches ajoutées dans la session
if (isset($_SESSION['newTasks'])) {
  foreach ($_SESSION['newTasks'] as $newTask) {
    $tasksList[] = $newTask;
  }
}

// Boucle qui edit les tâches
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

?>

<?php

  // On stocke des données du '$_GET' dans notre '$_SESSION'
  if (empty($_GET)) {
    unset($_SESSION['finish'], $_SESSION['category'], $_SESSION['color']);
  }

  if (isset($_GET['clear'])) {
    unset($_SESSION['finish']);
  }

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


  // On filtre les tâches à afficher selon les données présentes dans le '$_GET'
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

    $todoList[] = $task;
  }

?>
