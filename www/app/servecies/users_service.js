app.factory('Users',function($http){
    var usersService = {
        all: [],
        current: {},
        getAll: function() {
            $http.get("php/commands/users_commands/read_users.php").success(function(response){
                angular.copy(response.users,usersService.all);
            });
        },
        authorize: function(login, password){
            $http.post('php/commands/users_commands/authorize.php', {
                'login' : login,
                'password' : password
            }).success(function(response){
                angular.copy(response.users[0],usersService.current);
            }).error(function(msg){

            });
        }
    };
    usersService.getAll();
    return usersService;
});