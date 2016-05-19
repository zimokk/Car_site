app.factory('Fuels',function($http){
    var fuelsService = {
        all: [],
        getAll: function() {
            $http.get("php/read_fuels.php").success(function(response){
                angular.copy(response.fuels,fuelsService.all);
            }).error(function(msg){

            });
        },
        getById: function(id){
            var item;
            fuelsService.all.forEach(function(fuel,number){
                if(fuel.id == id){
                    item = fuel;
                    return item;
                }
            },id);
            return item;
        }
    };
    fuelsService.getAll();
    return fuelsService;
});