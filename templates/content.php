<body>
  <!-- Englobe l'application -->
  <div id="container">
    <!-- Header pour filtrer les tâches -->
    <header id="filterTasks">
      <h1>Todolist</h1>
      <div class="actions">
        <span>All</span><!--
        --><span>Todo</span><!--
        --><span>Completed</span>
      </div>
    </header>

    <!-- Liste des tâches -->
    <?php require_once('listItems.php'); ?>

    <hr class="separator">

    <!-- Formulaire d'ajout de tâches -->
    <?php require_once('form.php'); ?>
  </div>
