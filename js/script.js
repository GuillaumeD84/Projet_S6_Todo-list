var app = {
  init: function() {
    app.createEvent();

    $('.fa-pencil-square-o').on('click', app.editItem);
    $('#filterDisplayButton').on('click', app.displayFilters);
    // $(document).on('click', app.hideFilters);
  },
  editItem: function(evt) {

    var editDiv = $(evt.target).parent().parent().prev();
    var itemTitle = editDiv.text().trim();
    console.log(itemTitle);

    var input = $('<input>').attr('type', 'text').val(itemTitle);
    // editDiv.empty();
    editDiv.append(input);

  },
  displayFilters: function() {
    var filtersDivDisplay = $('.filters').css('display');

    if (filtersDivDisplay === 'none') {
      $('.filters').css('display', 'block');
    }
    else {
      $('.filters').css('display', 'none');
    }
  },
  hideFilters: function() {
    var filtersDivDisplay = $('.filters').css('display');

    if (filtersDivDisplay !== 'none') {
      $('.filters').css('display', 'none');
    }
  },
  createEvent: function() {
    var myButton = document.getElementById('newTaskAddButton');
    myButton.addEventListener('click', app.eventTest);
  },
  eventTest: function(evt) {
    evt.preventDefault();
    console.log('Clique clique clique !!!');
  }
};

document.addEventListener('DOMContentLoaded', app.init);
