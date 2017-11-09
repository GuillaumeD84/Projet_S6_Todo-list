<!-- Formulaire pour l'ajout de nouvelle tâche -->
<form id="newTask" action="templates/addNewTask.php" method="post">

  <!-- Input text pour le nom -->
  <input id="newTaskName" type="text" name="newTaskName" placeholder="Nouvelle tâche"><!--

  Une select pour choisir une catégorie
  --><select id="newTaskCategory" name="taskCategorySelect">
  <?php foreach ($categoriesList as $category) { ?>
    <option value="<?= $category; ?>"><?= $category; ?></option>
  <?php } ?>
  </select><!--

  Une select pour choisir une couleur
  --><select id="newTaskColor" name="taskColorSelect">
  <?php foreach ($colorsList as $color) { ?>
    <option value="<?= $color; ?>" style="background-color:<?= $color; ?>"></option>
  <?php } ?>
  </select><!--

  Un bouton pour soumettre la nouvelle tâche
  --><input id="newTaskAddButton" type="submit" value="Ajouter">

</form>
