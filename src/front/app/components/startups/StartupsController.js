/**
 *  Pour les ressources Startups
 */
app.controller('StartupsCtrl', function($scope, $resource, Startups){

  Startups.get({}, function(data){
    $scope.startups = data.data;
  }, function(error){
    console.log(error.data);
  });

});
