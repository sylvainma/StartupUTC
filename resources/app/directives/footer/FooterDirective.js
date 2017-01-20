app.directive('mainFooter', function() {
  return {
    restrict: 'EA',
    transclude: true,
    scope: {
    },
    controller: function($scope, $element, $attrs) {
    },
    templateUrl: 'app/directives/footer/footer.html',
  };
});
