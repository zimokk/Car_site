app.factory('Images',['$http',function($http){
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
        },
        createImages: function(newCarId){
            imagesService.all.forEach(function(image,number){
                $http.post('php/commands/images_commands/create_image.php', {
                    'car_id' : newCarId,
                    'url' : image.url
                })
                .success(function(response){
                    debugger;
                })
                .error(function(data, status, headers, config){
                    debugger
                });
            })
        },
        flush: function(){
            imagesService.all = [];
        },
        addUploaded: function(imageUrl){
            debugger
            imagesService.all.push({url:imageUrl});
            //imagesService.createImages(2)
        }
    };
    return imagesService;
}]);