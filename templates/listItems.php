<ul id="listTasks">
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
    foreach ($todoList as $task) {
      if (isset($finishFilter) && ($finishFilter === 'yes' && !$task['status'] || $finishFilter === 'no' && $task['status'])) {
        continue;
      }

      if (isset($categoryFilter) && !in_array($task['category'], $categoryFilter)) {
        continue;
      }

      if (isset($colorFilter) && !in_array($task['color'], $colorFilter)) {
        continue;
      }
  ?>

  <li class="todo-item cat-<?= $task['category'] ?> color-<?= $task['color']; ?> status-<?= ($task['status'] ? 'yes' : 'no') ?>">
    <div class="task-name">
      <p><?= $task['title'] ?></p><span class="task-category"> - <?= $task['category'] ?></span></div>

    <div class="actions">
      <?php if ($task['status']): ?><span><i class="fa fa-check-square-o" aria-hidden="true"></i></span><!--
      --><?php else: ?><span><i class="fa fa-square-o" aria-hidden="true"></i></span><!--
      --><?php endif; ?><!--
      --><span><i class="fa fa-tags" aria-hidden="true"></i></span><!--
      --><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span><!--
      --><span><i class="fa fa-trash" aria-hidden="true"></i></span>
      &nbsp;
    </div>

  </li>
<?php } ?>
</ul>
