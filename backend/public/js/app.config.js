'use strict';

angular.
  module('mainApp').
  config(['$locationProvider' ,'$routeProvider',
    function config($locationProvider, $routeProvider) {
      $locationProvider.hashPrefix('!');

      $routeProvider.
        when('/home', {
          template: '<home></home>'
        }).
        when('/', {
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
        when('/evenements', {
          template: '<evenements></evenements>'
        }).
        when('/contact', {
          template: '<contact></contact>'
        })
    }
  ]);