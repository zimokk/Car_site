app.factory('Marks',function($http){
    var marksService = {
        all: [],
        getAll: function() {
            $http.get("php/read_marks.php").success(function(response){
                angular.copy(response.marks,marksService.all);
            });
        }
    };
    marksService.getAll();
    return marksService;
});