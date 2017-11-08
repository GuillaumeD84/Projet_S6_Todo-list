var app = {
  init: function() {

    $('.fa-pencil-square-o').on('click', app.editItem);

    $('#filterDisplayButton').on('click', app.displayFilters);
    $(document).on('click', app.hideFilters);

    $('#newTaskColor').on('change', app.editSelectTagColor);

  },
  editItem: function(evt) {

    var editDiv = $(evt.target).parent().parent().prev();
    var itemTitle = editDiv.text().trim();
    console.log(itemTitle);

    var input = $('<input>').attr('type', 'text').val(itemTitle);
    // editDiv.empty();
    editDiv.append(input);

  },
  displayFilters: function(evt) {

    evt.stopPropagation();
    $('#filtersDiv').toggle(200, 'linear');

  },
  hideFilters: function(evt) {

    if (!($(evt.target).hasClass('filters') || $(evt.target).parent().hasClass('filters'))) {
      var filtersDivDisplay = $('#filtersDiv').css('display');

      if (filtersDivDisplay !== 'none') {
        $('#filtersDiv').fadeOut(200);
      }
    }

  },
  editSelectTagColor: function(evt) {

    $('#newTaskColor').css('background', $(evt.target)[0].value);

  },
  deleteConfirmation: function(taskId) {
    console.log(taskId);
    var answer = confirm('Are you sure you want to delete this task ?');

    if (answer) {
      $('#hiddenInputTaskDelete').val('rm-' + taskId);
      $('#hiddenFormTaskDelete').submit();
    }

  }
};

document.addEventListener('DOMContentLoaded', app.init);
