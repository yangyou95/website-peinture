'use strict';

// Register `miniature` component, along with its associated controller and template
angular.
  module('miniature').
  component('miniature', {
    templateUrl: '../../views/miniature.html',
    bindings: {
        peinture: '<'
    },
    controller: class {
        constructor() {
            var i = Math.floor(Math.random() * Math.floor(15000));
            this.id = "modal_" + i;
        }

        get name() {
            return this.peinture.name;
        }

        get ref() {
            return this.peinture.ref;
        }

        get modal() {
            return this.id;
        }
    }
  });