<!-- Div contenant un champ et 2 boutons pour le nom de la tâche à éditer -->
<div id="taskNameDiv" class="taskName">

  <form class="taskNameForm" action="templates/editTaskName.php" method="post">

    <!-- Un champ texte pour appliquer le nouveau nom -->
    <div id="taskNameText" class="taskNameDiv">
      <input id="" type="text" name="newTaskName" value="<?= $task['title']; ?>"><br>
    </div>

    <!-- 2 boutons pour appliquer ou annuler la modification -->
    <div id="taskNameButtons" class="taskNameDiv">
      <input type="submit" value="Modifier">
      <input type="button" name="cancelNewName" value="Annuler">
    </div>

    <input id="hiddenInputTaskNameEdit" type="hidden" name="editTaskNameId" value="<?= $task['id']; ?>" />

  </form>

</div>
