app.controller('RegistrationCtrl', ['$scope','Users',function($scope, Users) {
    $scope.Users = Users;
    $scope.registration_validation = Users.registration_validation;
    $scope.authorize = function(){
        var enter_login = $scope.enter_login;
        var enter_password = $scope.enter_password;
        Users.authorize(enter_login, enter_password);
    };
    $scope.checkEmail = function(){
        var email = $scope.registration_email;
        Users.checkEmail(email);
    };
    $scope.checkLogin = function(){
        var login = $scope.registration_login;
        Users.checkLogin(login);
    };
    function setEmailError(reason){
        alert(reason);
    }
}]);
