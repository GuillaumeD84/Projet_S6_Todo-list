<?php

$tasksList = array();
$todoList = array();

// Format par défault d'une tâche
// [
//   'title' => '',
//   'category' => '',
//   'color' => '',
//   'status' => ''
// ]

$tasksList = [

  [
    'title' => 'Développer une todo list',
    'category' => 'Job',
    'color' => 'dimgray',
    'status' => false
  ],
  [
    'title' => 'Acheter du lait',
    'category' => 'Shopping',
    'color' => 'rebeccapurple',
    'status' => false
  ],
  [
    'title' => 'Appeler le Psy',
    'category' => 'Important',
    'color' => 'red',
    'status' => true
  ],
  [
    'title' => 'Découvrir PHP',
    'category' => 'Job',
    'color' => 'dimgray',
    'status' => true
  ],
  [
    'title' => 'Faire le ménage',
    'category' => 'Chores',
    'color' => 'chocolate',
    'status' => false
  ],
  [
    'title' => 'Acheter des cookies',
    'category' => 'Important',
    'color' => 'forestgreen',
    'status' => false
  ],
  [
    'title' => 'Faire une pause',
    'category' => 'Misc.',
    'color' => 'cornflowerblue',
    'status' => false
  ],
  [
    'title' => 'Mangez 5 fruits et légumes par jour',
    'category' => 'Misc.',
    'color' => 'forestgreen',
    'status' => false
  ],
  [
    'title' => 'Replay !!!',
    'category' => 'Job',
    'color' => 'gold',
    'status' => false
  ],
  [
    'title' => 'Réparer le volet',
    'category' => 'Home',
    'color' => 'chocolate',
    'status' => true
  ],
  [
    'title' => 'Appeler Yann',
    'category' => 'Contacts',
    'color' => 'rebeccapurple',
    'status' => false
  ],
  [
    'title' => 'AIM training',
    'category' => 'Gaming',
    'color' => 'dimgray',
    'status' => false
  ],
  [
    'title' => 'Acheter du café',
    'category' => 'Important',
    'color' => 'red',
    'status' => false
  ],
  [
    'title' => 'Jouer avec le chien',
    'category' => 'Home',
    'color' => 'cornflowerblue',
    'status' => true
  ],
  [
    'title' => 'S\'amuser avec les challenges de Julien',
    'category' => 'Job',
    'color' => 'gold',
    'status' => false
  ],

]

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
  foreach ($tasksList as $task) {
    
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
