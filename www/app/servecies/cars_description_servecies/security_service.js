app.factory('Security',function($http){
    var securityService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/security_commands/read_securities.php").success(function(response){
                angular.copy(response.securities,securityService.all);
            }).error(function(msg){

            });
        },
        getById: function(id){
            $http.post('php/commands/security_commands/read_securities_by_id.php', {
                'id' : id
            }).success(function(response){
                angular.copy(response.securities,securityService.all);
            }).error(function(msg){

            });
        }
    };
    return securityService;
});