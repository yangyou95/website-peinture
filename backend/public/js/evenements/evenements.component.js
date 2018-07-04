'use strict';

// Register `evenements` component, along with its associated controller and template
angular.
  module('evenements').
  component('evenements', {
    templateUrl: '../../views/evenements.html',
    controller: class {
      constructor() {
        this.events = [
          {
            nom: "Vente Courante",
            adresse: "Argenteuil",
            date_debut: "30 juin",
            heure: "15h30",
            description: "Petite vente aux enchères"
          },
          {
            nom: "Vente Bimensuelle",
            adresse: "Le Coudray",
            date_debut: "26 juin",
            heure: "9h30",
            description: "Vente aux enchères"
          },
          {
            nom: "Exposition",
            adresse: "Rouen",
            date_debut: "30 juin",
            date_fin: "25 juillet",
            description: "Exposition de tableaux"
          }
        ];
      }

    }
  });