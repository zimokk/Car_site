app.factory('Images',function($http){
    var imagesService = {
        all: [],
        getAll: function() {
            $http.get("php/commands/images_commands/read_images.php").success(function(response){
                response.images.forEach(function(image,number,images){
                    imagesService.all[image.car_id] = image.url;
                });
            }).error(function(msg){

            });
        },
        getByCar: function(car_id){
            $http.post('php/commands/images_commands/read_images_by_car.php', {
                'car_id' : car_id
            })
            .success(function(response){
                response.images.forEach(function(image,number,images){
                    imagesService.all[image.car_id] = image.url;
                });
            })
            .error(function(data, status, headers, config){
            });
        }
    };
    return imagesService;
});