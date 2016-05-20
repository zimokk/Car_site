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
        },
        filterCars: function(mark_id,model_id,fuel_id,body_id,transmission,max_price,min_price) {
            $http.post('php/commands/cars_commands/filtrationAllCars.php', {
                'mark_id' : mark_id,
                'model_id' : model_id,
                'fuel_id' : fuel_id,
                'body_id' : body_id,
                'transmission' : transmission,
                'max_price': max_price,
                'min_price': min_price
            }).success(function(response){
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