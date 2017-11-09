<!-- Une liste qui affiche les tâches -->
<ul id="listTasks">
  <?php foreach ($todoList as $task) { ?>

    <!-- On met chaque tâche de notre '$todoList' dans des <li> -->
    <li class="todo-item cat-<?= $task['category']; ?> status-<?= ($task['status'] ? 'yes' : 'no'); ?> colorborder-<?= $task['color']; ?>">

      <!-- Le nom de la tâche avec sa catégorie (Nom - catégorie) -->
      <div class="task-name color-<?= $task['color']; ?>">
        <p><?= $task['title']; ?></p><span class="task-category"> - <?= $task['category']; ?></span></div>

      <?php require('editTaskNameDiv.php') ?>
      <?php require('editTaskTagsDiv.php') ?>

      <!-- Les 4 icônes pour l'édition de la tâche -->
      <div class="actions">
        <?php if ($task['status']): ?><span><a class="fa fa-check-square-o" aria-hidden="true" href="?check=n-<?= $task['id']; ?>"></a></span><!--
        --><?php else: ?><span><a class="fa fa-square-o" aria-hidden="true" href="?check=y-<?= $task['id']; ?>"></a></span><!--
        --><?php endif; ?><!--
        --><span><i class="fa fa-tags" aria-hidden="true"></i></span><!--
        --><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span><!--
        --><span><a class="fa fa-trash" aria-hidden="true" href="javascript:void(0)" onclick="app.deleteTaskConfirmation(<?= $task['id']; ?>)"></a></span>
        &nbsp;
      </div>

    </li>

  <?php } ?>

</ul>

<!-- Un input hidden pour la gestion de la suppression des tâches. Ce form sera submit() en JS afin de pouvoir demander au préalable une confirmation de l'utilisateur via une confirm box avant d'effectivement supprimer la tâche concernée -->
<form id="hiddenFormTaskDelete" action="templates/removeTask.php" method="post">
  <input id="hiddenInputTaskDelete" type="hidden" name="deleteTask" value="" />
</form>
