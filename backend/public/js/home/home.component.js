'use strict';

// Register `home` component, along with its associated controller and template
angular.
  module('home').
  component('home', {
    templateUrl: '../../views/home.html',
    controller: class {
      constructor() {
        this.img = [
          {
            ref: "../ressources/Productions-Personnelles/Dassonneville/DA-MA-1_Dassonneville_(a).png"
          },
          {
            ref: "../ressources/Restaurations/Paris/PARIS-1_Jean-Bernard_TROTZIER_(e)_(1).png"
          },
          {
            ref: "../ressources/Beaux-Arts/Coffret-Aquarelle/ART-BA_1_Coffret_Aquarelle_(a)_(1).png"
          },
          {
            ref: "../ressources/Beaux-Arts/Coffret-Aquarelle/ART-BA_1_Coffret_Aquarelle_(a)_(1).png"
          }
        ]
      }

      init(id) {
        switch(id) {
          case 0: {
            $("#prodPerso").css("background-image", "url('"+this.img[0].ref+"')");
            $("#prodPerso").height($("#prodPerso").width()); 
            break;
          }
          case 1: {
            $("#restaurations").css("background-image", "url('"+this.img[1].ref+"')");
            break;
          }
          case 2: {
            $("#beauxArts").css("background-image", "url('"+this.img[2].ref+"')");
            break;
          }
          case 3: {
            $("#evenements").css("background-image", "url('"+this.img[3].ref+"')");
            $("#evenements").height($("#evenements").width()); 
            break;
          }
        }
      }
    }
  });