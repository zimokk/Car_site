app.controller('BuyCarCtrl', ['$scope','Models','Marks', 'Countries', 'Regions','Cities','Bodies','Fuels','Images'
                            ,function($scope,Models,Marks,Countries,Regions,Cities,Bodies,Fuels,Images) {
    $scope.Models = Models.all;
    $scope.Marks = Marks.all;
    $scope.Countries = Countries.all;
    $scope.Regions = Regions.all;
    $scope.Cities = Cities.all;
    $scope.Bodies = Bodies.all;
    $scope.Fuels = Fuels.all;
    $scope.Images = Images.all;
    $scope.updateRegions = function () {
        Regions.getByCountry($scope.country);
    };
    $scope.updateCities = function () {
        Cities.getByRegion($scope.region);
    };
    $scope.changeMark = function(mark_id){
        $scope.mark_id = mark_id;
    }
}]);