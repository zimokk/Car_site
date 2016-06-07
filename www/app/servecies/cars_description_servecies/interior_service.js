app.factory('Interior',function($http){
    var interiorService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/interior_commands/read_interiors.php").success(function(response){
                angular.copy(response.interiors,interiorService.all);
            }).error(function(msg){

            });
        },
        getById: function(id){
            $http.post('php/commands/interiors_commands/read_interiors_by_id.php', {
                'id' : id
            }).success(function(response){
                angular.copy(response.interiors,interiorService.all);
            }).error(function(msg){

            });
        }
    };
    return interiorService;
});