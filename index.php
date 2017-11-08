<?php

  // On active les sessions
  session_start();

  // Templates de données
  require_once('data/editCheckState.php');
  require_once('data/dataTasks.php');
  require_once('data/colors.php');
  require_once('data/categories.php');

  // Templates de contenus
  require_once('templates/header.php');
  require_once('templates/content.php');
  require_once('templates/footer.php');

?>
