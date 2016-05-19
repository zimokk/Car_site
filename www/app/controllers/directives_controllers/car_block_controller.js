app.controller('carBlockController',['$scope', 'Marks', 'Models', 'Fuels', 'Bodies', 'Images', function($scope,Marks,Models,Fuels,Bodies,Images) {
    $scope.mark_name = Marks.getById($scope.car.mark_id).name;
    $scope.model_name = Models.getById($scope.car.model_id).name;
    $scope.fuel_name = Fuels.getById($scope.car.fuel_id).name;
    $scope.body_name = Bodies.getById($scope.car.body_id).name;
    //$scope.avatar = Images.getAvatarByCar($scope.car.idCars);
    debugger;
}]);
