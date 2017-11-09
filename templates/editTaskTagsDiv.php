<!-- Div contenant 2 selects et 2 boutons pour les tags de la tâche à éditer -->
<div id="taskTagsDiv" class="taskTags">

  <form class="taskTagsForm" action="templates/editTaskTags.php" method="post">

    <!-- La div contenant nos deux <select> -->
    <div id="taskTagsSelect" class="taskTagsDiv">
      <!-- Une select pour choisir la nouvelle catégorie -->
      <select id="editTaskCategory" name="editTaskCategorySelect">
      <?php foreach ($categoriesList as $category) { ?>
        <option value="<?= $category; ?>"><?= $category; ?></option>
      <?php } ?>
      </select>

      <!-- Une select pour choisir la nouvelle couleur -->
      <select id="editTaskColor" name="editTaskColorSelect">
      <?php foreach ($colorsList as $color) { ?>
        <option value="<?= $color; ?>" style="background-color:<?= $color; ?>"></option>
      <?php } ?>
      </select>
    </div>

    <!-- 2 boutons pour appliquer ou annuler la modification -->
    <div id="taskTagsButtons" class="taskTagsDiv">
      <input type="submit" value="Modifier">
      <input type="button" name="cancelNewTags" value="Annuler">
    </div>

    <input id="hiddenInputTaskTagsEdit" type="hidden" name="editTaskTagsId" value="<?= $task['id']; ?>" />

  </form>

</div>
