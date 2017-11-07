<ul id="listTasks">
  <?php
    foreach ($todoList as $task) {
      if (isset($_GET['finish']) && ($_GET['finish'] === 'yes' && !$task['status'] || $_GET['finish'] === 'no' && $task['status'])) {
        continue;
      }

      echo '<li class="todo-item cat-'.$task['category'].' color-'.$task['color'].' status-'.($task['status'] ? 'yes' : 'no').'">';
      echo '<div class="task-name">'.$task['title'].'</div>';
      include('taskIcons.php');
      echo '</li>';
    }
  ?>
</ul>
