app.factory('Regions',function($http){
    var regionsService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/regions_commands/read_regions.php").success(function(response){
                angular.copy(response.regions,regionsService.all);
            }).error(function(msg){

            });
        },
        getByCountry: function(country_id){
            $http.post('php/commands/regions_commands/read_regions_by_country.php', {
                'country_id' : country_id
            })
            .success(function(response){
                angular.copy(response.regions,regionsService.all);
            })
            .error(function(data, status, headers, config){

            });
        }
    };
    return regionsService;
});