var app = {
  init: function() {

    // Un event 'click' sur l'icône d'édition du nom de la tâche
    $('.fa-pencil-square-o').on('click', app.editItem);

    $('input[name=\'cancelNewName\']').on('click', app.cancelNewName)

    // 2 events pour l'affichage et le masquage de la fenêtre de choix des filtres catégories et couleurs
    $('#filterDisplayButton').on('click', app.displayFilters);
    $(document).on('click', app.hideFilters);

    // Un event 'change' pour mettre à jour la couleur du background de la balise <select> concernant le choix de la couleur de la nouvelle tâche
    $('#newTaskColor').on('change', app.editSelectTagColor);

  },
  editItem: function(evt) {

    var editDiv = $(evt.target).parent().parent().prev().prev();
    var itemTitle = editDiv.text().trim();

    editDiv.parent().children('.task-name').hide();
    editDiv.parent().children('#taskNameDiv').show();

  },
  displayFilters: function(evt) {

    // On stop la propagation des events sinon on déclencherai également l'event app.hideFilters() qui masque la fenêtre car on clique sur le bouton mais aussi sur le document, donc 2 events.
    evt.stopPropagation();

    // On affiche/masque la fenêtre des filtres
    $('#filtersDiv').toggle(200, 'linear');

  },
  hideFilters: function(evt) {

    // On test que l'on clique bien en dehors de la fenêtre de choix des filtres
    if (!($(evt.target).hasClass('filters') || $(evt.target).parent().hasClass('filters'))) {
      // On récupère l'état 'display' de la fenêtre
      var filtersDivDisplay = $('#filtersDiv').css('display');

      // Si la fenêtre est visible on la masque
      if (filtersDivDisplay !== 'none') {
        $('#filtersDiv').fadeOut(200);
      }
    }

  },
  editSelectTagColor: function(evt) {

    // On applique une nouvelle couleur au background du <select> en fonction du choix de l'utilisateur
    $('#newTaskColor').css('background', $(evt.target)[0].value);

  },
  deleteTaskConfirmation: function(taskId) {

    // On demande confirmation à l'utilisateur s'il souhaite vraiment supprimer la tâche sélectionnée
    var answer = confirm('Are you sure you want to delete this task ?');

    // Si oui, on se sert de l'input hidden (contenu en bas de listItems.php) afin de submit() le formulaire associé et pouvoir gérer en $_POST quelle tâche doit être supprimée. $_POST contiendra la value de l'input hidden et donc on exploitera en php cette valeur pour supprimer notre tâche
    if (answer) {
      $('#hiddenInputTaskDelete').val('rm-' + taskId);
      $('#hiddenFormTaskDelete').submit();
    }

  },
  cancelNewName: function(evt) {

    var editDiv = $(evt.target).parent().parent().parent().parent();

    editDiv.children('.task-name').show();
    editDiv.children('#taskNameDiv').hide();

  }
};

document.addEventListener('DOMContentLoaded', app.init);
