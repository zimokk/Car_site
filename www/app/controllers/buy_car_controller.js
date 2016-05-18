app.controller('BuyCarCtrl', ['$scope','Models','Marks', 'Countries', 'Regions','Cities','Bodies'
                            ,function($scope,Models,Marks,Countries,Regions,Cities,Bodies) {
    $scope.Models = Models.all;
    $scope.Marks = Marks.all;
    $scope.Countries = Countries.all;
    $scope.Regions = Regions.all;
    $scope.Cities = Cities.all;
    $scope.Bodies = Bodies.all;
    $scope.updateRegions = function () {
        Regions.getByCountry($scope.country);
    };
    $scope.updateCities = function () {
        Cities.getByRegion($scope.region);
    }
}]);