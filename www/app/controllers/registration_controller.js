app.controller('RegistrationCtrl', ['$scope','Users',function($scope, Users) {
    $scope.authorize = function(){
        var enter_login = $scope.enter_login;
        var enter_password = $scope.enter_password;
        Users.authorize(enter_login, enter_password);
    }
}]);
