app.factory('Cars',function($http){
    var carsService = {
        all: [],
        getAll: function() {
            $http.get("php/read_cars.php").success(function(response){
                debugger;
                angular.copy(response.cars,carsService.all);
                debugger
            }).error(function(msg){

            });
        }
    };
    carsService.getAll();
    return carsService;
});