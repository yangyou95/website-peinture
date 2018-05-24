'use strict';

// Register `windowpopup` component, along with its associated controller and template
angular.
  module('windowpopup').
  component('windowpopup', {
    templateUrl: '../../views/window-popup.html',
    bindings: {
        peinture: '<'
    },
    controller: class {
        constructor() {
            this.photos = [
                {
                    name: 'DA-MA-1_Dassonneville_(a)',
                    ref: '../ressources/Productions-Personnelles/Dassonneville/DA-MA-1_Dassonneville_(a).png'
                },
                {
                    name: 'DA-MA-1_Dassonneville_(b)',
                    ref: '../ressources/Productions-Personnelles/Dassonneville/DA-MA-1_Dassonneville_(b).png'
                }
            ]
        }

        get name() {
            return this.peinture.name;
        }

        get ref() {
            return this.peinture.ref;
        }

        get description() {
            return this.peinture.description;
        }

        get prix() {
            return this.peinture.prix;
        }

        init(p) {
            this.photos.unshift({
                name: p.name,
                ref: p.ref
            });
            this.selectionnerPhoto(this.photos[0]);
        }

        selectionnerPhoto(photo) {
            console.log("coucou");
            this.selection = photo;
        }
    }
  });