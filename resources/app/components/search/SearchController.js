/**
 *  Recherche
 */
app.controller('SearchCtrl', function($scope, $resource, $routeParams, $http, $location, $timeout, ErrorHandler, Startups){

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

  // Délais sur le changement des options avant l'update
  // http://stackoverflow.com/questions/20397253/implement-a-delay-on-scope-watch
  var timeoutPromise;
  var delayInMs = 800;  // Délais avant de lancer l'update de la query de recherche

  $scope.update = function(){

    $timeout.cancel(timeoutPromise);        // does nothing, if timeout alrdy done
    timeoutPromise = $timeout(function(){   // Set timeout

      console.log('********************');
      console.log('CHANGEMENT');
      console.log('- Query:');
      console.log($scope.q);
      console.log('- Départements:');
      console.log($scope.deptsChecked);
      console.log('- Domaines:');
      console.log($scope.fieldsChecked);
      console.log('- Fondation:');
      console.log($scope.foundation);
      console.log('********************');

      // Si on a pas déjà cliqué sur Rechercher,
      // on ne lance pas la recherche
      // (ça veut dire que l'utilisateur règle les options avant)
      if($scope.results)
        $scope.search();

    }, delayInMs);

  }

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
      params.foundation = $scope.foundation;

    $http.post(__ENV.apiUrl + '/search', params).then(function(res){
      $scope.results = res.data.data;
      $scope.fetching = false;
      console.log('--> Recherche terminée');
    }, function(error){
      $scope.fetching = false;
      ErrorHandler.alert(error);
    });
  }

  // Si on vient de faire une recherche depuis la page d'accueil
  if($routeParams.q) {
    $scope.q = $routeParams.q;
    $scope.search();
  }

});
