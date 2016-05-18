app.factory('Marks',function($http){
    var marksService = {
        all: [],
        getAll: function() {
            debugger;
            $http.get("php/read_marks.php").success(function(response){
                debugger;
                angular.copy(response.marks,marksService.all);
            });
        }
    };
    marksService.getAll();
    return marksService;
});