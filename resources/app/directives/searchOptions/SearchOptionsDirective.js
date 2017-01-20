app.directive('searchOptions', function(ErrorHandler, Fields, Departments) {
  return {
    restrict: 'EA',
    transclude: true,
    scope: {
      deptsChecked: '=depts',
      fieldsChecked: '=fields',
      foundation: '=foundation',
      update: '&callback'
    },
    controller: function($scope, $element, $attrs) {

      /****************************************************
       *  Départements
       ****************************************************/
      Departments.get({}, function(res){
        $scope.depts = res.data;
      }, function(error){
        ErrorHandler.alert(error);
      });

      $scope.deptsChecked = [];
      $scope.$watchCollection('deptsChecked', function () {
        $scope.update();
      });

      /****************************************************
       *  Domaines
       ****************************************************/
      Fields.get({}, function(res){
        $scope.fields = res.data;
      }, function(error){
        ErrorHandler.alert(error);
      });

      $scope.fieldsChecked = [];
      $scope.$watchCollection('fieldsChecked', function () {
        $scope.update();
      });

      /****************************************************
       *  Date de fondation
       ****************************************************/
      $scope.foundationOpt = {
        start: 1972,
        end: new Date().getFullYear(),
      };
      $scope.foundation = [1972, new Date().getFullYear()];

      $scope.$watchCollection('foundation', function () {
        $scope.update();
      });

    },
    templateUrl: 'app/directives/searchOptions/search_options.html',
  };
});
