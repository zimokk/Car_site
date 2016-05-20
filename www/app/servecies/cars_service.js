app.factory('Cars',['$http','Images',function($http, Images){
    var carsService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/cars_commands/read_cars.php").success(function(response){
                angular.copy(response.cars,carsService.all);
                response.cars.forEach(function(car,number,cars){
                    Images.getByCar(car.idCars);
                })
            }).error(function(msg){

            });
        }
    };
    carsService.getAll();
    return carsService;
}]);