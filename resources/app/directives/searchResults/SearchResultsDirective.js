app.directive('searchResults', function() {
  return {
    restrict: 'EA',
    transclude: true,
    scope: {
      startups : '=data'
    },
    controller: function($scope, $element, $attrs) {
      console.log('ça passe')
      console.log($scope.data)
    },
    templateUrl: 'app/directives/searchResults/search_results.html',
  };
});
