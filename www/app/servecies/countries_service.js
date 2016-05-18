app.factory('Countries',function($http){
    var countriesService = {
        all: [],
        getAll: function() {
            debugger;
            $http.get("php/read_countries.php").success(function(response){
                angular.copy(response.countries,countriesService.all);
                debugger;
            }).error(function(msg){

            });
        }
    };
    countriesService.getAll();
    return countriesService;
});