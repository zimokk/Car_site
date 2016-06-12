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
        },
        createAntitheft: function(immobilizer, signaling){
            $http.post('php/commands/antitheft_commands/create_antitheft.php', {
                'immobilizer' : immobilizer,
                'signaling' : signaling
            })
            .success(function(response){
                debugger
                angular.copy(response.antithefts,antitheftService.all);
            })
            .error(function(data, status, headers, config){
                debugger
            });
        }
    };
    return antitheftService;
});