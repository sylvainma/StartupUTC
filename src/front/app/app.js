var __ENV = { apiUrl : 'http://localhost:8888/Laravel/StartupUTC/dist/public/api/v1' };

/**
 *  Déclaration de l'application Angular
 */
var app = angular.module('StartupUTC', ['ngRoute', 'ngResource']).constant('__ENV', __ENV);;


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
   .otherwise({redirectTo : "/"});
});

app.config(['$locationProvider', function($locationProvider) {
  $locationProvider.html5Mode(false);
  $locationProvider.hashPrefix('!');
}]);
