<form id="newTask" action="templates/addNewTask.php" method="post">
  <input id="newTaskName" type="text" name="newTaskName" placeholder="Nouvelle tâche"><!--

  --><select id="newTaskCategory" name="taskCategorySelect">
  <?php foreach ($categoriesList as $category) { ?>
    <option value="<?= $category; ?>"><?= $category; ?></option>
  <?php } ?>
  </select><!--

  --><select id="newTaskColor" name="taskColorSelect">
  <?php foreach ($colorsList as $color) { ?>
    <option value="<?= $color; ?>" style="background-color:<?= $color; ?>"></option>
  <?php } ?>
  </select><!--
  --><input id="newTaskAddButton" type="submit" value="Ajouter">
</form>
