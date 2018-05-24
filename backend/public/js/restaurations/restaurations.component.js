'use strict';

// Register `restaurations` component, along with its associated controller and template
angular.
  module('restaurations').
  component('restaurations', {
    templateUrl: '../../views/restaurations.html',
    controller: function PeintureListController() {
      this.peintures = [
        {
          name: 'DA-MA-1_Dassonneville_(a)',
          ref: '../ressources/Productions-Personnelles/Dassonneville/DA-MA-1_Dassonneville_(a).png',
          description: 'Description, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae architecto facere consequatur possimus a? Quidem, commodi ipsa voluptatum doloribus consequatur eveniet rem voluptate, architecto iusto quam culpa porro, totam odit.',
          prix: 2500
        }, {
          name: 'DA-MA-1_Dassonneville_(b)',
          ref: '../ressources/Productions-Personnelles/Dassonneville/DA-MA-1_Dassonneville_(b).png',
          description: 'Description, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae architecto facere consequatur possimus a? Quidem, commodi ipsa voluptatum doloribus consequatur eveniet rem voluptate, architecto iusto quam culpa porro, totam odit.',
          prix: 2500
        }, {
          name: 'DA-MA-1_Dassonneville_(c)',
          ref: '../ressources/Productions-Personnelles/Dassonneville/DA-MA-1_Dassonneville_(c).png',
          description: 'Description, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae architecto facere consequatur possimus a? Quidem, commodi ipsa voluptatum doloribus consequatur eveniet rem voluptate, architecto iusto quam culpa porro, totam odit.',
          prix: 2500
        }, {
          name: 'DA-MA-1_Dassonneville_(e)',
          ref: '../ressources/Productions-Personnelles/Dassonneville/DA-MA-1_Dassonneville_(e).png',
          description: 'Description, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae architecto facere consequatur possimus a? Quidem, commodi ipsa voluptatum doloribus consequatur eveniet rem voluptate, architecto iusto quam culpa porro, totam odit.',
          prix: 2500
        }, {
          name: 'PARIS-1_DASSONNEVILLE_(a)',
          ref: '../ressources/Productions-Personnelles/PARIS-1_DASSONNEVILLE_(a).png',
          description: 'Description, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae architecto facere consequatur possimus a? Quidem, commodi ipsa voluptatum doloribus consequatur eveniet rem voluptate, architecto iusto quam culpa porro, totam odit.',
          prix: 2500
        }, {
          name: 'DA-CF-2_Dassonneville_(a)',
          ref: '../ressources/Productions-Personnelles/DA-CF-2_Dassonneville_(a).png',
          description: 'Description, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae architecto facere consequatur possimus a? Quidem, commodi ipsa voluptatum doloribus consequatur eveniet rem voluptate, architecto iusto quam culpa porro, totam odit.',
          prix: 2500
        }, {
          name: 'DA-CF-1_Dassonneville_(a)',
          ref: '../ressources/Productions-Personnelles/DA-CF-1_Dassonneville_(a).png',
          description: 'Description, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae architecto facere consequatur possimus a? Quidem, commodi ipsa voluptatum doloribus consequatur eveniet rem voluptate, architecto iusto quam culpa porro, totam odit.',
          prix: 2500
        }
      ];
    }
  });