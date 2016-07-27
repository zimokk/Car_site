app.controller('SellPartCtrl', ['$scope','Models','Marks', 'Countries', 'Regions','Cities','Parts',
                function($scope,Models,Marks,Countries,Regions,Cities,Parts) {
    $scope.Models = Models.all;
    $scope.Marks = Marks.all;
    $scope.Countries = Countries.all;
    $scope.Regions = Regions.all;
    $scope.Cities = Cities.all;
    $scope.updateRegions = function () {
        Regions.getByCountry($scope.country_id);
    };
    $scope.updateCities = function () {
        Cities.getByRegion($scope.region_id);
    };
}]);
