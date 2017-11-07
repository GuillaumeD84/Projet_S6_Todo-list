<ul id="listTasks">
  <?php
    foreach ($todoList as $task) {
      if (isset($_GET['finish']) && ($_GET['finish'] === 'yes' && !$task['status'] || $_GET['finish'] === 'no' && $task['status'])) {
        continue;
      }

      if (isset($_GET['category']) && !in_array($task['category'], $_GET['category'])) {
        continue;
      }

      if (isset($_GET['color']) && !in_array($task['color'], $_GET['color'])) {
        continue;
      }
  ?>

  <li class="todo-item cat-<?= $task['category'] ?> color-<?= $task['color']; ?> status-<?= ($task['status'] ? 'yes' : 'no') ?>">
    <div class="task-name"><?= $task['title'] ?></div>

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
