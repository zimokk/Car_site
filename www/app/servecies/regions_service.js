app.factory('Regions',function($http){
    var regionsService = {
        all: [],
        getAll: function() {
            debugger;
            $http.get("php/read_regions.php").success(function(response){
                angular.copy(response.regions,regionsService.all);
                debugger;
            }).error(function(msg){

            });
        }
    };
    regionsService.getAll();
    return regionsService;
});