app.factory('Users',function($http){
    var usersService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/users_commands/read_users.php").success(function(response){
                angular.copy(response.users,usersService.all);
            });
        }
    };
    usersService.getAll();
    return usersService;
});