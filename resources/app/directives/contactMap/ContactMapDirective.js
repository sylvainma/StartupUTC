app.directive('contactMap', function() {
  return {
    restrict: 'EA',
    transclude: true,
    scope: {
      startup : '=startup'
    },
    controller: function($scope, $element, $attrs) {
    },
    templateUrl: 'app/directives/contactMap/contact_map.html',
  };
});
