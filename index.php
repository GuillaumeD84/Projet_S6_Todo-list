<?php

  // On active les sessions
  session_start();

  if(isset($_GET['save'])) {
    $_SESSION['dataSaved'] = $_GET['save'];
  }

  var_dump($_SESSION);

  // Templates de données
  require_once('data/dataTasks.php');
  require_once('data/colors.php');
  require_once('data/categories.php');

  // Templates de contenus
  require_once('templates/header.php');
  require_once('templates/content.php');
  require_once('templates/footer.php');
?>
