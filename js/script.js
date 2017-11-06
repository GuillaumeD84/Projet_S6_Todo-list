var app = {
  init: function() {
    app.createEvent();
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
