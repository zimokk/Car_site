app.controller('SellCarCtrl', ['$scope','Upload','Images','Audio','Antitheft','Electric','Equipment','Interior','Security'
    ,function($scope,Upload,Images,Audio,Antitheft,Electric,Equipment,Interior,Security) {
        $scope.Images = Images.all;
        $scope.progressValue = 0;
        $scope.uploadFiles = function (files) {
            if (files && files.length) {
                for (var i = 0; i < files.length; i++) {
                    Upload.upload({
                        url: "https://api.cloudinary.com/v1_1/zimokk/upload",
                        data: {upload_preset: "gdm3kidu", tags: 'cars', context: 'photo=myfoto'},
                        file: files[i]
                    }).then(function (data, status, headers, config) {
                        $scope.progressValue = 0;
                        Images.addUploaded(data.data.url);
                    },function (resp) {
                        console.log('Error status: ' + resp.status);
                    }, function (evt) {
                        $scope.progressValue = parseInt(100.0 * evt.loaded / evt.total);
                    });
                }
            }
        };
        $scope.createCar = function(){
            //Antitheft.createAntitheft("1","2");
        };
        $scope.deleteFunction = function(image){
            Images.deleteItem(image);
        }
}]);