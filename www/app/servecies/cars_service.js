app.factory('Cars',['$http','Images',function($http, Images){
    var carsService = {
        all: [],
        current:{},
        costSorting:0,
        creationSorting:0,
        yearSorting:0,
        getAll: function() {
            $http.get("php/commands/cars_commands/read_cars.php").success(function(response){
                angular.copy(response.cars,carsService.all);
                response.cars.forEach(function(car,number,cars){
                    Images.getByCar(car.idCars);
                })
            }).error(function(msg){

            });
        },
        filterCars: function(mark_id,model_id,fuel_id,body_id,transmission,max_price,min_price,year_begin,year_end,
                             country_id,region_id,city_id) {
            $http.post('php/commands/cars_commands/filtrationAllCars.php', {
                'mark_id' : mark_id,
                'model_id' : model_id,
                'fuel_id' : fuel_id,
                'body_id' : body_id,
                'transmission' : transmission,
                'max_price': max_price,
                'min_price': min_price,
                'year_begin' : year_begin,
                'year_end' : year_end,
                'country_id': country_id,
                'region_id': region_id,
                'city_id': city_id
            }).success(function(response){
                angular.copy(response.cars,carsService.all);
                response.cars.forEach(function(car,number,cars){
                    Images.getByCar(car.idCars);
                })
            }).error(function(msg){

            });
        },
        sortByCost: function(){
            var costSorting;
            if(carsService.costSorting != 1){
                carsService.costSorting = 1;
                costSorting = function(a,b){
                    return (a.cost - b.cost);
                };
            }
            else{
                carsService.costSorting = 2;
                costSorting = function(a,b){
                    return (b.cost - a.cost);
                };
            }
            carsService.all.sort(costSorting);
        },
        sortByYear: function(){
            var yearSorting;
            if(carsService.yearSorting != 1){
                carsService.yearSorting = 1;
                yearSorting = function(a,b){
                    return (a.year - b.year);
                };
            }
            else{
                carsService.yearSorting = 2;
                yearSorting = function(a,b){
                    return (b.year - a.year);
                };
            }
            carsService.all.sort(yearSorting);
        },
        sortByCreation: function(){
            var creationSorting;
            debugger;
            if(carsService.creationSorting != 1){
                carsService.creationSorting = 1;
                creationSorting = function(a,b){
                    return ( new Date(a.creation_time).getTime() -  new Date(b.creation_time).getTime());
                };
            }
            else{
                carsService.creationSorting = 2;
                creationSorting = function(a,b){
                    return ( new Date(b.creation_time).getTime() -  new Date(a.creation_time).getTime());
                };
            }
            carsService.all.sort(creationSorting);
        },
        setCurrentCar: function(idCars){
            $http.post('php/commands/cars_commands/read_car.php', {
                'idCars' : idCars
            }).success(function(response){
                carsService.current = response.cars[0];
            }).error(function(msg){

            });
        }
    };
    carsService.getAll();
    return carsService;
}]);