app.factory('Models',function($http){
    var modelsService = {
        all: [],
        getAll: function() {
            $http.get("php/read_models.php").success(function(response){
                angular.copy(response.models,modelsService.all);
            }).error(function(msg){

            });
        },
        getById: function(id){
            var item;
            modelsService.all.forEach(function(model,number){
                if(model.id == id){
                    item = model;
                    return item;
                }
            },id);
            return item;
        }
    };
    modelsService.getAll();
    return modelsService;
});