app.factory('Bodies',function($http){
    var bodiesService = {
        all: [],
        getAll: function() {
            $http.get("php/read_bodies.php").success(function(response){
                angular.copy(response.bodies,bodiesService.all);
            });
        },
        getById: function(id){
            var item;
            bodiesService.all.forEach(function(body,number){
                if(body.id == id){
                    item = body;
                    return item;
                }
            },id);
            return item;
        }
    };
    bodiesService.getAll();
    return bodiesService;
});