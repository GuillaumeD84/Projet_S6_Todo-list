var app = {
  init: function() {

    // Un event 'click' sur l'icône d'édition du nom de la tâche
    $('.fa-pencil-square-o').on('click', app.editTask);

    // Un event 'click' sur l'icône d'édition des tags de la tâche
    $('.fa-tags').on('click', app.editTask);

    // On ajoute un event sur le bouton 'cancel' du form lorsque l'on souhaite modifier le nom d'une tâche
    $('input[name=\'cancelNewName\']').on('click', app.cancelEdition);
    $('input[name=\'cancelNewTags\']').on('click', app.cancelEdition);

    // 2 events pour l'affichage et le masquage de la fenêtre de choix des filtres catégories et couleurs
    $('#filterDisplayButton').on('click', app.displayFilters);
    $(document).on('click', app.hideFilters);

    // Un event 'change' pour mettre à jour la couleur du background de la balise <select> concernant le choix de la couleur de la nouvelle tâche
    $('#newTaskColor').on('change', app.editSelectTagColor);

  },
  editTask: function(evt) {

    // On récupère la tâche de la liste sur laquelle on souhaite modifier le nom
    var editDiv = $(evt.target).parent().parent().prev().prev();
    // On supprime les espaces avant et après le texte
    var itemTitle = editDiv.text().trim();

    // On cache le nom de la tâche et on affiche le formulaire d'édition du nom à la place
    editDiv.parent().children('.task-name').hide();

    if (evt.target.className === 'fa fa-pencil-square-o') {
      editDiv.parent().children('#taskTagsDiv').hide();
      editDiv.parent().children('#taskNameDiv').show();
    }
    else if (evt.target.className === 'fa fa-tags') {
      editDiv.parent().children('#taskNameDiv').hide();
      editDiv.parent().children('#taskTagsDiv').show();
    }

  },
  cancelEdition: function(evt) {

    // On récupère la tâche de la liste affectée par la demande d'annulation de l'édition du nom
    var editDiv = $(evt.target).parent().parent().parent().parent();

    // On masque le formulaire d'édition et on réaffiche le nom à la place
    editDiv.children('.task-name').show();
    editDiv.children('#taskNameDiv').hide();
    editDiv.children('#taskTagsDiv').hide();

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

  }
};

document.addEventListener('DOMContentLoaded', app.init);
