app.factory('Marks',function($http){
    var marksService = {
        all: [],
        getAll: function() {
            $http.get("php/read_marks.php").success(function(response){
                angular.copy(response.marks,marksService.all);
            });
        },
        getById: function(id){
            var item;
            marksService.all.forEach(function(mark,number){
                if(mark.id == id){
                    item = mark;
                    return item;
                }
            },id);
            return item;
        }
    };
    marksService.getAll();
    return marksService;
});