app.directive('graph', function($rootScope) {
  return {
    restrict: 'EA',
    transclude: false,
    scope: {
      data: '=gData'
    },
    controller: function($scope, $element, $attrs) {



      s = new sigma({
        graph: $scope.data,
        container: 'sigma-container',
        settings: {
            defaultNodeColor: '#ec5148'
        }
      });

    },
    templateUrl: 'app/directives/graph/graph.html',
  };
});
