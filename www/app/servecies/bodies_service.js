app.factory('Bodies',function($http){
    var bodiesService = {
        all: [],
        getAll: function() {
            $http.get("php/read_bodies.php").success(function(response){
                angular.copy(response.bodies,bodiesService.all);
            });
        }
    };
    bodiesService.getAll();
    return bodiesService;
});