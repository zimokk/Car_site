app.factory('Users',function($http){
    var usersService = {
        all: [],
        current: {},
        registration_validation: new registration_validation(),
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
        },
        checkEmail: function(email){
            if(email != null && email != ""){
                $http.post('php/commands/users_commands/check_email.php', {
                    'email' : email
                }).success(function(response){
                    if(response.users.length == 1){
                        usersService.registration_validation.setEmailValidation(false);
                    }
                    else{
                        usersService.registration_validation.setEmailValidation(true);
                    }
                }).error(function(msg){

                });
            }
            else{
                usersService.registration_validation.setEmailValidation(false);
            }
        },
        checkLogin: function(login){
            if(login != null && login != ""){
                $http.post('php/commands/users_commands/check_login.php', {
                    'login' : login
                }).success(function(response){
                    if(response.users.length == 1){
                        usersService.registration_validation.setLoginValidation(false);
                    }
                    else{
                        usersService.registration_validation.setLoginValidation(true);
                    }
                }).error(function(msg){

                });
            }
            else{
                usersService.registration_validation.setLoginValidation(false);
            }
        }
    };
    usersService.getAll();
    return usersService;
});