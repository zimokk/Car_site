app.controller('BuyCarCtrl', ['$scope','Models','Marks', 'Countries',function($scope,Models,Marks,Countries) {
    $scope.Models = Models.all;
    $scope.Marks = Marks.all;
    $scope.Countries = Countries.all;
}]);