<ul id="listTasks">
  <?php foreach ($todoList as $task) { ?>

    <li class="todo-item cat-<?= $task['category']; ?> status-<?= ($task['status'] ? 'yes' : 'no'); ?> colorborder-<?= $task['color']; ?>">

      <div class="task-name color-<?= $task['color']; ?>">
        <p><?= $task['title']; ?></p><span class="task-category"> - <?= $task['category']; ?></span></div>

      <div class="actions">
        <?php if ($task['status']): ?><span><a class="fa fa-check-square-o" aria-hidden="true" href="?check=n-<?= $task['id']; ?>"></a></span><!--
        --><?php else: ?><span><a class="fa fa-square-o" aria-hidden="true" href="?check=y-<?= $task['id']; ?>"></a></span><!--
        --><?php endif; ?><!--
        --><span><i class="fa fa-tags" aria-hidden="true"></i></span><!--
        --><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span><!--
        --><span><a class="fa fa-trash" aria-hidden="true" href="javascript:void(0)" onclick="app.deleteConfirmation(<?= $task['id']; ?>)"></a></span>
        &nbsp;
      </div>

    </li>

  <?php } ?>

</ul>

<form id="hiddenFormTaskDelete" action="templates/removeTask.php" method="post">
  <input id="hiddenInputTaskDelete" type="hidden" name="deleteTask" value="" />
</form>
