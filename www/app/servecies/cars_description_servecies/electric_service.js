app.factory('Electric',function($http){
    var electricService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/electric_commands/read_electrics.php").success(function(response){
                angular.copy(response.electrics,electricService.all);
            }).error(function(msg){

            });
        },
        getById: function(id){
            $http.post('php/commands/electrics_commands/read_electrics_by_id.php', {
                'id' : id
            }).success(function(response){
                angular.copy(response.electrics,electricService.all);
            }).error(function(msg){

            });
        }
    };
    return electricService;
});