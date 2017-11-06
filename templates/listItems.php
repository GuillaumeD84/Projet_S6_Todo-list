<ul id="listTasks">
  <?php
    for ($i=1; $i <= 20; $i++) {
      echo '<li class="todo-item">';
      echo '<div class="task-name">Tâche '.$i.'</div>';
      include('taskIcons.php');
      echo '</li>';
    }
  ?>
</ul>
