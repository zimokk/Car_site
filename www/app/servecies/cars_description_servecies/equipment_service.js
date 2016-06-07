app.factory('Equipment',function($http){
    var equipmentService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/equipment_commands/read_equipments.php").success(function(response){
                angular.copy(response.equipments,equipmentService.all);
            }).error(function(msg){

            });
        },
        getById: function(id){
            $http.post('php/commands/equipments_commands/read_equipments_by_id.php', {
                'id' : id
            }).success(function(response){
                angular.copy(response.equipments,equipmentService.all);
            }).error(function(msg){

            });
        }
    };
    return equipmentService;
});