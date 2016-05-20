app.controller('carBlockController',['$scope','Marks','Models','Fuels','Bodies','Images', function($scope,Marks,Models,Fuels,Bodies,Images) {
    $scope.Marks = Marks.all;
    $scope.Models = Models.all;
    $scope.Fuels = Fuels.all;
    $scope.Bodies = Bodies.all;
    $scope.Images = Images.all;
    $scope.avatar = Images.all[$scope.car.id];
}]);
