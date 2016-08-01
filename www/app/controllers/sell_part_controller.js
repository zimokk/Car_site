app.controller('SellPartCtrl', ['$scope','Models','Marks', 'Countries', 'Regions','Cities','Parts',
                function($scope,Models,Marks,Countries,Regions,Cities,Parts) {
    $scope.Models = Models.all;
    $scope.Marks = Marks.all;
    $scope.Countries = Countries.all;
    $scope.Regions = Regions.all;
    $scope.Cities = Cities.all;
    $scope.updateRegions = function () {
        Regions.getByCountry($scope.newPart.country_id);
    };
    $scope.updateCities = function () {
        Cities.getByRegion($scope.newPart.region_id);
    };
    $scope.newPart = {};
    $scope.addPart = function(){
        var newPart = $scope.newPart;
        Parts.createPart(newPart);
    }
}]);
