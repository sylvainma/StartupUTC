/**
 *  Gestion des erreurs
 */
app.controller('errorCtrl', function($scope, $routeParams, $location) {

  if ($routeParams.status && $routeParams.status == 404) {
    $scope.status = 404;
    $scope.message = "La page demandée est introuvable.";
  }
  else if ($routeParams.status && $routeParams.status == 500) {
    $scope.status = 500;
    $scope.message = "Erreur interne, veuillez contacter un webmaster.";
  }
  else {
    $location.path("/");
  }

});
