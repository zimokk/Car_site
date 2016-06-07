app.factory('Antitheft',function($http){
    var antitheftService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/antitheft_commands/read_antithefts.php").success(function(response){
                angular.copy(response.antithefts,antitheftService.all);
            }).error(function(msg){

            });
        },
        getById: function(id){
            $http.post('php/commands/antithefts_commands/read_antithefts_by_id.php', {
                'id' : id
            }).success(function(response){
                angular.copy(response.antithefts,antitheftService.all);
            }).error(function(msg){

            });
        }
    };
    return antitheftService;
});