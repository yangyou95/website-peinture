'use strict';

angular.
  module('mainApp').
  config(['$locationProvider' ,'$routeProvider', '$translateProvider',
    function config($locationProvider, $routeProvider, $translateProvider) {
      $locationProvider.hashPrefix('!');

      $routeProvider.
        when('/home', {
          template: '<home></home>'
        }).
        when('/about', {
          template: '<aboutus></aboutus>'
        }).
        when('/prodperso', {
          template: '<prodperso></prodperso>'
        }).
        when('/restaurations', {
          template: '<restaurations></restaurations>'
        }).
        when('/beauxarts', {
          template: '<beauxarts></beauxarts>'
        }).
        otherwise('/home');

      /*$translateProvider.useStaticFilesLoader({
          prefix: '../ressources/translations/',
          suffix: '.json',
        })*/
      $translateProvider.translations('en', {
        "home": "hello",
        "about": {
    
        },
        "menu": {
            "tab-one": "Personal productions",
            "tab-two": "restorations",
            "tab-three": "Fine arts objects",
            "search": "Search"
        }
      });
      $translateProvider.translations('fr', {
        "home": "coucou",
        "about": {
    
        },
        "menu": {
            "tab-one": "Productions personnelles",
            "tab-two": "Restaurations",
            "tab-three": "Objets de beaux-arts",
            "search": "Rechercher"
        }
      });
      $translateProvider.preferredLanguage('fr');
      $translateProvider.useMissingTranslationHandlerLog();
    }
  ]);