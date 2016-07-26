app.controller('navbarController',["$scope", "Users", function($scope, Users) {
    $scope.Users = Users;
    $scope.logOut = function(){
        Users.logOut();
    }
}
]);
