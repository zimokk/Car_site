app.factory('Countries',function($http){
    var countriesService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/countries_commands/read_countries.php").success(function(response){
                angular.copy(response.countries,countriesService.all);
            }).error(function(msg){

            });
        }
    };
    countriesService.getAll();
    return countriesService;
});