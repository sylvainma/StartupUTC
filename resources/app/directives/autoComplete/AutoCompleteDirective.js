app.directive("autoComplete", function () {
  return  {
    restrict: 'A',
    scope: true,
    link: function($scope, elem, attr) {
        elem.autocomplete({
          data: {'salut': null, 'salut2': null}
        });
    }
};});
