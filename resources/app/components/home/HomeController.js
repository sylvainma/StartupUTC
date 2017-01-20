/**
 *  Home
 */
app.controller('HomeCtrl', function($scope, $location, $http){

  $scope.search = function() {

    if(!$scope.q || $scope.q.length == 0 || !$scope.q.trim())
      $location.path('/search');
    else
      $location.path('/search').search({ q: $scope.q });

  }

  $scope.typeahead = function(query) {
    return $http.get(__ENV.apiUrl + '/search', {
      params: {
        q: query,
      }
    }).then(function(res){
      return res.data.data.slice(0, Math.min(4, res.data.data.length)).map(function(item){
        return item;
      });
    });
  };

  $scope.onSelect = function($item, $model, $label) {
    $location.path('/startup/' + $item.id);
  };

});
