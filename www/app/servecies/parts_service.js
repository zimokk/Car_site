app.factory('Parts',function($http){
    var partsService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/parts_commands/read_parts.php").success(function(response){
                angular.copy(response.parts,partsService.all);
            }).error(function(msg){

            });
        }
    };
    partsService.getAll();
    return partsService;
});