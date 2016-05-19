app.controller('carBlockController',["$scope", 'Marks', 'Models', 'Fuels', function($scope,Marks,Models,Fuels) {
    $scope.Marks = Marks;
    $scope.mark_name = Marks.getById($scope.car.mark_id).name;
    $scope.model_name = Models.getById($scope.car.model_id).name;
    $scope.fuel_name = Fuels.getById($scope.car.fuel_id).name;
}]);
