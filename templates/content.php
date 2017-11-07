<body>
  <!-- Englobe l'application -->
  <div id="container">
    <!-- Header pour filtrer les tâches -->
    <header id="filterTasks">
      <h1>Todolist</h1>

      <div id="filtersOption">
        <input id="filterDisplayButton" type="button" name="filterButton" value="Filters">
        <form class=""method="get">
          <?php require_once('filters.php'); ?>
          <input id="applyFilterButton" type="submit" value="Apply">
        </form>
      </div>

      <div class="actions">
        <span><a href="?">All</a></span><!--
        --><span><a href="?finish=no">Todo</a></span><!--
        --><span><a href="?finish=yes">Completed</a></span>
      </div>
    </header>

    <!-- Liste des tâches -->
    <?php require_once('listItems.php'); ?>

    <hr class="separator">

    <!-- Formulaire d'ajout de tâches -->
    <?php require_once('form.php'); ?>
  </div>
