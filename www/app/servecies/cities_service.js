app.factory('Cities',function($http){
    var citiesService = {
        all: [],
        getAll: function() {
            $http.get("php/read_cities.php").success(function(response){
                angular.copy(response.cities,citiesService.all);
            }).error(function(msg){

            });
        },
        getByRegion: function(region_id){
            $http.post('php/read_cities_by_region.php', {
                    'region_id' : region_id
                })
                .success(function(response){
                    angular.copy(response.cities,citiesService.all);
                })
                .error(function(data, status, headers, config){

                });
        }
    };
    return citiesService;
});