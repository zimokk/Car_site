app.controller('BuyPartCtrl', ['$scope','Models','Marks', 'Countries', 'Regions','Cities','Parts',
            function($scope,Models,Marks,Countries,Regions,Cities,Parts) {
    $scope.Models = Models.all;
    $scope.Marks = Marks.all;
    $scope.Countries = Countries.all;
    $scope.Regions = Regions.all;
    $scope.Cities = Cities.all;
    $scope.Parts = Parts.all;
    $scope.updateRegions = function () {
        Regions.getByCountry($scope.country_id);
    };
    $scope.updateCities = function () {
        Cities.getByRegion($scope.region_id);
    };
    $scope.changeMark = function(mark_id){
        $scope.mark_id = mark_id;
    };
    $scope.changeModel = function(model_id){
        $scope.model_id = model_id;
        $scope.filterParts();
    };
    $scope.filterParts = function(){
        Parts.filterParts($scope.mark_id, $scope.model_id, $scope.year_begin, $scope.year_end, $scope.country_id, $scope.region_id, $scope.city_id);
    };
}]);
