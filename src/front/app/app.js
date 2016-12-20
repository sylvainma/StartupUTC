/**
 *  Configuration de l'environnement
 */
var __ENV = window.__env;

/**
 *  Déclaration de l'application Angular
 */
var app = angular.module('StartupUTC', ['ngRoute', 'ngResource', 'ui.bootstrap']).constant('__ENV', __ENV);;


/**
 *  Configuration des routes
 */
app.config(function($routeProvider) {
   $routeProvider
   // Home
   .when("/", {
       templateUrl : "app/components/home/home_index.html"
   })
   // Startups
   .when("/startups", {
       templateUrl : "app/components/startups/startups_index.html"
   })
   .when("/startups/:id", {
       templateUrl : "app/components/startups/startups_show.html"
   })
   // Erreurs
   .when("/error/:status", {
       templateUrl : "app/components/error/error_show.html"
   })
   .otherwise({redirectTo : "/error/404"});
});

/**
 *  Supprime le point d'exclamation dans les URLs
 */
app.config(['$locationProvider', function($locationProvider) {
  $locationProvider.html5Mode(false);
  $locationProvider.hashPrefix('');
}]);
