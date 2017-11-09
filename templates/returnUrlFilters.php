<?php

// Afin de pouvoir rester sur la même page qu'au moment lors d'une action, on se doit de rediriger l'utilisateur vers la bonne url. Pour ce faire on créé un string '$urlFilters' qui contiendra tous les $_GET des filtres qu'il aura appliqué et on l'ajoutera dans notre header();
$urlFilters = '';

if (isset($_SESSION['finish'])) {
  $urlFilters .= 'finish='.$_SESSION['finish'].'&';
}

if (isset($_SESSION['category'])) {
  foreach ($_SESSION['category'] as $filteredCategory) {
    $urlFilters .= 'category%5B%5D='.$filteredCategory.'&';
  }
}

if (isset($_SESSION['color'])) {
  foreach ($_SESSION['color'] as $filteredColor) {
    $urlFilters .= 'color%5B%5D='.$filteredColor.'&';
  }
}

// On supprime le '&' parasite
$urlFilters = substr($urlFilters, 0, -1);

?>
