/**
 *  Une Startup
 */
app.controller('StartupsShowCtrl', function($scope, $resource, $routeParams, ErrorHandler, Startups){

  $scope.startup = [];
  $scope.loading = true;

  Startups.get({ id : $routeParams.id }, function(data){
    $scope.startup = data.data;
    $scope.loading = false;
  }, function(error){
    ErrorHandler.alert(error);
    $scope.loading = false;
  });

});
