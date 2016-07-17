app.factory('Users',function($http){
    var usersService = {
        all: [],
        current: {},
        registration_validation: new registration_validation(),
        errors: new users_errors(),
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
                if(response.users.length > 0) {
                    angular.copy(response.users[0], usersService.current);
                }
                else{
                    usersService.errors.loginError = "Неверный логин/пароль";
                }
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
                        usersService.errors.registrationError = "Email уже используется"
                    }
                    else{
                        usersService.registration_validation.setEmailValidation(true);
                        usersService.errors.registrationError = ""
                    }
                }).error(function(msg){

                });
            }
            else{
                usersService.registration_validation.setEmailValidation(false);
                usersService.errors.registrationError = "Необходимо ввести Email"
            }
        },
        checkLogin: function(login){
            if(login != null && login != ""){
                $http.post('php/commands/users_commands/check_login.php', {
                    'login' : login
                }).success(function(response){
                    if(response.users.length == 1){
                        usersService.registration_validation.setLoginValidation(false);
                        usersService.errors.registrationError = "Login уже используется"
                    }
                    else{
                        usersService.registration_validation.setLoginValidation(true);
                        usersService.errors.registrationError = ""
                    }
                }).error(function(msg){

                });
            }
            else{
                usersService.registration_validation.setLoginValidation(false);
                usersService.errors.registrationError = "Необходимо ввести Login"
            }
        },
        logOut: function(){
            this.current = {};
        }
    };
    usersService.getAll();
    return usersService;
});