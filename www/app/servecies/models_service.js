app.factory('Models',function($http){
    var modelsService = {
        all: [],
        getAll: function() {
            $http.get("php/read_models.php").success(function(response){
                angular.copy(response.models,modelsService.all);
            }).error(function(msg){

            });
        }
    };
    modelsService.getAll();
    return modelsService;
});