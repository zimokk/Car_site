app.controller('BuyCarCtrl', ['$scope','Models','Marks', 'Countries', 'Regions',function($scope,Models,Marks,Countries,Regions) {
    $scope.Models = Models.all;
    $scope.Marks = Marks.all;
    $scope.Countries = Countries.all;
    $scope.Regions = Regions.all;
}]);