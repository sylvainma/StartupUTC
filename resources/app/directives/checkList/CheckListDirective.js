app.directive('checkList', function() {
  return {
    restrict: 'EA',
    transclude: true,
    scope: {
      data: '=data',
      checked: '=checked',
    },
    controller: function($scope, $element, $attrs) {

      // Initialisation
      $scope.checked = [];

      // Vérifie que un élément est checked
      $scope.isChecked = function(id) {
        return _.contains($scope.checked, id);
      }

      // Marque un élément comme checked
      $scope.setChecked = function(id) {
        var newArray = _.without($scope.checked, id);
        newArray.push(id);
        $scope.checked = newArray;
      }

      // Marque un élément comme NON checked
      $scope.setUnChecked = function(id) {
        var newArray = _.without($scope.checked, id);
        $scope.checked = newArray;
      }

      // Vérifie si tous les éléments sont checked
      $scope.allChecked = function() {
        return _.every($scope.data, function(e){ return $scope.isChecked(e.id); });
      }

      // Sélectionne ou désélectionne tous les éléments
      // b = true ou false
      $scope.setAllChecked = function(b) {
        if(b) {
          // On les check tous
          $scope.data.forEach(function(e){
            $scope.setChecked(e.id);
          });
        } else {
          // On les uncheck tous
          $scope.data.forEach(function(e){
            $scope.setUnChecked(e.id);
          });
        }
      }

      // Logique lorsque le bouton 'Tous' est cliqué
      $scope.checkAll = function() {
        if($scope.allChecked())
          $scope.setAllChecked(false);
        else
          $scope.setAllChecked(true);
      }

      // Logique lorsque un élément est cliqué
      $scope.check = function(id) {
        if($scope.isChecked(id))
          $scope.setUnChecked(id);
        else
          $scope.setChecked(id);
      }

      $scope.$watchCollection('data', function () {
        // De base, met tout le monde en checked
        if($scope.data != null && $scope.data.length > 0)
          $scope.setAllChecked(true);
      });

    },
    templateUrl: 'app/directives/checkList/check_list.html',
  };
});
