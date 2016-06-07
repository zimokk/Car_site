app.controller('CarInfoCtrl', ['$scope','Cars','Audio','Antitheft','Electric','Equipment','Interior','Security'
    ,function($scope, Cars) {
    $scope.Cars = Cars;
}]);