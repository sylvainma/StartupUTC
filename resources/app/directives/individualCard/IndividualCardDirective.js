app.directive('individualCard', function() {
  return {
    restrict: 'EA',
    transclude: true,
    scope: {
      individual : '=individual'
    },
    controller: function($scope, $element, $attrs) {
    },
    templateUrl: 'app/directives/individualCard/individual_card.html',
  };
});
