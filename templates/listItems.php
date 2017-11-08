<ul id="listTasks">
  <?php foreach ($todoList as $task) { ?>

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
