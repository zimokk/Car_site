app.factory('Cities',function($http){
    var citiesService = {
        all: [],
        getAll: function() {
            debugger;
            $http.get("php/read_cities.php").success(function(response){
                angular.copy(response.cities,citiesService.all);
                debugger;
            }).error(function(msg){

            });
        }
    };
    citiesService.getAll();
    return citiesService;
});