app.directive('searchResults', function() {
  return {
    restrict: 'EA',
    transclude: true,
    scope: {
      startups : '=data'
    },
    controller: function($scope, $element, $attrs) {
    },
    templateUrl: 'app/directives/searchResults/search_results.html',
  };
});
