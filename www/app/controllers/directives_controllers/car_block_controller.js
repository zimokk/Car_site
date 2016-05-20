app.controller('carBlockController',['$scope','Marks','Models','Fuels','Bodies', function($scope,Marks,Models,Fuels,Bodies) {
    $scope.Marks = Marks.all;
    $scope.Models = Models.all;
    $scope.Fuels = Fuels.all;
    $scope.Bodies = Bodies.all;
}]);
