<body>
  <!-- Englobe l'application -->
  <div id="container">
    <!-- Header pour filtrer les tâches -->
    <header id="filterTasks">
      <h1><a href="?">Todo<span>list</span></a></h1>

      <!-- 2 boutons pour sélectionner et appliquer les filtres catégories et couleurs -->
      <div id="filtersOption">
        <input id="filterDisplayButton" type="button" name="filterButton" value="Filters">
        <form class=""method="get">
          <?php require_once('filters.php'); ?>
          <input id="applyFilterButton" type="submit" value="Apply">
        </form>
      </div>

      <!-- 3 links pour filtrer les tâches terminées/non terminées -->
      <div class="actions">
        <span class="<?= !isset($_SESSION['finish']) ? 'active' : ''?>"><a href="?clear">All</a></span><!--
        --><span class="<?= $_SESSION['finish'] === 'no' ? 'active' : ''?>"><a href="?finish=no">Todo</a></span><!--
        --><span class="<?= $_SESSION['finish'] === 'yes' ? 'active' : ''?>"><a href="?finish=yes">Completed</a></span>
      </div>
    </header>

    <!-- Affichage des tâches avec les 4 icônes d'éditions -->
    <?php require_once('listItems.php'); ?>

    <hr class="separator">

    <!-- Formulaire d'ajout de nouvelles tâches -->
    <?php require_once('form.php'); ?>
  </div>
