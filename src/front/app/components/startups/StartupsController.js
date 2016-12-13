/**
 *  Pour les ressources Startups
 */
app.controller('StartupsCtrl', function($scope, $resource, Startups){

  $scope.data = {
    "nodes": [],
    "edges": []
  };

  Startups.get({}, function(data){
    $scope.startups = data.data;

    $scope.startups.forEach(function(s) {
      $scope.data["nodes"].push({
        "id": s.id,
        "label": s.name,
        "x": Math.floor(Math.random() * 3) + 0,
        "y": Math.floor(Math.random() * 3) + 0,
        "size": 3
      });
    });

  }, function(error){
    console.log(error.data);
  });

});
