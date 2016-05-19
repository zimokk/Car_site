app.controller('carBlockController',["$scope", 'Marks', 'Models', 'Fuels', 'Bodies', function($scope,Marks,Models,Fuels,Bodies) {
    $scope.mark_name = Marks.getById($scope.car.mark_id).name;
    $scope.fuel_name = Fuels.getById($scope.car.fuel_id).name;
    $scope.body_name = Bodies.getById($scope.car.body_id).name;
}]);
