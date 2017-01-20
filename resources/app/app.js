/**
 *  Configuration de l'environnement
 */
var __ENV = window.__env;

/**
 *  Déclaration de l'application Angular
 */
var app = angular.module('StartupUTC', ['ngRoute', 'ngResource', 'ui.bootstrap', 'nouislider']).constant('__ENV', __ENV);;

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
   .when("/search", {
       templateUrl : "app/components/search/search_index.html"
   })
   .when("/startup/:id", {
       templateUrl : "app/components/startup/startup_show.html"
   })
   // Erreurs
   .when("/error/:status", {
       templateUrl : "app/components/error/error_show.html"
   })
   // Contact
   .when("/contact", {
       templateUrl : "app/components/contact/contact_index.html"
   })
   .otherwise({redirectTo : "/error/404"});
});

/**
 *  Affecte la class du body à chaque template
 */
app.run( function($rootScope, $location) {
  $rootScope.$on('$routeChangeSuccess', function (event, currentRoute) {
      switch(currentRoute.templateUrl) {
          case 'app/components/home/home_index.html':
            $rootScope.bodyClass = 'landing-page';
            break;
          default:
            $rootScope.bodyClass = 'index-page';
            break;
      }
  });
});

/**
 *  Supprime le point d'exclamation dans les URLs
 */
app.config(['$locationProvider', function($locationProvider) {
  $locationProvider.html5Mode(false);
  $locationProvider.hashPrefix('');
}]);
