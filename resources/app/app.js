/**
 *  Configuration de l'environnement
 */
var __ENV = window.__env;

/**
 *  Déclaration de l'application Angular
 */
var app = angular.module('startuputc-search', ['ngResource', 'ui.materialize']).constant('__ENV', __ENV);

/**
 *  Recherche
 */
app.controller('SearchCtrl', function($scope, $resource, $http, $location, $timeout, Startups){

  $scope.startups = [];
  $scope.loading = true;
  $scope.fetching = false;
  $scope.results = null;

  // Options
  $scope.deptsChecked = [];
  $scope.fieldsChecked = [];
  $scope.foundation = [];

  $scope.$watch('fetching', function () {
  if($scope.fetching)
    console.log('--> Requête de recherche en cours...');
  });

  /**
   *  Recherche
   */
  $scope.search = function() {
    if(!$scope.q || $scope.q.length === 0 || !$scope.q.trim()) return;
    $scope.results = [];
    $scope.fetching = true;

    var params = {
        q: $scope.q,
    };

    if($scope.deptsChecked.length > 0)
      params['departments'] = $scope.deptsChecked;
    if($scope.fieldsChecked.length > 0)
      params['fields'] = $scope.fieldsChecked;
    if($scope.foundation.length == 2)
      params['foundation'] = $scope.foundation;

    $http.post(__ENV.apiUrl + '/search', params).then(function(res){
      $scope.results = res.data.data;
      $scope.fetching = false;
      console.log('--> Recherche terminée');
    }, function(error){
      $scope.fetching = false;
      //ErrorHandler.alert(error);
    });
  }


  /*
  Startups.get({}, function(res){
    $scope.results = res.data;
    $scope.fetching = false;
    console.log($scope.results);
  }, function(error){
    $scope.fetching = false;
    console.log(error);
  });
  */

});
