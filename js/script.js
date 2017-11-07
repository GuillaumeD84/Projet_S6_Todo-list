var app = {
  init: function() {
    app.createEvent();

    $('.fa-pencil-square-o').on('click', app.editItem);
  },
  editItem: function(evt) {

    var editDiv = $(evt.target).parent().parent().prev();
    var itemTitle = editDiv.text().trim();
    console.log(itemTitle);

    var input = $('<input>').attr('type', 'text').val(itemTitle);
    // editDiv.empty();
    editDiv.append(input);

  },
  createEvent: function() {
    var myButton = document.getElementById('addTaskButton');
    myButton.addEventListener('click', app.eventTest);
  },
  eventTest: function(evt) {
    evt.preventDefault();
    console.log('Clique clique clique !!!');
  }
};

document.addEventListener('DOMContentLoaded', app.init);
