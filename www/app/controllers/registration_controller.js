app.controller('RegistrationCtrl', ['$scope','Users',function($scope, Users) {
    $scope.Users = Users;
    $scope.newUser = {};
    $scope.registration_validation = Users.registration_validation;
    $scope.authorize = function(){
        var enter_login = $scope.enter_login;
        var enter_password = $scope.enter_password;
        Users.authorize(enter_login, enter_password);
    };
    $scope.checkEmail = function(){
        var email = $scope.newUser.email;
        Users.checkEmail(email);
    };
    $scope.checkLogin = function(){
        var login = $scope.newUser.login;
        Users.checkLogin(login);
    };
    $scope.register = function(){
        Users.register($scope.newUser)
    };
    function setEmailError(reason){
        alert(reason);
    }
}]);
