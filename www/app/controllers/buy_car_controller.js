app.controller('BuyCarCtrl', ['$scope','Models','Marks', 'Countries', 'Regions','Cities','Bodies','Fuels','Images','Cars'
                            ,function($scope,Models,Marks,Countries,Regions,Cities,Bodies,Fuels,Images,Cars) {
    $scope.Models = Models.all;
    $scope.Marks = Marks.all;
    $scope.Countries = Countries.all;
    $scope.Regions = Regions.all;
    $scope.Cities = Cities.all;
    $scope.Bodies = Bodies.all;
    $scope.Fuels = Fuels.all;
    $scope.Images = Images.all;
    $scope.Cars = Cars.all;
    $scope.updateRegions = function () {
        Regions.getByCountry($scope.country);
    };
    $scope.updateCities = function () {
        Cities.getByRegion($scope.region);
    };
    $scope.changeMark = function(mark_id){
        $scope.mark_id = mark_id;
    };
    $scope.changeModel = function(model_id){
        $scope.model_id = model_id;
    };
    $scope.filterCars = function(){
        Cars.filterCars($scope.mark_id, $scope.model_id, $scope.fuel_id, $scope.body_id, $scope.transmission);
    }
}]);