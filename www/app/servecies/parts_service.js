app.factory('Parts',function($http){
    var partsService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/parts_commands/read_parts.php").success(function(response){
                angular.copy(response.parts,partsService.all);
            }).error(function(msg){

            });
        },
        createPart: function(newPart){
            $http.post('php/commands/parts_commands/create_part.php', {
                'mark_id' : newPart.mark_id,
                'model_id' : newPart.model_id,
                'year_begin' : newPart.year_begin,
                'year_end' : newPart.year_end,
                'city_id' : newPart.city_id,
                'region_id' : newPart.region_id,
                'country_id' : newPart.country_id,
                'description' : newPart.description,
                'phone' : newPart.phone,
                'skype' : newPart.skype,
                'email' : newPart.email,
                'user_id' : 1
            }).success(function(response){
                if(response.result == "success") {
                    //success!!!!!!!!
                }
                else{
                    //usersService.errors.registrationError = "Ошибка Создания."
                }
            }).error(function(msg){

            });
        },
        filterParts: function(mark_id,model_id,year_begin,year_end,
                               country_id,region_id,city_id) {
            debugger
            $http.post('php/commands/parts_commands/filtrationAllParts.php', {
                'mark_id' : mark_id,
                'model_id' : model_id,
                'year_begin' : year_begin,
                'year_end' : year_end,
                'country_id': country_id,
                'region_id': region_id,
                'city_id': city_id
            }).success(function(response){
                debugger
                angular.copy(response.parts,partsService.all);
            }).error(function(msg){

            });
        }
    };
    partsService.getAll();
    return partsService;
});