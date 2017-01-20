/**
 *  Contact
 */
app.controller('ContactCtrl', function($scope, $http) {

  $scope.sending = false;
  $scope.sent = false;
  $scope.error = false;
  $scope.email = {};

  var isEmptyStr = function(str) {
    return !str || str.length == 0 || !str.trim();
  }

  $scope.send = function() {

    if(!isEmptyStr($scope.email.name) && !isEmptyStr($scope.email.email) && !isEmptyStr($scope.email.body))
    {
      $scope.error = false;
      $scope.sending = true;
      $http.post(__ENV.apiUrl + '/contact', $scope.email).then(function(res){
        $scope.sending = false;
        $scope.sent = true;
        console.log('--> Mail envoyé');
      }, function(error){
        $scope.sending = false;
        $scope.error = ErrorHandler.parse(error).message;
      });
    } else {
      $scope.error = "Veuillez compléter correctement les champs.";
    }

  }

});
