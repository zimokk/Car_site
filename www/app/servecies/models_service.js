app.factory('Models',function($http){
    var modelsService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/models_commands/read_models.php").success(function(response){
                angular.copy(response.models,modelsService.all);
            }).error(function(msg){

            });
        }
    };
    modelsService.getAll();
    return modelsService;
});