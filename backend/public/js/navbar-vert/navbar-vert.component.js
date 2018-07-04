'use strict';

// Register `navbarvert` component, along with its associated controller and template
angular.
  module('navbarvert').
  component('navbarvert', {
    templateUrl: '../../views/navbar-vert.html',
    bindings: {
      menu: '<'
    },
    controller: class {
      get href() {
        return "#!/" + this.menu;
      }
    }
  });