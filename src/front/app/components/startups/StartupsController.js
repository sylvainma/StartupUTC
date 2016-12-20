/**
 *  Pour les ressources Startups
 */
app.controller('StartupsCtrl', function($scope, $resource, ErrorHandler, Startups){

  $scope.startups = [];
  $scope.loading = true;

  Startups.get({}, function(data){
    $scope.startups = data.data.data;

    /*
     *  Pagination
     */
    $scope.currentPage  = 1;  // Page de départ
    $scope.maxSize      = 5;  // Nombre max de boutons de pagination avant de mettre des ...
    $scope.maxItems     = 5;  // Nombre max d'items par page de pagination

    $scope.$watch("startups", function(newValue, oldValue) {
     $scope.totalItems   = $scope.startups.length;
     $scope.itemsPerPage = Math.min($scope.startups.length, $scope.maxItems);
    });

    // Lorsqu'on fait une recherche, on désactive la pagination
    $scope.$watch("startupSearch", function(newValue, oldValue) {
     if(newValue !== '')
       $scope.itemsPerPage = $scope.startups.length;
     else
       $scope.itemsPerPage = Math.min($scope.startups.length, $scope.maxItems);
    });

    $scope.loading = false;
  }, function(error){
    ErrorHandler.alert(error);
    $scope.loading = false;
  });

});
