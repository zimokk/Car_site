app.factory('Images',function($http){
    var imagesService = {
        all: [],
        getAll: function() {
            $http.get("php/read_images.php").success(function(response){
                angular.copy(response.images,imagesService.all);
            }).error(function(msg){

            });
        },
        getByCar: function(car_id){
            $http.post('php/read_images_by_car.php', {
                'car_id' : car_id
            })
            .success(function(response){
                imagesService.all.push(response.images);
            })
            .error(function(data, status, headers, config){

            });
        },
        getAvatarByCar: function(car_id){
            var item;
            $http.post('php/read_images_by_car.php', {
                'car_id' : car_id
            })
            .success(function(response){
                item = response.images[0].url;
                return item;
            })
            .error(function(data, status, headers, config){
            });
        }
    };
    return imagesService;
});