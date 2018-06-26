'use strict';

// Register `contact` component, along with its associated controller and template
angular.
  module('contact').
  component('contact', {
    templateUrl: '../../views/contact.html',
    controller: class {
      submit() {
        var forms = document.getElementsByClassName('needs-validation');
        
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }
    }
  });