var app = {
  init: function() {
    app.createEvent();

    $('.fa-pencil-square-o').on('click', app.editItem);
    $('#filterDisplayButton').on('click', app.displayFilters);
    $(document).on('click', app.hideFilters);
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
  createEvent: function() {
    var myButton = document.getElementById('newTaskAddButton');
    myButton.addEventListener('click', app.eventTest);
  },
  eventTest: function(evt) {
    // evt.preventDefault();
    console.log('Clique clique clique !!!');
  }
};

document.addEventListener('DOMContentLoaded', app.init);
