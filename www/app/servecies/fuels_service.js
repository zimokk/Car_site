app.factory('Fuels',function($http){
    var fuelsService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/fuels_commands/read_fuels.php").success(function(response){
                angular.copy(response.fuels,fuelsService.all);
            }).error(function(msg){

            });
        }
    };
    fuelsService.getAll();
    return fuelsService;
});